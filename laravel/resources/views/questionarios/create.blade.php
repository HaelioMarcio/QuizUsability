@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="section">
			<h3>Gerador de Questionário</h3>
				<p>Marque as perguntas que deseja para inserir em seu questionário de testes.</p>
				<hr>
				<form action="{{url('projetos/questionarios')}}" method="post">
					{{csrf_field()}}
					<ul class="list-heuristic">
					@foreach($heuristicas as $heuristica)
						<div class="col-md-6">
						<h4 class="title-heuristic"><strong>{{$heuristica->descricao}}</strong></h4>
						@foreach($heuristica->perguntas as $perguntas)
							<li><input type="checkbox" name="[perguntas]" value="{{$perguntas->id}}"> {{$perguntas->descricao}}</li>
						@endforeach()
						<br>
						</div>
					@endforeach()
					<br>
					</ul>
					<hr class="col-md-12">
					<div class="row">

						<div class="col-md-2 col-md-offset-5">
							<button type="submit" class="btn btn-primary">Gerar</button>
							<a href="{{url('projetos/2/questionarios')}}" class="btn btn-default ">Cancelar</a>
						</div>
					</div>
				</form>



		</div>
	</div>

@endsection()