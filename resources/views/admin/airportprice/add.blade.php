@extends('admin.layouts.app')

@php
    $title = isset($price) ? 'Edit Pricing' : 'Add Pricing';
    $action = isset($price) ? route('admin.airportride.pricing.update', $price->id) : route('admin.airportride.pricing.store');
    $btnName = isset($price) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.airportride.pricing.index')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                            <h2>{{$title}}</h2>
                            <small><b>Why add a destination?</b></small><br>
                            <small>Step 1: You have added an Airport already</small><br>
                            <small>Step 2: You have also Added Destination's already.</small><br>
                            <small>Use this screen to map an Airport with a particular destination and configure a customized pricing plan ( by also adding any extra's like Tolls etc. )</small>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{$action}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="first_name">Package name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input placeholder="Eg: Basic" type="text" name="package_name" value="{{ isset($price) ? $price->package_name : '' }}" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="first_name">Airport</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="airport_id">
                                                    <option>Please choose an airport</option>
                                                    @foreach($airports as $airport)
                                                        <option value="{{$airport->id}}" @if(isset($price)) @if($price->airport_id == $airport->id) selected @endif @endif>{{$airport->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="last_name">Destination</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    <select class="form-control" name="destination_id">
                                                        <option>Please choose a destination</option>
                                                        @foreach($destinations as $destination)
                                                            <option value="{{$destination->id}}" @if(isset($price)) @if($price->destination_id == $destination->id) selected @endif @endif>{{$destination->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="last_name">Vehicle Type</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    <select class="form-control" name="servicetype_id">
                                                        <option>Please choose an vehicle type</option>
                                                        @foreach($servicetypes as $servicetype)
                                                            <option value="{{$servicetype->id}}" @if(isset($price)) @if($price->servicetype_id == $servicetype->id) selected @endif @endif>{{$servicetype->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="last_name">Price</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input placeholder="Eg: 100" type="text" name="price" value="{{ isset($price) ? $price->price : '' }}" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="last_name">Number of Tolls in between</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input placeholder="Eg: 2" type="text" name="number_tolls" value="{{ isset($price) ? $price->number_tolls : '' }}" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{$btnName}}</button>
                                        </div>
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