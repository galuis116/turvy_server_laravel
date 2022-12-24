@extends('admin.layouts.app')

@section('title', 'Promo Codes')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Promo Codes</h2>
                <a href="{{route('admin.coupon.add')}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>New promo code</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Promo Codes
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Start</th>
                                        <th>Expire</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                        <th>Total Usage limit</th>
                                        <th>User limit</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($coupons as $index => $coupon)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->started_at}}</td>
                                    <td>{{$coupon->expired_at}}</td>
                                    <td>{{getPromoType($coupon->type)}}</td>
                                    <td>{{$coupon->value}}</td>
                                    <td>{{$coupon->usetotal}}</td>
                                    <td>{{$coupon->usecustomer}}</td>
                                    <td>
                                        @if($coupon->status)
                                            <span class="badge bg-blue">Active</span>
                                        @else
                                            <span class="badge bg-red">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.coupon.edit', $coupon->id)}}" class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit"><i class="material-icons">edit</i></a>
                                        <a href="{{route('admin.coupon.active', $coupon->id)}}" class="btn {{$coupon->status ? 'bg-green' : 'bg-grey'}} waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$coupon->status ? 'Active' : 'Inactive'}}"><i class="material-icons">done</i></a>
                                        <a href="{{route('admin.coupon.delete', $coupon->id)}}" class="btn bg-red waves-effect btn-xs" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete"><i class="material-icons">delete</i></a>
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
