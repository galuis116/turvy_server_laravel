@extends('driver.layouts.app')



@section('content')

    @php
        $driver = Auth::guard('driver')->user();
    @endphp

    <div id="home" class="tab-pane fade in active">

        <div class="" id="" style="padding: 20px">

            <div class="row">

                <div class="col-md-6">

                    <form method="post" action="{{route('driver.support')}}" enctype="multipart/form-data">

                        @include('partials.message')

                        @csrf

                        <div class="form-group edit_profile_label">

                            <input type="text" name="name" class="form-control edit_profile_field" id="name" placeholder="Your Name" required value="{{$driver->name}}">

                        </div>

                        <div class="form-group edit_profile_label">

                        <input type="email"  class="form-control edit_profile_field" id="eamil" name="email" placeholder="Your Email" required value="{{$driver->email}}">

                        </div>

                        <div class="form-group edit_profile_label">

                        <input type="phone" name="phone" class="form-control edit_profile_field" id="phone" placeholder="Phone" required value="{{$driver->mobile}}">

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

