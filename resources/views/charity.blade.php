@extends('layouts.app')

@section('title') Our Charity @endsection

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
                        <p>{{isset($content->charity_description) ? $content->charity_description : ''}}</p>
                    </article>
                </div>
                <div class="col-md-6">
                    @foreach($partners as $partner)
                        <div class="partner-card col-md-4">
                            <div class="thumbnail" style="background-color: transparent;border:none">
                                <a href="{{$partner->url}}" target="_blank" style="display: block!important;">
                                    <img src="{{asset($partner->avatar)}}" alt="{{$partner->organization}}" style="width:140px;margin:auto;display: block!important;height: 140px;">
                                </a>
                                <div class="caption">
                                    <p style="text-align: center;">{{$partner->organization}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection