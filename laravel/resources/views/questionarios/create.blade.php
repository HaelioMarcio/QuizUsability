@extends('layouts.app')
@section('content')
	
	<div class="container">
		<div class="section">
			<h3>Gerador de Questionário</h3>
			<div class="row">
				<ul>
                    @foreach($heuristicas as $heuristica)
					    <li>{{$heuristica->descricao}}
                            <p>Perguntas: </p>
                            <ul>
                                @foreach($heuristica->perguntas as $pergunta)
                                    <li>{{$pergunta->descricao}}</li>
                                @endforeach
                            </ul>
                        </li>
				    @endforeach()
                </ul>
			</div>
		</div>
	</div>

@endsection()