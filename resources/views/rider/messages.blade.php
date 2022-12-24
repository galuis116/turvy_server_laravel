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

        



        <div class="clear"></div>

        <div style="margin-top: 25px !important;">

            <table id="example" class="display" style="width:100%">

                <thead>

                <tr>

                    <th>Heading</th>

                    <th>Message</th>

                    <th>Send Date</th>
                </tr>

                </thead>

                <tbody>

                @foreach($notifications as $msg)

                <tr>
                    <td>{{ $msg->heading }}</td>

                    <td>{{ $msg->content }}</td>

                    <td>{{$msg->notifyDate}}</td>
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



