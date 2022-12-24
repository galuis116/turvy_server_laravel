@extends('admin.layouts.app')

@php
    $title = isset($vehicleRideType) ? 'Edit Vehicle Ride Type' : 'Add Vehicle Ride Type';
    $action = isset($vehicleRideType) ? route('admin.fleet.rideType.update', $vehicleRideType->id) : route('admin.fleet.rideType.store');
    $name = isset($vehicleRideType) ? $vehicleRideType->name : '';
    $btnName = isset($vehicleRideType) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.fleet.rideType.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                            <form class="form-horizontal" method="post" action="{{$action}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="makeName">Ride Type Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter vehicle model name" value="{{$name}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="makeName">Service Type</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id="serviceType_id" name="serviceType_id">
                                                    <option value="0">Default</option>
                                                    @foreach($vehicleServiceTypes as $vehicleServiceType)
                                                    <option value="{{$vehicleServiceType->id}}" @if(isset($vehicleRideType)) @if($vehicleRideType->serviceType_id == $vehicleServiceType->id) selected @endif @endif>{{$vehicleServiceType->name}}</option>
                                                    @endforeach
                                                </select>
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

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#make_id').on('change', function(){
                $.ajax({
                    url: "{{route('getModelByMake')}}",
                    data: {
                        "make_id": $(this).val()
                    },
                    success: function(result){
                        console.log(result);
                        $('#model_id').empty();
                        $('#model_id').append(result);
                    }
                });
            });
        });
    </script>
@endsection
