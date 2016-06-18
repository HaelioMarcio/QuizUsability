<?php

namespace App\Http\Controllers;

use App\Entities\Avaliacao;
use App\Entities\Heuristica;
use App\Entities\Projeto;
use App\Entities\Questionario;
use App\Entities\ResultadoAvaliacao;
use App\Repositories\ProjetoRepository;
use App\Repositories\QuestionarioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    protected $projetoRepository;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProjetoRepository $projetoRepository)
    {
        $this->middleware('auth');
        $this->projetoRepository = $projetoRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $projetos = $this->projetoRepository->findByField('user_id', $userId)->count();

        $avaliacoesProjeto = \DB::select('select count(*) as total, MAX(avaliacao.created_at) as ultimaAvaliacao from avaliacao '.
                                'inner join questionario on avaliacao.questionario_id = questionario.id '.
                                'inner join projeto on questionario.projeto_id = projeto.id '.
                                'where projeto.user_id = ?', [$userId]);

        $questionariosProjeto = \DB::select('select count(*) as questionarios from questionario '.
                                            'inner join projeto on questionario.projeto_id = projeto.id '.
                                            'where projeto.user_id = ?', [$userId]);

        $result = [
            'projetos' => $projetos,
            'questionarios' => count($questionariosProjeto),
            'avaliacoes' => $avaliacoesProjeto[0]->total,
            'ultimaAvaliacao' => $avaliacoesProjeto[0]->ultimaAvaliacao
        ];

       return view('home', compact('result'));
    }

    public function compartilharQuestionario(Request $request, $token)
    {
        dd($request['avaliadores']);
    }

    public function obterResultados(Request $request)
    {
        $userId = Auth::user()->id;

        $data = \DB::select('select projeto.titulo as projeto, heuristica.titulo as heuristica, '.
                            'cast(sum(resposta.peso)/count(resposta.id) as UNSIGNED) as peso '.
                            'from projeto '.
                            'left join questionario on questionario.projeto_id = projeto.id '.
                            'inner join avaliacao on avaliacao.questionario_id = questionario.id '.
                            'left join resultado_avaliacao on resultado_avaliacao.avaliacao_id = avaliacao.id '.
                            'left join pergunta on resultado_avaliacao.pergunta_id = pergunta.id '.
                            'left join resposta on resultado_avaliacao.resposta_id = resposta.id '.
                            'left join heuristica on pergunta.heuristica_id = heuristica.id '.
                            'where projeto.user_id = ? '.
                            'group by heuristica, projeto', [$userId]);
        
        $collection = collect($data)->groupBy('projeto');
        $datasets = collect([]);
        $labels = collect(array_pluck($data, 'heuristica'))->unique()->flatten();

        foreach ($collection as $key => $value) {
            $dataset = [
                'label' => $key,
                'data' => array_pluck($value, 'peso')
            ];
            $datasets->push($dataset);
        }

        $data = [
            'labels' => $labels,
            'pointStrokeColor' => "#fff",
            'pointHighlightFill' => "#fff",
            'datasets' => $datasets
        ];

        $response = [
            'data' => $data
        ];

        if ($request->wantsJson()) {
            return response()->json($response, 200, [], JSON_NUMERIC_CHECK);
        }
    }

    public function sobre() {

        $heuristicas = Heuristica::all();
        
        return view('heuristicas.index', compact('heuristicas'));
    }
}
