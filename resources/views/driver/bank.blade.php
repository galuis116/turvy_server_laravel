@extends('driver.layouts.app')



@section('content')



    <div id="home" class="tab-pane fade in active">

        <div class="" id="" style="padding: 20px">

            <div class="row">

                <div class="col-md-6">

                    <form method="post" action="{{route('driver.bank')}}" enctype="multipart/form-data">

                        @include('partials.message')

                        @csrf

                        <div class="form-group edit_profile_label">

                            <label>BSB Number</label>

                            <input type="text" name="bsb_number" class="form-control edit_profile_field" id="bsb_number" placeholder="BSB Number" value="{{isset($driver_bank_detail) ? $driver_bank_detail->bsb_number : ''}}" required>

                        </div>

                        <div class="form-group edit_profile_label">

                            <label>Bank Name</label>

                            <input type="text" name="bank_name" class="form-control edit_profile_field" id="bank_name" placeholder="Bank Name" value="{{isset($driver_bank_detail) ? $driver_bank_detail->bank_name : ''}}" required>

                        </div>

                        <div class="form-group edit_profile_label">

                            <label>Bank Account Number</label>

                            <input type="text"  class="form-control edit_profile_field" id="bank_account_number" name="bank_account_number" placeholder="Bank Account Number" value="{{isset($driver_bank_detail) ? $driver_bank_detail->bank_account_number : ''}}" required>

                        </div>





                        <div class="form-group edit_profile_label">

                            <label>Account Holder Name</label><span style="font-size: 11px;"> (exactly as it looks on your bank statement):</span>

                            <input type="text"  class="form-control edit_profile_field" id="account_name" name="account_name" placeholder="Your Name" value="{{isset($driver_bank_detail) ? $driver_bank_detail->bank_account_title : ''}}" required>

                        </div>



                        <div class="form-group edit_profile_label">

                            <label>Address</label>

                            <input type="text"  class="form-control edit_profile_field" id="address" name="address" placeholder="Your Address" value="{{isset($driver_bank_detail) ? $driver_bank_detail->bank_address: ''}}" required>

                        </div>



                        <div class="form-group edit_profile_label">

                            <label>City</label>

                            <input type="text"  class="form-control edit_profile_field" id="city" name="city" placeholder="City" value="{{isset($driver_bank_detail) ? $driver_bank_detail->bank_city: ''}}" required>

                        </div>



                        <div class="form-group edit_profile_label">

                            <label>Post Code</label>

                            <input type="text"  class="form-control edit_profile_field" id="post_code" name="post_code" placeholder="Post Code" value="{{isset($driver_bank_detail) ? $driver_bank_detail->bank_postal_code: ''}}" required>

                        </div>



                        <div class="form-group edit_profile_label">

                            <label>D.O.B</label>

                            <input type="text"  class="form-control edit_profile_field" id="dob" name="dob" placeholder="Date Of Birth" value="{{isset($driver_bank_detail) ? $driver_bank_detail->dob : ''}}" required>

                        </div>







                        <div class="form-group">

                            <input type="submit" class="submit_btn" style="width:100%;" value="Update Bank Details">

                        </div>



                    </form>

                </div>

            </div>

        </div>

    </div>



@endsection()

