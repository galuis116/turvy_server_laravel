@extends('admin.layouts.app')

@section('title', 'Airport Pricing List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Airport Pricing List</h2>
                @can('airportpricing-create')
                <a href="{{route('admin.airportride.pricing.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New Pricing</span></a>
                @else
                <a class="btn bg-blue waves-effect pull-right" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">add</i><span>New Pricing</span></a>
                @endcan
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Airport Pricing List</h2>
                            <small>Use this screen to manage all the Airport Pricing plans, you have setup earlier.</small>
                            <small>Note: Deleting a Pricing plan, will remove it from the Passenger app as well.</small>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Airport name</th>
                                    <th>Destination name</th>
                                    <th>Number of Tolls</th>
                                    <th>Price</th>
                                    <th>Vehicle Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pricings as $index => $pricing)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$pricing->airport->name}}</td>
                                        <td>{{$pricing->destination->name}}</td>
                                        <td>{{$pricing->number_tolls}}</td>
                                        <td>{{$pricing->price}}</td>
                                        <td>{{$pricing->servicetype->name}}</td>
                                        <td>
                                            @if($pricing->status)
                                                <span class="badge bg-green">Active</span>
                                            @else
                                                <span class="badge bg-red">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('airportpricing-edit')
                                            <a href="{{route('admin.airportride.pricing.edit', $pricing->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.airportride.pricing.approve', $pricing->id)}}" class="btn {{$pricing->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$pricing->status ? 'Inactive' : 'Active'}}"><i class="material-icons">done</i></a>
                                            @else
                                            <a class="btn bg-cyan waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">edit</i></a>
                                            <a class="btn {{$pricing->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">done</i></a>
                                            @endcan
                                            @can('airportpricing-delete')
                                            <a href="{{route('admin.airportride.pricing.delete', $pricing->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
