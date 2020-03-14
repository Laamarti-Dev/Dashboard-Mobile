    <!-- jQuery  -->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('js/waves.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.slimscroll.min.js')}}"></script>

    @if(Route::currentRouteName() ==  'home' || Route::currentRouteName() == 'profile')
    <script src="{{URL::asset('plugins/moment/moment.js')}}"></script>
    <script src="{{URL::asset('plugins/apexcharts/apexcharts.min.js')}}"></script>
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
    <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>


    <script src="{{URL::asset('plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{URL::asset('plugins/ticker/jquery.jConveyorTicker.min.js')}}"></script>

    <script src="{{URL::asset('plugins/peity-chart/jquery.peity.min.js')}}"></script>
    <script src="{{URL::asset('plugins/chartjs/chart.min.js')}}"></script>
    <script src="{{URL::asset('pages/jquery.profile.init.js')}}"></script>


    <script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>

    <script src="{{URL::asset('pages/jquery.dashboard-2.init.js')}}"></script>

    @endif

    @if(Route::currentRouteName() == 'console' || Route::currentRouteName() == 'application' || Route::currentRouteName() == 'niche'  || Route::currentRouteName() == 'tools'  || Route::currentRouteName() == 'adsAccount' || Route::currentRouteName() == 'profile' )
        <!-- Responsive-table-->
        <script src="{{URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js')}}"></script>
        <script src="{{URL::asset('pages/jquery.responsive-table.init.js')}}"></script>

        <!-- Parsley js -->
        <script src="{{URL::asset('plugins/parsleyjs/parsley.min.js')}}"></script>
        <script src="{{URL::asset('pages/jquery.validation.init.js')}}"></script>


        <script src="{{URL::asset('plugins/clipboard/clipboard.min.js')}}"></script>
        <script src="{{URL::asset('pages/jquery.clipboard.init.js')}}"></script>

    @endif

    @if(Route::currentRouteName() == 'niche' || Route::currentRouteName() == 'tools')
        <!--Wysiwig js-->
        <script src="{{URL::asset('plugins/tinymce/tinymce.min.js')}}"></script>
        <script src="{{URL::asset('pages/jquery.form-editor.init.js')}}"></script>
    @endif

    @if(Route::currentRouteName() == 'ads' || Route::currentRouteName() == 'proxydetection')
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
        <!-- Parsley js -->
        <script src="{{URL::asset('plugins/parsleyjs/parsley.min.js')}}"></script>
        <script src="{{URL::asset('pages/jquery.validation.init.js')}}"></script>
        <script src="{{URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    @endif


    <!-- App js -->
    <script src="{{URL::asset('js/main.js')}}"></script>

</body>
</html>
