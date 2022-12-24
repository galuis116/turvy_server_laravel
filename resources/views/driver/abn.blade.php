@extends('driver.layouts.app')

@section('content')

    <div id="home" class="tab-pane fade in active">

        <div class="" id="" style="padding: 20px">

            <div class="row">

                <div class="col-md-6">

                    <form method="post" action="{{route('driver.abn')}}" enctype="multipart/form-data">

                        @include('partials.message')

                        @csrf

                        <div class="form-group edit_profile_label">

                            <input type="text" name="abn" class="form-control edit_profile_field" id="abn" placeholder="Your ABN" required value="{{Auth::guard('driver')->user()->abn}}">

                        </div>
               

                        <div class="form-group">

                            <input type="submit" class="submit_btn" style="width:100%;" value="Submit">

                        </div>



                    </form>

                </div>

            </div>

        </div>

    </div>



@endsection

