@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Editar {{$projeto->titulo}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="/projetos/{{$projeto->id}}" method="post" >
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="titulo" placeholder="Título" class="form-control" value="{{$projeto->titulo}}">
                        @if ($errors->has('titulo'))
                            <span class="help-block">
                            <strong>{{ $errors->first('titulo') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="descricao" id="" cols="30" rows="10" placeholder="Descrição">{{$projeto->descricao}}</textarea>
                        @if ($errors->has('descricao'))
                            <span class="help-block">
                            <strong>{{ $errors->first('descricao') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="/home" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
