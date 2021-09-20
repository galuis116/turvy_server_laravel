@extends('layouts.app')

@section('title') Our Charity @endsection

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
                            <li>Our Charity</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- our charity -->
    <section class="abd-about-wrapper white-bg abd-bg abd-pt abd-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="abd-lead lead-left abd-pb2">
                        <h2 class="main-color">About Our Charity Organizations</h2>
                    </div>
                    <article class="about-content">
                        <h3>{{isset($content->charity_title) ? $content->charity_title : ''}}</h3>
                        {!! isset($content->charity_description) ? $content->charity_description : '' !!}
                    </article>
                </div>
                <div class="col-md-6">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($partners as $partner)
                                <li class="text-center">
                                    <h1>{{$partner->organization}}</h1>
                                    <a href="{{$partner->url}}" target="_blank">
                                    <img src="{{asset($partner->avatar)}}" alt="{{$partner->organization}}" style="width:550px;margin:auto;display: block!important;height: 309px;">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
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
