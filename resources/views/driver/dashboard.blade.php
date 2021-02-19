
@extends('main')

@section('styles')
    <link href="{{asset('/admin-css/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin-css/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}"/>

@endsection

@section('content')

    <section class="mt-80">

        <div class="container">

            <div class="pb-20">

                <div class="col-md-12 pt-60">

                    <h2 class="signin_heading mb-30">Driver Documents</h2>

                    <div class="clearfix"></div>

                    <form method="POST" class="form-horizontal" action="{{route('home.driver_doc_upload')}}" enctype="multipart/form-data">
                        <div class="form-group">
                            @include('notification.notify')
                        </div>
                        <input type="hidden" name="provider_id" value="{{$provider_id}}"/>
                        <div class="form-group">
                            <div class="container">
                                @forelse($result as $one)
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 style="margin-top: 15px;">{{$one['document_name']}}</h5>
                                        </div>
                                    </div>
                                    <div class="row" style="border: 1px solid #e2e2e2;padding: 15px 0px 10px 5px; margin-right: 2px;">
                                        <div class="col-md-6">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width:200px;height:200px;">
                                                    <img src="{{$one['document_url'] != '' ? asset($one['document_url']) : asset('images/no-image.png')}}" width="190px" height="116px" alt=""/>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="width:200px;height:200px;"></div>
                                                <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select image </span>
                                                <span class="fileinput-exists">Change </span>
                                                <input type="file" name="document{{$one['document_id']}}" required>
                                            </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-10">Expire Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="date{{$one['document_id']}}" class="form-control pull-right expiredate" id="datepicker" value="{{$one['document_expire_date'] != '' ? $one['document_expire_date'] : ''}}" required>
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
                        </div>
                        <div class="form-group text-center">
                            <div class="col-md-3">&nbsp;</div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary form-control">Upload Documents</button>
                            </div>
                            <div class="col-md-3">&nbsp;</div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection()

@section('scripts')
    <script src="{{asset('admin-css/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin-css/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"></script>

    <script>
        $('.expiredate').datepicker({
            autoclose: true
        })
    </script>
@endsection

