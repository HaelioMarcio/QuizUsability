@extends('layouts.dashboard')
@section('content')
    <div class="section">
        <h3>Gerador de Questionário</h3>
            <p>Marque as perguntas que deseja para inserir em seu questionário de testes.</p>
            <p>{{$result['projeto']->titulo}}</p>
            <hr>
            <form action="{{url('/projetos/'.$result['projeto']->id.'/questionarios')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="descricao" placeholder="Descrição" class="form-control">
                            @if ($errors->has('descricao'))
                                <span class="help-block">
                            <strong>{{ $errors->first('descricao') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="objetivo" id="" cols="20" rows="5" placeholder="Objetivo"></textarea>
                            @if ($errors->has('objetivo'))
                                <span class="help-block">
                            <strong>{{ $errors->first('objetivo') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                @foreach($result['heuristicas'] as $heuristica)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{$heuristica->descricao}}</h4>
                            </div>
                            <div class="content">
                                <ul class="list-heuristic">
                                    @foreach($heuristica->perguntas as $perguntas)
                                        <li><input type="checkbox" name="perguntas[]" value="{{$perguntas->id}}"> {{$perguntas->descricao}}</li>
                                    @endforeach()
                                </ul>
                                <div class="footer">
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach()
                </div>

                <hr >
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Gerar</button>
                        <a href="javascript:;" class="btn btn-default ">Cancelar</a>
                    </div>
                </div>
            </form>
    </div>
@endsection()