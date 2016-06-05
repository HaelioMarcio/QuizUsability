<?php

namespace App\Http\Controllers;

use App\Entities\Avaliacao;
use App\Entities\Projeto;
use App\Entities\Questionario;
use App\Entities\ResultadoAvaliacao;
use App\Http\Requests;
use App\Repositories\AvaliacaoRepository;
use App\Repositories\ProjetoRepository;
use App\Repositories\QuestionarioRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    protected $avaliacaoRepository;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AvaliacaoRepository $avaliacaoRepository)
    {
        $this->middleware('auth');
        $this->avaliacaoRepository = $avaliacaoRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projetos =  Projeto::with('questionarios')->where('user_id', Auth::user()->id)->get();
        $questionarios = Questionario::with('perguntas')->whereIn('projeto_id', array_pluck($projetos, 'id'))->first();
        $questionariosInativos = Questionario::onlyTrashed()->whereIn('projeto_id', array_pluck($projetos, 'id'))->first();
        $avaliacoes = Avaliacao::with('resultadoAvaliacao')->whereIn('questionario_id', array_pluck($questionarios, 'id'))->get();

//        $result = [
//            'projetos' => count($projetos),
//            'questionarios' => count($questionarios),
//            'questionariosInativos' => count($questionariosInativos),
//            'avaliacoes' => count($avaliacoes)
//        ];

        $result = [
            'projetos' => $projetos,
            'questionarios' => $questionarios,
            'questionariosInativos' => $questionariosInativos,
            'avaliacoes' => $avaliacoes
        ];
//        foreach ($avaliacoes as $avaliacao) {
//            dump($avaliacao->resposta());
//        }
        dd($result);
        
        return view('dashboard.index', compact('result'));
    }
}
