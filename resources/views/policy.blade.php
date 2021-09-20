@extends('layouts.app')

@section('title', 'Privacy policy')

@section('content')
    <div class="inner-banner">
        <img src="{{asset('images/about.jpg')}}" alt="">
        <div class="inner-banner-holder">
            <div class="container">
                <h2>Privacy Policy </h2>
            </div>
        </div>
    </div>

    <div id="main-content">
        <section class="pt-50 pb-100">
            <div class="container">
                @if(isset($content->policy))
                {!! $content->policy !!}
                @endif
            </div>

        </section>

    </div>

    <div class="clear"></div>

@endsection