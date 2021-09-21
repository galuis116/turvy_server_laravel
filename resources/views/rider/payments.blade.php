@extends('rider.layouts.app')



@section('style')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

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

    <div style="padding:10px;">

        <div >

            <select id="select_driver_earning" name="select_rider_payment" onchange="select_payment(this.value)" class="form-control">

                <option value="today">Today</option>

                <option value="this_week">This Week</option>

                <option value="this_month">This Month</option>

            </select>

        </div>







        <div class="clear"></div>

        <div style="margin-top: 25px !important;">

            <table id="example" class="display" style="width:100%">

                <thead>

                <tr>

                    <th>Ride begin location</th>

                    <th>Ride End Location</th>

                    <th>Ride Begin Time</th>

                    <th>Ride End Time</th>

                    <th>Driver</th>

                    <th>Partner Contribution</th>

                    <th>Paid Amount</th>

                    <th>Paid Date</th>

                    <th>Rewards</th>

                </tr>

                </thead>

                <tbody>

                @foreach($payments as $payment)

                <tr>

                    <td></td>

                    <td></td>

                    <td></td>

                    <td></td>

                    <td></td>

                    <td></td>

                    <td>{{ $payment->total_time * $payment->time_price }}</td>

                    <td>{{ date("Y-m-d" , strtotime($payment->updated_at)) }}</td>

                    <td></td>
                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection



@section('script')

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

    <script type="text/javascript">

        function select_payment(mode)

        {

            window.location.href = '{{url('/rider/payments')}}'+ '/' +mode;

        }

        $(document).ready(function() {

            $('#example').DataTable();

        } );

    </script>

@endsection



