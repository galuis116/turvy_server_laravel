@extends('driver.layouts.app')



@section('content')



    <div id="home" class="tab-pane fade in active">

        <div class="" id="" style="padding: 20px">

            <div class="row">

                <div class="col-md-6">

                    <form method="post" action="{{route('driver.changepassword')}}" enctype="multipart/form-data">

                        @include('partials.message')

                        @csrf

                        <div class="form-group edit_profile_label">

                            <label>Old Password</label>

                            <input type="password" name="old_password" class="form-control edit_profile_field" id="old_password" placeholder="Old Password" value="{{old('old_password')}}" required>

                        </div>

                        <div class="form-group edit_profile_label">

                            <label>New Password</label>

                            <input type="password"  class="form-control edit_profile_field" id="new_password" name="new_password" placeholder="New Password" value="{{old('new_password')}}" required>

                        </div>

                        <div class="form-group edit_profile_label">

                            <label>Confirm Password</label>

                            <input type="password" name="confirm_password" class="form-control edit_profile_field" id="confirm_password" placeholder="Confirm Password" value="{{old('confirm_password')}}" required>

                        </div>



                        <div class="form-group">

                            <input type="submit" class="submit_btn" style="width:100%;" value="Change Password">

                        </div>



                    </form>

                </div>

            </div>

        </div>

    </div>



@endsection()

