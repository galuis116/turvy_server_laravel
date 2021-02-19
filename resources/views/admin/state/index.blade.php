@extends('admin.layouts.app')

@section('title', 'State List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>State List</h2>
                <a href="{{route('admin.region.state.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New state</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                State List
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Full name</th>
                                    <th>Country</th>
                                    <th>Currency</th>
                                    <th>Distance</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($states as $index => $state)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$state->name}}</td>
                                        <td>{{$state->fullname}}</td>
                                        <td>{{$state->country->nicename}}</td>
                                        <td>{{is_null($state->currency_id) ? 'Not set' : $state->currency->name}}</td>
                                        <td>{{is_null($state->distance_id) ? 'Not set' : $state->distance->name}}</td>
                                        <td>
                                            <a href="{{route('admin.region.state.edit', $state->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.region.state.delete', $state->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
