<!Doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- jquery -->
    <script src="{{asset('partner-panel/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('partner-panel/bootstrap/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('partner-panel/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('partner-panel/plugins/datatables/dataTables.bootstrap.css')}}">
    @yield('mid-styles')

    <link rel="stylesheet" href="{{ asset('partner-panel/plugins/select2/select2.min.css')}}">

    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('partner-panel/plugins/datepicker/datepicker3.css')}}">

    <!-- Timepicker -->
    <link rel="stylesheet" href="{{asset('partner-panel/plugins/timepicker/bootstrap-timepicker.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('partner-panel/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('partner-panel/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{ asset('partner-panel/dist/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('partner-panel/dashboard-style.css')}}">
    <link rel="stylesheet" href="{{asset('partner-panel/plugins/bootstrap-select/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('partner-panel/plugins/wickedpicker/wickedpicker.css')}}">

    @yield('styles')

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('partner.partials.header')
        @include('partner.partials.nav')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>@yield('content-header')<small>@yield('content-sub-header')</small></h1>
                <ol class="breadcrumb">@yield('breadcrumb')</ol>
            </section>
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>
        <!-- include('layouts.admin.footer') -->
        <!-- include('layouts.admin.left-side-bar') -->
    </div>

    <!-- jQuery 2.2.0 -->
    <script src="{{asset('partner-panel/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>

    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('partner-panel/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('partner-panel/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('partner-panel/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <!-- Select2 -->
    <script src="{{asset('partner-panel/plugins/select2/select2.full.min.js')}}"></script>

    <!-- InputMask -->
    <script src="{{asset('partner-panel/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('partner-panel/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('partner-panel/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

    <!-- SlimScroll -->
    <script src="{{asset('partner-panel/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

    <!-- FastClick -->
    <script src="{{asset('partner-panel/plugins/fastclick/fastclick.js')}}"></script>

    <!-- Datepicker -->
    <script src="{{asset('partner-panel/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

    <!-- Timepicker -->
    <script src="{{asset('partner-panel/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('partner-panel/dist/js/app.min.js')}}"></script>

    <!-- jvectormap -->
    <script src="{{asset('partner-panel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('partner-panel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('partner-panel/plugins/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('partner-panel/plugins/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{asset('partner-panel/plugins/wickedpicker/wickedpicker.js')}}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('partner-panel/dist/js/demo.js')}}"></script>

    @yield('scripts')

    <script type="text/javascript">
        $("#{{$page}}").addClass("active");
    </script>
</body>

</html>