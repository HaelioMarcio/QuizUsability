<nav class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="{{url('/home')}}">QuizAbility</a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    @if(Auth::check())
                        <li><a href="javascript:;"><i class="icon-user"></i> {{Auth::user()->name}}</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="icon-power-off"></i></a></li>
                    @endif
                    {{--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i--}}
                                    {{--class="icon-cog"></i> Account <b class="caret"></b></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="javascript:;">Settings</a></li>--}}
                            {{--<li><a href="javascript:;">Help</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i--}}
                                    {{--class="icon-user"></i> EGrappler.com <b class="caret"></b></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="javascript:;">Profile</a></li>--}}
                            {{--<li><a href="javascript:;">Logout</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
                {{--<form class="navbar-search pull-right" >--}}
                    {{--<input type="text" class="search-query" placeholder="Search">--}}
                {{--</form>--}}
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /container -->
    </div>
    <!-- /navbar-inner -->
</nav>
<!-- /navbar -->
<nav class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class="active"><a href="{{url('/home')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <li><a href="{{url('/projetos')}}"><i class="fa fa-sitemap"></i><span>Projetos</span> </a> </li>
                <li><a href="{{url('/sobre')}}"><i class="fa fa-sitemap"></i><span>App Tour</span> </a></li>
                <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
                <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="pricing.html">Pricing Plans</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="signup.html">Signup</a></li>
                        <li><a href="error.html">404</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</nav>
<!-- /subnavbar -->