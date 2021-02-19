@extends('admin.layouts.app')

@section('title', 'Advertisements')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Advertisements</h2>
                @can('advertise-create')
                <a href="{{route('admin.ad.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New advertisement</span></a>
                @else
                <a class="btn bg-blue waves-effect pull-right" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">add</i><span>New advertisement</span></a>
                @endcan
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Advertisements
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Piture</th>
                                        <th>description</th>
                                        <th>URL</th>
                                        <th>Is publish</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ads as $index => $ad)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td><img src="{{asset($ad->picture)}}" width="40px" height="40px"/></td>
                                    <td>{{$ad->description}}</td>
                                    <td>{{$ad->url}}</td>
                                    <td>
                                        @if($ad->is_publish)
                                            <span class="badge bg-green">Publish</span>
                                        @else
                                            <span class="badge bg-red">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('advertise-edit')
                                        <a href="{{route('admin.ad.edit', $ad->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                        <a href="{{route('admin.ad.publish', $ad->id)}}" class="btn {{$ad->is_publish ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$ad->is_publish ? 'Pending' : 'Publish'}}"><i class="material-icons">done</i></a>
                                        @else
                                        <a class="btn bg-cyan waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">edit</i></a>
                                        <a class="btn {{$ad->is_publish ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">done</i></a>
                                        @endcan
                                        @can('advertise-delete')
                                        <a href="{{route('admin.ad.delete', $ad->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
                                        @else
                                        <a class="btn bg-red waves-effect btn-xs" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process."><i class="material-icons">delete</i></a>
                                        @endcan
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
