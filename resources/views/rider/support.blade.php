@extends('rider.layouts.app')
@section('content')
    @php
        $rider = Auth::guard('rider')->user();
    @endphp

    <div id="home" class="tab-pane fade in active">
        <div class="" id="" style="padding: 20px">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{route('rider.support')}}">
                        @include('partials.message')
                        @csrf
                        <div class="form-group edit_profile_label">
                            <input type="text" name="name" class="form-control edit_profile_field" id="name" placeholder="Your Name" value="{{$rider->first_name}} {{$rider->last_name}}" required>
                        </div>
                        <div class="form-group edit_profile_label">
                            <input type="email"  class="form-control edit_profile_field" id="eamil" name="name" placeholder="Your Email" value="{{$rider->email}}" required>
                        </div>
                        <div class="form-group edit_profile_label">
                            <input type="phone" name="phone" class="form-control edit_profile_field" id="phone" placeholder="Phone" value="{{$rider->mobile}}" required>
                        </div>
                        <div class="form-group edit_profile_label">
                            <textarea style="height:100px !important" class="form-control edit_profile_field" placeholder="Your Query" name="query" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="submit_btn" style="width:100%;" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()

