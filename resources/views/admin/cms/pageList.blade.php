@extends('admin.layouts.app')

@section('title', 'Page List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Static pages</h2>
                <a href="{{route('admin.cms.page')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New Page</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Pages
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Page Title</th>
                                    <th>Slug</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $index => $pageitm)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$pageitm->page_title}}</td>
                                        <td>
                                         {{$pageitm->page_slug}}
                                        </td>
                                         <td>
                                         https://www.turvy.net/{{$pageitm->page_slug}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.cms.page.edit', $pageitm->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.cms.page.delete', $pageitm->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
