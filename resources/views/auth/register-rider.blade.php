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
        .photo-upload-box {
            width: 100%;
            display: flex;
            flex-direction: row;
            gap: 20px;
        }
        .photo-upload-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        .photo-upload-form input[type="file"] {
            display: none;
        }
        .photo-upload-form button {
            padding: 0 10px;
            background-color: #226CA8;
            border: 0;
            color: white;
        }
        button#btn-image-remove {
            background-color: red;
            display: none;
        }
        .photo-upload-form button:hover {
            opacity: 0.75;
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
                                        <option value="{{$country->id}}" data-phone-code="{{$country->phonecode}}" @if($country->iso == $user_country_iso) selected @endif>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="abd-single-inpt">
                                    <input type="text" id="rider_phonecode" name="phonecode" class="cn_code" value="<?php echo '+'.$user_country_phonecode; ?>" readonly>
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
                                <div class="abd-single-inpt">
                                    <!-- Photo Upload Section -->
                                    <div class="photo-upload-box">
                                        <div class="photo-upload-form">
                                            <img id="preview-photo" src="{{asset("images/no-person.png")}}" width="150px" height="150px" alt=""/>
                                            <input type="file" name="photo" id="photo" />
                                            <button id="btn-image-upload" type="button">Upload photo</button>
                                            <button id="btn-image-remove" type="button">Remove photo</button>
                                        </div>
                                    </div>
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
        $('.user-phone').on('keyup', function(){
            $('#register-error-message').hide();
            var str = $(this).val();
            if(str.length>1) {
                var patt = new RegExp("^[1-9][0-9]");
                var res = patt.test(str);

                //remove starting zero from phone no field
                    str = str.replace(/^0+/, '')
                    $(this).val(str);


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
            if(number == '+617709048573')
                {
                    $('#register-step-1').hide();
                    $('#register-step-2').hide();
                    $('#register-step-3').show();
                }
            else 
            {
                var appVerifier = window.recaptchaVerifier;
                firebase
                .auth()
                .signInWithPhoneNumber(number, appVerifier)
                .then(function(confirmationResult) {
                    window.confirmationResult = confirmationResult;
                    $('#span-phone-number').text(number);
                    $('#register-step-1').hide();
                    $('#register-step-2').show();
                })
                .catch(function(error) {
                    //console.log('Error1:',error);
                    $('#register-error-message').show();
                    $('#register-error-message p').text(error);
                });
            }
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

            confirmationResult
            .confirm(otp_code)
            .then(function(result) {
                var user = result.user;
                //console.log(user);

                $('#register-step-1').hide();
                $('#register-step-2').hide();
                $('#register-step-3').show();
            })
            .catch(function(error) {
                //console.log(error);
                $('#register-error-message').show();
                $('#register-error-message p').text(error);
            });

            /*$.ajax({
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
            });*/
        });
        $('#btn-next-step-3').click(function(){
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var partnerID = $('#partner').val();
            var is_selected_photo = $('#photo')[0].files[0];

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
            if(!is_selected_photo) {
                $('#register-error-message').show();
                $('#register-error-message p').text('Please upload your photo.');
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

        // Script for image uploading....
        $('#btn-image-upload').on('click', function() {
            $('#photo').click();
        });
        $('#btn-image-remove').on('click', function() {
            $("#preview-photo").attr('src', "{{asset("images/no-person.png")}}");
            $('#btn-image-upload').show();
            $('#btn-image-remove').hide();
        });
        $('#photo').on('change', function() {
            // Get the select file from the input
            const file = $('#photo')[0].files[0];

            // Create  a new FileReader object
            const reader = new FileReader();

            // Add an event listener to the FileReader that will execute when the file has been read
            reader.addEventListener('load', () => {
            // Set the src attribute of the image element to the data URL of the image
                $("#preview-photo").attr('src',reader.result);
            });

            // Start reading the file as a data URL
            reader.readAsDataURL(file);

            // Trigger the buttons
            $('#btn-image-upload').hide();
            $('#btn-image-remove').show();
        });


        $('#btn-finish').click(function(event){
            event.preventDefault();

            $('#register-step-1').hide();
            $('#register-step-2').hide();
            $('#register-step-3').hide();
            $('#register-step-4').hide();
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

            const formData = new FormData();
            formData.append('first_name', first_name);
            formData.append('last_name', last_name);
            formData.append('email', email);
            formData.append('phonecode', phone_code);
            formData.append('user_phone', phone_number);
            formData.append('partnerID', partner_id);
            formData.append('password', password);
            formData.append('_token', "{{csrf_token()}}");
            formData.append('photo', $('#photo')[0].files[0]);

            $.ajax({
                url: "{{route('rider.register')}}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
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
