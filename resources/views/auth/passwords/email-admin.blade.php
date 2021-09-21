@extends('layouts.app-auth')

@section('title', 'Forgot Password')

@section('content')
<section class="abd-sign-reg-wrapper abd-bg abd-pt abd-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="abd-nav-tab-title text-center">
                    <h2 class="main-color">Forgot Password</h2>
                </div>
                <div class="abd-tab-content">
                    <form id="frm_riger_login" method="post" action="{{ url('admin/password/email') }}">
                        @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session('status') }}
                            </div>
                        @endif
                        @csrf
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="@if(session('email')!== ""){{ session('email') }}@else{{ old('email') }}@endif" placeholder="E-Mail Address">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="abd-single-inpt signin-signup">
                            <button type="submit">Send Password Reset Link</button>
                        </div>
                        <p><a href="{{url('admin/login')}}">Back to sign in<i class="fas fa-angle-double-right"></i></a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
