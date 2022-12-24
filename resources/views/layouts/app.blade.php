<!doctype html>
<html lang="en">
    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

        <!-- Slick CSS -->
        <link rel="stylesheet" href="{{asset('css/slick.css')}}">

        <!-- fontawesome -->
        <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">

        <!-- global -->
        <link rel="stylesheet" href="{{asset('css/global.css')}}">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css?v=1.0')}}">

        <!-- responsive -->
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

        @yield('styles')

        <!-- site title -->
        <title>@yield('title') | Turvy</title>
    </head>

    <body>
        @include('partials.preloader')
        @include('partials.header')
        @yield('content')
        @include('partials.footer')

        <!-- jQuery -->
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

        <!-- Bootstrap js -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>

        <!-- Slick js -->
        <script src="{{asset('js/slick.min.js')}}"></script>

        <!-- slicknav -->
        <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>

        <!-- custom scripts -->
        <script src="{{asset('js/scripts.js')}}"></script>

        @yield('scripts')

        <script>
            //Mobile nav
            jQuery(function(){
                $('#menu').slicknav({
                    label: ""
                });
            });
        </script>

        <script type="text/javascript">
            $(document).bind("contextmenu",function(e){
                return false;
            });
            
            document.onkeydown = function(e) {
                if (e.ctrlKey && 
                    (e.keyCode === 67 || 
                    e.keyCode === 86 || 
                    e.keyCode === 85 || 
                    e.keyCode === 117)) {
                    return false;
                } else {
                    return true;
                }
            };
            $(document).keypress("u",function(e) {
                if(e.ctrlKey){
                    return false;
                }else{
                    return true;
                }
            });
        </script>
    </body>
</html>

