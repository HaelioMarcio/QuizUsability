@extends('layouts.dashboard')
@section('titulo', 'Projetos')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <h1>Meus Projetos</h1>
        </div>
        <div class="col-md-3">
            <br>
            <form action="">
                <div class="form-group">
                    <input class="form-control" type="text" name="search" placeholder="Pesquisar">
                </div>
            </form>
        </div>
        <div class="col-md-2">
            <br>
            <a href="{{url('projetos/create')}}" class="btn btn-primary">Criar Novo Projeto</a>
        </div>
    </div>
    {{--<div class="row">--}}
        {{--@if(Session::has('message'))--}}
            {{--<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>--}}
        {{--@endif--}}
    {{--</div>--}}
    <div class="row">
        @forelse($projetos as $projeto)
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{$projeto->titulo}}</h4>
                        <p class="category">{{str_limit($projeto->descricao, 60)}}</p>
                    </div>
                    <div class="content">
                        <div>
                            <p class="text-center">
                                <a  href="/projetos/{{$projeto->id}}/questionarios/" class="btn btn-warning" type="button">
                                    Quiz <span class="badge">{{count($projeto->questionarios)}}</span>
                                </a>
                                <a href="" class="btn btn-primary">Resultados</a>
                            </p>
                        </div>
                        <div class="footer">
                            <div class="legend">
                                <a class="text-left" href="/projetos/{{$projeto->id}}/edit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span></a>

                                <a class="text-right" href="/projetos/{{$projeto->id}}" data-method="delete" data-confirm="Tem certeza ?" data-token="{{csrf_token()}}">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                                </a>
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Atualizado em: {{$projeto->updated_at->format('d/m/Y')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            Nenhum projeto cadastrado.
        @endforelse
    </div>
@endsection
