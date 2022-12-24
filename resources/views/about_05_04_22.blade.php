@extends('layouts.app')

@section('title', 'About us')

@section('content')

    <section class="abd-inner-page-head">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="abd-breadcrumb">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a><i class="fas fa-chevron-right"></i></li>
                            <li>About us</li>
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
                    <article class="about-content">
                        <h3>{{isset($content->about_title) ? $content->about_title : ''}}</h3>
                        <p>{{isset($content->about_description) ? $content->about_description : ''}}</p>
                    </article>
                </div>
                <div class="col-md-6">
                    <div class="partner-card col-md-4">
                        <div class="thumbnail" style="background-color: transparent;border:none">
                            <img src="{{isset($content->about_image) ? asset($content->about_image) : ''}}" style="width:100%;margin:auto;display: block!important;height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection