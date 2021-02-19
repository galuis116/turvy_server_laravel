@extends('rider.layouts.app')
@section('content')
    @php
        $rider = Auth::guard('rider')->user();
    @endphp

    <div id="home" class="tab-pane fade in active">
        <div class="" id="" style="padding: 20px">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{route('rider.comment')}}">
                        @include('partials.message')
                        @csrf
                        <div class="form-group edit_profile_label">
                            <textarea style="height:100px !important" class="form-control edit_profile_field" placeholder="Your comment" name="comment" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="submit_btn" style="width:100%;" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()

