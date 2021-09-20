@extends('admin.layouts.app')

@php
    $title = isset($destination) ? 'Edit destination' : 'Add destination';
    $action = isset($destination) ? route('admin.airportride.destination.update', $destination->id) : route('admin.airportride.destination.store');
    $btnName = isset($destination) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.airportride.destination.index')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                            <small>A destination is the Drop location where the passenger would like to goto from the Airport Eg: SFO Airport to San Jose Railway station.</small><br>
                            <small><b>Why add a destination?</b></small>
                            <small>Airport rentals are a bit complicated. We have simplified it. Usually Airport rentals are managed in a totally different manner than normal taxi dispatch ( as each Airport / Taxi association etc. have their own rules that you would need to adhere to ). You would also need to add Toll Booth ticket prices to the ride, Special extra fee's, Tax etc. that are levied by the respective Airport's & associations. So we have simplified it in a manner that you get a very flexible solution.</small><br>
                            <small><b>Good news</b>: While we do your installation, we will bulk upload all the destinations & zip-codes for all the Airports in your city</small>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{$action}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="" name = "latitude" id="latitude" />
                                <input type="hidden" value="" name ="longitude" id="longitude" />
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="first_name">Destination</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="txtPlaces" placeholder="Eg: International location" type="text" name="name" value="{{ isset($destination) ? $destination->name : '' }}" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="last_name">Zipcode</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input placeholder="Eg: 560100" type="text" name="zipcode" value="{{ isset($destination) ? $destination->zipcode : '' }}" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="@if(isset($destination)) {{$destination->id}} @endif" />
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

@section('scripts')
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key={{config('services.googlemap.apikey')}}&sensor=false&libraries=places"></script>

    <script type="text/javascript">

        google.maps.event.addDomListener(window, 'load', function () {

            var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));

            google.maps.event.addListener(places, 'place_changed', function () {

                var place = places.getPlace();

                var address = place.formatted_address;

                var latitude = place.geometry.location.lat();

                var longitude = place.geometry.location.lng();

                var mesg = "Address: " + address;

                mesg += "\nLatitude: " + latitude;

                mesg += "\nLongitude: " + longitude;

                document.getElementById("latitude").value = latitude;

                document.getElementById("longitude").value = longitude;

                console.log(lati,longi);

            });

        });

    </script>
@endsection