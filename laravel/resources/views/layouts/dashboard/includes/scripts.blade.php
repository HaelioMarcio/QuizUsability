<!-- Placed at the end of the document so the pages load faster -->
<script src="{{url('dashboard/main/js/jquery-1.7.2.min.js')}}"></script>
<script src="{{url('dashboard/main/js/excanvas.min.js')}}"></script>
<script src="{{url('dashboard/main/js/chart.min.js')}}"></script>
<script src="{{url('dashboard/main/js/bootstrap.js')}}"></script>
<script src="{{url('dashboard/main/js/bootstrap-notify.js')}}"></script>
<script src="{{url('dashboard/main/js/base.js')}}"></script>
<script src="{{url('js/dashboard.js')}}"></script>
<script src="{{url('js/laravel.js')}}"></script>
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