@extends('layouts.front')

@section('content')
    <div id="index-banner" class="parallax-container" style="min-height: 600px">
        <div id="inicio" class="section scrollspy"></div>
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center white-text text-lighten-2">
                	<img src="{{url('offline/logo_white.png')}}" width="450px" class="responsive-img">      
                </h1>
                <br><br><br>
                <div class="row center">
                    <h5 class="header col s12 light white-text">Faça testes de Usabilidade com quem você quiser.</h5>
                </div>
                <div class="row center">
                   
                    <a href="/home" id="download-button" class="btn-large waves-effect waves-light blue darken-3">Comece agora!</a>
                </div>
                <br><br>

            </div>
        </div>
        <div class="parallax"><img src="{{url('offline/background1.jpg')}}" alt="Unsplashed background img 1"></div>
    </div>

    <div class="container">
        <div class="section">
            <h4 class="center">O que é QuizAbility?</h4>
            <p class="center">
Atualmente os testes de usabilidade em projetos de software não são realizados

adequadamente, pelo fato de empresas não pensarem qual será a dificuldade do usuário final

quando estiver utilizando o software e por não terem verbas e tempo para realização desses

testes. Muitas empresas não enxergam a importância de um software/portal livres de erros e

intuitivos para seus negócios. Nossa proposta tem como objetivo elaborar uma abordagem

que facilita testes de usabilidade, ajudando e contrubuindo para o mercado de

desenvolvimento que trabalham com sites, portais e sistemas web. Está ferramenta foi desenvolvida com base nas 10 heurísticas de Nielsen para avaliarem de forma intuitiva, o nível

de maturidade em usabilidade que os sites, portais ou sistemas web possuem. Neste trabalho,

iremos abordar os princípios de usabilidade, os problemas e desafios de entidades que não

visam a importância desse termo e mostrar a ferramenta QuizAbility.
            </p>

        </div>
    </div>

    <div class="container">
        <div class="section">
            <div id="questionario" class="section scrollspy"></div>
            <h4 class="center">Em 5 passos crie seu questionário de usabilidade.<br> Veja com é fácil e rápido.</h4>
            <div class="row">
                <div class="col m6 s6">
                    <h4>1º Passo</h4>
                    <p>Cadastre-se - <a href="/register">Clique aqui</a></p>
                    <img src="{{url('images/1passo.jpg')}}" class="responsive-img center-block" alt="">
                    <h4>2º Passo</h4>
                    <p>Cadastre seu projeto</p>
                    <img src="{{url('images/2passo.jpg')}}" class="responsive-img center-block" alt="">
                </div>
                <div class="col m6 s6">
                    <h4>3º Passo</h4>
                    <p>Escolhas perguntas baseadas nas 10 heurísticas de Jakob Nielsen</p>
                    <img src="{{url('images/3passo.jpg')}}" class="responsive-img center-block" alt="">
                    <h4>5º Passo</h4>
                    <p>Gere seu link e envie para avaliação.</p>
                    <p>Exemplo:<a href="Javascript::void(0);">www.quizability.com.br/quiz/AH1749OKD</a><br>Envie o link para o avaliador</p>


                </div>
            </div>
            <div id="graficos" class="section scrollspy"></div>
            <h3 class="center">Gráficos de Pesquisa</h3>
            <div class="row">
                <div class="center">
                    <div id="comparacao" class="section scrollspy"></div>
                    <canvas id="radar" style="width:100%; display: none"></canvas>
                    <div id="container-chart" style="width: 100%; margin: 0 auto"></div>
                </div>
            </div>
            <div class="row">

            </div>
            <hr>
        </div>
    </div>

    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light"></h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{url('images/background2.jpg')}}" alt="Unsplashed background img 2"></div>
    </div>

    <footer class="page-footer black">
        <div class="container">
            <div id="equipe" class="section scrollspy"></div>
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">QuizAbility</h5>
                    <p class="grey-text text-lighten-4"></p>
                </div>
                <div class="col l3 s12">

                </div>
                <div class="col l3 s12">
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">

            </div>
        </div>
    </footer>
@endsection
