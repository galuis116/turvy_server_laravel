@extends('admin.layouts.app')

@section('title', $rider->name.' | Rider')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>Rider details</h2>
                <a href="{{route('admin.user.rider.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="d-flex justify-content-start text-center">
                                    <div class="image-container">
                                        <img src="{{asset($rider->avatar)}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    </div>
                                    <div class="userData ml-3">
                                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{$rider->name}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="active"><a href="#home_animation_1" data-toggle="tab">PRIVATE INFO</a></li>
                                        <li role="presentation"><a href="#profile_animation_1" data-toggle="tab">Ratings</a></li>
                                        <li role="presentation"><a href="#messages_animation_1" data-toggle="tab">Comments</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">
                                            <li class="list-group-item clearfix">
                                                Name <label class="control-label pull-right">{{$rider->name}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Gender <label class="control-label pull-right">{{getGender($rider->gender)}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Email <label class="control-label pull-right">{{$rider->email}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Mobile <label class="control-label pull-right">{{$rider->mobile}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Partner Relationship <label class="control-label pull-right">{{$rider->partner_id == null ? 'Not set' : $rider->partner->organization}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Partner Income <label class="control-label pull-right">{{$rider->partner_id == null ? 'Not set' : 'A$ '.$rider->partner_income}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Email Verified <label class="control-label pull-right">{{isset($rider->email_verified_at) ? 'Verified' : 'Not verified'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Mobile Number Verified <label class="control-label pull-right">{{isset($rider->mobile_verified_at) ? 'Verified' : 'Not verified'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Approved <label class="control-label pull-right">{{$rider->status == 0 ? 'No' : 'Yes'}}</label>
                                            </li>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="profile_animation_1">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Driver</th>
                                                    <th>Trip</th>
                                                    <th>Date/Time</th>
                                                    <th>Rating</th>
                                                    <th>Comment</th>
                                                    <th>What went wrong</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rider_ratings as $index => $rating)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$rating->driver_id == null ? 'Not set' : $rating->driver->name}}</a></td>
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
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="messages_animation_1">
                                            <b>Comments Content</b>
                                            <p>
                                                No comments
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection