@extends('partner.layouts.app')



@section('title', 'Rider by Partner')



@section('styles')

    <style>

        h3{

            margin-top: 0px;

        }

    </style>

@endsection



@section('content')

    @php
        $partner = Auth::guard('partner')->user();
    @endphp

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-6">

                <h3>Rider Management</h3>

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

                            <th>Sr.No.</th>

                            <th>Riders Name</th>

                            <th>Email</th>

                            <th>Mobile</th>

                            <th>Registration Date</th>

                            <th>Status</th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($riders as $index => $rider)

                        <tr>

                            <td>{{$index+1}}</td>

                            <td>{{$rider->first_name}} {{$rider->last_name}}</td>

                            <td>{{$rider->email}}</td>

                            <td>{{$rider->mobile}}</td>

                            <td>{{$rider->created_at}}</td>

                            <td>

                                @if($rider->is_activated == 1)

                                    <span class="pull-right-container">

                                        <small class="label pull-right bg-green">Active</small>

                                    </span>

                                @else

                                    <span class="pull-right-container">

                                        <small class="label pull-right bg-gray">Inactive</small>

                                    </span>

                                @endif

                            </td>

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