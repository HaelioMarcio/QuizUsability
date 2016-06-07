@extends('layouts.dashboard')
@section('titulo', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Projetos</h4>
                    <p class="category">Nível de usabilidade</p>
                </div>
                <div class="content">
                    <div id="container-chart" style="min-width: 500px;"></div>

                    <div class="footer">
                        <div class="legend">
                            <i class="fa fa-circle text-danger"></i> Baixa
                            <i class="fa fa-circle text-warning"></i> Média
                            <i class="fa fa-circle text-info"></i> Alta
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Última avaliação: 29/05/2016
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Resumo</h4>
                    <p class="category">Algum subtítulo aqui</p>
                </div>
                <div class="content">
                    <div class="ct-chart">
                        <p><span class="label label-info">Projetos: <span class="badge">{{count($result['projetos'])}}</span></span></p>
                        <p><span class="label label-info">Questionários ativos: <span class="badge">{{count($result['questionarios'])}}</span></span></p>
                        <p><span class="label label-info">Avaliações realizadas: <span class="badge">{{count($result['avaliacoes'])}}</span></span></p>

                    </div>
                    <div class="footer">
                        <div class="legend">
                            {{--<p><span class="label label-default">Questionários inativos: <span class="badge">{{$result['questionariosInativos']}}</span></span>--}}
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Atualizado em 29/05/2016
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Projetos</h4>
                    <p class="category">Nível de usabilidade</p>
                </div>
                <div class="content">
                    Algum gráfico aqui ? Qual ?

                    <div class="footer">
                        <div class="legend">
                            <i class="fa fa-circle text-danger"></i> Baixa
                            <i class="fa fa-circle text-warning"></i> Média
                            <i class="fa fa-circle text-info"></i> Alta
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Última avaliação: 29/05/2016
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
