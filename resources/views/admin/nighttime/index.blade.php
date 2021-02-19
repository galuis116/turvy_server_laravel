@extends('admin.layouts.app')

@section('title', 'Extra Night Time Charges')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Extra Night Time Charges</h2>
                <a href="{{route('admin.charge.nighttime.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>Add Night Time Charge</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Extra Night Time Charges
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>State</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Charges Type</th>
                                    <th>Charge</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($nighttimes as $index => $nighttime)
                                @if(isset($nighttime->state))
                                    <tr>
                                        <td>{{$nighttime->state->name}}</td>
                                        <td>{{$nighttime->starttime}}</td>
                                        <td>{{$nighttime->endtime}}</td>
                                        <td>{{chargesType($nighttime->charges_type)}}</td>
                                        <td>{{$nighttime->charge}}</td>
                                        <td>
                                            <a href="{{route('admin.charge.nighttime.edit', $nighttime->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.charge.nighttime.delete', $nighttime->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endif
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
