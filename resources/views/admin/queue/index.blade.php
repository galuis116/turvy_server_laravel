@extends('admin.layouts.app')

@section('title', 'Queue List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Queue List</h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Queue List</h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>Driver Name</th>
                                    <th>Driver Gender</th>
                                    <th>Car Number</th>
                                    <th>Car Color</th>
                                    <th>Airport Name</th>
                                    <th>Position</th>
                                    <th>Last Sync</th>
                                    <th>Enterance Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($queues as $index => $queue)
                                    <tr>
                                        <td>{{ $queue->driver->name }}</td>
                                        <td>{{ $queue->driver->gender }}</td>
                                        <td>{{ $queue->driver->vehicle->plate }}</td>
                                        <td>{{ $queue->driver->vehicle->color }}</td>
                                        <td>{{ $queue->airport->name }}</td>
                                        <td>{{ $queue->position }}</td>
                                        <td>{{ $queue->last_sync }}</td>
                                        <td>{{ $queue->enterance_time }}</td>
                                        <td>
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
