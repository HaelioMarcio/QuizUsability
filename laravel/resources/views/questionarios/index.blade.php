@extends('layouts.dashboard.main')
@section('custom-styles')
    <link href="{{url('dashboard/main/css/pages/plans.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="span12">

            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-list-alt"></i>
                    <h3>Questionários</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                    <p>
                        <a href="{{url('projetos/'.$projeto->id.'/questionarios/create')}}" class="btn btn-primary">Novo Questionário</a>
                    </p>

                    <div class="pricing-plans plans-4">
                        @forelse($projeto->questionarios as $questionario)
                            <div class="plan-container">
                                <div class="plan">
                                    <div class="plan-header">

                                        <div class="plan-title">
                                            {{$questionario->descricao}}
                                        </div> <!-- /plan-title -->

                                        <div class="plan-price">
                                            {{count($questionario->avaliacoes)}}<span class="term"> Avaliações realizadas</span>
                                        </div> <!-- /plan-price -->

                                    </div> <!-- /plan-header -->

                                    <div class="plan-features">
                                        <ul>
                                            <li>{{$questionario->objetivo}}</li>
                                            <li>
                                                <button type="button" class="btn btn-" data-toggle="modal"
                                                        data-target="#formModal"
                                                        data-whatever="{{$questionario->descricao}}"
                                                        data-token="{{$questionario->token}}">
                                                    <i class="icon-share"></i> Enviar para avaliação</button>


                                                {{--<a  role="button" class="btn"--}}
                                                   {{--data-toggle="modal"--}}
                                                   {{--data-target="#formModal"--}}
                                                   {{--data-whatever="{{$questionario->descricao}}"--}}
                                                   {{--data-token="{{$questionario->token}}">Enviar para avaliação</a>--}}
                                            </li>
                                            <li>
                                                <a  href="/quiz/{{$questionario->token}}" target="_blank">
                                                    Link para avaliação
                                                </a>
                                            </li>
                                        </ul>
                                    </div> <!-- /plan-features -->

                                    <div class="plan-actions">
                                        <a class="btn" href="/projetos/questionarios/{{$questionario->id}}" data-method="delete" data-confirm="Tem certeza ?"
                                           data-token="{{csrf_token()}}" >
                                            <span class="icon-trash" aria-hidden="true"> </span>
                                        </a>
                                    </div> <!-- /plan-actions -->

                                </div> <!-- /plan -->
                            </div> <!-- /plan-container -->
                        @empty
                            Nenhum projeto cadastrado.
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="formModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Compartilhar questionário para avaliação</h3>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <div id="mail-field">
                        <p>
                            <input type="email" class="form-control" id="recipient-name"
                                   required name="avaliadores[]" placeholder="Email">
                            <a href="#" id="add-field"><i class="icon-plus"></i> </a>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="message-text" placeholder="Mensagem">
                        Definimos uma mensagem padrão ou deixamos personalizar ?
                    </textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
@endsection
@section('more-scripts')
    <script>
        $('#formModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Compartilhar ' + recipient)
            modal.find('.modal-body textarea').val(recipient)
        });

    </script>
    <script>
        var scntDiv = $('#mail-field');
        var i = $('#mail-field p').size() + 1;

        $('#add-field').live('click', function() {
            $('<p><input type="email" size="20" name="avaliadores[]" value="" placeholder="Email" /> <a href="#" id="rem-field"><i class="icon-minus"></i></a></p>').appendTo(scntDiv);
            i++;
            return false;
        });

        $('#rem-field').live('click', function() {
            if( i > 2 ) {
                $(this).parents('p').remove();
                i--;
            }
            return false;
        });
    </script>
@endsection
