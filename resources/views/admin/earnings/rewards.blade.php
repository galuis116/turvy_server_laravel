@extends('admin.layouts.app')

@section('title', 'Riders Reward Points')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Riders Reward Points
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table  table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rider</th>
                                    <th>Driver</th>
                                    <th>Point</th>
                                    <th>DateTime</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($rewards as $idx => $reward)
                                    <tr>
                                        <td>{{ $idx+1 }}</td>
                                        <td>
                                            @if(isset($reward->rider))
                                            <a href={{route('admin.user.rider.show', $reward->rider_id)}}>{{ $reward->rider->name }}</a>
                                            @else
                                            Deleted Rider (#{{$reward->rider_id}})
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($reward->driver))
                                            <a href={{route('admin.user.driver.show', $reward->driver_id)}}>{{ $reward->driver->name }}</a>
                                            @else
                                            Deleted Driver (#{{$reward->driver_id}})
                                            @endif
                                        </td>
                                        <td>{{ $reward->point }}</td>
                                        <td>{{ $reward->created_at }}</td>
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
