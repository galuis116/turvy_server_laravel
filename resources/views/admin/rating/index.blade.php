@extends('admin.layouts.app')

@php
    if($subpage == 'rider')
    {
        $title = 'Rider ratings';
        $action = 'admin.rating.rider.status';
        $edit_rating_action = 'admin.rating.rider.edit';
    }
    else
    {
        $title = 'Driver ratings';
        $action = 'admin.rating.driver.status';
        $edit_rating_action = 'admin.rating.driver.edit';
    }        
@endphp

@section('title', $title)

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>{{$title}}</h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rider</th>
                                    <th>Driver</th>
                                    <th>Trip</th>
                                    <th>Date/Time</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>What went wrong</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ratings as $index => $rating)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$rating->rider_id == null ? 'Not set' : $rating->rider->name}}</a></td>
                                        <td>{{$rating->driver_id == null ? 'Not set' : $rating->driver->name}}</td>
                                        <td style="text-align:center">{{$rating->book->origin}} <br> To <br> {{$rating->book->destination}}</td>
                                        <td>{{$rating->book->booking_date}} <br> {{$rating->book->booking_time}}</td>
                                        <td>{{$rating->rating}}</td>
                                        <td>{{$rating->comment}}</td>
                                        <td>{{$rating->que}}</td>
                                        <td>
                                            @if($rating->status)
                                                <span class="badge bg-green">Approved</span>
                                            @else
                                                <span class="badge bg-red">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route($action, $rating->id)}}" class="btn {{$rating->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$rating->status ? 'Pending' : 'Approve'}}"><i class="material-icons">done</i></a>
                                            <a href="{{route($edit_rating_action, $rating->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
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
