@extends('admin.layouts.app')

@section('title', 'Destination List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Destination List</h2>
                <a href="{{route('admin.airportride.destination.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New Destination</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Destination List</h2>
                            <small>Use this screen to manage all destination's.</small>
                            <small>Deleting a destination here, will also remove it from the Passenger app.</small>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Destination name</th>
                                    <th>Zipcode</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($destinations as $index => $destination)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$destination->name}}</a></td>
                                        <td>{{$destination->zipcode}}</td>
                                        <td>
                                            @if($destination->status)
                                                <span class="badge bg-green">Active</span>
                                            @else
                                                <span class="badge bg-red">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.airportride.destination.edit', $destination->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.airportride.destination.approve', $destination->id)}}" class="btn {{$destination->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$destination->status ? 'Inactive' : 'Active'}}"><i class="material-icons">done</i></a>
                                            <a href="{{route('admin.airportride.destination.delete', $destination->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
