@extends('admin.layouts.app')

@php
    $title = isset($contact) ? 'Edit SOS Contact' : 'Add SOS Contact';
    $action = isset($contact) ? route('admin.sos.contact.update', $contact->id) : route('admin.sos.contact.store');
    $name = isset($contact) ? $contact->name : '';
    $number = isset($contact) ? $contact->number : '';
    $btnName = isset($contact) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.sos.contact.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{$action}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="name">SOS Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter sos name" value="{{$name}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="number">SOS Number</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="number" name="number" class="form-control" placeholder="Enter sos number" value="{{$number}}"/>
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
