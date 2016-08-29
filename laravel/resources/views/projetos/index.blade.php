@extends('layouts.dashboard.main')

@section('custom-styles')

    <link href="{{url('main/css/tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Projetos</h3>
            </div>

            <div class="title_right">
                <div class="pull-right">
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                    <a href="{{url('projetos/create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Novo Projeto</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            @forelse($projetos as $projeto)

                <div class="col-md-4 col-sm-4 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $projeto->titulo }} | <a href="{{$projeto->url}}" target="_blank"><small>{{$projeto->url}}</small></a></h2>
                            <ul class="nav navbar-right panel_toolbox ">
                                <li class="pull-right"><a class="close-link "><i class="fa fa-close"></i></a>
                                </li>
                                <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <h3 class="description">{{ $projeto->descricao }}</h3>

                            <div style="text-align: center; margin-bottom: 17px">
                            {{--<span class="chart" data-percent="86">--}}
                                <span class="percent"></span>
                            {{--</span>--}}
                            </div>

                            <h3 class="name_title " style="text-align: center;">Usabilidade</h3>
                            <p style="text-align: center;">Avaliação heurística</p>
                            <p style="text-align: center;"><small style="color:#F00;">Implementação futura</small></p>

                            <div class="divider"></div>

                            <div style="text-align: center; margin-bottom: 15px;">
                                <div class="btn-group" role="group" aria-label="First group">

                                    <a href="{{url('projetos/'.$projeto->id.'/questionarios/create')}}" class="btn btn-default btn-sm" type="button"
                                       data-toggle="tooltip" data-placement="top" title="Adicionar questionário">
                                        <span class="fa fa-plus" aria-hidden="true"> </span>
                                        <span class="fa fa-list" aria-hidden="true"> </span></a>
                                    </a>
                                    <a class="btn btn-default btn-sm" href="/projetos/{{$projeto->id}}/edit" type="button"
                                       data-toggle="tooltip" data-placement="top" title="Editar">
                                        <span class="fa fa-pencil" aria-hidden="true"> </span></a>

                                    <a class="btn btn-default btn-sm" href="/projetos/{{$projeto->id}}" data-method="delete" data-confirm="Tem certeza ?"
                                       data-token="{{csrf_token()}}" type="button" data-toggle="tooltip" data-placement="top" title="Excluir">
                                        <span class="fa fa-trash" aria-hidden="true"> </span>
                                    </a>
                                </div>
                            </div>

                            <div class="divider"></div>
                            <p style="text-align: center;"><span class="fa fa-list" aria-hidden="true"> </span> Questionários</p>
                            <!-- start accordion -->
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                @foreach($projeto->questionarios as $questionario)
                                    <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$questionario->id}}" aria-expanded="false" aria-controls="collapse{{$questionario->id}}">
                                            <h4 class="panel-title">{{ $questionario->descricao }}</h4>
                                        </a>
                                        <div id="collapse{{$questionario->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <p>
                                                    <button type="button" class="btn" data-toggle="modal" data-target="#modal-share" data-token="{{ $questionario->token }}">Compartilhar</button>
                                                </p>
                                                <p >Link para avaliação: <a href="/quiz/{{ $questionario->token }}" target="_blank">{{url('quiz')}}/{{ $questionario->token }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @empty
                Nenhum projeto encontrado.
            @endforelse
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>

    </div>

    <!-- MODAL -->
    <div class="modal fade" id="modal-share" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form-modal" action="{{url('/send/quiz')}}" method="POST" novalidate>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel2">Enviar para avaliação</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Questionário</h4>
                        <input id="tags-input" type="text" data-role="tagsinput" placeholder="Adicionar email" name="avaliadores"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="modal-submit" type="submit" class="btn btn-primary" data-dismiss="modal">Enviar</button>
                        <input type="hidden" id="token" name="token" value="0">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
@endsection
@section('more-scripts')
    <script src="{{url('main/js/tagsinput/bootstrap-tagsinput.min.js')}}"></script>

    <script>
        function isEmail(email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test(email);
        }

        $(function() {
            var avaliadores = $('#tags-input');

            avaliadores.on('itemAdded', function(event) {
                var tag = event.item;
                if (!event.options || !event.options.preventPost) {
                    if (!isEmail(tag)) {
                        avaliadores.tagsinput('remove', tag, {preventPost: true});
                    }
                }
                console.log(avaliadores.val());
            });

            // MODAL
            $('#modal-share').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var modal = $(this)
                modal.find('#token').val(button.data('token') );
            });

            $("#modal-submit").click(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                e.preventDefault();

                var form = {
                    avaliadores: $('#tags-input').val(),
                    token: $('#token').val(),
                }

                $.ajax({
                    type: "POST",
                    url: '/send/quiz',
                    data: form,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);

                        if(data.message) {
                            dashboard.showNotification(data.message, 'top', 'center');
                        }

                        $('#form-modal').trigger("reset");
                        $('#modal-share').modal('hide')
                    },
                    error: function (data) {
                        dashboard.showNotification(data.message, 'top', 'center');
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>
@endsection