@extends('layouts.app-auth')
@section('title') Register @endsection
@section('styles')
    <style>
        .abd-nav-tabs .nav-tabs li {
            width: 50%;
        }
        .form-validation-error {
            color: red;
            top: 50px !important;
            left: 0px !important;
            display: none;
        }
        #register-error-message, #register-step-2, #register-step-3, #register-step-4 {
            display: none;
        }
    </style>
@endsection

@section('content')
<!-- sign-reg info -->
<section class="abd-sign-reg-wrapper abd-bg abd-pt abd-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="abd-nav-tab-title text-center">
                    <h2 class="main-color">Sign up as rider</h2>
                </div>
                <div class="tab-content" id="abdContent">
                    <div class="form-msg form-group"></div>
                    @include('partials.message')
                    <div class="abd-tab-content">
                        <form name="myForm" id="myForm" method="post" action="{{route('rider.register')}}">
                            @csrf
                            <div id="register-error-message" class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <p>Please choose the country.</p>
                            </div>
                            <div id="register-step-1">
                                <h4>Please input your phone number.</h4>
                                <div class="abd-single-inpt">
                                    <select id="rider_country" name="country_id">
                                        <option selected>Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}" data-phone-code="{{$country->phonecode}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="abd-single-inpt">
                                    <input type="text" id="rider_phonecode" name="phonecode" class="cn_code" readonly>
                                    <div class="bnr_input_group1">
                                        <input type="number" style="padding-left:60px !important;" id="rider_phone" name="user_phone" class="phone_input user-phone" placeholder="Phone Number" autocomplete="off">
                                    </div>
                                    <span class="form-validation-error">Please don't start with 0</span>
                                </div>
                                <div class="abd-single-inpt signin-signup">
                                    <button type="button" id="btn-next-step-1">Next</button>
                                </div>
                                <p>Already have an account? <a href="{{route('rider.login')}}">Sign in <i class="fas fa-angle-double-right"></i></a></p>
                            </div>

                            <div id="register-step-2">
                                <h4>Enter the 6-digit code sent to you at <span id="span-phone-number">+61417691066</span></h4>
                                <div class="abd-single-inpt">
                                    <input type="number" id="otp" name="otp" placeholder="000000">
                                </div>
                                <div class="abd-single-inpt signin-signup">
                                    <button id="btn-next-step-2" type="button">Next</button>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><a href="{{route('rider.register')}}">Resend Code</a></p>
                                    </div>
                                </div>
                            </div>

                            <div id="register-step-3">
                                <h4>Please input your personal information.</h4>
                                <div class="abd-dbl-inpt">
                                    <input type="text" id="first_name" name="first_name" placeholder="First Name">
                                    <input type="text" id="last_name" name="last_name" placeholder="Last Name">
                                </div>
                                <div class="abd-single-inpt">
                                    @if(isset($partner))
                                    <input type="text" value="{{$partner->username}}" readonly/>
                                    <input type="hidden" id="partner" value="{{$partner->id}}" name="partnerID"/>
                                    @else
                                    <select id="partner" name="partnerID">
                                        <option selected value="0">Select Partner</option>
                                        @if(count($partners)) @foreach($partners as $partner)
                                        <option value="{{$partner->id}}">{{$partner->organization}}</option>
                                        @endforeach @endif
                                    </select>
                                    @endif
                                </div>
                                <div class="abd-single-inpt signin-signup">
                                    <button id="btn-next-step-3" type="button">Next</button>
                                </div>
                            </div>

                            <div id="register-step-4">
                                <h4>Please input your account information.</h4>
                                <div class="abd-single-inpt img-icon">
                                    <span>
                                        <img src="{{asset('images/icons/email.png')}}" alt="email">
                                    </span>
                                    <input type="email" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="abd-single-inpt img-icon">
                                    <span>
                                        <img src="{{asset('images/icons/lock.png')}}" alt="lock">
                                    </span>
                                    <input type="password" name="password" id="password" placeholder="Password">
                                </div>

                                <div class="abd-single-inpt signin-signup">
                                    <button id="btn-finish" type="button">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- sign-reg info /end -->
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.user-phone').on('keyup', function(){
            $('#register-error-message').hide();
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
        $('#rider_country').on('change', function(){
            $('#register-error-message').hide();
            $('#rider_phonecode').val('+'+$('option:selected', this).attr('data-phone-code'));
        });
        $('#btn-next-step-1').click(function(){
            var phone_code = $('#rider_phonecode').val();
            var phone_number = $('#rider_phone').val();
            if(phone_code === '')
            {
                $('#register-error-message').show();
                $('#register-error-message p').text('Please choose the country.');
                return false;
            }
            if(phone_number === '')
            {
                $('#register-error-message').show();
                $('#register-error-message p').text('Please input your phone number.');
                return false;
            }
            var number = phone_code + phone_number;
            
            $.ajax({
                url: "{{route('getRiderRegisterOTP')}}",
                type: "GET",
                data: {
                    "phone_number": number
                },
                success: function(result){
                    if(result.status == 1){
                        $('#span-phone-number').text(number);
                        $('#register-step-1').hide();
                        $('#register-step-2').show();
                    }else{
                        $('#register-error-message').show();
                        $('#register-error-message p').text(result.message);
                    }
                }
            });
        });
        $('#btn-next-step-2').click(function(){
            var otp_code = $('#otp').val();
            var phone_code = $('#rider_phonecode').val();
            var phone_number = $('#rider_phone').val();
            var number = phone_code + phone_number;
            if(otp_code === '')
            {
                $('#register-error-message').show();
                $('#register-error-message p').text('Please input OTP code.');
                return false;
            }

            $.ajax({
                url: "{{route('checkOTP')}}",
                type: "GET",
                data: {
                    "code": otp_code,
                    "phone_number": number
                },
                success: function(result){
                    console.log(result);
                    if(result.status == 1){
                        $('#register-step-1').hide();
                        $('#register-step-2').hide();
                        $('#register-step-3').show();
                    }else{
                        $('#register-error-message').show();
                        $('#register-error-message p').text(result.message);
                    }
                }
            });
        });
        $('#btn-next-step-3').click(function(){
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var partnerID = $('#partner').val();
            if(first_name === '')
            {
                $('#register-error-message').show();
                $('#register-error-message p').text('Please input your first name.');
                return false;
            }
            if(last_name === '')
            {
                $('#register-error-message').show();
                $('#register-error-message p').text('Please input your last name.');
                return false;
            }
            if(partnerID === "0" || partnerID === undefined)
            {
                $('#register-error-message').show();
                $('#register-error-message p').text('Please choose your partner.');
                return false;
            }
            $('#register-step-1').hide();
            $('#register-step-2').hide();
            $('#register-step-3').hide();
            $('#register-step-4').show();
        });
        $('#first_name').on('keyup', function(){
            $('#register-error-message').hide();
        });
        $('#otp').on('keyup', function(){
            $('#register-error-message').hide();
        });
        $('#last_name').on('keyup', function(){
            $('#register-error-message').hide();
        });
        $('#partner').on('change', function(){
            $('#register-error-message').hide();
        });
        $('#btn-finish').click(function(){
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var email = $('#email').val();
            var phone_code = $('#rider_phonecode').val();
            var phone_number = $('#rider_phone').val();
            var partner_id = $('#partner').val();
            var password = $('#password').val();

            if(email === '')
            {
                $('#register-error-message').show();
                $('#register-error-message p').text('Please input the email.');
                return false;
            }
            if(password === '')
            {
                $('#register-error-message').show();
                $('#register-error-message p').text('Please input the password.');
                return false;
            }
            if(password.length < 8)
            {
                $('#register-error-message').show();
                $('#register-error-message p').text('Password should be 8 digits and letters.');
                return false;
            }
            $.ajax({
                url: "{{route('rider.register')}}",
                type: "POST",
                data: {
                    "first_name": first_name,
                    "last_name": last_name,
                    "phonecode": phone_code,
                    "user_phone": phone_number,
                    "partnerID": partner_id,
                    "email": email,
                    "password": password,
                    "_token": "{{csrf_token()}}"
                },
                success: function(result){
                    console.log(result);
                    if(result.status == 1){
                        window.location.href = '{{route("rider.verify")}}';
                    }else{
                        $('#register-error-message').show();
                        $('#register-error-message p').text(result.message);
                    }
                }
            });
        });
    });
</script>
@endsection
