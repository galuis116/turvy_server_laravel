@extends('layouts.app')

@section('title') {{isset($page->page_title) ? $page->page_title : '' }} @endsection

@section('styles')
    <link href="{{asset('plugins/flexslider/flexslider.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <section class="inner-page-head-bg">
        <div class="container">
            <div class="title-head"><h1>{{isset($page->page_title) ? $page->page_title : '' }}</h1></div>
        </div>
    </section>
    
    <!-- our charity -->
    <section class="abd-about-wrapper white-bg abd-bg abd-pt abd-pb custom-pages">
        <div class="container">
            {!!$page->page_content!!}
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('plugins/flexslider/jquery.flexslider.js')}}"></script>
    <script>
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    </script>
@endsection
