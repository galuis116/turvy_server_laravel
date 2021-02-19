@extends('admin.layouts.app')

@section('title', 'Vehicle Service Type List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Vehicle Service Type List</h2>
                @can('vehicletype-create')
                <a href="{{route('admin.fleet.serviceType.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New vehicle service type</span></a>
                @else
                <a class="btn bg-blue waves-effect pull-right" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">add</i><span>New vehicle service type</span></a>
                @endcan
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Vehicle service type List
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Seat</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicleTypes as $index => $vehicleType)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td><img src="{{isset($vehicleType->image) ? asset($vehicleType->image) : asset('images/no-image.png')}}" width="80px" height="40px"/></td>
                                        <td>{{$vehicleType->name}}</td>
                                        <td>{{str_limit($vehicleType->description, 60)}}</td>
                                        <td>
                                            @if($vehicleType->number_seat > 1)
                                            1 ~ {{$vehicleType->number_seat}} people
                                            @else
                                            {{$vehicleType->number_seat}} people
                                            @endif
                                        </td>
                                        <td>
                                            @if($vehicleType->status)
                                                <span class="badge bg-blue">Active</span>
                                            @else
                                                <span class="badge bg-red">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('vehicletype-edit')
                                            <a href="{{route('admin.fleet.serviceType.edit', $vehicleType->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.fleet.serviceType.active', $vehicleType->id)}}" class="btn {{$vehicleType->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$vehicleType->status ? 'Inactive' : 'Active'}}"><i class="material-icons">done</i></a>
                                            @else
                                            <a class="btn bg-cyan waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">edit</i></a>
                                            <a class="btn {{$vehicleType->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">done</i></a>
                                            @endcan
                                            @can('vehicletype-delete')
                                            <a href="{{route('admin.fleet.serviceType.delete', $vehicleType->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
                                            @else
                                            <a class="btn bg-red waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">delete</i></a>
                                            @endcan
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
