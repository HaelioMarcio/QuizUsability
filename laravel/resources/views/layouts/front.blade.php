<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuizAbility</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{url('vendor/Materialize/dist/css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <style>
        body {
            font-family: 'Lato';
            font-family: Arial;
        }
        .fa-btn {
            margin-right: 6px;
        }

    </style>
</head>
<body id="app-layout">
    <nav role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">QuizAbility</a>
      <ul class="right hide-on-med-and-down">
        @if(Auth::guest())
        <li><a href="/login">Acessar</a></li>
        <li><a href="/register">Registre-se</a></li>
        @else
            <li><a href="{{url('/projetos')}}">Meus Projetos</a></li>
            <li><a href="/logout">Logout</a></li>
        @endif
      </ul>
      <ul id="nav-mobile" class="side-nav">
        @if(Auth::guest())
        <li><a href="/login">Acessar</a></li>
        <li><a href="/register">Registre-se</a></li>
        @else
            <li><a href="{{url('/projetos')}}">Meus Projetos</a></li>
            <li><a href="/logout">Logout</a></li>
        @endif
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('vendor/Materialize/dist/js/materialize.min.js')}}"></script>
    <script src="{{url('vendor/bower_components/highcharts/highcharts.js')}}"></script>
    <script src="{{url('vendor/bower_components/highcharts/highcharts-more.js')}}"></script>
    <script src="{{url('js/init-chart.js')}}"></script>

</body>
</html>
