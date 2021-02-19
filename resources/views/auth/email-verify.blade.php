@extends('layouts.app-auth')
@section('title', 'Phone Verification')
@section('content')
<section class="abd-sign-reg-wrapper abd-bg abd-pt abd-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="abd-nav-tab-title text-center">
                    <h2 class="main-color">{{ __('Verify Your Phone Number') }}</h2>
                </div>
                <div class="abd-nav-tabs">
                    <div class="tab-content" id="abdContent">
                        @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                        </div>
                        @endif
                        <div class="tab-pane fade show active" id="signintopartner" role="tabpanel" aria-labelledby="signintodrive-tab">
                            <div class="abd-tab-content drive">
                                <form method="POST" action="{{route('rider.verify')}}">
                                    @csrf
                                    <h3>Please enter the OTP sent to your number: {{session('mobile')}}</h3>
                                    <div class="abd-single-inpt">
                                        <input type="hidden" name="mobile" value="{{session('mobile')}}">
                                        <input id="verification_code" type="tel" name="verification_code" value="{{ old('verification_code') }}" required>
                                        @error('verification_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="abd-single-inpt signin-signup">
                                        <button type="submit">
                                            {{ __('Verify Phone Number') }}
                                        </button>
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
@endsection
