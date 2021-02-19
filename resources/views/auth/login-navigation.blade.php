@extends('layouts.app-auth')
@section('title', 'Login')
@section('styles')
    <style>
        .abd-services-row {
            min-height: 300px;
        }
        .abd-default-card {
            background: #226CA8 !important;
            height: 130px;
            cursor: pointer;
        }
        .abd-default-card:hover {
            background: rgba(34, 108, 168, 0.7) !important;
        }
        .abd-default-card h1, .abd-default-card h1 > i {
            color: white !important;
            font-size: 35px;
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
            <div class="row abd-services-row">
                <div class="col-md-4 col-sm-6">
                    <a href="{{route('rider.login')}}">
                        <div class="abd-default-card">
                            <h1>Rider Login <i class="fa fa-arrow-right"></i></h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="{{route('driver.login')}}">
                        <div class="abd-default-card">
                            <h1>Driver Login <i class="fa fa-arrow-right"></i></h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="{{route('partner.login')}}">
                        <div class="abd-default-card">
                            <h1>Partner Login <i class="fa fa-arrow-right"></i></h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- sign-reg info /end -->
@endsection
