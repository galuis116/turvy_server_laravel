@extends('layouts.app')

@section('title', 'Term and Conditions')

@section('content')
    <div class="inner-banner">
        <img src="{{asset('images/about.jpg')}}" alt="">
        <div class="inner-banner-holder">
            <div class="container">
                <h2>Term and Conditions</h2>
            </div>
        </div>
    </div>

    <div id="main-content">
        <section class="pt-50 pb-100">
            <div class="container">
                @if(isset($content->terms))
                {!! $content->terms !!}
                @endif
            </div>
        </section>
    </div>
    <div class="clear"></div>

@endsection