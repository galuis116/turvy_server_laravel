@extends('layouts.app-auth')
@section('title', 'Login')
@section('styles')
    <style>
        #login-step-2, #login-step-3, #login-error-message{
            display: none;
        }
    </style>
@endsection
@section('content')
    @php
        $route = \Request::route()->getName();
    @endphp
    <!-- sign-reg info -->
    <section class="abd-sign-reg-wrapper abd-bg abd-pt abd-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="abd-nav-tab-title text-center">
                        <h2 class="main-color">Sign in as driver</h2>
                    </div>
                    <div class="abd-nav-tabs">
                        <div class="tab-content" id="abdContent">
                            @include('partials.message')
                            <div class="tab-pane fade @if(str_contains($route, 'driver')) show active @endif" id="signintoride" role="tabpanel" aria-labelledby="signintoride-tab">
                                <div class="abd-tab-content">
                                    <form id="frm_riger_login" method="post" action="{{route('driver.login')}}">
                                        @csrf
                                        <div id="login-error-message" class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <p>Please choose the country.</p>
                                        </div>
                                        <div id="login-step-1">
                                            <h4>Enter your phone number (required)</h4>
                                            <div class="abd-single-inpt">
                                                <select id="rider_country" name="country_id">
                                                    <option selected>Select Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" data-code="{{$country->phonecode}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="abd-single-inpt">
                                                <input type="text" name="phonecode" id="rider_phonecode" class="cn_code" readonly>
                                                <div class="bnr_input_group1">
                                                    <input type="number" style="padding-left:60px !important;" name="mobile" id="mobile" class="phone_input" placeholder="Phone Number" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="abd-single-inpt signin-signup">
                                                <button id="btn-next-step-1" type="button">Next</button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Don't have an account? <a href="{{route('rider.register')}}">Sign up <i class="fas fa-angle-double-right"></i></a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="login-step-2">
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

                                        <div id="login-step-3">
                                            <h4>Enter your password</h4>
                                            <div class="abd-single-inpt">
                                                <input type="password" id="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="abd-single-inpt signin-signup">
                                                <button type="submit">Next</button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pull-text">
                                                    <p class="text-right"><a href="{{ route('rider.password.request') }}">Forgot password?</a></p>
                                                </div>
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
    </section>
    <!-- sign-reg info /end -->
    <div id="recaptcha-container"></div>
@endsection
@section('scripts')
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>    
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyDxfJG2fkdNLuMKaBPQTliNQwdUy0wwmEs",
            authDomain: "turvy-1501496198977.firebaseapp.com",
            databaseURL: "https://turvy-1501496198977.firebaseio.com",
            projectId: "turvy-1501496198977",
            storageBucket: "turvy-1501496198977.appspot.com",
            messagingSenderId: "645200450479",
            appId: "1:645200450479:web:287077ad854c7bd1d9155a"
        };

      firebase.initializeApp(firebaseConfig);

      // Create a Recaptcha verifier instance globally
      // Calls submitPhoneNumberAuth() when the captcha is verified
      //normal
      //Go to Firebase Console -> Authentication -> sign-in-method -> Authorized Domains and add your domain.
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        "recaptcha-container",
        {
          size: "invisible",
          callback: function(response) {
            submitPhoneNumberAuth();
          }
        }
      );
        $(document).ready(function(){
            $('#rider_country').change(function(){
                $('#login-error-message').hide();
                $('#rider_phonecode').val('+'+$('option:selected', this).attr('data-code'));
            });
            $('#mobile').keyup(function(){
                $('#login-error-message').hide();
                var str = $('#mobile').val();
                if(str.length>1) {
                    var patt = new RegExp("^[1-9][0-9]");
                    var res = patt.test(str);

                    //remove starting zero from phone no field
                    str = str.replace(/^0+/, '')
                    $(this).val(str);

                    
                    if(!res) {
                        $('#login-error-message').show();
                        $('#login-error-message p').text('Please don\'t start with 0');
                    }
                    else{
                        $('#login-error-message').hide();
                    }
                }
                else{
                    $('#login-error-message').hide();
                }
            });
            $('#btn-next-step-1').click(function(){
                var phone_code = $('#rider_phonecode').val();
                var phone_number = $('#mobile').val();
                if(phone_code === '')
                {
                    $('#login-error-message').show();
                    $('#login-error-message p').text('Please choose the country.');
                }
                if(phone_number === '')
                {
                    $('#login-error-message').show();
                    $('#login-error-message p').text('Please input your phone number.');
                }
                var number = phone_code + phone_number;

                var appVerifier = window.recaptchaVerifier;
                firebase
                .auth()
                .signInWithPhoneNumber(number, appVerifier)
                .then(function(confirmationResult) {
                    window.confirmationResult = confirmationResult;
                    $('#span-phone-number').text(number);
                    $('#login-step-1').hide();
                    $('#login-step-2').show();
                })
                .catch(function(error) {
                    //console.log('Error1:',error);
                    $('#login-error-message').show();
                    $('#login-error-message p').text(error);
                });

                /*$.ajax({
                    url: "{{route('getDriverOTP')}}",
                    type: "GET",
                    data: {
                        "phone_number": number
                    },
                    success: function(result){
                        if(result.status == 1){
                            $('#span-phone-number').text(number);
                            $('#login-step-1').hide();
                            $('#login-step-2').show();
                        }else{
                            $('#login-error-message').show();
                            $('#login-error-message p').text(result.message);
                        }
                    }
                });*/
            });
            $('#btn-next-step-2').click(function(){
                var otp_code = $('#otp').val();
                var phone_code = $('#rider_phonecode').val();
                var phone_number = $('#mobile').val();
                if(otp_code === '')
                {
                    $('#login-error-message').show();
                    $('#login-error-message p').text('Please input OTP code.');
                }

                confirmationResult
                .confirm(otp_code)
                .then(function(result) {
                    var user = result.user;
                    //console.log(user);
                    $('#login-step-1').hide();
                    $('#login-step-2').hide();
                    $('#login-step-3').show();
                })
                .catch(function(error) {
                    //console.log(error);
                    $('#login-error-message').show();
                    $('#login-error-message p').text(error);
                });

                /*$.ajax({
                    url: "{{route('checkOTP')}}",
                    type: "GET",
                    data: {
                        "code": otp_code,
                        "phone_number": phone_code + phone_number
                    },
                    success: function(result){
                        console.log(result);
                        if(result.status == 1){
                            $('#login-step-1').hide();
                            $('#login-step-2').hide();
                            $('#login-step-3').show();
                        }else{
                            $('#login-error-message').show();
                            $('#login-error-message p').text(result.message);
                        }
                    }
                });*/
            });
        });
    </script>
    
@endsection
