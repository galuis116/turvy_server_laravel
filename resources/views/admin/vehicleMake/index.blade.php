@extends('admin.layouts.app')

@section('title', 'Vehicle Make List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Vehicle Make List</h2>
                <a href="{{route('admin.fleet.make.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New vehicle make</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Vehicle Make List
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicleMakes as $index => $vehicleMake)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$vehicleMake->name}}</td>
                                    <td><img src="{{asset($vehicleMake->image)}}" width="40px" height="40px"/></td>
                                    <td>
                                        @if($vehicleMake->status)
                                            <span class="badge bg-blue">Active</span>
                                        @else
                                            <span class="badge bg-red">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.fleet.make.edit', $vehicleMake->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                        <a href="{{route('admin.fleet.make.active', $vehicleMake->id)}}" class="btn {{$vehicleMake->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$vehicleMake->status ? 'Inactive' : 'Active'}}"><i class="material-icons">done</i></a>
                                        <a href="{{route('admin.fleet.make.delete', $vehicleMake->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
