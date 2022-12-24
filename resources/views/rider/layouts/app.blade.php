<!doctype html>

<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('rider-panel/css/style.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('rider-panel/css/custom.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('rider-panel/css/font-awesome.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('rider-panel/css/bootstrap.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('driver-panel/css/material.min.css')}}"/>

    <style>
        body {
            position: relative;
            overflow-x: hidden;
        }

        body,
        html {
            height: 100%;
        }

        .navbar {
            border-radius: 0px !important;
        }


        .navbar-nav > li > a {
            color: #fff !important;
        }

        .nav .open > a,
        .nav .open > a:hover,
        .nav .open > a:focus {
            background-color: transparent;
        }
        /*-------------------------------*/
        /*           Wrappers            */
        /*-------------------------------*/

        .clear {
            clear: both !important;
        }

        .btn-primary {
            background-color: #003C77!important;
            color: rgba(255, 255, 255, .84)!important;
            position: relative;
            padding: 8px 30px;
            border: 0;
            margin: 10px 1px;
            cursor: pointer;
            text-transform: uppercase;
            text-decoration: none;
            transition: background-color .2s ease, box-shadow .28s cubic-bezier(.4, 0, .2, 1);
            outline: none!important;
        }

        .bnr_fa_input {}

        .btn-book {
            background-color: #226CA8;
            color: #fff;
            width: 100%;
            height: 50px;
        }

        .btn-clear {
            background-color: #f0ad4e;
            color: #fff;
            width: 100%;
            height: 50px;
        }

        .btn-clear:hover {
            color: #fff;
        }

        .btn-book:hover {
            color: #fff;
        }

        .pl-0 {
            padding-left: 0;
        }

        .pr-0 {
            padding-right: 0;
        }

        .text-bold {
            font-weight: bold;
        }
    </style>

    @yield('style')

</head>

<body>
    <div id="wrapper">
        @include('rider.partials.header')
        @php
            $rider = Auth::guard('rider')->user();
            $route = \Request::route()->getName();
           
            $rider_rating = \App\RiderRating::where('rider_id',$rider->id)->avg('rating');
            $rider_rating = round($rider_rating);
            $remaining_rt = 5-$rider_rating;
            //echo "RATING -- ".$rider_rating;
            
        @endphp
        <section class="mt-30">

            <div class="container fluid" style="width: 100%; padding-left: 10%; padding-right: 10%;">

                <div class="row mt-60 mb-100 pt-20 pb-20 profile_content">


                    <div class="tabs-vertical-env">

                        <div class="col-md-3 hidden-xs">

                            <ul class="nav tabs-vertical left_tab">

                                @if($rider->avatar == '')

                                <li class="driver_profile"> <img class="col-md-4 col-sm-4 col-xs-4" width="100px" src="{{asset('images/no-person.png')}}" style="border-radius: 0px;" /> @else

                                    <li class="driver_profile"> <img class="col-md-4 col-sm-8 col-xs-8" width="100px" src="{{asset($rider->avatar)}}" style="border-radius: 0px;"> @endif

                                        <div class="col-md-8 col-sm-8 col-xs-8 driver_info">

                                            <div class="driver_name">{{$rider->first_name}} {{$rider->last_name}}</div>

                                            <div class="driver_car_number">{{$rider->mobile}}</div>

                                            <div class="driver_rating">
                                            			@for ($i = 0; $i < $rider_rating; $i++)
                                            			<i class="fa fa-star"></i>
                                            			@endfor
                                            			@for ($i = 0; $i < $remaining_rt; $i++)
                                            			<i class="fa fa-star-o"></i>
                                            			@endfor
                                            				
                                            			</div>

                                        </div>

                                        <div class="clear"></div>

                                    </li>

                            </ul>

                        </div>

                        <div class="tab-content col-md-9">

                            <nav class="navbar navbar-default" style="background-color: #e7e7e7;background-color: #226CA8; color: #fff;">

                                <div class="container-fluid" style="padding-left: 0px;">

                                    <ul class="nav navbar-nav">

                                        <li @if($route=='rider.dashboard' ) class="active" @endif><a href="{{route('rider.dashboard')}}">Profile</a></li>

                                        <li @if($route=='rider.booking' ) class="active" @endif><a href="{{route('rider.booking')}}">Book Your Ride</a></li>

                                        <li @if($route=='rider.trips' ) class="active" @endif><a href="{{route('rider.trips')}}">My Rides</a></li>

                                        <li @if($route=='rider.payments' ) class="active" @endif><a href="{{route('rider.payments', 'today')}}">My payments</a></li>
                                        
                                        <li @if($route=='rider.myrecepits' ) class="active" @endif><a href="{{route('rider.myrecepits','1')}}">My Receipts</a></li>

                                        <li @if($route=='rider.charity' ) class="active" @endif><a href="{{route('rider.charity')}}">My Charity</a></li>

                                        <li @if($route=='rider.ratecard' ) class="active" @endif><a href="{{route('rider.ratecard')}}">Rate Card</a></li>

                                        <li @if($route=='rider.wallet' ) class="active" @endif><a href="{{route('rider.wallet')}}">Wallet</a></li>

                                        <li @if($route=='rider.support' ) class="active" @endif><a href="{{route('rider.support')}}">Support</a></li>

                                        <li @if($route=='rider.comment' ) class="active" @endif><a href="{{route('rider.comment')}}">Comment</a></li>

                                    </ul>

                                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-primary navbar-btn navbar-right" style="background-color: #226CA8">Logout</a>
                                    <form id="logout-form" action="{{ route('rider.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>

                            </nav>

                            <div class="tab-content left_tab" style="border: 1px solid #eee;min-height:500px;">

                                @yield('content')

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        @include('rider.partials.footer')

    </div>

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1qYGiK9hiBs6q6mkYdydTKDovdU2C-wE&libraries=places"></script>

    @yield('script')

</body>

</html>
