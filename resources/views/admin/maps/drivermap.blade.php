@extends('admin.layouts.app')

@section('title', 'Drivers availability Stats on Map')

@section('content')
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="map_content">
                                    <p>Use this screen to find all the drivers who are available right now &</p>
                                    <p>-&nbsp; Who are Idle ie. Not ready to take a ride now ( maybe they are having their dinner )</p>
                                    <p>-&nbsp;    Who are ready to accept a ride now</p>
                                    <p>All Driver stats - at your finger tips!</p>
                                </div>
                                <div id="map"></div>
                                <div id="legend"><h3>Drivers</h3>
                                </div>
                                <h6>*Click on a Location Pointer to view Driver Details</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
 // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('389d667a3d4a50dc91a6', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('turvy-channel');
    /*
    	channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
    */
    
    channel.bind('driver_online_event', function(res) {
      console.log('driver_online_event', res);
      getmapmarker(map);
    });
    channel.bind('driver_offline_event', function(res) {
      console.log('driver_offline_event', res);
      getmapmarker(map);
    });
    
    var map;
    var markers = [
        @foreach($drivers as $driver)
        @if(isset($driver->driver->name) && $driver->driver->name != '')
        {driver_id: "{{ $driver->driverId }}",name: "{{ $driver->driver->name }}", lat: {{ $driver->lat }}, lng: {{ $driver->lng }}, available: 1 },
        @endif
        @endforeach
    ];

    var mapIcons = [
        // 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
        '{{ asset('images/available_car.png') }}',
        '{{ asset('images/available_car.png') }}',
       // 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
    ];
	//setInterval(initMap, 2000); // Time in milliseconds
    var mapMarkers = [];
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 9,
            minZoom: 1,
            mapId: 'af9935eed520f3ec'
        });
        
			 getmapmarker(map);
			//setInterval(function() { getmapmarker(map); }, 3000);
			
        var legend = document.getElementById('legend');
        var div = document.createElement('div');
        div.innerHTML = '<img src="' + mapIcons[0] + '" width="24"> ' + 'Available';
        legend.appendChild(div);
       // var div = document.createElement('div');
        //div.innerHTML = '<img src="' + mapIcons[1] + '"> ' + 'Available';
        //legend.appendChild(div);
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
        /*
        function search() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            // get first autocomplete value *************
            console.log(autocomplete.getPlace());
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setIcon(({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)

            }));

            marker.setPosition(place.geometry.location);

            marker.setVisible(true);



            var address = '';

            if (place.address_components) {

                address = [

                  (place.address_components[0] && place.address_components[0].short_name || ''),

                  (place.address_components[1] && place.address_components[1].short_name || ''),

                  (place.address_components[2] && place.address_components[2].short_name || '')

                ].join(' ');

            }



            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);

            infowindow.open(map, marker);

        };



        autocomplete.addListener('place_changed', search);



        button.addEventListener('click', search);



        */

    }
    
    function getmapmarker(map){
    		//alert("here");
    		  //clearMarkers();
    		  //console.log("PREVIOUS DATA",mapMarkers);
    		  if(mapMarkers && mapMarkers.length > 0){
    		  	  //console.log("PREVIOUS DATA LENGTH ",mapMarkers.length);
	    		  for (let i = 0; i < mapMarkers.length; i++) {
				    mapMarkers[i].setMap(null);
				  }
			   }

    		//var mapMarkers = [];
			 $.ajax({ 
		        type: 'GET', 
		        url: 'https://www.turvy.net/admin/maps/drveraval_data', 
		        success: function (data) { 
		        	//console.log(data);
		        	markers = data['data'];
		        	//console.log("Length",markers.length);
			    if(markers){
			    	//markers.setMap(null);
		        	markers.forEach( function(element, index) {
		        console.log("ELEMT DATA ",element.driver_id);
	            var dURL = "/admin/user/driver/"+ element.driver_id +"/show"
	            var url = '{{url("/")}}' + dURL;
            var icon = {
				    url: mapIcons[element.available], // url
				    scaledSize: new google.maps.Size(24, 34), // scaled size
				    origin: new google.maps.Point(0,0), // origin
				    anchor: new google.maps.Point(0, 0) // anchor
				};
            marker = new google.maps.Marker({
                position: {lat: Number(element.lat), lng: Number(element.lng)},
                map: map,
                title: element.name,
                icon:icon,
            });

            mapMarkers.push(marker);
            //console.log("MARKER",mapMarkers);
            const contentString =
				    '<div id="content">' +
				    '<div id="siteNotice">' +
				    "</div>" +
				    '<a href="'+url+'">'+element.name+'</a>' +
				    "</div>";
			    var infowindow = new google.maps.InfoWindow({
			        content: contentString,
			        disableAutoPan: true
			    });
			     infowindow.open(map, marker);
           /* google.maps.event.addListenerOnce(map, 'tilesloaded', function() {
            	
				});
				*/
            google.maps.event.addListener(marker, 'click', function() {
                window.location.href = url;
            });
             
        });
		          //markers 
		          }
		        }
		    });
        /*
        var input = document.getElementById('pac-input');
        var button = document.getElementById('location-search');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        */
			//console.log("AMRKERS ",markers);
        

    
    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.googlemap.apikey')}}&map_ids=af9935eed520f3ec&libraries=places&callback=initMap" async defer></script>

@endsection

