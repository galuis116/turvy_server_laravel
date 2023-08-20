@extends('admin.layouts.app')

@section('style')

    <link href="{{ asset('driver-panel/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" type="text/css"
        href="{{ asset('driver-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" />

@endsection
@section('title', $driver->name . ' | Driver')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header col-lg-12 col-md-8 col-sm-12 col-xs-12">
                <h2>Driver details</h2>
                <a href="{{ route('admin.user.driver.list') }}" class="btn bg-grey waves-effect pull-right"><i
                        class="material-icons">keyboard_backspace</i><span>Back</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            @include('partials.message')
                            <div id="flash-message-container" class="mt-3"></div>
                            <div class="row clearfix">
                                <div class="d-flex justify-content-start text-center">
                                    <div class="image-container">
                                        <img src="{{ isset($driver->avatar) ? asset($driver->avatar) : asset('images/no-person.png') }}"
                                            id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    </div>
                                    <div class="userData ml-3">
                                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{ $driver->name }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="{{ Session::has('activeTab') ? '' : 'active' }}"><a
                                                href="#private" data-toggle="tab">PRIVATE INFO</a></li>
                                        <li role="presentation"><a href="#vehicle" data-toggle="tab">VEHICLE INFO</a></li>
                                        <li role="presentation" class="{{ Session::has('activeTab') ? 'active' : '' }}"><a
                                                href="#documents" data-toggle="tab">DOCUMENTS</a></li>
                                        <li role="presentation"><a href="#ratings" data-toggle="tab">RATINGS</a></li>
                                        <li role="presentation"><a href="#comments" data-toggle="tab">COMMENTS</a></li>
                                        <li role="presentation"><a href="#notes" data-toggle="tab">NOTES</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel"
                                            class="tab-pane animated flipInX {{ Session::has('activeTab') ? '' : 'active' }}"
                                            id="private">
                                            <li class="list-group-item clearfix">
                                                Name <label class="control-label pull-right">{{ $driver->name }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Gender <label
                                                    class="control-label pull-right">{{ getGender($driver->gender) }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Email <label class="control-label pull-right">{{ $driver->email }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Mobile <label
                                                    class="control-label pull-right">{{ $driver->mobile }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                ABN <label class="control-label pull-right">{{ $driver->abn }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Commission <label
                                                    class="control-label pull-right">{{ $driver->commission }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Location <label class="control-label pull-right">
                                                    @if (is_null($driver->country_id) || is_null($driver->state_id) || is_null($driver->city_id))
                                                        Not set
                                                    @else
                                                        {{ $driver->city->name }}, {{ $driver->state->name }},
                                                        {{ $driver->country->name }}
                                                    @endif
                                                </label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Email Verified <label
                                                    class="control-label pull-right">{{ isset($driver->email_verified_at) ? 'Verified' : 'Not verified' }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Mobile Number Verified <label
                                                    class="control-label pull-right">{{ isset($driver->mobile_verified_at) ? 'Verified' : 'Not verified' }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Is online <label
                                                    class="control-label pull-right">{{ $driver->is_online == 0 ? 'No' : 'Yes' }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Is busy <label
                                                    class="control-label pull-right">{{ $driver->is_busy == 0 ? 'No' : 'Yes' }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Is login <label
                                                    class="control-label pull-right">{{ $driver->is_login == 0 ? 'No' : 'Yes' }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Approved <label
                                                    class="control-label pull-right">{{ $driver->is_approved == 0 ? 'No' : 'Yes' }}</label>
                                            </li>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="ratings">
                                            <table
                                                class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Rider</th>
                                                        <th>Trip</th>
                                                        <th>Date/Time</th>
                                                        <th>Rating</th>
                                                        <th>Comment</th>
                                                        <th>What went wrong</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($driver_ratings as $index => $rating)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $rating->rider_id == null ? 'Not set' : $rating->rider->name }}</a>
                                                            </td>
                                                            <td style="text-align:center">{{ $rating->book->origin }} <br>
                                                                To <br> {{ $rating->book->destination }}</td>
                                                            <td>{{ $rating->book->booking_date }} <br>
                                                                {{ $rating->book->booking_time }}</td>
                                                            <td>{{ $rating->rating }}</td>
                                                            <td>{{ $rating->comment }}</td>
                                                            <td>{{ $rating->que }}</td>
                                                            <td>
                                                                @if ($rating->status)
                                                                    <span class="badge bg-green">Approved</span>
                                                                @else
                                                                    <span class="badge bg-red">Pending</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div role="tabpanel"
                                            class="tab-pane animated flipInX {{ Session::has('activeTab') ? 'active' : '' }}"
                                            id="documents">
                                            <table
                                                class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Document Name</th>
                                                        <th>Document</th>
                                                        <th>Expire Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($driver_documents as $index => $document)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $document->document_id == null ? 'Not set' : $document->document->name }}</a>
                                                            </td>
                                                            <td><a href="{{ asset($document->document_url) }}"
                                                                    target="_blank"><img
                                                                        src="{{ isset($document->document_url) ? asset($document->document_url) : asset('images/no-image.png') }}"
                                                                        width="70px" height="70px" class="zoom" /></a>
                                                            </td>
                                                            <td>
                                                                <form method="POST" class="form-horizontal"
                                                                    style="display:flex"
                                                                    action="{{ route('admin.user.driver.updatedate.document', ['id' => $document->id]) }}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <div>
                                                                            <div class="input-group date">
                                                                                <input type="date"
                                                                                    name="document_expiredate"
                                                                                    class="form-control pull-right expiredate"
                                                                                    id="datepicker"
                                                                                    value="{{ $document->expiredate != '' ? $document->expiredate : '' }}">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary form-control">Update
                                                                                </button>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </td>
                                                            <td>
                                                                @if ($document->status)
                                                                    <span class="badge bg-green">Approved</span>
                                                                @else
                                                                    <span class="badge bg-red">Pending</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.user.driver.approve.document', $document->id) }}"
                                                                    class="btn {{ $document->status ? 'bg-green' : 'bg-grey' }} waves-effect btn-xs"
                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                    data-original-title="{{ $document->status ? 'Pending' : 'Approve' }}"><i
                                                                        class="material-icons">done</i></a>
                                                                {{-- <a href="{{ route('admin.user.driver.edit.document', $document->id) }}"
                                                                    class="btn bg-cyan waves-effect btn-xs"
                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                    data-original-title="Edit"><i
                                                                        class="material-icons">edit</i></a> --}}
                                                                @php
                                                                    $expireDate = DateTime::createFromFormat('Y-m-d', $document->expiredate);
                                                                    $now = new DateTime();
                                                                    $interval = $now->diff($expireDate);
                                                                    $daysRemaining = $interval->days;
                                                                @endphp
                                                                @if ($daysRemaining <= 28)
                                                                    <bttuon
                                                                        class="btn bg-red waves-effect btn-xs send-renewal-email"
                                                                        data-document-id="{{ $document->id }}"
                                                                        data-driver-id="{{ $document->driver->id }}"
                                                                        data-toggle="tooltip" data-placement="bottom"
                                                                        data-original-title="{{ 'Send renewal alert email' }}"
                                                                        style="padding-bottom:1px"><i
                                                                            class="material-icons">warning</i></button>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="vehicle">
                                            <li class="list-group-item clearfix">
                                                Front photo of vehicle <img class="thumbnail pull-right" width="200px"
                                                    height="200px"
                                                    src="{{ isset($driver_vehicle->front_photo) ? asset($driver_vehicle->front_photo) : asset('images/no-image.png') }}">
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Make <label
                                                    class="control-label pull-right">{{ is_null($driver_vehicle->make_id) ? 'Not set' : $driver_vehicle->make->name }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Model <label
                                                    class="control-label pull-right">{{ is_null($driver_vehicle->model_id) ? 'Not set' : $driver_vehicle->model->name }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Service Type <label
                                                    class="control-label pull-right">{{ is_null($driver_vehicle->servicetype_id) ? 'Not set' : $driver_vehicle->servicetype }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle PlateNumber <label
                                                    class="control-label pull-right">{{ $driver_vehicle->plate }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Color <label
                                                    class="control-label pull-right">{{ $driver_vehicle->color }}</label>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                Vehicle Year <label
                                                    class="control-label pull-right">{{ $driver_vehicle->year }}</label>
                                            </li>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="comments">
                                            <b>Comments Content</b>
                                            <p>
                                                No comments
                                            </p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="notes">
                                            <div
                                                style="width: 100%; height: 50vh; overflow-y:auto; overflow-x: hidden; border: 2px solid #e2e2e2; padding: 1vw;">
                                                @forelse($driver_notes as $note)
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="header">
                                                                    <div class="row">
                                                                        <div class="col-lg-9 col-md-9">
                                                                            <h2>{{ $note->note }}</h2>
                                                                        </div>
                                                                        <div class="col-lg-3 col-md-3"
                                                                            style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                                                            <img src="{{ asset($note->admin()->avatar) }}"
                                                                                width="100px">
                                                                            <p>{{ $note->admin()->name }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <small
                                                                        style="float:right">{{ date('Y-m-d H:i', strtotime($note->created_at)) }}</small>
                                                                    <div
                                                                        style="position:absolute; top: 1vh; right: 1vw; cursor: pointer">
                                                                        <a
                                                                            href="{{ route('admin.user.driver.note.delete', $note->id) }}"><i
                                                                                class="material-icons">clear</i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="header">
                                                                    <h2>There are no any data to be recored.</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                            <div style="margin-top: 20px;">
                                                <form method="post"
                                                    action="{{ route('admin.user.driver.note', $driver->id) }}">
                                                    @csrf
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <textarea class="form-control" name="note" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <button class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>


@endsection



@section('scripts')
    <script>
        < script src = "{{ asset('driver-panel/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}" >
    </script>

    <script type="text/javascript" src="{{ asset('driver-panel/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}">
    </script>
    <script>
        $(document).ready(function() {
            $('.send-renewal-email').click(function() {
                var documentId = $(this).data('document-id');
                var driverId = $(this).data('driver-id');
                console.log(documentId);
                console.log(driverId);
                // Make an AJAX call to your API
                $.ajax({
                    type: "get",
                    url: "{{ route('admin.user.driver.send.email.document') }}",
                    data: {
                        document_id: documentId,
                        driver_id: driverId // Add driverId to the data object
                    },
                    success: function(data) {
                        console.log(data);
                        $('#flash-message-container').html(
                            '<div class="alert alert-success" style="display:flex; justify-content:center; align-items:center;">' +
                            ' <i class="material-icons" style="margin-right:5px">info</i>' +
                            data.message + '</div>');

                        // Make the flash message disappear after 5 seconds
                        setTimeout(function() {
                            $('#flash-message-container').fadeOut(500, function() {
                                $(this).empty().show();
                            });
                        }, 5000); // 5000 milliseconds = 5 seconds
                    }
                });
            });
        });
    </script>
@endsection
