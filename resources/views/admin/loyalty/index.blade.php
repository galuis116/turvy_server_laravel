@extends('admin.layouts.app')

@section('title', 'Driver loyalty points')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Driver loyalty points</h2>
                <a href="{{route('admin.point.loyalty.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New driver loyalty</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Driver loyalty points
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Number of Trips per day</th>
                                    <th>Available days per week</th>
                                    <th>Qualify points</th>
                                    <th>Total points</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loyalties as $index => $loyalty)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$loyalty->name}}</td>
                                    <td>{{$loyalty->trips_per_day}}</td>
                                    <td>{{$loyalty->available_days_per_week}}</td>
                                    <td>{{$loyalty->trips_per_day * $loyalty->available_days_per_week * 4 * 7}}</td>
                                    <td>{{$loyalty->trips_per_day * $loyalty->available_days_per_week * 4 * 12}}</td>
                                    <td>
                                        <a href="{{route('admin.point.loyalty.edit', $loyalty->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                        <a href="{{route('admin.point.loyalty.delete', $loyalty->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
