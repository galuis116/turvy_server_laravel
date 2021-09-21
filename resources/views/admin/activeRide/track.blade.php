@extends('admin.layouts.app')

@section('title', "Ride Track")

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div id="map"></div>
                            <div id="floating-panel">
                                <table cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td width="240">
                                            <table cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td height="30"><strong>Driver Name : </strong>{{$ride->driver->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td height="30"><strong>Vehicle Type : </strong>{{$ride->servicetype->name}}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="60" align="center">
                                            <a href="tel:{{$ride->driver->mobile}}"><img src="http://www.apporiotaxi.com/Apporiotaxi/uploads/cl.png"></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection

@section('styles')
    <style>
        #map {
            height: 100%;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #floating-panel {
            background: #fff;
            padding: 5px;
            font-size: 14px;
            font-family: Arial;
            border: 1px solid #ccc;
            box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
            display: none;
            height: 100px;
            width: 300px;
        }
    </style>
@endsection

@section('scripts')

    <script src="https://www.gstatic.com/firebasejs/3.0.5/firebase.js"></script>
    <script>
        var map = undefined;
        var marker = undefined;
        var position = new Array(2);
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': '{{$ride->origin}}'}, function(results, status){
            if(status == google.maps.GeocoderStatus.OK)
            {
                position[0] = results[0].geometry.location.lat();
                position[1] = results[0].geometry.location.lng();
            }
        });

        function initialize() {
            var latlng = new google.maps.LatLng(position['0'], position[1]);
            var myOptions = {
                zoom: 18,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapId: 'af9935eed520f3ec'
            };
            map = new google.maps.Map(document.getElementById("map"), myOptions);
            var name = '{{$ride->driver->name}}';
            marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: name,
                animation: google.maps.Animation.DROP,
                icon:'http://www.apporio.com/uploads/car-icon.png'
            });
            var control = document.getElementById('floating-panel');
            control.style.display = 'block';
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(control);
        }
        var config = {
            apiKey: "{{config('services.googlemap.apikey')}}",
            authDomain: "apporio-taxi.firebaseapp.com",
            databaseURL: "https://apporio-taxi.firebaseio.com",
            projectId: "apporio-taxi",
            storageBucket: "apporio-taxi.appspot.com",
            messagingSenderId: "316763323278"
        };

        firebase.initializeApp(config);
        var driverId = '{{$ride->driver_id}}';
        var firebases = firebase.database().ref('Drivers_A/' + driverId);
        firebases.on("value", function(snapshot) {
            var newPosition = snapshot.val();
            var lat = newPosition.driver_current_latitude;
            var longitude = newPosition.driver_current_longitude;
            var result = [lat, longitude];
            transition(result);
            var latLng = new google.maps.LatLng(lat, longitude);
            map.panTo(latLng);
        });
        var numDeltas = 100;
        var delay = 100; //milliseconds
        var i = 0;
        var deltaLat;
        var deltaLng;
        function transition(result){
            i = 0;
            deltaLat = (result[0] - position[0])/numDeltas;
            deltaLng = (result[1] - position[1])/numDeltas;
            moveMarker();
        }
        function moveMarker(){
            position[0] += deltaLat;
            position[1] += deltaLng;
            var latlng = new google.maps.LatLng(position[0], position[1]);
            marker.setPosition(latlng);
            if(i!=numDeltas){
                i++;
                setTimeout(moveMarker, delay);
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('services.googlemap.apikey')}}&libraries=places&callback=initialize" async defer></script>
@endsection
