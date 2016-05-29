@extends('layouts.app')
@section('content')
	
	<div class="container">
		<div class="section">
			<h3>Gerador de Questionário</h3>
			<div class="row">
				@foreach($heuristicas as $heuristica)
					{{$heuristica}}
				@endforeach()
			</div>
		</div>
	</div>

@endsection()