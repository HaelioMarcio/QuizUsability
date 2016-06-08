<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>QuizAbility</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link rel="stylesheet" href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Animation library for notifications   -->
    <link href="{{url('dashboard/css/animate.min.css')}}" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{url('dashboard/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="{{url('dashboard/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="{{url('dashboard/img/sidebar-5.jpg')}}">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url('/home')}}" class="simple-text">
                    QuizAbility
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="{{url('/home')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/projetos')}}">
                        <i class="pe-7s-network"></i>
                        <p>Projetos</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/questionarios')}}" style="display: none;">
                        <i class="pe-7s-news-paper"></i>
                        <p>Questionários</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/avaliacoes')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Avaliações</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/heuristicas')}}">
                        <i class="pe-7s-science"></i>
                        <p>Heurísticas</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="javascript:;">@yield('titulo')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Acessar</a></li>
                            <li><a href="{{ url('/register') }}">Registre-se</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{url('dashboard/js/bootstrap-checkbox-radio-switch.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{url('dashboard/js/bootstrap-notify.js')}}"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{url('dashboard/js/light-bootstrap-dashboard.js')}}"></script>

<script src="{{url('vendor/bower_components/highcharts/highcharts.js')}}"></script>
<script src="{{url('vendor/bower_components/highcharts/highcharts-more.js')}}"></script>
<script src="{{url('vendor/bower_components/highcharts/modules/exporting.js')}}"></script>
@if(!Auth::guest())
    <script src="{{url('js/dashboard.js')}}"></script>
    <script src="{{url('js/laravel.js')}}"></script>
    <script src="{{url('js/hcharts.js')}}"></script>
@endif
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
        @if(Session::has('message'))
            dashboard.showNotification('{!! session('message') !!}', 'top', 'center');
        @endif
    });
</script>
@yield('custom-scripts')
</html>