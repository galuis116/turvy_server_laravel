@extends('admin.layouts.app')

@section('title', 'Country List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Country List</h2>
                <a href="{{route('admin.region.country.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New country</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Country List
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Nice name</th>
                                    <th>ISO</th>
                                    <th>ISO3</th>
                                    <th>Num code</th>
                                    <th>Phone code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($countries as $index => $country)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$country->name}}</td>
                                        <td>{{$country->nicename}}</td>
                                        <td>{{$country->iso}}</td>
                                        <td>{{$country->iso3}}</td>
                                        <td>{{$country->numcode}}</td>
                                        <td>{{$country->phonecode}}</td>
                                        <td>
                                            <a href="{{route('admin.region.country.edit', $country->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.region.country.delete', $country->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
