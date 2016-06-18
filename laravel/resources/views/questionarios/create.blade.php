@extends('layouts.dashboard.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Questionários
                </h3>
            </div>


        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Novo questionário <small>[{{$result['projeto']->titulo}}]</small> </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left" novalidate action="{{url('/projetos/'.$result['projeto']->id.'/questionarios')}}" method="post">
                            {{csrf_field()}}

                            <p>
                                Marque as perguntas que deseja para inserir em seu questionário de testes.
                            </p>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="descricao" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="6" data-validate-words="2" name="descricao"
                                           placeholder="Descrição do questionário" required="required" type="text">
                                    @if ($errors->has('descricao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('descricao') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="objetivo">Objetivo
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="objetivo" required="required" name="objetivo"
                                              class="form-control col-md-7 col-xs-12" placeholder="Objetivo do questionário"></textarea>
                                    @if ($errors->has('objetivo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('objetivo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            @foreach($result['heuristicas'] as $heuristica)
                                <h4> <strong>#{{ $heuristica->id }}</strong> - {{ $heuristica->titulo }}

                                    <a tabindex="0" role="button" data-trigger="hover" data-toggle="popover"
                                       data-content="{{$heuristica->descricao}}" data-placement="top">
                                        <i class="glyphicon glyphicon-info-sign"></i>
                                    </a>
                                </h4>

                                <div style="margin-left: 30px;">
                                    @foreach($heuristica->perguntas as $pergunta)
                                        <label for="pergunta-{{$pergunta->id}}">
                                            <input id="pergunta-{{$pergunta->id}}" type="checkbox" name="perguntas[]" value="{{$pergunta->id}}" />
                                            {{$pergunta->descricao}}
                                        </label>
                                        <hr>
                                    @endforeach()
                                </div>

                            @endforeach

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <a href="/projetos" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection






