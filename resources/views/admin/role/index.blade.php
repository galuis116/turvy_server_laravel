@extends('admin.layouts.app')

@section('title', 'Sub Admin List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Sub Admin List</h2>
                @can('subadmin-create')
                <a href="{{route('admin.roles.create')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New Sub Admin</span></a>
                @endcan
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Sub Admin List</h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Avartar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $index => $admin)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->mobile}}</td>
                                    <td>
                                        <img src = "{{isset($admin->avatar) ? asset($admin->avatar) : asset('admin-panel/images/user.png')}}" width="70px" height="70px"/>
                                    </td>
                                    <td>
                                        @if($admin->is_approved)
                                            <span class="badge bg-green">Approved</span>
                                        @else
                                            <span class="badge bg-red">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.roles.show', $admin->id)}}" class="btn bg-green waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Show"><i class="material-icons">visibility</i></a>
                                        @can('subadmin-edit')
                                        <a href="{{route('admin.roles.edit', $admin->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                        <a href="{{route('admin.user.admin.approve', $admin->id)}}" class="btn {{$admin->is_approved ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$admin->is_approved ? 'Pending' : 'Approve'}}"><i class="material-icons">done</i></a>
                                        @endcan
                                        @can('subadmin-delete')
                                        <a onclick="event.preventDefault();document.getElementById('delete-form').submit();" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
                                        <form id="delete-form" method="post" action="{{route('admin.roles.destroy', $admin->id)}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
