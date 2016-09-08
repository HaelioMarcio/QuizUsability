@extends('layouts.dashboard.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Categorias</h3>
            </div>

            <div class="title_right">
                <div class="pull-right">
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                    <a href="{{url('categorias/create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Nova Categoria</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            @forelse($categorias as $categoria)

                <div class="col-md-4 col-sm-4 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $categoria->descricao }}</h2>
                            <ul class="nav navbar-right panel_toolbox ">
                                <li class="pull-right"><a class="close-link "><i class="fa fa-close"></i></a>
                                </li>
                                <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <h3 class="description">{{ $categoria->descricao }}</h3>

                            <div class="divider"></div>

                            <div style="text-align: center; margin-bottom: 15px;">
                                <div class="btn-group" role="group" aria-label="First group">

                                    <a class="btn btn-default btn-sm" href="/categorias/{{$categoria->id}}/edit" type="button"
                                       data-toggle="tooltip" data-placement="top" title="Editar">
                                        <span class="fa fa-pencil" aria-hidden="true"> </span></a>

                                    <a class="btn btn-default btn-sm" href="/categorias/{{$categoria->id}}" data-method="delete" data-confirm="Tem certeza ?"
                                       data-token="{{csrf_token()}}" type="button" data-toggle="tooltip" data-placement="top" title="Excluir">
                                        <span class="fa fa-trash" aria-hidden="true"> </span>
                                    </a>
                                </div>
                            </div>

                            <div class="divider"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @empty
                Nenhuma categoria encontrado.
            @endforelse
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>

    </div>
    
    <meta name="_token" content="{!! csrf_token() !!}" />
@endsection
