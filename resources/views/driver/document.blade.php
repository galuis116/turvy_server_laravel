@extends('driver.layouts.app')



@section('style')

    <link href="{{asset('driver-panel/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{asset('driver-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}"/>

@endsection



@section('content')



    <div class="col-md-12">


            @csrf

            <div class="form-group">
                <div class="col-md-12">
                    @include('partials.message')
                </div>
            </div>

            <div class="form-group">

            @forelse($documents as $one)

            <div class="col-md-12">

                <a href="{{ route('driver.document.edit',['id' => $one['document_id']]) }}" class="card" style="padding: 5px; margin-bottom: 10px;border: none;">

                    <div class="card-body" style="justify-content:center;align-items:center;display:flex">

                        <div class="col-md-11">
                            <div  style="padding: 10px; text-align: left;">Completed</div>
                            <div style="padding: 10px;text-align: left;font-weight: bold">{{$one['document_name']}}</div>
                        </div>
                        <div class="col-md-1">
                            @if(isset($one['document_status']))
                                @if($one['document_status']==1)
                                    <div class="badge bg-green">Approved</div>
                                @else
                                    <div class="badge bg-red">Pending</div>
                                @endif
                            @endif
                        </div>

                    </div>

                </a>
            </div>

            @empty

                <div class="col-md-12">

                    <p>Documents required by drivers are not created in this city. Please contact your supervisor.</p>

                </div>

            @endforelse

            </div>



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

