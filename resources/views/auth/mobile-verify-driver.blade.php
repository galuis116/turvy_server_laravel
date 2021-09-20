@extends('layouts.app-auth')
@section('title', 'Phone Verification')
@section('content')
<section class="abd-sign-reg-wrapper abd-bg abd-pt abd-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="abd-nav-tab-title text-center">
                    <h2 class="main-color">{{ __('Verify Your Email') }}</h2>
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
                                <form method="POST" action="{{route('driver.verify')}}">
                                    @csrf
                                    <h3>Thanks for registering our website. Just sent the email to {{session('email')}} for email verification. Please check your mail inbox.</h3>
                                    <div class="abd-single-inpt signin-signup">
                                        <a href="{{route('driver.login')}}">
                                            {{ __('Back') }}
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
