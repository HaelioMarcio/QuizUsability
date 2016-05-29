@extends('layouts.app')

@section('content')
    <div class="container">
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
        <div class="row">
            @if(Session::has('message'))
                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
            @endif
        </div>
        <div class="row">
            @forelse($projetos as $projeto)
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="control">
                                <a class="text-left" href="/projetos/{{$projeto->id}}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span></a>

                                <a class="text-right" href="/projetos/{{$projeto->id}}" data-method="delete" data-confirm="Tem certeza ?" data-token="{{csrf_token()}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"> </span></a>
                            </div>
                            <h1>{{$projeto->titulo}}</h1>
                        </div>
                        <div class="panel-body">
                            <p>Questionários: 1 <br>
                                Avaliações: 15 <br>
                                Tipo: Web</p>
                            <p class="text-center">
                                <a href="" class="btn btn-warning">Gerar Quiz</a>
                                <a href="" class="btn btn-primary">Resultados</a>
                            </p>

                        </div>
                    </div>
                </div>
            @empty
                Nenhum projeto cadastrado.
            @endforelse
        </div>
    </div>
@endsection
