Olá {{$convite['convidado']->nome}}!

Você foi indicado por {{$convite['solicitante']->nome}} para avaliar o site {{$convite['url']}}.

Clique aqui para acessar o questionário de avaliação: <a href="{{ $link = url('/quiz', $token)}}"> {{ $link }} </a>
