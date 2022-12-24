@extends('admin.layouts.app')

@section('title', 'Vehicle Model List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Vehicle Model List</h2>
                <a href="{{route('admin.fleet.model.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New vehicle model</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Vehicle Model List
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Vehicle Type</th>
                                    <th>Vehicle Make</th>
                                    <th>Vehicle Model</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicleModels as $index => $vehicleModel)
                                @if(isset($vehicleModel->servicetype) || isset($vehicleModel->make))
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$vehicleModel->servicetype->name ? $vehicleModel->servicetype->name : ''}}</td>
                                    <td>{{$vehicleModel->make->name ? $vehicleModel->make->name : ''}}</td>
                                    <td>{{$vehicleModel->name}}</td>
                                    <td>
                                        @if($vehicleModel->status)
                                            <span class="badge bg-blue">Active</span>
                                        @else
                                            <span class="badge bg-red">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.fleet.model.edit', $vehicleModel->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                        <a href="{{route('admin.fleet.model.active', $vehicleModel->id)}}" class="btn {{$vehicleModel->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$vehicleModel->status ? 'Inactive' : 'Active'}}"><i class="material-icons">done</i></a>
                                        <a href="{{route('admin.fleet.model.delete', $vehicleModel->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                                @endif
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
