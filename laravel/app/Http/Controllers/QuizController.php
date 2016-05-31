<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionarioRepository;
use Illuminate\Http\Request;

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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avaliacao = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $avaliacao,
            ]);
        }

        return view('avaliacaos.show', compact('avaliacao'));
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
        $questionario = $this->questionarioRepository->with(['perguntas','projeto'])->findByField('token', $token);

        return view('quiz.index', compact('questionario'));
    }
}
