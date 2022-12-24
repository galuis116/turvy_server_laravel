@extends('admin.layouts.app')

@php
    $title = isset($peaktime) ? 'Edit peaktime charge' : 'Add peaktime charge';
    $action = isset($peaktime) ? route('admin.charge.peaktime.update', $peaktime->id) : route('admin.charge.peaktime.store');
    $state_id = isset($peaktime) ? $peaktime->state_id : 0;
    $pday = isset($peaktime) ? $peaktime->day : '';
    $slot_one_starttime = isset($peaktime) ? $peaktime->slot_one_starttime : '';
    $slot_one_endtime = isset($peaktime) ? $peaktime->slot_one_endtime : '';
    $slot_two_starttime = isset($peaktime) ? $peaktime->slot_two_starttime : '';
    $slot_two_endtime = isset($peaktime) ? $peaktime->slot_two_endtime : '';
    $charges_type_id = isset($peaktime) ? $peaktime->charges_type_id : '';
    $charge = isset($peaktime) ? $peaktime->charge : '';
    $btnName = isset($peaktime) ? 'Update' : 'Save';
    $days = getDays();
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.charge.peaktime.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                                <div class="row clearfix @if(isset($peaktime)) hide @endif">
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
                                        <label for="day">Day</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="day" name="day" class="form-control">
                                                    <option value="">Default</option>
                                                    @foreach($days as $day)
                                                        <option value="{{$day['id']}}" @if($pday != '') @if($pday == $day['id']) selected @endif @endif>{{$day['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="slot_one_starttime">Slot One Start Time</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="slot_one_starttime" name="slot_one_starttime" class="timepicker form-control" placeholder="Please choose a time..." value="{{$slot_one_starttime}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="slot_one_endtime">Slot One End Time</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="slot_one_endtime" name="slot_one_endtime" class="timepicker form-control" placeholder="Please choose a time..." value="{{$slot_one_endtime}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="slot_two_starttime">Slot Two Start Time</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="slot_two_starttime" name="slot_two_starttime" class="timepicker form-control" placeholder="Please choose a time..." value="{{$slot_two_starttime}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="slot_two_endtime">Slot Two End Time</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="slot_two_endtime" name="slot_two_endtime" class="timepicker form-control" placeholder="Please choose a time..." value="{{$slot_two_endtime}}">
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