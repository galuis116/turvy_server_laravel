@extends('layouts.app')

@section('title', 'Privacy policy')

@section('content')
   
    <section class="inner-page-head-bg">
        <div class="container">
            <div class="title-head"><h1>Privacy Policy</h1></div>
        </div>
    </section>

    <div id="main-content">
        <section class="pt-50 pb-100 custom-pages">
            <div class="container">
                @if(isset($content->policy))
                {!! $content->policy !!}
                @endif
            </div>

        </section>

    </div>

    <div class="clear"></div>

@endsection