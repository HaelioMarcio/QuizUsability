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
                            <p>

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-whatever="{{$questionario->descricao}}"
                                        data-token="{{$questionario->token}}">Enviar para avaliação</button>
                            </p>
                            {{--<p>--}}
                            {{--<a  href="/quiz/{{$questionario->token}}" target="_blank">--}}
                            {{--Link para avaliação--}}
                            {{--</a>--}}
                            {{--</p>--}}
                            <p class="text-center">
                                <a  href="javascript:;" class="btn btn-primary" type="button">
                                    Avaliações <span class="badge">10</span>
                                </a>
                                <a href="javascript:;" class="btn btn-primary">Resultados</a>
                            </p>
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
    <div class="modal fade" id="exampleModal" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Enviar questionário para avaliação</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Email:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Mensagem:</label>
                            <textarea class="form-control" id="message-text">
                                Definimos uma mensagem padrão ou deixamos personalizar ?
                            </textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('custom-scripts')
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Compartilhar ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>
@endsection
