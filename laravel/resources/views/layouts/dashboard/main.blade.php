<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>QuizAbility | Usabilidade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    @include('layouts.dashboard.includes.styles')

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    @include('layouts.dashboard.nav')

    <div class="main">
        <div class="main-inner">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts.dashboard.footer')
</body>
@include('layouts.dashboard.includes.scripts')