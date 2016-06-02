<?php

namespace App\Http\Controllers;

use App\Entities\Heuristica;
use App\Entities\Questionario;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjetoCreateRequest;
use App\Http\Requests\ProjetoUpdateRequest;
use App\Repositories\ProjetoRepository;
use App\Validators\ProjetoValidator;


class ProjetosController extends Controller
{

    /**
     * @var ProjetoRepository
     */
    protected $repository;

    /**
     * @var ProjetoValidator
     */
    protected $validator;


    public function __construct(ProjetoRepository $repository, ProjetoValidator $validator)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $projetos = $this->repository->findWhere(['user_id' => Auth::user()->id]);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projetos,
            ]);
        }

        return view('projetos.index', compact('projetos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projetos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjetoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $params = $request->all();
            $params['user_id'] = Auth::user()->id;
            $projeto = $this->repository->create($params);


            $response = [
                'message' => 'Projeto criado com sucesso.',
                'data'    => $projeto->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->to('projetos')->with('message', $response['message']);
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
        $projeto = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projeto,
            ]);
        }

//        return view('projetos.show', compact('projeto'));
        return $projeto;
    }

    public function findQuestionarios($id)
    {
        $projeto = $this->repository->with('questionarios')->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projeto,
            ]);
        }

        return view('questionarios.index', compact('projeto'));
    }

    public function createQuestionario($id)
    {
        $projeto = $this->repository->find($id);
        $heuristicas = Heuristica::all();
//        if (request()->wantsJson()) {
//
//            return response()->json([
//                'data' => $projeto,
//            ]);
//        }
        $result = [
            'projeto' => $projeto,
            'heuristicas' => $heuristicas
        ];
        
//        dd($result);
        
        return view('questionarios.create', compact('result'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $projeto = $this->repository->find($id);

        return view('projetos.edit', compact('projeto'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProjetoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProjetoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $projeto = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Projeto atualizado com sucesso.',
                'data'    => $projeto->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
//            return redirect()->back()->with('message', $response['message']);
            return redirect()->to('projetos')->with('message', $response['message']);
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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Projeto removido.',
                'deleted' => $deleted,
            ]);
        }
        return redirect()->to('projetos')->with('message', 'Projeto removido.');
    }

    public function findAvaliacoes()
    {
        return view('avaliacoes.index');
    }

    public function saveQuestionario(ProjetoCreateRequest $request, $id) {
        $params = $request->all();
        $projeto = $this->repository->find($id);
        $questionario = new Questionario();
        $questionario->token = str_random(15);
        $questionario->descricao = $params['descricao'];
        $questionario->objetivo = $params['objetivo'];
        $questionario->projeto()->associate($projeto);
        $questionario->save();
        $questionario->perguntas()->attach($params['perguntas']);

        return redirect()->to('projetos/'.$projeto->id.'/questionarios')->with('message', 'Questionário criado.');
    }

    public function removeQuestionario($id)
    {
        $deleted = Questionario::destroy($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Questionário removido.',
                'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with('message', 'Questionário removido.');
    }
}
