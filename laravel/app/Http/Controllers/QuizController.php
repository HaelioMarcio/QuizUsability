<?php

namespace App\Http\Controllers;

use App\Entities\Avaliacao;
use App\Entities\Convidado;
use App\Entities\Questionario;
use App\Entities\Resposta;
use App\Entities\ResultadoAvaliacao;
use App\Repositories\QuestionarioRepository;
use App\Http\Requests\AvaliacaoCreateRequest;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
//use App\Repositories\AvaliacaoRepository;

class QuizController extends Controller
{
    /**
     * @var AvaliacaoRepository
     */
//    protected $repository;
    
    protected $questionarioRepository;
    
//    public function __construct(AvaliacaoRepository $repository, QuestionarioRepository $questionarioRepository)
    public function __construct(QuestionarioRepository $questionarioRepository)
    {
//        $this->repository = $repository;
        $this->questionarioRepository = $questionarioRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AvaliacaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AvaliacaoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $avaliacao = $this->repository->create($request->all());

            $response = [
                'message' => 'Avaliacao created.',
                'data'    => $avaliacao->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\Response
     */
    public function find($token)
    {
        $questionarios = $this->questionarioRepository->with(['perguntas','projeto'])->findByField('token', $token);

        $respostas = Resposta::all();

        $data = [
            'questionario' => $questionarios[0],
            'respostas' => $respostas
        ];

        return view('quiz.index', compact('data'));
    }

    public function avaliar(AvaliacaoCreateRequest $request, $id) {

        $respostas = $request['respostas'];

        $questionario = $this->questionarioRepository->find($id);
        $convidado = Convidado::firstOrCreate(['email' => $request['email'], 'nome' => $request['nome']]);//->first();

//        if(!$convidado) {
//            $convidado = new Convidado(['nome' => $request['nome'], 'email' => $request['email']]);
//            $convidado->save();
//        }

        if($this->avaliacaoJaRealizada($questionario, $convidado)) {
            return redirect()->back()->with('message', "Você já respondeu este questionário!");
        }

        $avaliacao = new Avaliacao();
        $avaliacao->convidado()->associate($convidado);
        $avaliacao->questionario()->associate($questionario);

        $avaliacao->save();

        foreach ($respostas as $resposta) {
            $p = $respostas = mbsplit(',',$resposta);

            ResultadoAvaliacao::create([
                'avaliacao_id' => $avaliacao->id,
                'pergunta_id' => $p[0],
                'resposta_id' => $p[1]
            ]);
        }

        return redirect()->back()->with('message', "Só sucesso!");
    }

    private function avaliacaoJaRealizada(Questionario $questionario, Convidado $convidado) {
        return Avaliacao::where('questionario_id', $questionario->id)->
                                where('convidado_id', $convidado->id)->
                                count() > 0;
    }
}
