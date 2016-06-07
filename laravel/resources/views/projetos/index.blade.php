@extends('layouts.dashboard.main')
{{--@section('titulo', 'Projetos')--}}
@section('custom-styles')
    <link href="{{url('dashboard/main/css/pages/plans.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="span12">

            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-tasks"></i>
                    <h3>Projetos</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                    <div class="col-md-2">
                        <br>
                        <a href="{{url('projetos/create')}}" class="btn btn-primary">Criar Novo Projeto</a>
                    </div>

                    <div class="pricing-plans plans-3">
                        @forelse($projetos as $projeto)
                            <div class="plan-container">
                                <div class="plan">
                                    <div class="plan-header">

                                        <div class="plan-title">
                                            {{$projeto->titulo}}
                                        </div> <!-- /plan-title -->

                                        <div class="plan-price">
                                            75%<span class="term"> Avaliação heurística</span>
                                        </div> <!-- /plan-price -->

                                    </div> <!-- /plan-header -->

                                    <div class="plan-features">
                                        <ul>
                                            <li><blockquote>{{$projeto->descricao}}</blockquote></li>
                                            <li>
                                                <a  href="/projetos/{{$projeto->id}}/questionarios/" class="btn btn-warning" type="button">
                                                    {{count($projeto->questionarios)}} Questionários
                                                </a>

                                            </li>
                                            <li>Pay only what you need</li>
                                            <li>Chat support</li>
                                        </ul>
                                    </div> <!-- /plan-features -->

                                    <div class="plan-actions">
                                        {{--<a href="javascript:;" class="btn">Signup Now</a>--}}
                                        {{--<a href="javascript:;" class="btn">Signup Now</a>--}}
                                        <a class="btn" href="/projetos/{{$projeto->id}}/edit">
                                            <span class="icon-pencil" aria-hidden="true"> </span>
                                        </a>

                                        <a class="btn" href="/projetos/{{$projeto->id}}" data-method="delete" data-confirm="Tem certeza ?" data-token="{{csrf_token()}}">
                                            <span class="glyphicon icon-trash" aria-hidden="true"> </span>
                                        </a>
                                    </div> <!-- /plan-actions -->

                                </div> <!-- /plan -->
                            </div> <!-- /plan-container -->
                        @empty
                            Nenhum projeto cadastrado.
                        @endforelse
                    </div>




                    {{--<div class="row">--}}
                    {{--@forelse($projetos as $projeto)--}}
                    {{--<div class="col-md-4">--}}
                    {{--<div class="card">--}}
                    {{--<div class="header">--}}
                    {{--<h4 class="title">{{$projeto->titulo}}</h4>--}}
                    {{--<p class="category">{{str_limit($projeto->descricao, 60)}}</p>--}}
                    {{--</div>--}}
                    {{--<div class="content">--}}
                    {{--<div>--}}
                    {{--<p class="text-center">--}}
                    {{--<a  href="/projetos/{{$projeto->id}}/questionarios/" class="btn btn-warning" type="button">--}}
                    {{--Quiz <span class="badge">{{count($projeto->questionarios)}}</span>--}}
                    {{--</a>--}}
                    {{--<a href="" class="btn btn-primary">Resultados</a>--}}
                    {{--</p>--}}
                    {{--</div>--}}
                    {{--<div class="footer">--}}
                    {{--<div class="legend">--}}
                    {{--<a class="text-left" href="/projetos/{{$projeto->id}}/edit">--}}
                    {{--<span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span></a>--}}

                    {{--<a class="text-right" href="/projetos/{{$projeto->id}}" data-method="delete" data-confirm="Tem certeza ?" data-token="{{csrf_token()}}">--}}
                    {{--<span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    {{--<div class="stats">--}}
                    {{--<i class="fa fa-clock-o"></i> Atualizado em: {{$projeto->updated_at->format('d/m/Y')}}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@empty--}}
                    {{--Nenhum projeto cadastrado.--}}
                    {{--@endforelse--}}
                    {{--</div>--}}

                </div>
            </div>
        </div>
    </div>

    {{--<div class="row">--}}
    {{--<div class="col-md-7">--}}
    {{--<h1>Meus Projetos</h1>--}}
    {{--</div>--}}
    {{--<div class="col-md-2 col-offset-3">--}}
    {{--<br>--}}
    {{--<a href="{{url('projetos/create')}}" class="btn btn-primary">Criar Novo Projeto</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--@forelse($projetos as $projeto)--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="card">--}}
    {{--<div class="header">--}}
    {{--<h4 class="title">{{$projeto->titulo}}</h4>--}}
    {{--<p class="category">{{str_limit($projeto->descricao, 60)}}</p>--}}
    {{--</div>--}}
    {{--<div class="content">--}}
    {{--<div>--}}
    {{--<p class="text-center">--}}
    {{--<a  href="/projetos/{{$projeto->id}}/questionarios/" class="btn btn-warning" type="button">--}}
    {{--Quiz <span class="badge">{{count($projeto->questionarios)}}</span>--}}
    {{--</a>--}}
    {{--<a href="" class="btn btn-primary">Resultados</a>--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<div class="footer">--}}
    {{--<div class="legend">--}}
    {{--<a class="text-left" href="/projetos/{{$projeto->id}}/edit">--}}
    {{--<span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span></a>--}}

    {{--<a class="text-right" href="/projetos/{{$projeto->id}}" data-method="delete" data-confirm="Tem certeza ?" data-token="{{csrf_token()}}">--}}
    {{--<span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<hr>--}}
    {{--<div class="stats">--}}
    {{--<i class="fa fa-clock-o"></i> Atualizado em: {{$projeto->updated_at->format('d/m/Y')}}--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@empty--}}
    {{--Nenhum projeto cadastrado.--}}
    {{--@endforelse--}}
    {{--</div>--}}
@endsection
