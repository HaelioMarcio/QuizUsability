@extends('layouts.dashboard.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Projetos</h3>
            </div>

            <div class="title_right">
                <div class="pull-right">
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                    <a href="{{url('projetos/create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Novo Projeto</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            @forelse($projetos as $projeto)

            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ $projeto->titulo }} <small>Questionários: {{count($projeto->questionarios)}}</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <h3 class="description">{{ $projeto->descricao }}</h3>

                        <div style="text-align: center; margin-bottom: 17px">
                            <span class="chart" data-percent="86">
                                <span class="percent"></span>
                            </span>
                        </div>

                        <h3 class="name_title ">Usabilidade</h3>
                        <p>Avaliação heurística</p>

                        <div class="divider"></div>

                        <div style="text-align: center; margin-bottom: 15px;">
                            <div class="btn-group" role="group" aria-label="First group">

                                <a href="{{url('projetos/'.$projeto->id.'/questionarios/create')}}" class="btn btn-default btn-sm" type="button"
                                   data-toggle="tooltip" data-placement="top" title="Adicionar questionário">
                                    <span class="fa fa-plus" aria-hidden="true"> </span>
                                    <span class="fa fa-list" aria-hidden="true"> </span></a>
                                </a>
                                <a class="btn btn-default btn-sm" href="/projetos/{{$projeto->id}}/edit" type="button"
                                   data-toggle="tooltip" data-placement="top" title="Editar">
                                    <span class="fa fa-pencil" aria-hidden="true"> </span></a>

                                <a class="btn btn-default btn-sm" href="/projetos/{{$projeto->id}}" data-method="delete" data-confirm="Tem certeza ?"
                                   data-token="{{csrf_token()}}" type="button" data-toggle="tooltip" data-placement="top" title="Excluir">
                                    <span class="fa fa-trash" aria-hidden="true"> </span>
                                </a>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <!-- start accordion -->
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            @foreach($projeto->questionarios as $questionario)
                            <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$questionario->id}}" aria-expanded="false" aria-controls="collapse{{$questionario->id}}">
                                    <h4 class="panel-title">{{ $questionario->descricao }}</h4>
                                </a>
                                <div id="collapse{{$questionario->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <p >Link para avaliação: <a href="/quiz/{{ $questionario->token }}" target="_blank">{{ $questionario->token }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            @empty
                Nenhum projeto encontrado.
            @endforelse
                <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>

    </div>

@endsection
@section('more-scripts')
    <script src="{{url('main/js/easypie/jquery.easypiechart.min.js')}}"></script>
    <script>
        $(function() {
            $('.chart').easyPieChart({
                easing: 'easeOutElastic',
                delay: 3000,
                barColor: '#26B99A',
                trackColor: '#fff',
                scaleColor: false,
                lineWidth: 20,
                trackWidth: 16,
                lineCap: 'butt',
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
            var chart = window.chart = $('.chart').data('easyPieChart');
            $('.js_update').on('click', function() {
                chart.update(Math.random() * 200 - 100);
            });
        });
    </script>

@endsection