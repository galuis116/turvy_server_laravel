@extends('rider.layouts.app_fullwidth')



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

                <option value="today" @if ($page_search == 'today') selected @endif>Today</option>
                <option value="this_week" @if ($page_search == 'this_week') selected @endif >This Week</option>
                <option value="last_week" @if ($page_search == 'last_week') selected @endif>Last Week</option>
                <option value="this_month"@if ($page_search == 'this_month') selected @endif>This Month</option>
                <option value="this_year" @if ($page_search == 'this_year') selected @endif>This year</option>
                <option value="last_year" @if ($page_search == 'last_year') selected @endif>Last Year</option>

            </select>

        </div>




        <div class="clear"></div>

        <div style="margin-top: 25px !important;">

            <table id="example" class="display" style="width:100%">

                <thead>

                <tr>

                    <th>Pick location</th>

                    <th>Drop Location</th>

                    <th>Ride Begin </th>

                    <th>Ride End </th>

                    <th>Driver</th>

                    <th>Partner Contri.</th>

                    <th>Paid Amount</th>

                    <th>Paid Time</th>

                    <th>Reward Points</th>

                </tr>

                </thead>

                <tbody>

                @foreach($payments as $payment)

                <tr>

                    <td>{{$payment['origin']}}</td>

                    <td>{{$payment['destination']}}</td>

                    <td>{{$payment['start_time']}}</td>

                    <td>{{$payment['end_time']}}</td>

                    <td>{{$payment['first_name']}} {{$payment['last_name']}}</td>


                    <td></td>

                    <td style="text-align: right;" >AU${{$payment['total']}}</td>

                    <td>{{$payment['paid_time']}}</td>

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



