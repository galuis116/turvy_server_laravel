@extends('layouts.app')

@section('title') Home @endsection

@section('styles')
    <link href="{{asset('css/camroll_slider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/slider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/flexslider/flexslider.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .partner-nav {
            padding: 10px;
            background-color: #226CA8;
            margin-top: -45px;
            margin-bottom: 20px;
        }
        .partner-nav a {
            color: white !important;
            font-size: 18px;
            padding: 0 15px;
            border-right: 2px solid white;
        }
    </style>
@endsection

@php
$banner_image = isset($content->banner_cdnimage) ? $content->banner_cdnimage : '';
if(trim($banner_image) == ""){
	$banner_image = isset($content->banner_image) ? asset($content->banner_image) : '';
}
@endphp

@section('content')
    <section class="abd-banner-wrapper" style="background-image:url({{isset($banner_image) ? $banner_image : asset('images/banner_default.jpg')}})">
        <div class="banner-caption">
            <h1 class="banner-title">{{isset($content->banner_title) ? $content->banner_title : ''}}</h1>
            <p class="banner-description">{{isset($content->banner_description) ? $content->banner_description : ''}}</p>
        </div>
    </section>

    <!-- slider -->
    <section class="abd-slider-wrapper">
        <h2 class="d-none">Hidden title</h2>
        <div class="category-container">
            <div id="my-slider" class="crs-wrap">
                <div class="crs-screen">
                    <div class="crs-screen-roll">
                        @foreach($servicetypes as $servicetype)
                        <div class="crs-screen-item">
                            <div class="row">
                                <div class="offset-1 col-md-3">
                                    <div class="crs-screen-item-content">
                                        <h1 class="text-white">{{$servicetype->name}}</h1>
                                        <p class="text-white">{{$servicetype->description }}</p>
                                        <div class="feature-img">
                                            <div class="img-holder" data-toggle="tooltip" data-placement="top" title="Eco-Friendly Ride">
                                                <img class="option-img" src="{{asset('images/eco-friendly.svg')}}">
                                            </div>
                                            <div class="img-holder" data-toggle="tooltip" data-placement="top" title="Value for Money">
                                                <img class="option-img" src="{{asset('images/value-money.svg')}}">
                                            </div>
                                            <div class="img-holder" data-toggle="tooltip" data-placement="top" title="Cashless Ride">
                                                <img class="option-img" src="{{asset('images/cashless.svg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="crs-image">
                                        	@php
				                            		$servicetype_image = isset($servicetype->cdnimage) ? $servicetype->cdnimage : '';
															if(trim($servicetype_image) == ""){
																$servicetype_image = isset($servicetype->image) ? asset($servicetype->image) : '';
															}
				                            	@endphp
                                        <img src="{{$servicetype_image}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="crs-bar">
                    <div class="crs-bar-roll-current"></div>
                    <div class="crs-bar-roll-wrap">
                        <div class="crs-bar-roll">
                            @foreach($servicetypes as $servicetype)
                            <div class="crs-bar-roll-item">
                            	@php
                            		$servicetype_image = isset($servicetype->cdnimage) ? $servicetype->cdnimage : '';
											if(trim($servicetype_image) == ""){
												$servicetype_image = isset($servicetype->image) ? asset($servicetype->image) : '';
											}
                            	@endphp
                                <img src="{{$servicetype_image}}" />
                                <p>{{$servicetype->name}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider /end -->

    <!-- how works -->
    <section class="abd-how-works-wrapper abd-pt abd-pb">
        <div class="section-title">
            How It Works
        </div>
        <div class="container">
            <div class="row abd-circle-cards">
                <div class="col-lg-3 col-sm-6">
                    <article class="abd-wcard">
                        <div class="abd-icon-circle">
                            <img src="{{asset('images/icons/book.png')}}" alt="book in just 2 tabs">
                        </div>
                        <div class="abd-wcard-caption">
                            <h3 class="main-color">{{isset($content->workflow_title1) ? $content->workflow_title1 : null}}</h3>
                            <p style="text-align: left;">{{isset($content->workflow_description1) ? $content->workflow_description1 : null}}</p>
                        </div>
                    </article>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <article class="abd-wcard">
                        <div class="abd-icon-circle">
                            <img src="{{asset('images/icons/drive.png')}}" alt="Get a driver">
                        </div>
                        <div class="abd-wcard-caption">
                            <h3 class="main-color">{{isset($content->workflow_title2) ? $content->workflow_title2 : null}}</h3>
                            <p style="text-align: left;">{{isset($content->workflow_description2) ? $content->workflow_description2 : null}}</p>
                        </div>
                    </article>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <article class="abd-wcard">
                        <div class="abd-icon-circle">
                            <img src="{{asset('images/icons/track.png')}}" alt="Track Your Driver">
                        </div>
                        <div class="abd-wcard-caption">
                            <h3 class="main-color">{{isset($content->workflow_title3) ? $content->workflow_title3 : null}}</h3>
                            <p style="text-align: left;">{{isset($content->workflow_description3) ? $content->workflow_description3 : null}}</p>
                        </div>
                    </article>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <article class="abd-wcard">
                        <div class="abd-icon-circle">
                            <img src="{{asset('images/icons/arrive.png')}}" alt="Arrive Safely">
                        </div>
                        <div class="abd-wcard-caption">
                            <h3 class="main-color">{{isset($content->workflow_title4) ? $content->workflow_title4 : null}}</h3>
                            <p style="text-align: left;">{{isset($content->workflow_description4) ? $content->workflow_description4 : null}}</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- how works /end-->
    <!-- our partner -->
    <section class="abd-about-wrapper white-bg abd-bg abd-pt abd-pb">
        <div class="section-title">
            Lists of Our Charity
        </div>
        <div class="container">
            <div class="row partner-nav">
                <div class="col-md-12">
                    @foreach($partners as $partner)
                        <a href="{{$partner->url}}">
                            {{$partner->organization}}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <article class="about-content">
                        <h3>{{isset($content->charity_title) ? $content->charity_title : null}}</h3>
                        {!! isset($content->charity_description) ? str_limit($content->charity_description, 600): null !!}
                        <a href="{{route('charity')}}" class="abd-btn btn-block">Read More</a>
                    </article>
                </div>
                <div class="col-md-6">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($partners as $partner)
                                <li class="text-center">
                                    <h3>{{$partner->organization}}</h3>
                                    <a href="{{$partner->url}}" target="_blank">
                                    @php
		                            		$partner_image = isset($partner->cdnimage) ? $partner->cdnimage : '';
													if(trim($partner_image) == ""){
														$partner_image = isset($partner->avatar) ? asset($partner->avatar) : '';
													}
		                            	@endphp
                                    <img src="{{$partner_image}}" alt="{{$partner->organization}}" style="width:550px;margin:auto;display: block!important;height: 309px;">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our partner -->

    <section class="abd-donation-wrapper white-bg abd-bg abd-pt abd-pb">
        <div class="section-title">
            Thanks To Our Donors
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider donation-slider">
                        @foreach($donors as $donor)
                            <div class="donation">
                            		 @php
	                            		$donor_image = isset($donor->cdnimage) ? $donor->cdnimage : '';
												if(trim($donor_image) == ""){
													$donor_image = isset($donor->avatar) ? asset($donor->avatar) : '';
												}
	                            	@endphp
                                <img src="{{ isset($donor_image) && trim($donor_image) != '' ? $donor_image  : asset('images/no-person.png') }}" />
                                <span class="donation-name">{{ $donor->name }}</span>
                                <span class="donation-partner-name">{{ $donor->partner->organization }}</span>
                                <div class="donation-price">
                                    <span class="donation-caption">Donated</span>
                                    <span class="price">A${{ $donor->partner_income }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- testimonial -->
    <section class="abd-testimonial-wrapper abd-pt abd-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center abd-pb2">
                    <div class="abd-lead">
                        <h2>Our Clients Comments</h2>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div id="abd-testimonial">
                        @foreach($comments as $comment)
                        <article class="abd-single-testimonial">
                            @if($comment->rider_id != null)
                            <div class="abd-testimonial-fig">
                            	 @php
	                         		

											if(isset($comment->rider->cdnimage)){
												$rider_image = $comment->rider->cdnimage ;
                                                
											} else {

                                                $rider_image = isset($comment->rider->avatar) ? asset($comment->rider->avatar) : '';
                                            }
                         	   @endphp 
                                <img src="{{isset($rider_image) ? asset($rider_image) : asset('images/user.png')}}" alt="{{$comment->rider->name}}" >
                            </div>
                            <div class="abd-testimonial-caption">
                                <p>{{$comment->content}}</p>
                                <h3>{{$comment->rider->name}}</h3>
                                <h4>Rider</h4>
                            </div>
                            @endif
                            @if($comment->driver_id != null)
                            <div class="abd-testimonial-fig">
                             @php
                         		$driver_image = isset($comment->driver->cdnimage) ? $donor->driver->cdnimage : '';
										if(trim($driver_image) == ""){
											$driver_image = isset($comment->driver->avatar) ? asset($comment->driver->avatar) : '';
										}
                         	@endphp
                                <img src="{{isset($driver_image) ? $driver_image : asset('images/user.png')}}" alt="{{$comment->driver->name}}">
                            </div>
                            <div class="abd-testimonial-caption">
                                <p>{{$comment->content}}</p>
                                <h3>{{$comment->driver->name}}</h3>
                                <h4>Driver</h4>
                            </div>
                            @endif
                            @if($comment->partner_id != null)
                           
                             @php
                         		$partner_image = isset($comment->partner->cdnimage) ? $donor->partner->cdnimage : '';
										if(trim($partner_image) == ""){
											$partner_image = isset($comment->partner->avatar) ? asset($comment->partner->avatar) : '';
										}
                         	@endphp
                           
                            <div class="abd-testimonial-fig">
                                <img src="{{isset($partner_image) ? $partner_image : asset('images/user.png')}}" alt="{{$comment->partner->name}}">
                            </div>
                            <div class="abd-testimonial-caption">
                                <p>{{$comment->content}}</p>
                                <h3>{{$comment->partner->name}}</h3>
                                <h4>Partner</h4>
                            </div>
                            @endif
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial /end -->

    {{-- <section class="abd-apps-store abd-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center abd-pb2">
                    <div class="abd-lead">
                        <h2>GET A FARE ESTIMATE</h2>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row pb-3">
                            <div class="col-md-12">
                                <input class="form-control newsignup" id="txtDestination" name="txtDestination" placeholder="Enter Pickup Location" value="" required="" type="text" autocomplete="off">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-md-12">
                                <input class="form-control newsignup" id="txtSource" name="txtSource" placeholder="Enter Destination" value="" required="" type="text" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pb-3">
                                <button type="button" class="btn btn-get-fare form-control" onclick="GetRoute()">Get A Fare</button>
                            </div>
                            <div class="col-md-4 pb-3">
                               <button type="button" class="btn btn-get-fare-clear form-control" onclick="clearFare()">Clear Fare</button>
                            </div>
                            <div class="col-md-4 pb-3" style="text-align: center;">
                                <h3 id="fare_distance" style="display: block; font-size: 12px;"></h3>
                            </div>
                        </div>
                        <div id="fare_show" style="min-height: 350px;width: 100%"></div>
                    </div>
                </div>
                <div id="dvMap" class="col-lg-6" style="width: 100%; height: 500px; position: relative; overflow: hidden; display: none"></div>
            </div>
        </div>
    </section> --}}
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('services.googlemap.apikey')}}&map_ids=af9935eed520f3ec&libraries=places"></script>
    <script src="{{asset('js/camroll_slider.js')}}"></script>
    <script src="{{asset('plugins/flexslider/jquery.flexslider.js')}}"></script>
    <script>
        $("#my-slider").camRollSlider();
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();

        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
            // $(document.getElementById('origin-input')).geocomplete({
            //     country: 'AU'
            // });
        });

        var service_types = [];
        var params = {
            mode: 'getService_types'
        };

        $.ajax({
            url: '{{route('getFarecard')}}',
            // type: 'POST',
            // data: $.param(params),
            // dataType: 'json',
            success: function(data) {
                service_types = data;
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert( msg );
            }
        });

        function clearFare() {
            $("#txtDestination").val("");
            $("#txtSource").val("");
            $("#fare_distance").html("");
            $("#fare_show").html("");
            $("#dvMap").html("");
        }

        function GetRoute() {
            var mapOptions = {
                zoom: 7,
                center: { lat: -34.425072, lng: 150.893143 },
                mapId: 'af9935eed520f3ec'
            };
            $("#dvMap").show();
            map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            marker = new google.maps.Marker({
                map: map,
                icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
            });

            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("txtSource").value;
            destination = document.getElementById("txtDestination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var distance_val = response.rows[0].elements[0].distance.value/1000;
                    var duration = response.rows[0].elements[0].duration.value/60;
                    var durationText = response.rows[0].elements[0].duration.text;
                    document.getElementById('fare_distance').innerHTML = "distance :  " + distance + "<br>"+ "duration :  "+durationText;

                    str = '<ul style="width:100%">';
                    for(i=0;i<service_types.length;i++){
                        //console.log("sevice type is:");
                        //console.log(service_types);
                        /*fare = duration*parseFloat(service_types[i].price_per_min);
                        fare1 = parseInt((fare*0.9<service_types[i].min_fare)?service_types[i].min_fare:fare*0.9);
                        fare2 = parseInt((fare*1.1<service_types[i].min_fare)?service_types[i].min_fare:fare*1.1);*/
                        fare = ((distance_val*parseFloat(service_types[i].base_price_per_unit))+parseFloat(service_types[i].base_distance_price+service_types[i].govt_charge+service_types[i].gst_charge));
                        fare1 = parseInt(fare*0.9);
                        fare2 = parseInt(fare*1.1);
                        if(fare == 0)
                            display_fare = 0;
                        else
                            display_fare = fare1 + "-" + fare2;
                        imagePath  = "{{asset('')}}"+service_types[i].image;
                        console.log(imagePath);
                        if(service_types[i].number_seat > 1)
                            str_seat = "1~"+service_types[i].number_seat+" people";
                        else
                            str_seat = service_types[i].number_seat+" people";
                        str += '<li class="row" style="padding:2px;width:100%;">' +
                            '<div class="col-md-2 col-sm-2 col-xs-2">' +
                            '<img height="40" width="60" src="'+imagePath+'">' +
                            '</div>' +
                            '<div class="col-md-10 col-xs-10 col-sm-10" style="height: 40px;">' +
                                '<div class="row">'+
                                    '<div class="col-md-4">'+
                                        '<span style="font-size: 18px; line-height: 40px;">'+service_types[i].name+'</span>' +
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                        '<span class="text-right" style="font-size: 15px; line-height: 30px;">A$ '+display_fare+'</span>' +
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                        '<span class="text-right" style="font-size: 15px; line-height: 30px;">'+str_seat+'</span>' +
                                    '</div>'+
                                '</div>'+
                            '</div></li>';
                    }

                    str += '<li><p class="muted" style="font-size:15px;">*Sample Rider fares are estimates only and do not reflect variations due to discounts, traffic delays or other factors. Flat rates and minimum fares may apply. Actual Rider fares may vary. Rates used to calculate partner fares are published at partners.turvy.net and require an active partner account to view.</p></li></ul>';
                    $("#fare_show").html("");
                    $("#fare_show").append(str);
                    // var dvDistance = document.getElementById("dvDistance");
                    // dvDistance.innerHTML = "";
                    //  dvDistance.innerHTML += "Distance: " + distance + "<br />";
                    //  dvDistance.innerHTML += "Duration:" + duration;
                } else {
                    // alert("Unable to find the distance via road.");
                }
            });
        }
    </script>
@endsection
