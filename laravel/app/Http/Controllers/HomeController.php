<?php

namespace App\Http\Controllers;

use App\Entities\Avaliacao;
use App\Entities\Projeto;
use App\Entities\Questionario;
use App\Entities\ResultadoAvaliacao;
use App\Http\Requests;
use App\Repositories\ProjetoRepository;
use App\Repositories\QuestionarioRepository;
use Illuminate\Support\Facades\Auth;

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

        $projetos =  Projeto::where('user_id', Auth::user()->id)->get();
        $questionarios = Questionario::whereIn('projeto_id', array_pluck($projetos, 'id'));
        $questionariosInativos = Questionario::onlyTrashed()->whereIn('projeto_id', array_pluck($projetos, 'id'))->get();
        $avaliacoes = Avaliacao::whereIn('questionario_id', array_pluck($questionarios, 'id'));

        dd($avaliacoes);
        $resultadosAvaliacao = ResultadoAvaliacao::whereIn('avaliacao_id', array_pluck($avaliacoes, 'id'))->get();

        dd($resultadosAvaliacao);

        $result = [
            'projetos' => count($projetos),
            'questionarios' => count($questionarios),
            'questionariosInativos' => count($questionariosInativos),
            'avaliacoes' => count($avaliacoes)
        ];
        
        
        return view('dashboard.index', compact('result'));
    }
}
