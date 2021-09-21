@extends('driver.layouts.app')
@section('content')
@php
    $driver = Auth::guard('driver')->user();
@endphp

<div id="home" class="tab-pane fade in active">
    <div class="" id="" style="padding: 20px">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('driver.profile')}}" enctype="multipart/form-data">
                    @csrf
                    @include('partials.message')
                    <div class="form-group edit_profile_label col-md-6">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control edit_profile_field" id="first_name" placeholder="Your First Name" value="{{$driver->first_name}}" required>
                    </div>
                    <div class="form-group edit_profile_label col-md-6">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control edit_profile_field" id="last_name" placeholder="Your Last Name" value="{{$driver->last_name}}" required>
                    </div>
                    <div class="form-group edit_profile_label col-md-6">
                        <label>Phone Number</label>
                        <input type="text"  class="form-control edit_profile_field" id="driverphone" name="mobile" placeholder="Your Phone Number" value="{{$driver->mobile}}" required readonly>
                    </div>
                    <div class="form-group edit_profile_label col-md-6">
                        <label>Email</label>
                        <input type="email" name="driveremail" class="form-control edit_profile_field" id="driveremail" name="email" placeholder="Your Email" value="{{$driver->email}}" required readonly>
                    </div>
                    <div class="form-group edit_profile_label col-md-6">
                        <label>Country</label>
                        <select class="form-control edit_profile_field" id="country" name="country_id" readonly="true" disabled="true">
                            <option value=""> Select Country </option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}" @if($driver->country_id == $country->id) selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group edit_profile_label col-md-6">
                        <label>State</label>
                        <select class="form-control edit_profile_field" id="state" name="state_id" readonly="true" disabled="true">
                            <option value=""> Select State </option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}" @if($driver->state_id == $state->id) selected @endif>{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group edit_profile_label col-md-6">
                        <label>City</label>
                        <select class="form-control edit_profile_field" id="city" name="city_id" disabled="true">
                            <option value="">-------- Please Select City --------</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}" @if($city->id == $driver->city_id) selected @endif>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group edit_profile_label col-md-12">
                        <label>Address</label>
                        <input type="text"  class="form-control edit_profile_field" id="driveraddress" name="address" placeholder="Your Address" value="{{isset($driverDetail) ? $driverDetail->address : ''}}">
                    </div>
                    <div class="form-group edit_profile_label col-md-6">
                        <label>City</label>
                        <input type="text" name="home_city" class="form-control edit_profile_field" placeholder="Your City" value="{{isset($driverDetail) ? $driverDetail->home_city : ''}}"/>
                    </div>
                    <div class="form-group edit_profile_label col-md-6">
                        <label>State</label>
                        <input type="text" name="home_state" class="form-control edit_profile_field" placeholder="Your State" value="{{isset($driverDetail) ? $driverDetail->home_state : ''}}"/>
                    </div>
                    <div class="form-group edit_profile_label col-md-6">
                        <label>Postal Code</label>
                        <input type="text"  class="form-control edit_profile_field" id="postalcode" name="postalcode" placeholder="Your Postal Code" value="{{isset($driverDetail) ? $driverDetail->postalcode : ''}}">
                    </div>
                    <div class="form-group edit_profile_label col-md-12">
                        <label> Upload Your Photo </label>
                        <br>
                        @if($driver->avatar != "")
                            <img class="img-responsive" id="blah" src="{{asset($driver->avatar)}}" style="margin-bottom: 10px;width: 200px;height: 200px; !important;" />
                        @else
                            <img class="img-responsive" id="blah" src="{{asset('images/no-person.png')}}" style="margin-bottom: 10px;width: 200px;height: 200px; !important;" />
                        @endif
                        <br>
                        <input type="file" class="form-control edit_profile_field"  name ="avatar" id="blah" onchange="readURL(this);">
                    </div>
                    <div class="form-group  col-md-6">
                        <input type="submit" class="submit_btn" style="width:100%;" value="Update Profile">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection()

@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
		$(document).ready(function(){
            $('#country').on('change', function(){
               $.ajax({
                   type: "POST",
                   url: "{{route('getStatesBelongCountry')}}",
                   data: "country_id="+$(this).val(),
                   success:
                       function(data) {
                           $('#state').html(data);
                       }
               });
           });
           $('#state').on('change', function(){
               $.ajax({
                   type: "POST",
                   url: "{{route('getCitiesBelongState')}}",
                   data: "state_id="+$(this).val(),
                   success:
                       function(data) {
                           $('#city').html(data);
                       }
               });
           });
        });
    </script>
@endsection