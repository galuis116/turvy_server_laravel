@extends('admin.layouts.app')

@php
    $title = isset($document) ? 'Edit document' : 'Add document';
    $action = isset($document) ? route('admin.document.document.update', $document->id) : route('admin.document.document.store');
    $name = isset($document) ? $document->name : '';
    $document_title = isset($document) ? $document->title : '';
    $description = isset($document) ? $document->description : '';
    $btnName = isset($document) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.document.document.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                            <h2>
                                {{$title}}
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{$action}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter document name" value="{{$name}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="title">Title</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter document title" value="{{$document_title}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea type="text" id="description" name="description" class="form-control" placeholder="Enter document description" rows="3">{{$description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="description">Image</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">

                                                    <div class="fileinput-new thumbnail" style="width:200px;height:200px;">

                                                        @if($document->url != '')
                                                            <a href="{{asset($document->url)}}" target="_blank">

                                                                <img onerror="this.src='{{asset('images/download.jfif')}}'" src="{{asset($document->url)}}" width="190px" height="116px" alt=""/>

                                                            </a>
                                                            

                                                        @else

                                                            <a href="#">

                                                                <img src="{{asset('images/no-image.png')}}" width="190px" height="116px" alt=""/>

                                                            </a>

                                                        @endif

                                                    </div>

                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="width:200px;height:200px;"></div>

                                                    <div>

                                                                <span class="btn btn-default btn-file">

                                                                    <span class="fileinput-new">Select File </span>

                                                                    <span class="fileinput-exists">Change </span>

                                                                    <input type="file" name="url" >

                                                                </span>

                                                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{$btnName}}</button>
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

@section('script')

    <script src="{{asset('driver-panel/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('driver-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"></script>

@endsection