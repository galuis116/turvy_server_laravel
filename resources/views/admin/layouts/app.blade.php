<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> @yield('title') | Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('admin-panel/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('admin-panel/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{asset('admin-panel/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('admin-panel/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{asset('admin-panel/plugins/waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- Bootstrap fileinput -->
    <link href="{{asset('admin-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" />

    <!-- Multi Select Css -->
    <link href="{{asset('admin-panel/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">

    <!-- Bootstrap Seleect -->
    <link href="{{asset('admin-panel/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{asset('admin-panel/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    {{-- <link href="{{asset('admin-panel/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" /> --}}

    <!-- Custom Css -->
    <link href="{{asset('admin-panel/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('admin-panel/css/themes/all-themes.css')}}" rel="stylesheet" />

    @yield('styles')

</head>

<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
@include('admin.partials.navbar')
<!-- #Top Bar -->
@include('admin.partials.sidebar')

@yield('content')

<!-- Jquery Core Js -->
<script src="{{asset('admin-panel/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('admin-panel/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
{{-- <script src="{{asset('admin-panel/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script> --}}

<!-- Slimscroll Plugin Js -->
<script src="{{asset('admin-panel/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('admin-panel/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('admin-panel/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Autosize Plugin Js -->
<script src="{{asset('admin-panel/plugins/autosize/autosize.js')}}"></script>

<!-- Moment Plugin Js -->
<script src="{{asset('admin-panel/plugins/momentjs/moment.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{asset('admin-panel/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin-panel/plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{asset('admin-panel/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('admin-panel/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin-panel/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('admin-panel/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin-panel/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('admin-panel/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('admin-panel/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('admin-panel/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('admin-panel/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin-panel/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{asset('admin-panel/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<!-- Bootstrap Fileinput -->
<script src="{{asset('admin-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"></script>

<!-- Multi Select Plugin Js -->
<script src="{{asset('admin-panel/plugins/multi-select/js/jquery.multi-select.js')}}"></script>

<!-- Ckeditor -->
<script src="{{asset('admin-panel/plugins/ckeditor/ckeditor.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('admin-panel/js/admin.js')}}"></script>
<script src="{{asset('admin-panel/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('admin-panel/js/pages/ui/tooltips-popovers.js')}}"></script>
<script src="{{asset('admin-panel/js/pages/forms/basic-form-elements.js')}}"></script>
<script src="{{asset('admin-panel/js/pages/forms/advanced-form-elements.js')}}"></script>

<script src="{{asset('admin-panel/js/pages/index.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('admin-panel/js/demo.js')}}"></script>

@yield('scripts')

</body>

</html>
