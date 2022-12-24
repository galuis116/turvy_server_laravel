@extends('admin.layouts.app')

@section('title', 'SOS Request List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SOS Request List
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Type</th>
                                    <th>User</th>
                                    <th>SOS Number</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($requests as $index => $request)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{getUserType($request->user_type)}}</td>
                                    <td>{{$request->user->name}}</td>
                                    <td>{{$request->sos->name}}</td>
                                    <td>{{$request->lat}}</td>
                                    <td>{{$request->lng}}</td>
                                    <td>
                                        <a href="{{route('admin.sos.request.delete', $request->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection
