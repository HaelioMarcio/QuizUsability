@extends('layouts.dashboard.main')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Categorias
                </h3>
            </div>


        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Nova Categoria </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left" novalidate action="{{url('/categorias')}}" method="post">
                            {{csrf_field()}}

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="descricao" required="required" name="descricao"
                                              class="form-control col-md-7 col-xs-12" placeholder="Descrição da categoria"></textarea>
                                    @if ($errors->has('descricao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('descricao') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <a href="/categorias" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
