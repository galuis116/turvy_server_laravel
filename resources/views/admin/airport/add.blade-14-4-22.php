@extends('admin.layouts.app')

@php
    $title = isset($airport) ? 'Edit airport' : 'Add airport';
    $action = isset($airport) ? route('admin.airportride.airport.update', $airport->id) : route('admin.airportride.airport.store');
    $btnName = isset($airport) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.airportride.airport.index')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
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
                            <small><b>What is this?</b></small>
                            <small>We understand Airport rides is a very important part of Cab rental business. So we have made this as a standalone feature in our platform :)</small>
                            <small>Now, you can effortlessly handle those high volume Airport pickup's and Drop's in an efficient manner.</small>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{$action}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="first_name">Airport Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="txtPlaces" placeholder="Eg: International Airport" type="text" name="name" value="{{ isset($airport) ? $airport->name : '' }}" required class="form-control">
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
                                                <input placeholder="Eg: 560100" type="text" name="zipcode" value="{{ isset($airport) ? $airport->zipcode : '' }}" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="email">Find a location</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input placeholder="Lat" type="text" id="Lat" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input placeholder="Lng" type="text" id="Lng" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <button type="button" id="update" class="btn btn-success waves-effort">Update the location</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label for="mobile">Coordinates</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="coordinates" id="coordinates" placeholder="pairs - lat:lng " readonly value="{{ isset($airport) ? $airport->coordinates : '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div id="map" style="height: 400px"></div>
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

@section('scripts')
    <script>
        var mapInput = document.getElementById('coordinates');
        var map;
        function initMap() {
            var initialLocation = new google.maps.LatLng(39,-101);
            var coordinate_changed = false;
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 13,
                mapId: 'af9935eed520f3ec'
            });
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    if (!coordinate_changed) {
                        initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        map.setCenter(initialLocation);
                    }
                });
            }
            var path_obj = {
                strokeColor: '#ffbc3b',
                strokeOpacity: 0.6,
                strokeWeight: 3,
                fillColor: '#ff0000',
                fillOpacity: 0.35,
                editable: true,
                draggable: true
            };
            var mapPolygon = new google.maps.Polygon(path_obj);
            var path = mapPolygon.getPath();
            if (mapInput.value) {
                var pre_path = mapInput.value.split('|');
                for (var i = 0; i < pre_path.length; i++) {
                    var pre_point = pre_path[i].split(',');
                    var pre_point_obj = new google.maps.LatLng(pre_point[0], pre_point[1]);
                    path.push(pre_point_obj);
                }
                map.setCenter(pre_point_obj);
                coordinate_changed = true;
                mapPolygon.setMap(map);
            }
            map.addListener('click', function (e) {
                if (path.length) {
                    path.push(e.latLng);
                } else {
                    path.push(e.latLng);
                    mapPolygon.setMap(map);
                }
            });
            google.maps.event.addListener(mapPolygon, "rightclick", function(e){
                if (e.vertex !== undefined) {
                    path.removeAt(e.vertex);
                }
            });
            google.maps.event.addListener(path, "insert_at", updateCords);
            google.maps.event.addListener(path, "set_at", updateCords);
            google.maps.event.addListener(path, "remove_at", updateCords);
        }
        function updateCords() {
            var path_array = [];
            for (let i = 0; i < this.getLength(); i++) {
                var xy = this.getAt(i);
                path_array[i] = xy.lat() + ',' + xy.lng();
            }
            mapInput.value = path_array.join('|');
        }
        $("#update").on("click",function (event) {
            var Lat = $("#Lat").val();
            var Lng = $("#Lng").val();

            var initialLocation = new google.maps.LatLng(Lat,Lng);
            map.setCenter(initialLocation);
            // var map = new google.maps.Map(document.getElementById('map'), {
            //     center: initialLocation,
            //     zoom: 13
            // });

        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('services.googlemap.apikey')}}&map_ids=af9935eed520f3ec&libraries=places&callback=initMap" async defer></script>
@endsection
