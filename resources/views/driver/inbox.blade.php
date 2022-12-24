@extends('driver.layouts.app')
@section('style')
    <style>
        .inbox-container {
            height: 550px;
            overflow-y: scroll;
            border: 1px solid #e2e2e2;
            padding: 1vh 1vw;
            margin-top: 1vh;
        }
        .inbox-container .inbox {
            border: 1px solid #e2e2e2;
            padding: 1vh 1vw;
        }
    </style>
@endsection
@section('content')

<div id="home" class="tab-pane fade in active">
    <div class="" id="" style="padding: 20px">
        <div class="row">
            <div class="col-md-12">
                <h3>Inbox</h3>
                <div class="inbox-container">
                    @foreach($notifications as $notification)
                        <div class="inbox">
                            <h4>{{$notification->heading}}</h4>
                            <p>{{$notification->content}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()