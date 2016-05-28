<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AvaliacaoCreateRequest;
use App\Http\Requests\AvaliacaoUpdateRequest;
use App\Repositories\AvaliacaoRepository;
use App\Validators\AvaliacaoValidator;


class AvaliacaosController extends Controller
{

    /**
     * @var AvaliacaoRepository
     */
    protected $repository;

    /**
     * @var AvaliacaoValidator
     */
    protected $validator;


    public function __construct(AvaliacaoRepository $repository, AvaliacaoValidator $validator)
    {
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
        $avaliacaos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $avaliacaos,
            ]);
        }

        return view('avaliacaos.index', compact('avaliacaos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('avaliacaos.create');
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
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $avaliacao = $this->repository->find($id);

        return view('avaliacaos.edit', compact('avaliacao'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AvaliacaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AvaliacaoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $avaliacao = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Avaliacao updated.',
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
                'message' => 'Avaliacao deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Avaliacao deleted.');
    }
}
