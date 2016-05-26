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
            <a href="" class="btn btn-primary">Criar Novo Projeto</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><h1>Projeto 01</h1></div>
                <div class="panel-body">
                    <p>Questionários: 1</p>
                    <p>Avaliações: 15</p>
                    <p>Tipo: Web</p>
                    <p class="text-center"><a href="" class="btn btn-primary">Gráfico</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-danger">
                <div class="panel-heading"><h1>Projeto 01</h1></div>
                <div class="panel-body">
                    <p>Questionários: 1</p>
                    <p>Avaliações: 15</p>
                    <p>Tipo: Web e Desktop</p>
                    <p class="text-center"><a href="" class="btn btn-primary">Gráfico</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-warning">
                <div class="panel-heading"><h1>Projeto 01</h1></div>
                <div class="panel-body">
                    <p>Questionários: 1</p>
                    <p>Avaliações: 15</p>
                    <p>Tipo: Web</p>
                    <p class="text-center"><a href="" class="btn btn-primary">Gráfico</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading"><h1>Projeto 01</h1></div>
                <div class="panel-body">
                    <p>Questionários: 1</p>
                    <p>Avaliações: 15</p>
                    <p>Tipo: Web</p>
                    <p class="text-center"><a href="" class="btn btn-primary">Gráfico</a></p>
                </div>
            </div>
        </div>


    </div>

</div>
@endsection
