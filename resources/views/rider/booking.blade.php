@extends('rider.layouts.app')

@section('content')



    <div class="tab-content" style="padding: 10px;">

        <div class="tab-pane fade in active" id="tab1">



            <!-- <h3 align="center"> Your everyday travel partner<br><br>AC Cabs for point to point travel</br></br></h3> -->

            <form name="myForm" id="myForm" action="{{route('rider.book')}}" method="post">



                <a class="bnr_a" href="#">

                    <div class="bnr_input_group1">

                        <span class="bnr_span1">FROM</span>

                        <input  type="text" class="bnr_input1 bnr_fa_input" required onkeypress="initialize()"  id="origin-input" name="origin-input"  placeholder="Enter Pickup Location"  autocomplete="" autofocus aria-required="true">

                        </span>

                    </div>

                </a>



                <a class="bnr_a" href="#">

                    <div class="bnr_input_group1">

                        <span class="bnr_span1">TO</span>

                        <input  type="text" class="bnr_input1 bnr_fa_input" required onkeypress="initialize1()"  id="destination-input" name="destination-input"  placeholder="Enter Drop Location"  autocomplete="off" autofocus aria-required="true">

                        </span>

                    </div>

                </a>



                <div class="bnr_input_group1" id="ifYes11">

                    <span class="bnr_span1">Ride Type</span>

                    <span class="bnr_input1">

                        <select class="bnr_select1" id="rideType" name="rideType" required>

                            <option value="" selected>Select Service Type</option>

                            @foreach($servicetypes as $servicetype)

                                <option value="{{$servicetype->id}}">{{$servicetype->name}}</option>

                            @endforeach

                        </select>

                        </span>



                </div>



                <div class="bnr_input_group1" id="ifYes11">

                    <span class="bnr_span1">WHEN</span>

                    <span class="bnr_input1">

                        <select class="bnr_select1" id="sel1" name="sel1" onchange="yesnoCheck(this);update(this.value);">

                            <option value="now" selected>Now</option>

                            <option value="other">Schedule for Later</option>

                        </select>

                        </span>



                </div>





                <div id="ifYes" style="display: none; margin-bottom: 5px;">



                    <div class="bnr_input_group1">



                        <?php

                        $days   = [];

                        $period = new DatePeriod(new DateTime(), new DateInterval('P1D'), 15);

                        ?>

                        <select name='date' class='bnr_select2_1' name='date' id='date' onchange='update_date(this.value);'>

                            @foreach ($period as $day)

                                <?php

                                $days[] = $day->format('D , d M');

                                ?>



                                @for($i=0; $i< sizeof($days); $i++)



                                    <?php

                                    printf('<option value="%s">%s</option>',$days[$i], $days[$i]);

                                    ?>

                                @endfor



                            @endforeach

                        </select>



                        <?php

                        $start=strtotime('00:00');

                        $end=strtotime('23:45');

                        echo '<select  class="bnr_select2_2" name="time" id="time" onchange="update_time(this.value);">';

                        for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+15*60) {



                            if(time() >= $halfhour){

                                printf('<option value="%s" selected>%s</option>',date('g:i a',$halfhour), date('g:i a',$halfhour));

                            }else{

                                printf('<option value="%s">%s</option>',date('g:i a',$halfhour), date('g:i a',$halfhour));

                            }

                        }

                        echo "</select>";

                        ?>



                    </div>



                </div>



                <div class="row">

                    <div class="form-group col-md-12">

                        <div class="col-md-4 pl-0">

                            <input type="button" value="Get A Fare" class="btn btn-book" onclick="GetRoute()" style="">

                        </div>

                        <div class="col-md-4">

                            <input type="button" class="btn btn-clear" onclick="clearFare()" value="Clear Fare">

                        </div>



                        <div id="fare_distance" class="col-md-4 pr-0" style="font-size: 16px; line-height: 25px;"></div>

                    </div>

                </div>





                {{--<div id="fare_distance" class="form-group" style="width:100%"></div>--}}



                <div id="fare_show" class="form-group" style="width: 100%"></div>



            </form>



        </div>

    </div>

    <div id="dvMap" class="form-group" style="width: 100%; height: 700px; position: relative; overflow: hidden;"></div>



@endsection()



@section('script')

<script type="text/javascript" src="{{asset('admin-css/bootstrap/js/bootstrap.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.googlemap.apikey')}}&map_ids=af9935eed520f3ec&libraries=places"></script>

