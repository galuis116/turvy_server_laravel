@extends('admin.layouts.app')

@php
    $title = isset($nighttime) ? 'Edit nighttime charge' : 'Add nighttime charge';
    $action = isset($nighttime) ? route('admin.charge.nighttime.update', $nighttime->id) : route('admin.charge.nighttime.store');
    $state_id = isset($nighttime) ? $nighttime->state_id : 0;
    $starttime = isset($nighttime) ? $nighttime->starttime : '';
    $endtime = isset($nighttime) ? $nighttime->endtime : '';
    $charges_type_id = isset($nighttime) ? $nighttime->charges_type_id : '';
    $charge = isset($nighttime) ? $nighttime->charge : '';
    $btnName = isset($nighttime) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.charge.nighttime.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                                <div class="row clearfix @if(isset($nighttime)) hide @endif">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="state">State</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="state" name="state_id" class="form-control">
                                                    <option value="0">Default</option>
                                                    @foreach($states as $state)
                                                        @if(isset($state->currency) && isset($state->distance))
                                                        <option value="{{$state->id}}" @if($state_id != 0) @if($state_id == $state->id) selected @endif @endif data-currency="{{$state->currency->symbol}}" data-distance="{{$state->distance->unit}}">{{$state->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="starttime">Start Time</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="starttime" name="starttime" class="timepicker form-control" placeholder="Please choose a time..." value="{{$starttime}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="endtime">End Time</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="endtime" name="endtime" class="timepicker form-control" placeholder="Please choose a time..." value="{{$endtime}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="charge">Charges Type</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="charges_type_id" class="form-control">
                                                    <option value="0" @if($charges_type_id == 0) selected @endif>Norminal</option>
                                                    <option value="1" @if($charges_type_id == 1) selected @endif>Multiplier</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="charge">Charge</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="charge" name="charge" class="form-control" placeholder="Enter Charge" value="{{$charge}}"/>
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
            if($('#state').val() !== 0)
            {
                obj = $('#state');
                setCurrencyDistance($('option:selected', obj));
            }
            $('#state').on('change', function(){
                setCurrencyDistance($('option:selected', this));
            });
            function setCurrencyDistance(obj)
            {
                currency = $(obj).attr('data-currency');
                distance = $(obj).attr('data-distance');
                $('#distance_unit').val(distance);
                $('#currency').val(currency);
            }
        });
    </script>
@endsection