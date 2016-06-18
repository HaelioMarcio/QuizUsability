@extends('layouts.dashboard.main')

@section('content')

    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-tasks"></i>
                </div>
                <div class="count">{{ $result['projetos'] }}</div>

                <h3>Projetos</h3>
                <p>Ver todos</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i>
                </div>
                <div class="count">{{$result['questionarios']}}</div>

                <h3>Questionários</h3>
                <p>Ver todos</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i>
                </div>
                <div class="count">{{ $result['avaliacoes'] }}</div>

                <h3>Avaliações</h3>
                <p>Lorem ipsum</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i>
                </div>
                <div class="count">%</div>

                <h3>Severidade</h3>
                <p>Implementação futura</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Resltados <small>Última avaliação: {{ $result['ultimaAvaliacao'] }}</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="demo-container" >
                            <canvas id="canvasRadar" height="450" width="1140"></canvas>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('more-scripts')
    <script>

        $(document).ready(function() {

            $.getJSON("/resultados", function(result){

                if(result.data.labels.length > 0) {
                    var ctx = document.getElementById("canvasRadar");

                    var canvasRadar = new Chart(ctx, {
                        type: 'radar',
                        data: result.data,
                        options: {
                            responsive: true,
                            legend: {
                                display: true,
                                labels: {
                                    fontColor: 'rgb(255, 99, 132)'
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
