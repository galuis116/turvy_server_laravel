@extends('admin.layouts.app')

@section('title', 'Cancel reasons')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Cancel reasons</h2>
                <a href="{{route('admin.cancelreason.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New cancel reason</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Type</th>
                                    <th>Cancel Reason</th>
                                    <th>Cancel Fee</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reasons as $index => $reason)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{getUserType($reason->type)}}</td>
                                        <td>{{$reason->reason}}</td>
                                        <td>{{$reason->fee}}</td>
                                        <td>
                                            <a href="{{route('admin.cancelreason.edit', $reason->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.cancelreason.delete', $reason->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
