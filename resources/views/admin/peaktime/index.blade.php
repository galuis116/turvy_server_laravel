@extends('admin.layouts.app')

@section('title', 'Extra Peak Time Charges')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Extra Peak Time Charges</h2>
                <a href="{{route('admin.charge.peaktime.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>Add Peak Time Charge</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Extra Peak Time Charges
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>State</th>
                                    <th>Day</th>
                                    <th>Slot One Starttime</th>
                                    <th>Slot One Endtime</th>
                                    <th>Slot Two Starttime</th>
                                    <th>Slot Two Endtime</th>
                                    <th>Charges Type</th>
                                    <th>Charge</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($peaktimes as $index => $peaktime)
                                @if(isset($peaktime->state))
                                    <tr>
                                        <td>{{$peaktime->state->name}}</td>
                                        <td>{{getDayName($peaktime->day)}}</td>
                                        <td>{{$peaktime->slot_one_starttime}}</td>
                                        <td>{{$peaktime->slot_one_endtime}}</td>
                                        <td>{{$peaktime->slot_two_starttime}}</td>
                                        <td>{{$peaktime->slot_two_endtime}}</td>
                                        <td>{{chargesType($peaktime->charges_type)}}</td>
                                        <td>{{$peaktime->charge}}</td>
                                        <td>
                                            <a href="{{route('admin.charge.peaktime.edit', $peaktime->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.charge.peaktime.delete', $peaktime->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
