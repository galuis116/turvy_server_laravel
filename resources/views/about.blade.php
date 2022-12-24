@extends('layouts.app')
@section('title', 'About us')
@section('content')
    <section class="inner-page-head-bg">
        <div class="container">
            <div class="title-head"><h1>About us</h1></div>
        </div>
    </section>
    
	 
    <!-- our charity -->
    <section class="abd-about-wrapper white-bg abd-bg abd-pt abd-pb custom-pages">
    		
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article class="about-content">
                        <h3>{{isset($content->about_title) ? $content->about_title : ''}}</h3>
                        @if(isset($content->about_description))
                        	<p>{!! $content->about_description !!}</p>
                        
                        @endif
                        
                    </article>
                </div>
               
            </div>
        </div>
    </section>
@endsection