@extends('admin.layouts.app')

@section('title', 'Turvy Earnings')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Turvy Earnings
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table  table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Book ID</th>
                                    <th>Driver</th>
                                    <th>Rider</th>
                                    <th>Amount</th>
                                    <th>DateTime</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $idx => $transaction)
                                    <tr>
                                        <td>{{ $idx+1 }}</td>
                                        <td>#{{ $transaction->book_id }}</td>
                                        <td>
                                            @if(isset($transaction->rider))
                                            <a href={{route('admin.user.rider.show', $transaction->rider_id)}}>{{ $transaction->rider->name }}</a>
                                            @else
                                            Deleted Rider (#{{$transaction->rider_id}})
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($transaction->driver))
                                            <a href={{route('admin.user.driver.show', $transaction->driver_id)}}>{{ $transaction->driver->name }}</a>
                                            @else
                                            Deleted Driver (#{{$transaction->driver_id}})
                                            @endif
                                        </td>
                                        <td>A${{ number_format($transaction->company_amount, 2) }}</td>
                                        <td>{{ $transaction->created_at }}</td>
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
