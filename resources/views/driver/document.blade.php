@extends('driver.layouts.app')



@section('style')

    <link href="{{asset('driver-panel/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{asset('driver-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}"/>

@endsection



@section('content')



    <div class="col-md-12">



        <form method="POST" class="form-horizontal" action="{{route('driver.document')}}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <div class="col-md-12">
                    @include('partials.message')
                </div>
            </div>

            <div class="form-group">

            @forelse($documents as $one)

            <div class="col-md-6">

                <div class="card" style="padding: 20px; margin-bottom: 15px;">

                    <div class="card-header" style="padding: 10px; min-height: 60px">{{$one['document_name']}}</div>

                    <div class="card-body">

                        <div class="fileinput fileinput-new" data-provides="fileinput">

                            <div class="fileinput-new thumbnail" style="width:200px;height:200px;">

                                @if($one['document_url'] != '')

                                    <a href="{{asset($one['document_url'])}}" target="_blank">

                                        <img onerror="this.src='{{asset('images/download.jfif')}}'" src="{{asset($one['document_url'])}}" width="190px" height="116px" alt=""/>

                                    </a>

                                @else

                                    <a href="#">

                                        <img src="{{asset('images/no-image.png')}}" width="190px" height="116px" alt=""/>

                                    </a>

                                @endif

                            </div>

                            <div class="fileinput-preview fileinput-exists thumbnail" style="width:200px;height:200px;"></div>

                            <div>

                                        <span class="btn btn-default btn-file">

                                            <span class="fileinput-new">Select File </span>

                                            <span class="fileinput-exists">Change </span>

                                            <input type="file" name="document{{$one['document_id']}}">

                                        </span>

                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>

                            </div>

                        </div>

                        <div>

                            <label class="mb-10">Expire Date</label>

                            <div class="input-group date">

                                <div class="input-group-addon">

                                    <i class="fa fa-calendar"></i>

                                </div>

                                <input type="text" name="date{{$one['document_id']}}" class="form-control pull-right expiredate" id="datepicker" value="{{$one['document_expire_date'] != '' ? $one['document_expire_date'] : ''}}">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @empty

                <div class="col-md-6">

                    <p>Documents required by drivers are not created in this city. Please contact your supervisor.</p>

                </div>

            @endforelse

            </div>

            <div class="form-group">

                <div class="col-md-6">

                    <button type="submit" class="btn btn-primary form-control">Upload Documents</button>

                </div>

            </div>



        </form>



    </div>



@endsection()



@section('script')

    <script src="{{asset('driver-panel/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('driver-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"></script>



    <script>

        $('.expiredate').datepicker({

            autoclose: true

        })

    </script>

@endsection

