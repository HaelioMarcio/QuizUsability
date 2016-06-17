@extends('layouts.dashboard.main')

@section('content')
    <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Heurísticas <small>No contexto da usabilidade</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <ul class="list-unstyled timeline">
                    @foreach($heuristicas as $heuristica)
                        <li>
                            <div class="block">
                                <div class="block_content">
                                    <h2 class="title">
                                        <a href="javascript:;">{{ $heuristica->titulo }}</a>
                                    </h2>
                                    <p class="excerpt">{{ $heuristica->descricao }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
        <div class="clearfix"></div>
    </div>
@endsection
