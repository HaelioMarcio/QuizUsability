<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\HeuristicaCreateRequest;
use App\Http\Requests\HeuristicaUpdateRequest;
use App\Repositories\HeuristicaRepository;
use App\Validators\HeuristicaValidator;


class HeuristicasController extends Controller
{

    /**
     * @var HeuristicaRepository
     */
    protected $repository;

    public function __construct(HeuristicaRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $heuristicas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $heuristicas,
            ]);
        }

        // return view('heuristicas.index', compact('heuristicas'));
        return $heuristicas;
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
        $heuristica = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $heuristica,
            ]);
        }

        // return view('heuristicas.show', compact('heuristica'));
        return $heuristica;
    }
}
