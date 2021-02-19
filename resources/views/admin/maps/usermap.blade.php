@extends('admin.layouts.app')

@section('title', 'Passenger Booking Stats on Map')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="map_content">
                                    <p>Use this screen to find from where you have got consistent bookings from in the past. Helps in letting you know where to concentrate in future.</p>
                                    <p>More Statistics. More Business!</p>
                                </div>
                                <div id="map"></div>
                                <h6>*Click on a Location Pointer to view Rider Details</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')

<style type="text/css">



    html, body {

        height: 100%;

        margin: 0;

        padding: 0;

    }



    #map {

        height: 100%;

        min-height: 500px;

    }



    .controls {

        /*margin-top: 10px;*/

        border: 1px solid transparent;

        border-radius: 2px 0 0 2px;

        box-sizing: border-box;

        -moz-box-sizing: border-box;

        height: 32px;

        outline: none;

        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);

        margin-bottom: 10px;

    }



    #pac-input {

        background-color: #fff;

        font-family: Roboto;

        font-size: 15px;

        font-weight: 300;

        /*margin-left: 12px;*/

        padding: 0 11px 0 13px;

        text-overflow: ellipsis;

        width: 100%;

    }



    #pac-input:focus {

        border-color: #4d90fe;

    }



    #location-search {

        width: 100%;

    }



    #legend {

        font-family: Arial, sans-serif;

        background: rgba(255,255,255,0.8);

        padding: 10px;

        margin: 10px;

        border: 2px solid #f3f3f3;

    }

    #legend h3 {

        margin-top: 0;

        font-size: 16px;

        font-weight: bold;

        text-align: center;

    }

    #legend img {

        vertical-align: middle;

        margin-bottom: 5px;

    }

</style>

@endsection



@section('scripts')

<script>

    var map;

    var markers = [

        @foreach($users as $user)

        {

            user_id: "{{ $user->user_id }}",

            name: "{{ $user->user->name }}",

            lat: {{ $user->lat }},

            lng: {{ $user->lng }},

        },

        @endforeach

    ];



    var mapMarkers = [];

    function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
            minZoom: 1,
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 9,
            mapId: 'af9935eed520f3ec'
        });



        markers.forEach( function(element, index) {



            var url = "/admin/user/rider/" + element.user_id + "/show"



            marker = new google.maps.Marker({

                position: {lat: element.lat, lng: element.lng},

                map: map,

                title: element.name,

            });



            mapMarkers.push(marker);



            google.maps.event.addListener(marker, 'click', function() {

                window.location.href = url + element.user_id;

            });



        });

    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.googlemap.apikey')}}&map_ids=af9935eed520f3ec&libraries=places&callback=initMap" async defer></script>

@endsection

