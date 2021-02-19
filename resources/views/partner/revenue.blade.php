@extends('partner.layouts.app')

@section('title', 'Revenue by Partner')

@section('styles')
    <style>
        h3{
            margin-top: 0px;
        }
    </style>
@endsection

@php
    $partner = Auth::guard('partner')->user();
@endphp

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-6">

                <h3>Revenue History</h3>

            </div>

            <div class="col-md-6 text-right">

                <button type="button" id="btnExport" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Export</button>

            </div>

        </div>

        <div class="row">

            <div class="box">

                <div class="box-body">

                    <table id="example1" class="table table-bordered table-striped">

                        <thead>

                        <tr>

                            <th>S.No.</th>

                            <th>Rider Name</th>

                            <th>Rider Date</th>

                            <th>Rider Total Amount</th>

                            <th>Revenue</th>

                            <th>Status</th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($payments as $index => $payment)

                        <tr>

                            <td>{{$index+1}}</td>

                            <td>{{$payment->user->first_name}} {{$payment->user->last_name}}</td>

                            <td>{{$payment->payment_date_time}}</td>

                            <td>

                                {{$payment->payment_amount}}

                            </td>

                            <td>

                                {{number_format($payment->payment_amount*1/100, 2)}}

                            </td>

                            <td>{{$payment->payment_status}}</td>

                        </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('scripts')

    <script src="{{ asset('js/jquery.table2excel.min.js') }}"></script>

    <script>

        $(function () {

            $("#example1").DataTable();

            $("#btnExport").on('click', function(){

                $("#example1").table2excel({

                    exclude: ".noExl",

                    name: "Excel Document Name",

                    filename: "Rider" + new Date().toISOString().replace(/[\-\:\.]/g, ""),

                    fileext: ".xls",

                    exclude_img: true,

                    exclude_links: true,

                    exclude_inputs: true

                });

            });

        });

    </script>

@endsection