<script src="{{url('dashboard/main/js/bootstrap-notify.js')}}"></script>
<script src="{{url('js/dashboard.js')}}"></script>
<script src="{{url('js/laravel.js')}}"></script>


<script src="{{url('main/js/bootstrap.min.js')}}"></script>

<!-- bootstrap progress js -->
<script type="text/javascript" src="{{url('main/js/moment/moment.min.js')}}"></script>
<!-- chart js -->
<script src="{{url('main/js/chartjs/chart.min.js')}}"></script>
<!-- sparkline -->
<script src="{{url('main/js/sparkline/jquery.sparkline.min.js')}}"></script>

<script src="{{url('main/js/custom.js')}}"></script>

<!-- pace -->
<script src="{{url('main/js/pace/pace.min.js')}}"></script>

<script type="text/javascript" src="{{url('main/js/flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{url('main/js/flot/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{url('main/js/flot/jquery.flot.orderBars.js')}}"></script>
<script type="text/javascript" src="{{url('main/js/flot/jquery.flot.time.min.js')}}"></script>
<script type="text/javascript" src="{{url('main/js/flot/jquery.flot.spline.js')}}"></script>
<script type="text/javascript" src="{{url('main/js/flot/jquery.flot.stack.js')}}"></script>
<script type="text/javascript" src="{{url('main/js/flot/curvedLines.js')}}"></script>
<script type="text/javascript" src="{{url('main/js/flot/jquery.flot.resize.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
        @if(Session::has('message'))
            dashboard.showNotification('{!! session('message') !!}', 'top', 'center');
        @endif
    });
</script>
@yield('more-scripts')
