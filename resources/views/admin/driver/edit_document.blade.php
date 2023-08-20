@extends('admin.layouts.app')



@section('style')
    <link href="{{ asset('driver-panel/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" type="text/css"
        href="{{ asset('driver-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" />
@endsection



@section('content')

    <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">

        <div style="display:flex; justify-content:center; align-items: center;">



            <form method="POST" class="form-horizontal"
                action="{{ route('driver.document.update', ['id' => $document['document_id']]) }}"
                enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <div class="col-md-12">
                        @include('partials.message')
                    </div>
                </div>

                <div class="form-group">


                    <div class="card" style="padding: 20px; margin-bottom: 15px;">

                        <div class="card-header"
                            style="padding: 10px;text-align:center;font-weight:bold;margin-bottom:15px">
                            {{ $document['document_name'] }}</div>
                        <div class="card-body">

                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                <div class="fileinput-new thumbnail" style="width:200px;height:200px;">

                                    @if ($document['document_url'] != '')
                                        @if ($document['document_status'] == 1)
                                            <div class="badge bg-green">Approved</div>
                                        @else
                                            <div class="badge bg-red">Pending</div>
                                        @endif
                                        <a href="{{ asset($document['document_url']) }}" target="_blank">

                                            <img onerror="this.src='{{ asset('images/download.jfif') }}'"
                                                src="{{ asset($document['document_url']) }}" width="190px" height="116px"
                                                alt="" />

                                        </a>
                                    @else
                                        <a href="#">

                                            <img src="{{ asset('images/no-image.png') }}" width="190px" height="116px"
                                                alt="" />

                                        </a>
                                    @endif

                                </div>

                                <div class="fileinput-preview fileinput-exists thumbnail" style="width:200px;height:200px;">
                                </div>

                                <div>

                                    <span class="btn btn-default btn-file">

                                        <span class="fileinput-new">Select File </span>

                                        <span class="fileinput-exists">Change </span>

                                        <input type="file" name="document_file">

                                    </span>

                                    <a href="#" class="btn btn-danger fileinput-exists"
                                        data-dismiss="fileinput">Remove
                                    </a>

                                </div>

                            </div>

                            <div>

                                <label class="mb-10">Expire Date</label>

                                <div class="input-group date">

                                    <div class="input-group-addon">

                                        <i class="fa fa-calendar"></i>

                                    </div>

                                    <input type="date" name="document_expiredate"
                                        class="form-control pull-right expiredate" id="datepicker"
                                        value="{{ $document['document_expire_date'] != '' ? $document['document_expire_date'] : '' }}">

                                </div>

                            </div>

                        </div>

                    </div>



                </div>

                <div class="form-group">


                    <button type="submit" class="btn btn-primary form-control">Upload Document</button>


                </div>



            </form>



        </div>

    </div>

@endsection()



@section('script')
    <script src="{{ asset('driver-panel/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('driver-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}">
    </script>



    <script>
        $('.expiredate').datepicker({

            autoclose: true

        })
    </script>
@endsection
