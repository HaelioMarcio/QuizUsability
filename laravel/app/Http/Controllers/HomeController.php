<?php

namespace App\Http\Controllers;

use App\Entities\Avaliacao;
use App\Entities\Projeto;
use App\Entities\Questionario;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = count(Projeto::all());
        $questionarios = count(Questionario::all());
        $questionariosInativos = count(Questionario::onlyTrashed()->get());
        $avaliacoes = count(Avaliacao::all());

        $result = [
            'projetos' => $projetos,
            'questionarios' => $questionarios,
            'questionariosInativos' => $questionariosInativos,
            'avaliacoes' => $avaliacoes
        ];
        return view('dashboard.index', compact('result'));
    }
}
