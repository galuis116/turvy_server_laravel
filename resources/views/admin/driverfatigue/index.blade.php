@extends('admin.layouts.app')

@section('title', 'Driving Time Policy')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Driving Time Policy</h2>
                <a href="{{route('admin.driverfatigue.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New Content</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Content List
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contents as $index => $content)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$content->title}}</td>
                                        <td>{{$content->description}}</td>
                                        <td>
                                            <a href="{{route('admin.driverfatigue.edit', $content->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.driverfatigue.delete', $content->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
