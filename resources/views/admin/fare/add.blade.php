@extends('admin.layouts.app')

@php
$title = isset($fare) ? 'Edit farecard' : 'Add farecard';
$action = isset($fare) ? route('admin.charge.fare.update', $fare->id) : route('admin.charge.fare.store');
$state_id = isset($fare) ? $fare->state_id : 0;
$servicetype_id = isset($fare) ? $fare->servicetype_id : 0;
$company_commission = isset($fare) ? $fare->company_commission : '';
$base_ride_distance = isset($fare) ? $fare->base_ride_distance : '';
$base_ride_distance_charge = isset($fare) ? $fare->base_ride_distance_charge : '';
$price_per_unit = isset($fare) ? $fare->price_per_unit : '';
$price_per_minute = isset($fare) ? $fare->price_per_minute : 0;
$fee_waiting_time = isset($fare) ? $fare->fee_waiting_time : '';
$waiting_price_per_minute = isset($fare) ? $fare->waiting_price_per_minute : '';
$gst_charge = isset($fare) ? $fare->gst_charge : '';
$fuel_surge_charge = isset($fare) ? $fare->fuel_surge_charge : '';
$nsw_gtl_charge = isset($fare) ? $fare->nsw_gtl_charge : '';
$nsw_ctp_charge = isset($fare) ? $fare->nsw_ctp_charge : '';
$booking_charge = isset($fare) ? $fare->booking_charge : '';
$cancel_charge = isset($fare) ? $fare->cancel_charge : '';
$minimum_fare = isset($fare) ? $fare->minimum_fare : 0;
$after_minimum_fare = isset($fare) ? $fare->after_minimum_fare : 0;
$baby_seat_charge = isset($fare) && !is_null($fare->baby_seat_charge)? $fare->baby_seat_charge : '';
$pet_charge = isset($fare) && !is_null($fare->pet_charge) ? $fare->pet_charge : '';
$btnName = isset($fare) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{ $title }}</h2>
                <a href="{{ route('admin.charge.fare.list') }}" class="btn bg-grey waves-effect pull-right"><i
                        class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                                {{ $title }}
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{ $action }}">
                                @csrf
                                <div class="row clearfix @if (isset($fare)) hide @endif">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="state">State</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="state" name="state_id" class="form-control">
                                                    <option value="0">Default</option>
                                                    @foreach ($states as $state)
                                                        @if (isset($state->currency) && isset($state->distance))
                                                            <option value="{{ $state->id }}" @if ($state_id != 0)
                                                                @if ($state_id==$state->id) selected @endif @endif
                                                                data-currency="{{ $state->currency->symbol }}"
                                                                data-distance="{{ $state->distance->unit }}">{{ $state->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="distance_unit">Distance Unit</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="distance_unit" name="distance_unit"
                                                    class="form-control" placeholder="Distance Unit" disabled value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="currency">Currency</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="currency" name="currency" class="form-control"
                                                    placeholder="Currency" disabled value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix @if (isset($fare)) hide @endif">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="servicetype">Service Type</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="servicetype" name="servicetype_id" class="form-control">
                                                    <option value="0">Default</option>
                                                    @foreach ($serviceTypes as $serviceType)
                                                        <option value="{{ $serviceType->id }}" @if ($servicetype_id != 0)
                                                            @if ($servicetype_id==$serviceType->id)
                                                            selected @endif
                                                    @endif>{{ $serviceType->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="commission">Company Commission</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="commission" name="company_commission"
                                                    class="form-control" placeholder="Enter company commission"
                                                    value="{{ $company_commission }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <h3>Ride Distance Charges</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="base_ride_distance">Base Ride Distance</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="base_ride_distance" name="base_ride_distance"
                                                    class="form-control" placeholder="Enter Base Ride Distance"
                                                    value="{{ $base_ride_distance }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="base_ride_distance_charge">Base Fare</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="base_ride_distance_charge"
                                                    name="base_ride_distance_charge" class="form-control"
                                                    placeholder="Enter Base Ride Distance Charges"
                                                    value="{{ $base_ride_distance_charge }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="price_per_unit">Price Per KM</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="price_per_unit" name="price_per_unit"
                                                    class="form-control" placeholder="Price Per Unit"
                                                    value="{{ $price_per_unit }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="price_per_minute">Price Per Minute</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="price_per_minute" name="price_per_minute"
                                                    class="form-control" placeholder="Price Per Minute"
                                                    value="{{ $price_per_minute }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <h3>Waiting Charges</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="free_waiting_time">Free waiting Time</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="free_waiting_time" name="fee_waiting_time"
                                                    class="form-control" placeholder="Enter Free Waiting Time"
                                                    value="{{ $fee_waiting_time }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="waiting_price_per_minute">Waiting Time Per Min</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="waiting_price_per_minute"
                                                    name="waiting_price_per_minute" class="form-control"
                                                    placeholder="Enter Waiting Price Per Minute"
                                                    value="{{ $waiting_price_per_minute }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <h3>GST charges (In Percentage(%))</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="gst_charge">GST Charge</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="gst_charge" name="gst_charge" class="form-control"
                                                    placeholder="Enter GST Charge" value="{{ $gst_charge }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <h3>Third Party Charges (per/km)</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="fuel_surge_charge">Fuel Surge Charge</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="fuel_surge_charge" name="fuel_surge_charge"
                                                    class="form-control" placeholder="Enter Fuel Surge Charge"
                                                    value="{{ $fuel_surge_charge }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <h3>Government Charges</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nsw_gtl_charge">NSW Government Transport Levy</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nsw_gtl_charge" name="nsw_gtl_charge"
                                                    class="form-control"
                                                    placeholder="Enter NSW Government Transport Levy Charge"
                                                    value="{{ $nsw_gtl_charge }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nsw_ctp_charge">NSW CTP Charge (per/km)</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nsw_ctp_charge" name="nsw_ctp_charge"
                                                    class="form-control" placeholder="Enter NSW CTP Charge"
                                                    value="{{ $nsw_ctp_charge }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <h3>Booking Charges</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="booking_charge">Booking Charge</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="booking_charge" name="booking_charge"
                                                    class="form-control" placeholder="Enter Booking Charge"
                                                    value="{{ $booking_charge }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <h3>Cancel Charge </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="cancel_charge">Cancel Charge</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="cancel_charge" name="cancel_charge"
                                                    class="form-control" placeholder="Enter Cancel Charge"
                                                    value="{{ $cancel_charge }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <h3>Ride Charges</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="free_ride_minute">Minimum Fare</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="free_ride_minute" name="minimum_fare"
                                                    class="form-control" placeholder="Enter Minimum Fare"
                                                    value="{{ $minimum_fare }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="price_per_ride_minute">After Minimum Fare</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="price_per_ride_minute" name="after_minimum_fare"
                                                    class="form-control" placeholder="Enter After Minimum Fare"
                                                    value="{{ $after_minimum_fare }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <h3>Special Charges</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="price_per_ride_minute">Baby Seat Charge</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="baby_seat_charge" name="baby_seat_charge"
                                                    class="form-control" placeholder="Enter Baby Seat Charge If It Exists."
                                                    value="{{ $baby_seat_charge }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="price_per_ride_minute">Pet Charge</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="pet_charge" name="pet_charge"
                                                    class="form-control" placeholder="Enter Pet Charge If It Exists"
                                                    value="{{ $pet_charge }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit"
                                            class="btn btn-primary m-t-15 waves-effect">{{ $btnName }}</button>
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
    $(document).ready(function() {
        if ($('#state').val() !== 0) {
            obj = $('#state');
            setCurrencyDistance($('option:selected', obj));
        }
        $('#state').on('change', function() {
            setCurrencyDistance($('option:selected', this));
        });

        function setCurrencyDistance(obj) {
            currency = $(obj).attr('data-currency');
            distance = $(obj).attr('data-distance');
            $('#distance_unit').val(distance);
            $('#currency').val(currency);
        }
    });
</script>
@endsection
