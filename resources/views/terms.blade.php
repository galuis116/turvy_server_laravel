@extends('layouts.app')

@section('title', 'Term and Conditions')

@section('content')

    <section class="inner-page-head-bg">
        <div class="container">
            <div class="title-head"><h1>Term and Conditions</h1></div>
        </div>
    </section>
    

    <div id="main-content">
        <section class="pt-50 pb-100 custom-pages">
            <div class="container">
                @if(isset($content->terms))
                {!! $content->terms !!}
                @endif
            </div>
        </section>
    </div>
    <div class="clear"></div>

@endsection