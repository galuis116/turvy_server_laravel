@extends('admin.layouts.app')

@php
    $title = isset($partner) ? 'Edit partner' : 'Add partner';
    $action = isset($partner) ? route('admin.user.partner.update', $partner->id) : route('admin.user.partner.store');
    $username = isset($partner) ? $partner->username : '';
    $email = isset($partner) ? $partner->email : '';
    $mobile = isset($partner) ? $partner->mobile : '';
    $first_name = isset($partner) ? $partner->first_name : '';
    $last_name = isset($partner) ? $partner->last_name : '';
    $gender = isset($partner) ? $partner->gender : '';
    $avatar = isset($partner) && isset($partner->avatar) ? $partner->avatar : 'images/no-image.png';
    $organization = isset($partner) ? $partner->organization : '';
    $url = isset($partner) ? $partner->url : '';
    $description = isset($partner) ? $partner->description : '';
    $cdnimage = isset($partner->cdnimage) ? $partner->cdnimage : '';

    $btnName = isset($partner) ? 'Update' : 'Save';
@endphp

@section('title', $title)

@section('styles')
    <style>
        .form-validation-error {
            color: red;
            top: 50px !important;
            left: 0px !important;
            display: none;
        }
    </style>
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{$title}}</h2>
                <a href="{{route('admin.user.partner.list')}}" class="btn bg-grey waves-effect pull-right"><i class="material-icons">keyboard_backspace</i><span>Back</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @include('admin.partials.message')
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{$title}}
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{$action}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="first_name">First name:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" value="{{$first_name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="last_name">Last name:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" value="{{$last_name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="gender">Gender:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="demo-radio-button">
                                                <input name="gender" type="radio" id="male" class="with-gap radio-col-blue" value="1" @if($gender == 1) checked @endif/>
                                                <label for="male">Male</label>
                                                <input name="gender" type="radio" id="female" class="with-gap radio-col-blue" value="2" @if($gender == 2) checked @endif/>
                                                <label for="female">Female</label>
                                                <input name="gender" type="radio" id="other" class="with-gap radio-col-blue" value="0" @if($gender == 0) checked @endif/>
                                                <label for="other">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="username">Username:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{$username}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">Email:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email" name="email" readonly class="form-control" placeholder="Email" value="admin@turvy.net">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="country">Country:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="country" name="country_id" class="form-control">
                                                    <option value="0">Default</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->id}}" data-phone-code="{{$country->phonecode}}" @if(isset($partner)) @if($partner->country_id == $country->id) selected @endif @endif>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="state">State:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="state" name="state_id" class="form-control">
                                                    <option value="0">Default</option>
                                                    @foreach($states as $state)
                                                    <option value="{{$state->id}}" @if(isset($partner)) @if($partner->state_id == $state->id) selected @endif @endif>{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="city">City:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="city" name="city_id" class="form-control">
                                                    <option value="0">Default</option>
                                                    @foreach($cities as $city)
                                                    <option value="{{$city->id}}" @if(isset($partner)) @if($partner->city_id == $city->id) selected @endif @endif>{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mobile">Mobile:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span id="phone-code" class="input-group-addon">
                                                    +00
                                                </span>
                                                <div class="form-line">
                                                    <input type="hidden" id="phonecode" name="phonecode" />
                                                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile" value="{{$mobile}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"></div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <span class="form-validation-error">Please don't start with 0</span>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="organization">Organization:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="organization" name="organization" class="form-control" placeholder="Organization" value="{{$organization}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="url">URL:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="url" name="url" class="form-control" placeholder="URL" value="{{$url}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="description">Description:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="description" id="description" rows="2" class="form-control">{{$description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="avatar">Avatar:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="{{asset($avatar)}}" width="200px" height="200px" alt=""/>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                        <div>
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Select image </span>
                                                                <span class="fileinput-exists">Change </span>
                                                                <input type="file" name="avatar">
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                            <label class="control-label">&nbsp;(&nbsp;Size: 200&times;200&nbsp;)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="title">OR</label>
                                    </div>
                                 </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="title">CDN image url</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="cdnimage" name="cdnimage" class="form-control" placeholder="CDN Image url" value="{{$cdnimage}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{$btnName}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            @if($mobile != '')
                phonecode = '+' + $('option:selected', this).attr('data-phone-code');
                $('#phone-code').html(phonecode);
                $('#phonecode').val(phonecode);
                $('#mobile').val($('#mobile').val().replace(phonecode, ''));
            @endif
            $('#mobile').on('keyup', function(){
                var str = $(this).val();
                if(str.length>1) {
                    var patt = new RegExp("^[1-9][0-9]");
                    var res = patt.test(str);
                    if(!res) {
                        $('.form-validation-error').show();
                        $(this).css('border', '1px solid red');
                    }
                    else{
                        $('.form-validation-error').hide();
                        $(this).css('border', '1px solid #e1e1e1');
                    }
                }
                else{
                    $('.form-validation-error').hide();
                    $(this).css('border', '1px solid #e1e1e1');
                }
            });
            $('#country').on('change', function(){
                $('#phone-code').html('+'+$('option:selected', this).attr('data-phone-code'));
                $('#phonecode').val('+'+$('option:selected', this).attr('data-phone-code'));
                $.ajax({
                    url: "{{route('getStatesBelongCountry')}}",
                    data: {
                        "country_id": $(this).val()
                    },
                    success: function(result){
                        $('#state').empty();
                        $('#state').append(result);
                    }
                });
            });
            $('#state').on('change', function(){
                $.ajax({
                    url: "{{route('getCitiesBelongState')}}",
                    data: {
                        "state_id": $(this).val()
                    },
                    success: function(result){
                        $('#city').empty();
                        $('#city').append(result);
                    }
                });
            });
        });
    </script>
@endsection