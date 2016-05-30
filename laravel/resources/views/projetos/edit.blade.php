@extends('layouts.dashboard')
@section('titulo', 'Projetos')
@section('content')

    <div class="row">
        <div class="col-md-7">
            <h3>Editar {{$projeto->titulo}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
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
                    <input type="url" name="url" placeholder="Url" class="form-control" value="{{$projeto->url}}">
                    @if ($errors->has('url'))
                        <span class="help-block">
                        <strong>{{ $errors->first('url') }}</strong>
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
@endsection
