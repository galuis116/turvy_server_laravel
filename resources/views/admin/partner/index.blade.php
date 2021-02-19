@extends('admin.layouts.app')

@section('title', 'Partners')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Partners</h2>
                <a href="{{route('admin.user.partner.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New Partner</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Partners
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Organization</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Avartar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($partners as $index => $partner)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td><a href="{{route('admin.user.partner.show', $partner->id)}}">{{$partner->name}}</a></td>
                                        <td>{{$partner->organization}}</td>
                                        <td>
                                            {{$partner->email}}
                                        </td>
                                        <td>
                                            {{$partner->mobile}}
                                        </td>
                                        <td>
                                            <img src = "{{isset($partner->avatar) ? asset($partner->avatar) : asset('admin-panel/images/user.png')}}" width="70px" height="70px"/>
                                        </td>
                                        <td>
                                            @if($partner->is_approved)
                                                <span class="badge bg-green">Approved</span>
                                            @else
                                                <span class="badge bg-red">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.user.partner.edit', $partner->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.user.partner.approve', $partner->id)}}" class="btn {{$partner->is_approved ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$partner->is_approved ? 'Pending' : 'Approve'}}"><i class="material-icons">done</i></a>
                                            <a href="{{route('admin.user.partner.delete', $partner->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
