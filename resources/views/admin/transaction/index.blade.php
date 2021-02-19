@extends('admin.layouts.app')

@section('title', 'Transactions')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Transactions
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>RequestID</th>
                                    <th>TransactionID</th>
                                    <th>Rider</th>
                                    <th>Driver</th>
                                    <th>Total Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Datetime</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $index => $transaction)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$transaction->id}}</td>
                                    <td>{{$transaction->transaction_id}}</td>
                                    <td>{{$transaction->rider->name}}</td>
                                    <td>{{$transaction->driver->name}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->paymentMode->name}}</td>
                                    <td>{{date('Y-m-d', strtotime($transaction->created_at))}}</td>
                                    <td>
                                        @if($transaction->status)
                                            <span class="badge bg-blue">Active</span>
                                        @else
                                            <span class="badge bg-red">Inactive</span>
                                        @endif
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
