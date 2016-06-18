<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QuizAbility | Usabilidade</title>
    @include('layouts.dashboard.includes.styles')


</head>


<body class="nav-md">

    <div class="container body">
        <div class="main_container">
        @include('layouts.dashboard.nav')

        @include('layouts.dashboard.content')
        </div>
    </div>


    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>
</body>
@include('layouts.dashboard.includes.scripts')
</html>

