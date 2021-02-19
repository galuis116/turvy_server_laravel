@extends('partner.layouts.app')

@section('title', 'Partner Information')

@section('styles')

    <style>
        .bg-picture {
            background-image:url('{{asset("images/cover.jpg")}}');
            position: relative;
            min-height: 300px;
            margin: -56px -31px 0px -31px;
            background-repeat: no-repeat;
            background-position: center;
            -webkit-background-size: cover;
            background-size: cover;
        }
        img {
            width: 64px;
        }
        .bg-picture>.meta.bottom {
            bottom: 10px;
        }
        .bg-picture>.meta {
            position: absolute;
            left: 0;
            right: 0;
        }
        .box-layout {
            display: table!important;
            width: 100%;
            table-layout: fixed;
            border-spacing: 0;
        }
        .container {
            padding-left : 15px;
            margin-left: 0px;
        }
        .bg-picture>.bg-picture-overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-image: linear-gradient(to bottom,rgba(255,255,255,0) 0,rgba(0,0,0,.4) 100%);
        }
    </style>
@endsection

@section('content')
    @php
        $partner = Auth::guard('partner')->user();
    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-picture">
                    <span class="bg-picture-overlay"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>{{$partner->name}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('partials.message')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#about" data-toggle="tab">About Me</a></li>
                        <li><a href="#profile" data-toggle="tab">Edit Personal Info</a></li>
                        <li><a href="#address" data-toggle="tab">Edit Address</a></li>
                        <li><a href="#social" data-toggle="tab">Social Media</a></li>
                        <li><a href="#account" data-toggle="tab">Account Info</a></li>
                        <li><a href="#password" data-toggle="tab">Change Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="about">
                            <form class="form-horizontal">
                                <h3>Contact Information</h3>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>
                                    <label class="col-sm-10 control-label">{{$partner->mobile}}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <label class="col-sm-10 control-label">{{$partner->email}}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Skype</label>
                                    <label class="col-sm-10 control-label">{{$partner->skype}}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Facebook</label>
                                    <label class="col-sm-10 control-label">{{$partner->facebook}}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Twitter</label>
                                    <label class="col-sm-10 control-label">{{$partner->twitter}}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Google+</label>
                                    <label class="col-sm-10 control-label">{{$partner->google}}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Instagram</label>
                                    <label class="col-sm-10 control-label">{{$partner->instagram}}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Dribble</label>
                                    <label class="col-sm-10 control-label">{{$partner->dribble}}</label>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="profile">
                            <form class="form-horizontal" method="POST" action="{{route('partner.profile')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="first_name" id="inputName" placeholder="First Name" value="{{$partner->first_name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="last_name" id="inputName" placeholder="Last Name" value="{{$partner->last_name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mobile" id="inputName" placeholder="Phone Number" value="{{$partner->mobile}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email Address</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{$partner->email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" placeholder="Description">{{$partner->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="address">
                            <form class="form-horizontal" method="POST" action="{{route('partner.profile')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Address" name="address" value="{{$partner->address}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Country</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="country">
                                            <option value="" disabled selected>Select a country</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{$country->id == $partner->country_id ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">State</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="state_id" id="state">
                                            <option value="" disabled selected>Select a state</option>
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}" {{$state->id == $partner->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">City</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="city_id" id="city">
                                            <option value="" disabled selected>Select a city</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{$city->id == $partner->city_id ? 'selected' : ''}}>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Zip Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Name" name="zipcode" value="{{$partner->zipcode}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="social">
                            <form class="form-horizontal" method="POST" action="{{route('partner.contact')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Facebook" name="facebook" value="{{$contact ? $contact->facebook : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Twitter" name="twitter" value="{{$contact ? $contact->twitter : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Google+</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Google+" name="google" value="{{$contact ? $contact->google : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Skype Id</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" name="skype" placeholder="Skype Id" value="{{$contact ? $contact->skype : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Instagram" name="instagram" value="{{$contact ? $contact->instagram : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Dribble</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Dribble" name="dribble" value="{{$contact ? $contact->dribble : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="account">
                            <form class="form-horizontal" method="POST" action="{{route('partner.bank')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Account Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Account Name" name="account_name" value="{{$bank ? $bank->account_name : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Bank Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Bank Name" name="bank_name" value="{{$bank ? $bank->bank_name : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">BSB</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="BSB" name="bsb" value="{{$bank ? $bank->bsb : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Account Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Account Number" name="account_number" value="{{$bank ? $bank->account_number : null}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="password">
                            <form class="form-horizontal" method="POST" action="{{route('partner.changePassword')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="old_password" placeholder="Old Password" name="old_password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="new_password" placeholder="New Password" name="new_password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                </div>
        </div>
    </div>
@endsection