@extends('admin.layouts.app')

@section('title', 'About us')

@php
    $title = isset($content->about_title) ? $content->about_title : '';
    $desc = isset($content->about_description) ? $content->about_description : '';
    $image = isset($content->about_image) ? $content->about_image : 'images/no-image.png';
    $about_cdnimage = isset($content->about_cdnimage) ? $content->about_cdnimage : '';
@endphp


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>About us</h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @include('admin.partials.message')
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>About us</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{route('admin.cms.about')}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="image">About Image</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="{{asset($image)}}" width="300px" height="95px" alt=""/>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 95px;"></div>
                                                        <div>
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Select image </span>
                                                                <span class="fileinput-exists">Change </span>
                                                                <input type="file" name="about_image">
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="title">OR</label>
                                    </div>
                                 </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="title">CDN image url</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="about_cdnimage" name="about_cdnimage" class="form-control" placeholder="CDN Image url" value="{{$about_cdnimage}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="title">About Title</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="title" name="about_title" class="form-control" placeholder="Enter About Title" value="{{$title}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="desc">About Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="ckeditor" name="about_description" placeholder="Enter About Description" class="form-control" id="desc" cols="5" rows="5">{{$desc}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("ckeditor"), CKEditorConfig);
    </script>
@endsection
