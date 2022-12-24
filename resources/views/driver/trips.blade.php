@extends('driver.layouts.app_fullwidth')



@section('style')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

@endsection



@section('content')



    <div class="row">



        <div class="col-md-12">

                <table id="example1" class="table table-bordered table-striped table-responsive">

                    <thead>

                    <tr>

                        <th>SrNo</th>

                        <th>Ride Id</th>

                        <th>Rider Details</th>

                        <th>Pickup Address</th>

                        <th>Drop Address</th>

                        <th>Payment Mode</th>

                        <th>Datetime</th>

                        <th>Loyalties</th>

                        <th>Current Status</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($rides as $index => $ride)

                        <tr>

                            <td>{{$index+1}}</td>

                            <td><u>{{$ride->id}}</u></td>

                            <td>{{$ride->rider_mobile}},<br> {{$ride->rider_name}},<br> {{$ride->rider_email}}</td>

                            {{--<td>--}}

                                {{--@if($ride->driver_id != 0)--}}

                                    {{--{{$ride->driver->name}}<br>{{$ride->driver->mobile}}<br>{{$ride->driver->email}}--}}

                                {{--@endif--}}

                            {{--</td>--}}

                            <td>{{$ride->origin}}</td>

                            <td>{{$ride->destination}}</td>

                            <td>{{isset($ride->payment) ? $ride->payment->name : 'Not yet'}}</td>

                            <td>{{$ride->booking_date}} <br> {{$ride->booking_time}}</td>

                            <td></td>
                            <!--

                               if status is 0, it is new booking

                               if status is 1, it is cancelled by user

                               if status is 2, it is accepted by driver

                               if status is 3, it is cancelled by driver

                               if status is 4, it is driver arrived

                               if status is 5, it is trip started

                            -->

                            <td>

                                @if($ride->status == 0)

                                    <span> New Booking</span>

                                @endif



                                @if($ride->status == 1)

                                    <span> Cancelled By User</span>

                                @endif



                                @if($ride->status == 2)

                                    <span>Accepted By Driver</span>

                                @endif



                                @if($ride->status == 3)

                                    <span>Cancelled By Driver</span>

                                @endif



                                @if($ride->status == 4)

                                    <span>Driver Arrived</span>

                                @endif



                                @if($ride->status == 5)

                                    <span>Trip Started</span>

                                @endif



                                @if($ride->status == 6)

                                    <span>Trip Completed</span>

                                @endif



                                @if($ride->status == 7)

                                    <span>Trip Book By Admin</span>

                                @endif



                                @if($ride->status == 8)

                                    <span>Trip Cancel By Admin</span>

                                @endif



                                <br>

                                <span>{{$ride->updated_at}}</span>



                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>



    </div>



@endsection()



@section('script')

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

    <script>

        $(function () {

            $("#example1").DataTable();

        });

    </script>

@endsection

