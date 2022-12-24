@extends('admin.layouts.app')
@section('title', 'Transactions')
@section('content')
    <section class="content">
        <div class="container-fluid">
             <div class="block-header">
                <h2>Driver Earnings</h2>
                @if($transactions && count($transactions) > 0)
                <a href="{{route('admin.user.driver.paytodriver',$driver->id)}}" class="btn bg-blue waves-effect pull-right"><i class="material-icons">add</i><span>Pay To Driver</span></a>
                @endif
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{$driver->name}} - Driver Earnings
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>RequestID</th> 
                                    <th>Total Amount</th>
                                    <th>Company Amount</th>
                                    <th>Charity Amount</th>
                                    <th>Tip Amount</th>
                                    <th>Pay Type</th>
                                    <th>Datetime</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $index => $transaction)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$transaction->id}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->company_amount}}</td>
                                    <td>{{$transaction->charity_amount}}</td>
                                    <td>{{$transaction->tip_amount}}</td>
                                    <td>{{$transaction->pay_type}}</td>
                                    <td>{{$transaction->transactionDate}}</td>
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
