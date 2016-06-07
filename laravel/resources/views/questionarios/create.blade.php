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
                        <input type="text" name="descricao" placeholder="Descrição" class="form-control" required>
                        @if ($errors->has('descricao'))
                            <span class="help-block">
                            <strong>{{ $errors->first('descricao') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="objetivo" id="" cols="20" rows="5" placeholder="Objetivo" required></textarea>
                        @if ($errors->has('objetivo'))
                            <span class="help-block">
                            <strong>{{ $errors->first('objetivo') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @foreach($result['heuristicas'] as $heuristica)
                        <div class="card">
                            <div class="header">
                                <h4 class="title">#{{$heuristica->id}} - {{$heuristica->titulo}}
                                    {{--<a tabindex="0" role="button" data-toggle="tooltip"--}}
                                    {{--title="{{$heuristica->descricao}}" data-placement="top">--}}
                                    {{--<i class="glyphicon glyphicon-info-sign"></i>--}}
                                    {{--</a>--}}

                                    <a tabindex="0" role="button" data-trigger="hover" data-toggle="popover"
                                       data-content="{{$heuristica->descricao}}" data-placement="top">
                                        <i class="glyphicon glyphicon-info-sign"></i>
                                    </a>
                                </h4>
                            </div>
                            <div class="content">
                                @foreach($heuristica->perguntas as $pergunta)
                                    <label for="pergunta-{{$pergunta->id}}">
                                        <input id="pergunta-{{$pergunta->id}}" type="checkbox" name="perguntas[]" value="{{$pergunta->id}}" />
                                        {{$pergunta->descricao}}
                                    </label>
                                    <hr>
                                @endforeach()
                                <div class="footer">
                                    <hr>
                                </div>
                            </div>
                        </div>
                    @endforeach()
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Gerar</button>
                    <a href="javascript:;" class="btn btn-default ">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
@endsection()