<script>

    $(function() {

        var trigger = $('.hamburger'),

            overlay1 = $('.overlay1'),

            isClosed = false;



        trigger.click(function() {

            hamburger_cross();

        });





        function hamburger_cross() {



            if (isClosed == true) {

                overlay1.hide();

                trigger.removeClass('is-open');

                trigger.addClass('is-closed');

                isClosed = false;

            } else {

                overlay1.show();

                trigger.removeClass('is-closed');

                trigger.addClass('is-open');

                isClosed = true;

            }

        }



        $('[data-toggle="offcanvas"]').click(function() {

            $('#wrapper1').toggleClass('toggled');

        });

    });



    function initialize() {

        var input = document.getElementById('origin-input');



        var autocomplete = new google.maps.places.Autocomplete(input);

        // google.maps.event.addListener(autocomplete, 'place_changed', function() {

        //     var place = autocomplete.getPlace();

        //

        //     document.getElementById('lat').value = place.geometry.location.lat();

        //     document.getElementById('lon').value = place.geometry.location.lng();

        //

        // });

    }

    google.maps.event.addDomListener(window, 'load', initialize);



    function initialize1() {

        var input = document.getElementById('destination-input');

        var autocomplete = new google.maps.places.Autocomplete(input);

    }

    google.maps.event.addDomListener(window, 'load', initialize);



    function yesnoCheck(that) {

        if (that.value == "other") {

            document.getElementById("ifYes").style.display = "block";

        } else if (that.value == "now") {

            document.getElementById("ifYes").style.display = "none";

        } else {

            document.getElementById("ifYes").style.display = "none";

        }

    }



    function update(val) {

        $.ajax({

            type: "POST",

            url: "",

            data: "mode_id=" + val,

            success: function(data) {



            }

        });

    }



    function update_date(val) {

        $.ajax({

            type: "POST",

            url: "",

            data: "mode_id=" + val,

            success: function(data) {



            }

        });

    }



    function update_time(val) {

        $.ajax({

            type: "POST",

            url: "",

            data: "mode_id=" + val,

            success: function(data) {}

        });

    }



    var source, destination;



    var directionsDisplay;



    var directionsService = new google.maps.DirectionsService();



    google.maps.event.addDomListener(window, 'load', function () {



        new google.maps.places.SearchBox(document.getElementById('origin-input'));



        new google.maps.places.SearchBox(document.getElementById('destination-input'));



        directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });







        // $(document.getElementById('origin-input')).geocomplete({

        //

        //     country: 'AU'

        //

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



        $("#fare_distance").html("");



        $("#fare_show").html("");



        $("#dvMap").html("");



    }



    function GetRoute() {



        var mumbai = new google.maps.LatLng(18.9750, 72.8258);



        var mapOptions = {
            zoom: 7,
            center: { lat: -34.425072, lng: 150.893143 },
            mapId: 'af9935eed520f3ec'
        };



        map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);



        marker = new google.maps.Marker({



            map: map,



            icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'



        });



        directionsDisplay.setMap(map);



        directionsDisplay.setPanel(document.getElementById('dvPanel'));







        //*********DIRECTIONS AND ROUTE**********************//



        source = document.getElementById("origin-input").value;



        destination = document.getElementById("destination-input").value;







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



        var image_base_url = "{{asset('')}}";



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



                //console.log("durantion value is:" + distance_val+"km");



                str = '<ul style="width:100%">';



                for(i=0;i<service_types.length;i++){

                    //console.log("sevice type is:");



                    //console.log(service_types);



                    /*fare = duration*parseFloat(service_types[i].price_per_min);



                    fare1 = parseInt((fare*0.9<service_types[i].min_fare)?service_types[i].min_fare:fare*0.9);



                    fare2 = parseInt((fare*1.1<service_types[i].min_fare)?service_types[i].min_fare:fare*1.1);*/

                    estimated_surchages = calcEstimatedSurchages(service_types[i], distance_val, duration);

                    fare = totalEstimate(service_types[i], distance_val, duration);



                    fare1 = parseInt(fare) + 15;


                    if(fare == 0)
                        display_fare = 0;
                    else
                        display_fare = fare + '-' + fare1;



                    str += '<li class="row" style="padding:2px;width:100%;">' +

                        '<div class="col-md-3 col-sm-2 col-xs-2">' +

                        '<img height="40" width="40" src="'+image_base_url + service_types[i].image+'">' +

                        '</div>' +

                        '<div class="col-md-3 col-xs-10 col-sm-10" style="height: 40px;">' +

                        '<span style="font-size: 18px; line-height: 40px;">'+service_types[i].name+'</span>' +

                        '</div>'+

                        '<div class="col-md-3 col-xs-10 col-sm-10">'+

                        '<span style="font-size: 15px; line-height: 30px;">A$ '+display_fare+'</span>' +

                        '</div>'+

                        '<div class="col-md-3 col-xs-10 col-sm-10">'+

                        '<span style="font-size:20px;"><a data-toggle="modal" data-target="#farecard-modal-'+service_types[i].id+'"><i class="fa fa-info-circle"></i></a></span>' +

                        '</div></li>';

                    if(service_types[i].number_seat > 1)

                        str_seat = "1~"+service_types[i].number_seat;

                    else

                        str_seat = service_types[i].number_seat;

                    str += '<div id="farecard-modal-'+service_types[i].id+'" class="modal fade" role="dialog">' +

                        '<div class="modal-dialog modal-lg">' +

                        '<div class="modal-content">' +

                        '<div class="modal-header">' +

                        '<button type="button" class="close" data-dismiss="modal">&times;</button>' +

                        '<h4 class="modal-title">'+service_types[i].name+'</h4>' +

                        '</div>' +

                        '<div class="modal-body">' +

                        '<div class="container-fluid" style="font-size:17px;line-height:2em;">' +

                            '<div class="row">'+

                                '<div class="col-md-6 text-left">Number of riders</div>'+

                                '<div class="col-md-6 text-right">'+str_seat+'</div>'+

                            '</div>'+

                            '<hr/>'+

                            '<div class="row">'+

                                '<div class="col-md-8">'+

                                    '<div class="row">'+

                                        '<div class="col-md-6 text-left">Base fare</div>'+

                                        '<div class="col-md-6 text-right">A$'+parseFloat(service_types[i].base_ride_distance_charge).toFixed(2)+'</div>'+

                                    '</div>'+

                                    '<div class="row">'+

                                        '<div class="col-md-6 text-left">Minimum fare</div>'+

                                        '<div class="col-md-6 text-right">A$'+parseFloat(service_types[i].minimum_fare).toFixed(2)+'</div>'+

                                    '</div>'+

                                    '<div class="row">'+

                                        '<div class="col-md-6 text-left">Per-km</div>'+

                                        '<div class="col-md-6 text-right">A$'+parseFloat(service_types[i].price_per_unit).toFixed(2)+'</div>'+

                                    '</div>'+

                                    '<div class="row">'+

                                        '<div class="col-md-6 text-left">Per-minute</div>'+

                                        '<div class="col-md-6 text-right">A$'+parseFloat(service_types[i].price_per_minute).toFixed(2)+'</div>'+

                                    '</div>'+

                                    '<div class="row">'+

                                        '<div class="col-md-6 text-left">Estimated Surcharges</div>'+

                                        '<div class="col-md-6 text-right">A$'+parseFloat(estimated_surchages).toFixed(2)+'</div>'+

                                    '</div>';

                                    str +=

                                    '<div class="row">'+

                                        '<div class="col-md-6 text-left">Booking fee</div>'+

                                        '<div class="col-md-6 text-right">A$'+parseFloat(service_types[i].booking_charge).toFixed(2)+'</div>'+

                                    '</div>'+

                                '</div>'+

                            '</div>'+

                            '<hr/>'+

                            '<div class="row">'+

                                '<div class="col-md-3">'+

                                    '<button class="btn btn-primary">Request '+service_types[i].name+' <i class="fa fa-arrow-right"></i></button>'+

                                '</div>'+

                            '</div>'+

                            '<div class="row">'+

                                '<div class="col-md-12">'+

                                    '<p>You agree to pay the fare shown at booking. If your route or destination changes on trip, your fare many change based on the rates above and other applicable taxes, tolls, charges and adjustments. US Partners: Rates used to calculate partner fares are published at partners. turvy.net and require an active partner account to view. Additional wait time charges may apply to your trip if the driver has waited 1 minute 30 seconds. A$3.00 per minute.</p>'+

                                '</div>'+

                            '</div>'+

                        '</div>'+

                        '</div>' +

                        '</div>' +

                        '</div>' +

                        '</div>';



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

    function calcEstimatedSurchages(fare, km, minute)
    {
        var nsw_gtl_charge = parseFloat(fare.nsw_gtl_charge);
        var nsw_ctp_charge = parseFloat(fare.nsw_ctp_charge) * km;
        var fuel_charge = parseFloat(fare.fuel_surge_charge) * km;
        var baby_seat_charge = fare.baby_seat_charge === null ? 0 : parseFloat(fare.baby_seat_charge);
        var pet_charge = fare.pet_charge === null ? 0 : parseFloat(fare.pet_charge);
        var total = nsw_gtl_charge + nsw_ctp_charge + fuel_charge + baby_seat_charge + pet_charge;
        return parseInt(total);
    }

    function totalEstimate(fare, km, minute)
    {
        var base_km = parseFloat(km) - parseFloat(fare.base_ride_distance);
        var base_cost_km = base_km * parseFloat(fare.price_per_unit);
        var base_cost_minute = fare.price_per_minute === null ? 0 : minute * parseFloat(fare.price_per_minute);
        var base_cost = parseFloat(fare.base_ride_distance_charge);
        var minimum_fare = parseFloat(fare.minimum_fare);
        var nsw_gtl_charge = parseFloat(fare.nsw_gtl_charge);
        var nsw_ctp_charge = parseFloat(fare.nsw_ctp_charge) * km;
        var fuel_charge = parseFloat(fare.fuel_surge_charge) * km;
        var booking_charge = parseFloat(fare.booking_charge);
        var baby_seat_charge = fare.baby_seat_charge === null ? 0 : parseFloat(fare.baby_seat_charge);
        var pet_charge = fare.pet_charge === null ? 0 : parseFloat(fare.pet_charge);
        var subtotal = base_cost_km + base_cost_minute + base_cost + minimum_fare + nsw_gtl_charge + nsw_ctp_charge + fuel_charge + booking_charge + baby_seat_charge + pet_charge;
        var gst = parseFloat(fare.gst_charge);
        var total = subtotal * (1 + gst / 100);
        return parseInt(total);
    }


</script>



@endsection
