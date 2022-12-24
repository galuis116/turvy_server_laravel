@extends('driver.layouts.app_fullwidth')



@section('style')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

@endsection



@section('content')



    <div class="pb-20">



        <div class="col-md-12">

            <table id="example1" class="table table-bordered table-striped">



                <thead>

                <tr>

                    <th>Ride begin location</th>

                    <th>Ride End Location</th>

                    <th>Ride Begin Time</th>

                    <th>Ride End Time</th>

                    <th>Paid Amount</th>

                    <th>Paid Date</th>

                </tr>

                </thead>

                <tbody>

                @foreach($payments as $index => $payment)

                    <tr>

                        <td></td>

                        <td></td>

                        <td></td>

                        <td></td>

                        <td>{{ $payment->total_time * $payment->time_price }}</td>

                        <td>{{ date("Y-m-d" , strtotime($payment->updated_at)) }}</td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>



    </div>



@endsection



@section('script')

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

    <script>

        $(function () {

            $("#example1").DataTable();

        });

    </script>



@endsection