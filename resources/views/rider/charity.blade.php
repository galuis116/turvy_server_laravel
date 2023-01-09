@extends('rider.layouts.app')
@section('style')
    <style>
        ul.rider-charity {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 0px 10px;
        }
        ul.rider-charity > li {
            font-size: 16px;
            margin: 10px 0;
        }
        ul.rider-charity > li > a {
            padding: 0 !important;
            color: transparent;
        }
        .color-blue {
            color: #226CA8
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
                        <li><a href="{{ $rider->partner->url }}"><img src="{{ asset($rider->partner->avatar) }}" width="100%" /></a></li>
                        <li><h4 class="color-blue">{{ $rider->partner->organization }}</h4></li>
                        <li><b>Partner's Income:</b> <span class="color-blue">{{ currency_format($rider->partner_income) }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection()

