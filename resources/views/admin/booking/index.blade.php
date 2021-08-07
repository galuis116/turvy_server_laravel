@extends('admin.layouts.app')

@section('title', 'Booking form')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Booking Form</h2>
                        </div>
                        <div class="body">
                            @include('partials.message')
                            <div class="wraper container-fluid">
                                <div class="page-title">
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pull-right">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="type" onchange="filterMarkers(this.value);"
                                                        class="form-control">
                                                        <option value="">All Driver</option>
                                                        <option value="1">Online</option>
                                                        <option value="2">Offline</option>
                                                        <option value="3">On Ride</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default" style="padding-left: 10px; padding-right:10px;">
                                            <div class="panel-body">
                                                <form id="frm-booking" class="form-horizontal" method="post"
                                                    enctype="multipart/form-data"
                                                    action="{{ route('admin.booking.store') }}">
                                                    @csrf
                                                    <input type="hidden" id="user_id" name="user_id" value="0">
                                                    <input type="hidden" id="buyer" name="buyer"
                                                        value="{{ Auth::guard('admin')->user()->id }}">
                                                    <input type="hidden" id="orig_latitude" name="orig_latitude" value="">
                                                    <input type="hidden" id="orig_longitude" name="orig_longitude" value="">
                                                    <input type="hidden" id="dest_latitude" name="dest_latitude" value="">
                                                    <input type="hidden" id="dest_longitude" name="dest_longitude" value="">
                                                    <input type="hidden" id="distance" name="distance" value="">
                                                    <input type="hidden" id="time" name="time" value="">

                                                    <div class="row clearfix">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="row clearfix">
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <select class="form-control" id="country"
                                                                                name="country">
                                                                                @foreach ($countries as $country)
                                                                                    <option
                                                                                        id="opt-country-{{ $country->id }}"
                                                                                        value="{{ $country->id }}"
                                                                                        phonecode="{{ $country->phonecode }}">
                                                                                        {{ $country->nicename }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input class="form-control" id="phonecode"
                                                                                value="+93" name="phonecode" type="text"
                                                                                readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control"
                                                                                id="userphone" name="userphone"
                                                                                placeholder="Enter Phone Number">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <button type="button" id="get_details"
                                                                            class="btn btn-grey waves-effect">Get
                                                                            Details</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input class="form-control" id="username"
                                                                                name="username" placeholder="Username"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input class="form-control" id="mail"
                                                                                placeholder="Email" name="email"
                                                                                type="email" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <input name="ride_now" type="radio" id="ride_now"
                                                                            class="with-gap radio-col-blue" value="1"
                                                                            checked onclick="myFunction()" />
                                                                        <label for="ride_now">Ride Now</label>
                                                                        <input name="ride_now" type="radio" id="ride_later"
                                                                            class="with-gap radio-col-blue" value="0"
                                                                            onclick="unclickFunction()" />
                                                                        <label for="ride_later">Ride Later</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input class="datepicker form-control"
                                                                                id="datepicker" name="datepicker"
                                                                                placeholder="Select Date" type="text"
                                                                                disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input class="timepicker form-control"
                                                                                id="timepicker" name="timepicker"
                                                                                placeholder="Select Time" type="text"
                                                                                disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input class="form-control" id="origin-input"
                                                                                name="origin-input"
                                                                                placeholder="Pick up Location" type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input class="form-control"
                                                                                id="destination-input"
                                                                                name="destination-input"
                                                                                placeholder="Drop off Location" type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div id="mode-selector" class="controls"
                                                                            style="display: none">
                                                                            <input type="radio" name="type"
                                                                                id="changemode-walking">
                                                                            <label for="changemode-walking">Walking</label>

                                                                            <input type="radio" name="type"
                                                                                id="changemode-transit">
                                                                            <label for="changemode-transit">Transit</label>

                                                                            <input type="radio" name="type"
                                                                                id="changemode-driving" checked="checked">
                                                                            <label for="changemode-driving">Driving</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <select class="form-control" id="vehicleType"
                                                                                name="vehicleType">
                                                                                <option value="">Select Vehicle type
                                                                                </option>
                                                                                @foreach ($vehicles as $vehicle)
                                                                                    <option value="{{ $vehicle->id }}">
                                                                                        {{ $vehicle->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <select class="form-control" id="radius"
                                                                                name="radius">
                                                                                <option value="2">2 Km Radius</option>
                                                                                <option value="5">5 Km Radius</option>
                                                                                <option value="10">10 Km Radius</option>
                                                                                <option value="15">15 Km Radius</option>
                                                                                <option value="20">20 Km Radius</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <input type="checkbox" id="checkme"
                                                                            name="is_all_drivers"
                                                                            class="filled-in chk-col-blue" />
                                                                        <label for="checkme">Send to all drivers</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h4 style="text-align:center;"><b>OR</b></h4>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <select class="form-control" name="driver"
                                                                                id="driver">
                                                                                <option value="">Select Driver</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control"
                                                                                id="coupon" name="coupon" placeholder="Input coupon code if you have."/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <select class="form-control"
                                                                                name="payment_option_id"
                                                                                id="payment_option_id">
                                                                                <option value="">Select Payment Method
                                                                                </option>
                                                                                @foreach ($payments as $payment)
                                                                                    <option value="{{ $payment->id }}">
                                                                                        {{ $payment->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control"
                                                                                id="surge_charge" name="surge_charge" placeholder="Surge Charge as percentage. EX. 10" disabled/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        @can('booking-create')
                                                                            <a class="btn bg-blue waves-effect" id="save"
                                                                                name="save">Book Now</a>
                                                                        @else
                                                                            <a class="btn bg-blue waves-effect"
                                                                                disabled="disabled" data-toggle="tooltip"
                                                                                data-placement="bottom"
                                                                                data-original-title="You have no permission for this process.">Book
                                                                                Now</a>
                                                                        @endcan
                                                                        <button type="button" id="estimate"
                                                                            class="btn bg-cyan waves-effect">Estimate
                                                                            Price</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        Estimation
                                                                        <hr>
                                                                        <ul>
                                                                            <li><b>Estimated Distance </b> : <em
                                                                                    id="dist_fare_price">0 Km</em></li>
                                                                            <li><b>Estimated Time </b> : <em
                                                                                    id="time_fare_price">0 Min</em></li>
                                                                            <li><b>Estimated Price </b> : <em
                                                                                    id="time_fare_price1">$0</em></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="row clearfix">
                                                                <div id="map" style="width:100%; height:100vh;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#get_details').on('click', function() {
                var phonecode = $('#phonecode').val();
                var phone = $('#userphone').val();
                var userphone = phonecode + phone;
                if (phone == "") {
                    alert("Enter Phone Number");
                    return false;
                } else {
                    $.ajax({
                        type: "get",
                        url: "{{ route('getDetailsByPhone') }}",
                        data: 'phone=' + userphone,
                        success: function(data) {
                            if (data['status'] == 1) {
                                $('#user_id').val(data['userInfo']['id']);
                                $('#username').val(data['userInfo']['name']);
                                $('#mail').val(data['userInfo']['email']);
                            } else {
                                $("#username").val('');
                                $('#mail').val('');
                                $('#user_id').val('');
                                alert("This Phone Number Is Not Registered")
                            }
                        }
                    });
                }
            });
            $('#country').on('change', function() {
                opt = $('#opt-country-' + $(this).val()).attr('phonecode');
                $('#phonecode').val(opt);
            });
            $('#vehicleType').on('change', function() {
                var orig_latitude = $('#orig_latitude').val();
                var orig_longitude = $('#orig_longitude').val();
                var radius = $('#radius').val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('getDriverByLocation') }}",
                    data: {
                        vehicleType: $(this).val(),
                        orig_latitude: orig_latitude,
                        orig_longitude: orig_longitude,
                        radius: radius
                    },
                    success: function(data) {
                        console.log(data);
                        $('#driver').empty();
                        $('#driver').append(
                            '<option value="none" disabled selected>Select Driver</option>');
                        $.each(data, function(key, value) {
                            ele = '<option value="' + value['id'] + '">' + value[
                                'name'
                            ] + '</option>';
                            $('#driver').append(ele);
                        });
                    }
                });
            });
            $('#checkme').on('change', function() {
                if (this.checked) {
                    $('#driver').prop('disabled', true);
                } else {
                    $('#driver').prop('disabled', false);
                }
            });
            $('#estimate').on('click', function() {
                distance = getOnlyNumberFromString($("#dist_fare_price").html());
                servicetype_id = $("#vehicleType").val();
                if (distance != '0') {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('getEstimate') }}",
                        data: {
                            'servicetype_id': servicetype_id
                        },
                        success: function(data) {
                            fare = ((parseInt(distance) * parseFloat(data['price_per_unit'])) +
                                parseFloat(data['base_ride_distance_charge'] + data[
                                    'new_gtl_charge'] + data['gst_charge']));
                            fare1 = parseInt(fare * 0.9);
                            fare2 = parseInt(fare * 1.1);
                            $("#time_fare_price1").html(" $" + fare1 + "~" + fare2);
                        }
                    });
                }
            });
            $('#save').on('click', function() {
                if (validate()) {
                    $("#frm-booking").submit();
                }
            });
        });

        function myFunction() {
            document.getElementById("datepicker").disabled = true;
            document.getElementById("timepicker").disabled = true;
            document.getElementById("surge_charge").disabled = true;
        }

        function unclickFunction() {
            document.getElementById("datepicker").disabled = false;
            document.getElementById("timepicker").disabled = false;
            document.getElementById("surge_charge").disabled = false;
        }

        function getOnlyNumberFromString(str) {
            var matches = str.match(/(\d+)/);
            return matches[0];
        }

        function validate() {
            var userphone = document.getElementById('userphone').value;
            var username = document.getElementById('username').value;
            var origin = document.getElementById('origin-input').value;
            var destination = document.getElementById('destination-input').value;
            var servicetype_id = document.getElementById('vehicleType').value;
            if (userphone == "") {
                alert("Enter Phone Number");
                return false;
            }
            if (username == "") {
                alert("Enter Rider Name");
                return false;
            }

            if ($("#ride_now").prop('checked') == false && $("#ride_later").prop('checked') == false) {
                alert("Select Ride Type");
                return false;
            }

            if (origin == "") {
                alert("Enter Pickup Location");
                return false;
            }
            if (destination == "") {
                alert("Enter Drop Up Location");
                return false;
            }
            if (servicetype_id == "") {
                alert("Select vehicle service type");
                return false;
            }

            if (document.getElementById('checkme').checked == false && document.getElementById('driver').value == "") {
                alert("Select Driver Assign Type");
                return false;
            }

            if ($("#ride_later").prop('checked') == true && document.getElementById('datepicker').value == "") {
                alert("Select Ride Date");
                return false;
            }

            if ($("#ride_later").prop('checked') == true && document.getElementById('timepicker').value == "") {
                alert("Select Ride Time");
                return false;
            }

            if (document.getElementById('payment_option_id').value == "") {
                alert("Select Payment");
                return false;
            }
            return true;
        }
    </script>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                mapTypeControl: false,
                center: {
                    lat: -33.8688,
                    lng: 151.2195
                },
                zoom: 13,
                mapId: 'af9935eed520f3ec'
            });

            new AutocompleteDirectionsHandler(map);
        }

        function AutocompleteDirectionsHandler(map) {
            this.map = map;
            this.originPlaceId = null;
            this.destinationPlaceId = null;
            this.travelMode = 'DRIVING';
            var originInput = document.getElementById('origin-input');
            var destinationInput = document.getElementById('destination-input');
            var modeSelector = document.getElementById('mode-selector');
            this.directionsService = new google.maps.DirectionsService;
            this.directionsDisplay = new google.maps.DirectionsRenderer;
            this.directionsDisplay.setMap(map);
            var originAutocomplete = new google.maps.places.Autocomplete(originInput);
            var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);

            this.setupClickListener('changemode-walking', 'WALKING');
            this.setupClickListener('changemode-transit', 'TRANSIT');
            this.setupClickListener('changemode-driving', 'DRIVING');

            this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
            this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
        }

        AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
            var radioButton = document.getElementById(id);
            var me = this;
            radioButton.addEventListener('click', function() {
                me.travelMode = mode;
                me.route();
            });
        };

        AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
            var me = this;
            autocomplete.bindTo('bounds', this.map);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.place_id) {
                    window.alert("Please select an option from the dropdown list.");
                    return;
                }
                if (mode === 'ORIG') {
                    me.originPlaceId = place.place_id;
                    document.getElementById("orig_latitude").value = place.geometry.location.lat();
                    document.getElementById("orig_longitude").value = place.geometry.location.lng();
                } else {
                    me.destinationPlaceId = place.place_id;
                    document.getElementById("dest_latitude").value = place.geometry.location.lat();
                    document.getElementById("dest_longitude").value = place.geometry.location.lng();
                }
                me.route();
            });
        };

        AutocompleteDirectionsHandler.prototype.route = function() {
            if (!this.originPlaceId || !this.destinationPlaceId) {
                return;
            }
            var me = this;
            this.directionsService.route({
                origin: {
                    'placeId': this.originPlaceId
                },
                destination: {
                    'placeId': this.destinationPlaceId
                },
                travelMode: this.travelMode
            }, function(response, status) {
                if (status === 'OK') {
                    me.directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
            getDistance();
        };

        function getDistance() {
            var distanceService = new google.maps.DistanceMatrixService();
            distanceService.getDistanceMatrix({
                    origins: [$("#destination-input").val()],
                    destinations: [$("#origin-input").val()],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.METRIC,
                    avoidHighways: false,
                    avoidTolls: false
                },
                function(response, status) {
                    if (status !== google.maps.DistanceMatrixStatus.OK) {
                        console.log('Error:', status);
                    } else {
                        document.getElementById("distance").value = response.rows[0].elements[0].distance.value;
                        document.getElementById("dist_fare_price").innerText = response.rows[0].elements[0].distance
                            .text;
                        document.getElementById("time_fare_price").innerText = response.rows[0].elements[0].duration
                            .text;
                        document.getElementById("time").value = response.rows[0].elements[0].duration.value;
                    }
                });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemap.apikey') }}&map_ids=af9935eed520f3ec&libraries=places&callback=initMap"
        async defer></script>
@endsection
