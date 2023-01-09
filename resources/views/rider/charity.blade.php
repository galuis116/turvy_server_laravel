@extends('rider.layouts.app')
@section('style')
    <style>
        ul.rider-charity > li {
            font-size: 16px;
            margin: 10px 0;
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
                <div class="col-md-6">
                    <ul class="rider-charity">
                        <li><a href="{{ $rider->partner->url }}"><img src="{{ asset($rider->partner->avatar) }}" width="300" /></a></li>
                        <li><b>My Charity:</b> {{ $rider->partner->organization }}</li>
                        <li><b>Partner's Income:</b> {{ currency_format($rider->partner_income) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection()

