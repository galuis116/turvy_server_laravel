@extends('layouts.app')

@section('title') {{isset($page->page_title) ? $page->page_title : '' }} @endsection

@section('styles')
    <link href="{{asset('plugins/flexslider/flexslider.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <section class="abd-inner-page-head">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="abd-breadcrumb">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a><i class="fas fa-chevron-right"></i></li>
                            <li>{{isset($page->page_title) ? $page->page_title : '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- our charity -->
    <section class="abd-about-wrapper white-bg abd-bg abd-pt abd-pb">
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
