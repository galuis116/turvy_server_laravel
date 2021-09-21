@extends('admin.layouts.app')

@section('title', 'Feedback List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sender Name</th>
                                    <th>Sender Type</th>
                                    <th>Sender Email</th>
                                    <th>Sender Mobile</th>
                                    <th>Subject</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feedbacks as $index => $feedback)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$feedback->name}}</td>
                                        @if($feedback->rider_id != null)
                                        <td>Rider</td>
                                        @elseif($feedback->driver_id != null)
                                        <td>Driver</td>
                                        @elseif($feedback->partner_id != null)
                                        <td>Partner</td>
                                        @else
                                        <td>Unknown</td>
                                        @endif
                                        <td>{{$feedback->email}}</td>
                                        <td>{{$feedback->mobile}}</td>
                                        <td>{{$feedback->subject}}</td>
                                        <td>{{$feedback->content}}</td>
                                        <td>
                                            <a href="{{route('admin.feedback.delete', $feedback->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection
