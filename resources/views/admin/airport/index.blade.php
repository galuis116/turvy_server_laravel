@extends('admin.layouts.app')

@section('title', 'Airport List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Airport List</h2>
                @can('airport-create')
                <a href="{{route('admin.airportride.airport.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New Airport</span></a>
                @else
                <a class="btn bg-blue waves-effect pull-right" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">add</i><span>New Airport</span></a>
                @endcan
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Airport List</h2>
                            <small>Use this screen to manage the Airports you have added earlier.</small>
                            <small>Note: Deleting an Airport, will remove it from the Passenger app as well.</small>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Airport name</th>
                                    <th>Zipcode</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($airports as $index => $airport)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$airport->name}}</a></td>
                                        <td>{{$airport->zipcode}}</td>
                                        <td>
                                            @if($airport->status)
                                                <span class="badge bg-green">Active</span>
                                            @else
                                                <span class="badge bg-red">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('airport-edit')
                                            <a href="{{route('admin.airportride.airport.edit', $airport->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.airportride.airport.approve', $airport->id)}}" class="btn {{$airport->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$airport->status ? 'Inactive' : 'Active'}}"><i class="material-icons">done</i></a>
                                            @else
                                            <a class="btn bg-cyan waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">edit</i></a>
                                            <a class="btn {{$airport->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">done</i></a>
                                            @endcan
                                            @can('airport-delete')
                                            <a href="{{route('admin.airportride.airport.delete', $airport->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
