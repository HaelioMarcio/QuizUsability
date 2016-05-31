@extends('layouts.app')
@section('content')
	<div class="container">
        <div class="section">
            <div class="row">
                <div class="col-md-8">
                    <h3>Lista de Quiz</h3>
                </div>
                @foreach($questionario as $q)
                    {{$q}}
                @endforeach
            </div>
        </div>
    </div>
@endsection()
