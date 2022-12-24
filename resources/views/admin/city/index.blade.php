@extends('admin.layouts.app')

@section('title', 'Region List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Region List</h2>
                <a href="{{route('admin.region.city.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New region</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Region List
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>Region</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cities as $index => $city)
                                @if(isset($city->country) && isset($city->state))
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$city->country->nicename}}</td>
                                        <td>{{$city->state->name}}</td>
                                        <td>{{$city->name}}</td>
                                        <td>
                                            <a href="{{route('admin.region.city.edit', $city->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.region.city.delete', $city->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
