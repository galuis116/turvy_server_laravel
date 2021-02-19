@extends('admin.layouts.app')

@section('title', 'Comment List')

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
                                    <th>User Type</th>
                                    <th>User</th>
                                    <th>Content</th>
                                    <th>Is Publish</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $index => $comment)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        @if($comment->rider_id != null)
                                        <td>Rider</td>
                                        <td>{{$comment->rider->name}}</td>
                                        @endif
                                        @if($comment->driver_id != null)
                                        <td>Driver</td>
                                        <td>{{$comment->driver->name}}</td>
                                        @endif
                                        @if($comment->partner_id != null)
                                        <td>Partner</td>
                                        <td>{{$comment->partner->name}}</td>
                                        @endif
                                        <td>{{$comment->content}}</td>
                                        <td>
                                            @if($comment->is_publish)
                                                <span class="badge bg-green">Publish</span>
                                            @else
                                                <span class="badge bg-red">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.comment.edit', $comment->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.comment.publish', $comment->id)}}" class="btn {{$comment->is_publish ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$comment->is_publish ? 'Pending' : 'Publish'}}"><i class="material-icons">done</i></a>
                                            <a href="{{route('admin.comment.delete', $comment->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
