@extends('admin.layouts.app')

@section('title', 'Drivers and Airports Stats on Map')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div id="floating-panel">
                                    <button onclick="toggleHeatmap()" class="btn btn-success">Toggle Heatmap</button>
                                    <button onclick="changeGradient()" class="btn btn-success">Change gradient</button>
                                    <button onclick="changeRadius()" class="btn btn-success">Change radius</button>
                                    <button onclick="changeOpacity()" class="btn btn-success">Change opacity</button>
                                  </div>
                                  <div id="map"></div>
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
    #floating-panel {
        background-color: #fff;
        margin-bottom: 5px;
/*         text-align: center; */
         font-family: 'Roboto','sans-serif';
      }
</style>
@endsection

@section('scripts')
<script>
	var map, heatmap;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 2,
            minZoom: 1,
            mapId: 'af9935eed520f3ec'
        });
        heatmap = new google.maps.visualization.HeatmapLayer({
            data: getPoints(),
            map: map
          });
        changeRadius();
        changeGradient();         
        /*
        var input = document.getElementById('pac-input');
        var button = document.getElementById('location-search');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        */
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
    function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
    }
    function changeGradient() {
        var gradient = [
          'rgba(0, 255, 255, 0)',
          'rgba(0, 255, 255, 1)',
          'rgba(0, 191, 255, 1)',
          'rgba(0, 127, 255, 1)',
          'rgba(0, 63, 255, 1)',
          'rgba(0, 0, 255, 1)',
          'rgba(0, 0, 223, 1)',
          'rgba(0, 0, 191, 1)',
          'rgba(0, 0, 159, 1)',
          'rgba(0, 0, 127, 1)',
          'rgba(63, 0, 91, 1)',
          'rgba(127, 0, 63, 1)',
          'rgba(191, 0, 31, 1)',
          'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
    }
    function changeRadius() {
        heatmap.set('radius', heatmap.get('radius') ? null : 20);
    }
    function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
    }
    function getpoints() {
        <?php echo json_encode($points);?>
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.googlemap.apikey')}}&libraries=places&callback=initMap" async defer></script>
@endsection

