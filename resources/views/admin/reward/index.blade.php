@extends('admin.layouts.app')

@section('title', 'Rider Reword Points')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Rider Reword Points</h2>
                <a href="{{route('admin.point.reward.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New reward</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Rider Reword Points
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Start amount</th>
                                    <th>Points</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rewards as $index => $reward)
                                <tr>
                                    <td>
                                        @if($reward->order != 1)
                                        <a href="{{route('admin.point.reward.order.up', $reward->id)}}"><i class="material-icons">arrow_upward</i></a>
                                        @else
                                        <i class="material-icons">arrow_upward</i>
                                        @endif
                                        @if($reward->order == $max)
                                        <i class="material-icons">arrow_downward</i>
                                        @else
                                        <a href="{{route('admin.point.reward.order.down', $reward->id)}}"><i class="material-icons">arrow_downward</i></a>
                                        @endif
                                    </td>
                                    <td>{{$reward->name}}</td>
                                    <td>AU$ {{$reward->start_amount}}</td>
                                    <td>{{$reward->point}} pts</td>
                                    <td>
                                        <a href="{{route('admin.point.reward.edit', $reward->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                        <a href="{{route('admin.point.reward.delete', $reward->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
