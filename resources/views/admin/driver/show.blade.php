@extends('admin.layouts.app')

@section('title', $driver->name.' | Driver')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>Driver details</h2>
                <a href="{{route('admin.user.driver.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="d-flex justify-content-start text-center">
                                    <div class="image-container">
                                        <img src="{{isset($driver->avatar) ? asset($driver->avatar) : asset('images/no-person.png')}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    </div>
                                    <div class="userData ml-3">
                                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{$driver->name}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="active"><a href="#private" data-toggle="tab">PRIVATE INFO</a></li>
                                        <li role="presentation"><a href="#vehicle" data-toggle="tab">VEHICLE INFO</a></li>
                                        <li role="presentation"><a href="#documents" data-toggle="tab">DOCUMENTS</a></li>
                                        <li role="presentation"><a href="#ratings" data-toggle="tab">RATINGS</a></li>
                                        <li role="presentation"><a href="#comments" data-toggle="tab">COMMENTS</a></li>
                                        <li role="presentation"><a href="#notes" data-toggle="tab">NOTES</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated flipInX active" id="private">
                                            <li class="list-group-item clearfix">
                                                Name <label class="control-label pull-right">{{$driver->name}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Gender <label class="control-label pull-right">{{getGender($driver->gender)}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Email <label class="control-label pull-right">{{$driver->email}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Mobile <label class="control-label pull-right">{{$driver->mobile}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                ABN <label class="control-label pull-right">{{$driver->abn}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Commission <label class="control-label pull-right">{{$driver->commission}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Location <label class="control-label pull-right">
                                                    @if(is_null($driver->country_id) || is_null($driver->state_id) || is_null($driver->city_id))
                                                        Not set
                                                    @else
                                                        {{$driver->city->name}}, {{$driver->state->name}}, {{$driver->country->name}}
                                                    @endif
                                                </label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Email Verified <label class="control-label pull-right">{{isset($driver->email_verified_at) ? 'Verified' : 'Not verified'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Mobile Number Verified <label class="control-label pull-right">{{isset($driver->mobile_verified_at) ? 'Verified' : 'Not verified'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Is online <label class="control-label pull-right">{{$driver->is_online == 0 ? 'No' : 'Yes'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Is busy <label class="control-label pull-right">{{$driver->is_busy == 0 ? 'No' : 'Yes'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Is login <label class="control-label pull-right">{{$driver->is_login == 0 ? 'No' : 'Yes'}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Approved <label class="control-label pull-right">{{$driver->is_approved == 0 ? 'No' : 'Yes'}}</label>
                                            </li>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="ratings">
                                            <b>Ratings</b>
                                            <p>
                                                No activities
                                            </p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="documents">
                                            <b>Ratings</b>
                                            <p>
                                                No activities
                                            </p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="vehicle">
                                            <li class="list-group-item clearfix">
                                                Front photo of vehicle <img class="thumbnail pull-right" width="200px" height="200px" src="{{isset($driver_vehicle->front_photo) ? asset($driver_vehicle->front_photo) : asset('images/no-image.png')}}">
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Make <label class="control-label pull-right">{{is_null($driver_vehicle->make_id) ? 'Not set' : $driver_vehicle->make->name}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Model <label class="control-label pull-right">{{is_null($driver_vehicle->model_id) ? 'Not set' : $driver_vehicle->model->name}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Service Type <label class="control-label pull-right">{{is_null($driver_vehicle->servicetype_id) ? 'Not set' : $driver_vehicle->servicetype}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle PlateNumber <label class="control-label pull-right">{{$driver_vehicle->plate}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Color <label class="control-label pull-right">{{$driver_vehicle->color}}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Year <label class="control-label pull-right">{{$driver_vehicle->year}}</label>
                                            </li>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="comments">
                                            <b>Comments Content</b>
                                            <p>
                                                No comments
                                            </p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="notes">
                                            <div style="width: 100%; height: 50vh; overflow-y:auto; overflow-x: hidden; border: 2px solid #e2e2e2; padding: 1vw;">
                                                @forelse($driver_notes as $note)
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="card">
                                                            <div class="header">
                                                                <div class="row">
                                                                    <div class="col-lg-9 col-md-9">
                                                                        <h2>{{$note->note}}</h2>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                                                        <img src="{{asset($note->admin()->avatar)}}" width="100px">
                                                                        <p>{{$note->admin()->name}}</p>
                                                                    </div>
                                                                </div>
                                                                <small style="float:right">{{date('Y-m-d H:i', strtotime($note->created_at))}}</small>
                                                                <div style="position:absolute; top: 1vh; right: 1vw; cursor: pointer"><a href="{{route('admin.user.driver.note.delete', $note->id)}}"><i class="material-icons">clear</i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="card">
                                                            <div class="header">
                                                                <h2>There are no any data to be recored.</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforelse
                                            </div>
                                            <div style="margin-top: 20px;">
                                                <form method="post" action="{{route('admin.user.driver.note', $driver->id)}}">
                                                    @csrf
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <textarea class="form-control" name="note" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <button class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
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
