@extends('driver.layouts.app')



@section('content')



    <div id="home" class="tab-pane fade in active">

        <div class="" id="" style="padding: 20px">

            <div class="row">

                <div class="col-md-6">

                    <form method="post" action="{{route('driver.vehicle')}}" enctype="multipart/form-data">

                        @include('partials.message')

                        @csrf

                        <div class="form-group edit_profile_label">
                            <label class="control-label">Make*</label>
                            <select class="form-control edit_profile_field" name="make_id">
                                <option value="">Select a make</option>
                                @foreach($makes as $make)
                                    <option value="{{$make->id}}" @if(isset($vehicle)) @if($vehicle->make_id == $make->id) selected @endif @endif>{{$make->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group edit_profile_label">
                            <label class="control-label">Model*</label>
                            <select class="form-control edit_profile_field" name="model_id">
                                <option value="">Select a model</option>
                                @foreach($models as $model)
                                    <option value="{{$model->id}}" @if(isset($vehicle)) @if($vehicle->model_id == $model->id) selected @endif @endif>{{$model->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group edit_profile_label">
                            <label class="control-label">Year*</label>
                            <select class="form-control edit_profile_field" name="year">
                                <option value="">Select a year</option>
                                @for($year=1950;$year<date("Y")+1;$year++)
                                    <option value="{{$year}}" @if(isset($vehicle)) @if($vehicle->year == $year) selected @endif @endif>{{$year}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group edit_profile_label">
                            <label class="control-label">License plate*</label>
                            <input type="text" class="form-control edit_profile_field" name="plate" @if(isset($vehicle)) value="{{$vehicle->plate}}" @endif/>
                        </div>

                        <div class="form-group edit_profile_label">
                            <label class="control-label">Vehicle Color</label>
                            <input type="text" class="form-control edit_profile_field" name="color" @if(isset($vehicle)) value="{{$vehicle->color}}" @endif/>
                        </div>

                        <div class="form-group edit_profile_label">

                            <label> Upload Front Photo Of Vehicle</label>

                            <br>

                            @if(isset($vehicle) && $vehicle->front_photo != "")

                                <img class="col-md-4 col-sm-8 col-xs-8 img-responsive" id="blah" src="{{asset($vehicle->front_photo)}}" style="margin-bottom: 10px;width: 200px;height: 200px; !important;" />

                            @else

                                <img class="col-md-4 col-sm-8 col-xs-8 img-responsive" id="blah" src="{{asset('images/no-image.png')}}" style="margin-bottom: 10px;width: 200px;height: 200px; !important;" />

                            @endif

                            <br>

                            <input type="file" class="form-control edit_profile_field"  name ="vehicle_image" id="blah" onchange="readURL(this);">

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

@section('script')

    <script>

        function readURL(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function (e) {

                    $('#blah')

                            .attr('src', e.target.result)

                            .width(200)

                            .height(200);

                };



                reader.readAsDataURL(input.files[0]);

            }

        }
    </script>

@endsection
