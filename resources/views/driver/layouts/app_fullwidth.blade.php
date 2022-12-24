<!doctype html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

    <meta name="description" content="Scootaride">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Turvy Family</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('driver-panel/css/custom.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('driver-panel/css/bootstrap.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('driver-panel/css/responsive.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('driver-panel/css/owl.carousel.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('driver-panel/css/font-awesome.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('driver-panel/css/material.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('driver-panel/css/bootstrap-material-datetimepicker.css')}}"/>

    <style>

        .navbar-default {

            background-color: #226CA8!important;

        }

        .btn-primary {

            background-color: #003C77!important;

        }

        select[disabled]{

            background-color: #eee !important;

            -webkit-appearance: none;

            appearance: none;

        }



    </style>

    @yield('style')

</head>

<body>

<div id="wrapper">



    @include('driver.partials.header')



    @php

        $driver = Auth::guard('driver')->user();

		$driver_rate = $driver->rate;

        $route = \Request::route()->getName();

    @endphp



    <section class="mt-30">

        <div class="container-fluid" style="margin:0 40px 0 40px;">

            <div class="row mt-60 mb-100 pt-20 pb-20 profile_content">

                <div class="tabs-vertical-env">

                 

                    <div class="tab-content col-md-12">

                        <nav class="navbar navbar-default" style="background-color: #e7e7e7;">

                            <div class="container-fluid" style="padding-left: 0px;">

                                <ul class="nav navbar-nav">

                                    <li @if($route=='driver.profile') class="active" @endif><a href="{{route('driver.profile')}}">Profile</a></li>

                                    <li @if($route=='driver.inbox') class="active" @endif><a href="{{route('driver.inbox')}}">Inbox</a></li>

                                    <li @if($route=='driver.trips') class="active" @endif><a href="{{route('driver.trips')}}">Rides</a></li>

                                    <li @if($route=='driver.payments') class="active" @endif><a href="{{route('driver.payments')}}">Earning</a></li>

                                    <li @if($route=='driver.document') class="active" @endif><a href="{{route('driver.document')}}">Documents</a></li>

                                    <li @if($route=='driver.bank') class="active" @endif><a href="{{route('driver.bank')}}">Bank</a></li>

                                    <li @if($route=='driver.changepassword') class="active" @endif><a href="{{route('driver.changepassword')}}">Change Password</a></li>

                                    <li @if($route=='driver.support') class="active" @endif><a href="{{route('driver.support')}}">Support</a></li>

                                    <li @if($route=='driver.abn') class="active" @endif><a href="{{route('driver.abn')}}">ABN</a></li>
                                      
                                    <li @if($route=='driver.vehicle') class="active" @endif><a href="{{route('driver.vehicle')}}">Vehicle Details</a></li>

                                    <li @if($route=='driver.comment') class="active" @endif><a href="{{route('driver.comment')}}">Comment</a></li>

                                </ul>

                                <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-primary navbar-btn navbar-right" style="background-color: #226CA8">Logout</a>
                                
                                <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" style="display: none;">
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



    @include('driver.partials.footer')



</div>



<script type="text/javascript" src="{{asset('driver-panel/js/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('driver-panel/js/material.min.js')}}"></script>

<script type="text/javascript" src="{{asset('driver-panel/js/moment-with-locales.min.js')}}"></script>

<script type="text/javascript" src="{{asset('driver-panel/js/bootstrap-material-datetimepicker.js')}}"></script>

<script type="text/javascript" src="{{asset('driver-panel/js/jquery-1.11.3.min.js')}}"></script>

<script type="text/javascript" src="{{asset('driver-panel/js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="{{asset('driver-panel/js/custom-script.js')}}"></script>



@yield('script')



</body>



</html>
