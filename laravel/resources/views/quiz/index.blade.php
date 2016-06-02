@extends('layouts.front')
@section('content')
	<div class="container">
            <div class="row">
                @if(Session::has('message'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
                @endif
            </div>
            <form action="{{url('/quiz/'.$data['questionario']->id.'/avaliacao')}}" method="post">
                {{csrf_field()}}
                <div class="row">

                    <div class="col s12 m6">
                        <h4>{{$data['questionario']->projeto->titulo}}</h4>
                        <h4>{{$data['questionario']->descricao}}</h4>
                    </div>
                </div>
                <div class="row">
                    @foreach($data['questionario']->perguntas as $pergunta)
                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-content">
                                {{--<span class="card-title">{{$pergunta->descricao}}</span>--}}
                                {{--<p class="flow-text">{{$pergunta->descricao}}</p>--}}
                                <blockquote>{{$pergunta->descricao}}</blockquote>
                            </div>
                            <div class="card-action">
                                @foreach($data['respostas'] as $resposta)
                                    <p>
                                        <input type="radio" class="with-gap" id="resposta-{{$resposta->id}}" name="respostas[{{$pergunta->id}}]" value="{{$pergunta->id}},{{$resposta->id}}">
                                        <label for="resposta-{{$resposta->id}}">{{$resposta->descricao}}</label>
                                    </p>
                                    <div class="divider"></div>
                               @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <hr >
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Responder</button>
                        <a href="javascript:;" class="btn btn-default ">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
