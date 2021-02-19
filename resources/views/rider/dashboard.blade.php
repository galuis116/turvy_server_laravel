@extends('rider.layouts.app')
@section('style')
    <style>
        .clear{clear:both !important;}
        .tab-content a{ color:#222; font-style:normal;}
        .tab-content a:hover{ text-decoration:none; color:#222;}

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        .modal_lft{
            position:absolute !important;
            top:35%;
            margin-left: 5%;
            margin-right: 5%;
        }
    </style>
@endsection
@section('content')
    @php
        $rider = Auth::guard('rider')->user();
    @endphp

    <div id="home" class="tab-pane fade in active">
        <div class="" id="" style="padding: 20px">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{route('rider.profile')}}" enctype="multipart/form-data">
                        @include('partials.message')
                        @csrf
                        <div class="form-group edit_profile_label col-md-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control edit_profile_field" id="first_name" placeholder="Your First Name" value="{{$rider->first_name}}" required>
                        </div>
                        <div class="form-group edit_profile_label col-md-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control edit_profile_field" id="last_name" placeholder="Your Last Name" value="{{$rider->last_name}}" required>
                        </div>
                        <div class="form-group edit_profile_label col-md-6">
                            <label>Mobile</label>
                            <input type="text"  class="form-control edit_profile_field" id="mobile" name="mobile" placeholder="Your Mobile Number" value="{{$rider->mobile}}" disabled>
                        </div>
                        <div class="form-group edit_profile_label col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control edit_profile_field" id="email" placeholder="Your Email" value="{{$rider->email}}" disabled>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <div id="add-payment" style="font-size: 22px; padding: 10px 0; cursor: pointer;">+ Add payment method</div>
                            <div id="choose-payment-method" style="font-size: 20px; display:none">
                                <li id="stripe" style="margin: 15px 0;cursor: pointer;"><img src="{{asset('images/stripe.png')}}" width="50px"> Credit or debit card</li>
                                <li id="paypal" style="margin: 15px 0;cursor: pointer;"><img src="{{asset('images/paypal.jpg')}}" width="50px"> PayPal</li>
                            </div>
                            <div id="paypal-payment" style="display:none">
                                <h3>Add your paypal</h3>
                                <div class="row">
                                    <div class="form-group edit_profile_label col-md-12">
                                        <label>PayPal address</label>
                                        <input type="text"  class="form-control edit_profile_field" id="mobile" name="mobile" placeholder="Your Mobile Number" value="{{$rider->mobile}}" disabled>
                                    </div>
                                    <div class="form-group edit_profile_label col-md-12">
                                        <button id="add-stripe" type="button" class="btn btn-block btn-primary">Add card</button>
                                        <button type="button" class="btn btn-block btn-default btn-cancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div id="stripe-payment" style="display:none">
                                <div class="row">
                                    <div class="form-group edit_profile_label col-md-12">
                                        <label>Card number</label>
                                        <input type="text"  class="form-control edit_profile_field" id="mobile" name="mobile" placeholder="Your Mobile Number" value="{{$rider->mobile}}" disabled>
                                    </div>
                                    <div class="form-group edit_profile_label col-md-6">
                                        <label>Exp.date</label>
                                        <input type="email" name="email" class="form-control edit_profile_field" id="email" placeholder="Your Email" value="{{$rider->email}}" disabled>
                                    </div>
                                    <div class="form-group edit_profile_label col-md-6">
                                        <label>Security code</label>
                                        <input type="email" name="email" class="form-control edit_profile_field" id="email" placeholder="Your Email" value="{{$rider->email}}" disabled>
                                    </div>
                                    <div class="form-group edit_profile_label col-md-6">
                                        <label>Country</label>
                                        <input type="email" name="email" class="form-control edit_profile_field" id="email" placeholder="Your Email" value="{{$rider->email}}" disabled>
                                    </div>
                                    <div class="form-group edit_profile_label col-md-6">
                                        <label>Postcode</label>
                                        <input type="email" name="email" class="form-control edit_profile_field" id="email" placeholder="Your Email" value="{{$rider->email}}" disabled>
                                    </div>
                                    <div class="form-group edit_profile_label col-md-12">
                                        <button type="button" class="btn btn-block btn-primary">Add card</button>
                                        <button type="button" class="btn btn-block btn-default btn-cancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group edit_profile_label col-md-12">
                            <label> Upload Your Photo </label>
                            <br>
                            @if($rider->avatar != "")
                                <img class="img-responsive" id="blah" src="{{asset($rider->avatar)}}" style="margin-bottom: 10px;width: 200px;height: 200px; !important;" />
                            @else
                                <img class="img-responsive" id="blah" src="{{asset('images/no-person.png')}}" style="margin-bottom: 10px;width: 200px;height: 200px; !important;" />
                            @endif
                            <br>
                            <input type="file" class="form-control edit_profile_field"  name ="avatar" onchange="readURL(this);">
                        </div>
                        <div class="form-group  col-md-6">
                            <input type="submit" class="submit_btn" style="width:100%;" value="Update Profile">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

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
            $('#add-payment').on('click', function(){
                $('#choose-payment-method').show();
            });
            $('#stripe').on('click', function(){
                $('#choose-payment-method').hide();
                $('#paypal-payment').hide();
                $('#stripe-payment').show();
            });
            $('#paypal').on('click', function(){
                $('#choose-payment-method').hide();
                $('#stripe-payment').hide();
                $('#paypal-payment').show();
            });
            $('.btn-cancel').on('click', function(){
                $('#choose-payment-method').show();
                $('#stripe-payment').hide();
                $('#paypal-payment').hide();
            });
        })
    </script>
@endsection