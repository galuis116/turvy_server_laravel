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
    <div class="bg-image" style="background-image:url('{{isset($content->about_image) ? asset($content->about_image) : ''}}'); height:300px;width:100%;  background-size: cover;
 background-repeat: no-repeat; ">
   
    </div>
	 
    <!-- our charity -->
    <section class="abd-about-wrapper white-bg abd-bg abd-pt abd-pb">
    		
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