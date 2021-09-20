@extends('rider.layouts.app')

@section('style')

    <style>

        .clear{clear:both !important;}



        .tab-content a{ color:#222; font-style:normal;}

        .tab-content a:hover{ text-decoration:none; color:#222;}



        @media screen and (max-height: 450px) {

            .sidenav {padding-top: 15px;}

            .sidenav a {font-size: 18px;}

        }

    </style>

@endsection



@section('content')

    <div class="car_type_full_dlts">

        <div class="">

            @forelse($rides as $ride)

                <a class="bnr_a" href="#">



                    <div class="car_type_dtls">



                        <div class="car_type_img">

                            <img src="{{asset($ride->servicetype->image)}}" width="40px" height="40px" alt="">

                        </div>

                        <div class="car_nm_desc1">

                            <h3 class="ride_date_time">{{$ride->booking_date}} , {{$ride->booking_time}}</h3>

                            <p class="crn_number">{{$ride->servicetype->name}} CRN {{$ride->id}} </p>

                            <p class="pick_drop_location">

                                <img src="http://www.thepointless.com/images/greendot.jpg" style="margin:0px 4px 0px 0px" alt="" width="10px" height="10px">

                                {{$ride->origin}}

                            </p>



                            <p class="pick_drop_location">

                                <img src="http://www.thepointless.com/images/reddot.jpg" style="margin:0px 4px 0px 0px" width="10px" height="10px" alt="">

                                {{$ride->destination}}

                            </p>



                        </div>



                        <div class="car_type_rgt1">

                            <?php

                            switch ($ride->status){

                                case "0":

                                    echo nl2br("<font color='green'>New_Booking</font>");

                                    break;

                                case "1":

                                    echo nl2br("<font color='red'>Cancelled_By_User</font>");

                                    break;

                                case "2":

                                    echo nl2br("<font color='green'>Accepted_by_Driver</font>  \n ".$ride->updated_at);

                                    break;

                                case "3":

                                    echo nl2br("<font color='red'>Cancelled_by_driver</font> \n ".$ride->updated_at);

                                    break;

                                case "4":

                                    echo nl2br("<font color='green'>Driver_Arrived</font> \n ".$ride->updated_at);

                                    break;

                                case "5":

                                    echo nl2br("<font color='green'>Trip_Started</font> \n ".$ride->updated_at);

                                    break;

                                case "6":

                                    echo nl2br("<font color='green'>Trip_Book_By_Admin<font>  \n ".$ride->updated_at);

                                    break;

                                case "7":

                                    echo nl2br("<font color='red'>Cancelled_by_driver</font> \n ".$ride->updated_at);

                                    break;

                                case "8":

                                    echo nl2br("<font color='red'>Trip_Cancel_By_Admin</font> \n ".$ride->updated_at);

                                    break;

                                default:

                                    echo "----";

                            }

                            ?>



                            <div class="clear"></div>



                            @if($ride->driver_id != 0)



                                @if($ride->driver->picture != "")

                                    <img class="drvr_img" src="{{asset($ride->driver->picture)}}" width="40" height="40"/>

                                @else

                                    <img class="drvr_img" src="http://soul-fi.ipn.pt/wp-content/uploads/2014/09/user-icon-silhouette-ae9ddcaf4a156a47931d5719ecee17b9.png" width="40" height="40"/>

                                @endif



                            @else



                                <p style="color: red; font-size: 9px;">Driver Not Assign</p>



                            @endif

                        </div>



                        <div class="clear"></div>



                    </div>

                </a>

            @empty

                <div class="list-group-item">

                    <hr>

                    <center>

                        <i style="padding:0px 0px 0px 0px;">

                            <font color="#6495ed" size="3">

                                <a href="{{route('rider.booking')}}">No rides til now , Please Do a Ride now..</a>

                            </font>

                        </i>

                    </center>

                    <hr>

                </div>

            @endforelse



        </div>

    </div>

@endsection