@extends('layouts.dashboard')
@section('content')
	<div class="section">
		<div class="row">
			<div class="col-md-8">
				<h3>Questionários</h3>
			</div>
			<div class="col-md-4">
				<a href="{{url('projetos/'.$projeto->id.'/questionarios/create')}}" class="btn btn-primary">Criar Questionário</a>
			</div>
		</div>
		<hr>
		<div class="row">
			@if(Session::has('message'))
				<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
			@endif
		</div>
        <div class="bs-callout bs-callout-danger" id="callout-progress-animation-css3">
                <h4>{{$projeto->titulo}}</h4>
                <p>{{$projeto->descricao}}</p>
        </div>
		<div class="row">
			@forelse($projeto->questionarios as $questionario)
				<div class="col-md-6">
					<div class="card">
						<div class="header">
							<h4 class="title">{{$questionario->descricao}}</h4>
							<p class="category">{{str_limit($questionario->objetivo, 60)}}</p>
						</div>
                        <hr>
						<div class="content">
							<div>
                                <p>
                                    <a  href="/quiz/{{$questionario->token}}" target="_blank">
                                        Link para avaliação
                                    </a>
                                </p>
								<p class="text-center">
									<a  href="javascript:;" class="btn btn-primary" type="button">
										Avaliações <span class="badge">10</span>
									</a>
									<a href="javascript:;" class="btn btn-primary">Resultados</a>
                                </p>
							</div>
							<div class="footer">
								<div class="legend">
									<a class="text-right" href="/projetos/questionarios/{{$questionario->id}}" data-method="delete" data-confirm="Tem certeza ?" data-token="{{csrf_token()}}">
										<span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
									</a>
								</div>
								<hr>
								<div class="stats">
									<i class="fa fa-clock-o"></i> Atualizado em: {{$questionario->updated_at->format('d/m/Y')}}
								</div>
							</div>
						</div>
					</div>
				</div>
			@empty
				<h4>Nenhum questionário criado para este projeto.</h4>
			@endforelse
	    </div>
    </div>
@endsection()
