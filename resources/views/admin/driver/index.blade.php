@extends('admin.layouts.app')

@section('title', 'Drivers')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Drivers</h2>
                <a href="{{route('admin.user.driver.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New Driver</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Drivers
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table  table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Location</th>
                                    <th>Avartar</th>
                                    <th>Total Earning</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drivers as $index => $driver)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td><a href="{{route('admin.user.driver.show', $driver->id)}}">{{$driver->name}}</a></td>
                                        <td>
                                            {{$driver->email}}
                                            @if(isset($driver->email_verified_at))
                                            <span class="badge bg-green">Verified</span>
                                            @else
                                            <span class="badge bg-red">Not verified</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$driver->mobile}}
                                            @if(isset($driver->mobile_verified_at))
                                            <span class="badge bg-green">Verified</span>
                                            @else
                                            <span class="badge bg-red">Not verified</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(is_null($driver->country_id) || is_null($driver->state_id) || is_null($driver->city_id))
                                                Not set    
                                            @else
                                                {{$driver->city->name}}, {{$driver->state->name}}, {{$driver->country->name}}
                                            @endif
                                        </td>
                                        <td>
                                            <img src = "{{isset($driver->avatar) ? asset($driver->avatar) : asset('admin-panel/images/user.png')}}" width="70px" height="70px"/>
                                        </td>
                                        <td>
                                           <a href="{{route('admin.user.driver.transactionsdriver', $driver->id)}}">{{$driver->grandtotal}}</a>
                                        </td>
                                        <td>
                                            @if($driver->is_approved)
                                                <span class="badge bg-green">Approved</span>
                                            @else
                                                <span class="badge bg-red">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.user.driver.edit', $driver->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.user.driver.approve', $driver->id)}}" class="btn {{$driver->is_approved ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$driver->is_approved ? 'Pending' : 'Approve'}}"><i class="material-icons">done</i></a>
                                            <a href="{{route('admin.user.driver.delete', $driver->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
