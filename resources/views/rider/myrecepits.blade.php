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

                        <div class="car_nm_desc1">

                            <h3 class="ride_date_time">{{$ride['booking_date']}} , {{$ride['booking_time']}}</h3>

                            <p class="crn_number">{{$ride['servicename']}}  </p>

                            <p class="pick_drop_location">

                                <img src="http://www.thepointless.com/images/greendot.jpg" style="margin:0px 4px 0px 0px" alt="" width="10px" height="10px">

                                {{$ride['origin']}}

                            </p>



                            <p class="pick_drop_location">

                                <img src="http://www.thepointless.com/images/reddot.jpg" style="margin:0px 4px 0px 0px" width="10px" height="10px" alt="">

                                {{$ride['destination']}}

                            </p>
                            <table cellpadding="2" cellspacing="3">
                            	<tr>
                            		<td><p class="crn_number" style="padding: 10px">Payment Method <strong>{{ $ride['paymenthod'] }} </strong></p>  </td>
                            		<td><p class="crn_number" style="padding: 10px">Paid Amount <strong>A${{ $ride['total'] }}</strong></p>  </td>
                            	</tr>
                            	<tr>
                            	<td colspan="2"><a href="{{route('rider.receipt',$ride['id'])}}" class="btn btn-primary navbar-btn navbar-left">View Receipts</a></td>
                            	</tr>
                            </table>

                        </div>


                            <div class="clear"></div>

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