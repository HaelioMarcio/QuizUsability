@extends('layouts.dashboard')
@section('content')
	<div class="section">
		<div class="row">
			<div class="col-md-8">
				<h3>Lista de Quiz</h3>
			</div>
			<div class="col-md-4">
				<a href="{{url('projetos/1/questionarios/create')}}" class="btn btn-primary">Criar Questionário</a>
			</div>
		</div>
		<hr>
		<div class="bs-callout bs-callout-danger" id="callout-progress-animation-css3">
				<h4>Cross-browser compatibility</h4>
				<p>Progress bars use CSS3 transitions and animations to achieve some of their effects. These features are not supported in Internet Explorer 9 and below or older versions of Firefox. Opera 12 does not support animations.</p>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="control">
							<a class="text-left" href="/projetos/questionarios/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span></a>
							<a class="text-right" href="/projetos/" data-method="delete" data-confirm="Tem certeza ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"> </span></a>
					</div>
				<div class="panel-body">
				<h3>Projeto 01</h3>
				<p>djasndjl nasldn laskndsnadnk
					dnaskdnlasndjnaskldjnskjadsna
					dnasldjnslajdnlasjdasdn
					kdnsajdnasj</p>
				<div class="row">
					<div class="col-md-3">
						<a  href="/projetos/questionarios/" class="btn btn-primary" type="button">
								Avaliações <span class="badge">10</span>
						</a>
					</div>
					<div class="col-md-3">
						<a href="" class="btn btn-primary">Resultados</a>
					</div>
				</div>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="control">
							<a class="text-left" href="/projetos/questionarios/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span></a>
							<a class="text-right" href="/projetos/" data-method="delete" data-confirm="Tem certeza ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"> </span></a>
					</div>
				<div class="panel-body">
				<h3>Projeto 01</h3>
				<p>djasndjl nasldn laskndsnadnk
					dnaskdnlasndjnaskldjnskjadsna
					dnasldjnslajdnlasjdasdn
					kdnsajdnasj</p>
				<div class="row">
					<div class="col-md-3">
						<a  href="/projetos/questionarios/" class="btn btn-primary" type="button">
								Avaliações <span class="badge">10</span>
						</a>
					</div>
					<div class="col-md-3">
						<a href="" class="btn btn-primary">Resultados</a>
					</div>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
@endsection()
