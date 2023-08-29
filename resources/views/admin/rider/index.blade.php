@extends('admin.layouts.app')

@section('title', 'Riders')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Riders</h2>
                <a href="{{ route('admin.user.rider.add') }}" class="btn bg-blue waves-effect pull-right"><i
                        class="material-icons">add</i><span>New Rider</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Riders
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>mobile</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riders as $index => $rider)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><a
                                                    href="{{ route('admin.user.rider.show', $rider->id) }}">{{ $rider->name }}</a>
                                            </td>
                                            <td>
                                                {{ $rider->email }}
                                                @if (isset($rider->email_verified_at))
                                                    <span class="badge bg-green">Verified</span>
                                                @else
                                                    <span class="badge bg-red">Not verified</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $rider->mobile }}
                                                @if (isset($rider->mobile_verified_at))
                                                    <span class="badge bg-green">Verified</span>
                                                @else
                                                    <span class="badge bg-red">Not verified</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($rider->status)
                                                    <span class="badge bg-green">Approved</span>
                                                @else
                                                    <span class="badge bg-red">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.user.rider.edit', $rider->id) }}"
                                                    class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip"
                                                    data-placement="bottom" data-original-title="Edit"><i
                                                        class="material-icons">edit</i></a>
                                                <a href="{{ route('admin.user.rider.approve', $rider->id) }}"
                                                    class="btn {{ $rider->status ? 'bg-green' : 'bg-grey' }} waves-effect btn-xs"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    data-original-title="{{ $rider->status ? 'Pending' : 'Approve' }}"><i
                                                        class="material-icons">done</i></a>
                                                <a href="{{ route('admin.user.rider.delete', $rider->id) }}"
                                                    class="btn bg-red waves-effect btn-xs" data-toggle="tooltip"
                                                    data-placement="bottom" data-original-title="Delete"><i
                                                        class="material-icons">delete</i></a>
                                                <a href="{{ route('admin.user.rider.active', $rider->id) }}"
                                                    class="btn {{ $rider->is_active ? 'bg-red' : 'bg-green' }} waves-effect btn-xs"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    data-original-title="{{ $rider->is_active ? 'Block' : 'Active' }}">
                                                    <p style="margin-bottom:0px; font-size:16px">
                                                        {{ $rider->is_active ? 'Block' : 'Active' }}</p>
                                                </a>
                                                <a href="{{ route('admin.user.rider.suspend', $rider->id) }}"
                                                    class="btn {{ $rider->is_suspended ? 'bg-green' : 'bg-red' }} waves-effect btn-xs"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    data-original-title="{{ $rider->is_suspended ? 'Resume' : 'Suspend' }}">
                                                    <p style="margin-bottom:0px; font-size:16px">
                                                        {{ $rider->is_suspended ? 'Resume' : 'Suspend' }}</p>
                                                </a>
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
