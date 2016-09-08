@extends('layouts.front')
@section('content')
	<div class="container">
            <form action="{{url('/quiz/'.$data['questionario']->id.'/avaliacao')}}" method="post">
                {{csrf_field()}}
                <div class="row">

                    <div class="col s12 m12 center">
                        <h4>{{$data['questionario']->projeto->titulo}}</h4>
                        <h4><small>{{$data['questionario']->descricao}}</small></h4>
                        <p class="center"><a href="{{$data['questionario']->projeto->url}}" target="_blank"><i class="tiny material-icons">launch</i> {{$data['questionario']->projeto->url}}</a></p> 
                    </div>
                </div>
                <p>Por favor, antes de fazer sua avaliação, identifique-se.</P>
                <div class="row">
                    <div class="col s12 m6">
                        <div class="form-group">
                            <input type="text" name="nome" placeholder="* Nome" class="form-control" required>
                            @if ($errors->has('nome'))
                                <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                            @endif
                        </div>
                   </div>
                   <div class="col s12 m6">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="* Email" class="form-control" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php $x = 1; ?>

                    @foreach($data['questionario']->perguntas as $pergunta)
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <blockquote>#{{$x++}} - {{$pergunta->descricao}}</blockquote>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                @foreach($data['respostas'] as $resposta)
                                    <p class="col s12 m4">
                                        <input type="radio" class="with-gap" id="resposta-{{$pergunta->id}},{{$resposta->id}}" name="respostas[{{$pergunta->id}}]" value="{{$pergunta->id}},{{$resposta->id}}" />
                                        <label for="resposta-{{$pergunta->id}},{{$resposta->id}}">{{$resposta->descricao}}</label>
                                    </p>
                                    
                               @endforeach
                               </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <hr >
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Responder</button>
                        <button type="reset" class="btn btn-primary">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
@section('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            @if(Session::has('message'))
                Materialize.toast('{!! session('message') !!}', 4000);
            @endif
            
            $("input[type=radio]").click(function(){
            	console.log('opção selecionada.');
            });
        });
    </script>
@endsection