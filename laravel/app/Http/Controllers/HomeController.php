<?php

namespace App\Http\Controllers;

use App\Entities\Heuristica;
use App\Repositories\ProjetoRepository;
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
            'questionarios' => $questionariosProjeto[0]->questionarios,
            'avaliacoes' => $avaliacoesProjeto[0]->total,
            'ultimaAvaliacao' => $avaliacoesProjeto[0]->ultimaAvaliacao
        ];

       return view('home', compact('result'));
    }

    public function compartilharQuestionario(Request $request)
    {
        if ($request->wantsJson()) {
            $response = [
                'data' => $request->all(),
                'message' => $request->get('avaliadores'),
            ];
            return response()->json($response, 200, [], JSON_NUMERIC_CHECK);
        }
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
            $c1 = mt_rand(1,255);
            $c2 = mt_rand(1,255);
            $c3 = mt_rand(1,255);

            $dataset = [
                'label' => $key,
                'fill' => true,
                'lineTension' => 0.1,
                'backgroundColor' => "rgba(".$c1.",".$c2.",".$c3.",0.1)",
                'borderColor' => "rgba(".$c1.",".$c2.",".$c3.",1)",
                'pointBackgroundColor' => "rgba(".$c1.",".$c2.",".$c3.",1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(".$c1.",".$c2.",".$c3.",1)",
                'data' => array_pluck($value, 'peso')
            ];
            $datasets->push($dataset);
        }

        $response = [
            'data' => [
                'labels' => $labels,
                'datasets' => $datasets
            ]
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
