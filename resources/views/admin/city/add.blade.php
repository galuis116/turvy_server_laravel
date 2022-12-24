@extends('admin.layouts.app')

@php
    $title = isset($city) ? 'Edit region' : 'Add region';
    $action = isset($city) ? route('admin.region.city.update', $city->id) : route('admin.region.city.store');
    $name = isset($city) ? $city->name : '';
    $country_id = isset($city) ? $city->country_id : 0;
    $state_id = isset($city) ? $city->state_id : 0;
    $btnName = isset($city) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.region.city.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter region name" value="{{$name}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="country">Country</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="country" name="country_id" class="form-control">
                                                    <option value="0">Default</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @if($country_id != 0) @if($country_id == $country->id) selected @endif @endif>{{$country->nicename}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="state">State</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="state" name="state_id" class="form-control">
                                                    <option value="0">Default</option>
                                                   @if(isset($states) && count($states) > 0)
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}" @if($state_id != 0) @if($state_id == $state->id) selected @endif @endif>{{$state->name}}</option>
                                                    @endforeach
                                                   @endif
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
            $('#country').on('change', function(){
                $.ajax({
                    url: "{{route('getStatesBelongCountry')}}",
                    data: {
                        "country_id": $(this).val()
                    },
                    success: function(result){
                        $('#state').empty();
                        $('#state').append(result);
                    }
                });
            });
        });
    </script>
@endsection
