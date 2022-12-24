@extends('admin.layouts.app')

@section('title', 'All Farecards')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>All Farecards</h2>
                <a href="{{ route('admin.charge.fare.add') }}" class="btn bg-blue waves-effect pull-right"><i
                        class="material-icons">add</i><span>New farecard</span></a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                All Farecards
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>State</th>
                                        <th>ServiceType</th>
                                        <th>Base Fare</th>
                                        <th>Minimum Bill</th>
                                        <th>After Minimum Bill</th>
                                        <th>Waiting Charge</th>
                                        <th>GST Charge</th>
                                        <th>Fuel Surge</th>
                                        <th>Government Charges</th>
                                        <th>Booking Charge</th>
                                        <th>Cancel Charge</th>
                                        <th>Time Charge</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fares as $index => $fare)
                                        @if (isset($fare->serviceType) && isset($fare->state))
                                            <tr>
                                                <td>{{ $fare->state->name }}</td>
                                                <td>
                                                    {{ $fare->serviceType->name }}<br/>
                                                    @if(!is_null($fare->baby_seat_charge))
                                                    ( Baby seat charge: {{ currency_format($fare->baby_seat_charge) }} )
                                                    @endif
                                                    @if(!is_null($fare->pet_charge))
                                                    ( Pet charge: {{ currency_format($fare->pet_charge) }} )
                                                    @endif
                                                </td>
                                                <td>{{ $fare->currency . ' ' . $fare->base_ride_distance_charge}}</td>
                                                <td>{{ $fare->currency . ' ' . $fare->minimum_fare}}
                                                {{-- <td>{{ $fare->currency . ' ' . $fare->base_ride_distance_charge . ' for first ' . $fare->base_ride_distance . ' ' . $fare->distance }} --}}
                                                </td>
                                                <td>{{ $fare->currency . ' ' . $fare->after_minimum_fare }}
                                                </td>
                                                <td>{{ $fare->currency . ' ' . $fare->waiting_price_per_minute . ' Per Min after First ' . $fare->fee_waiting_time . ' Free Min' }}
                                                </td>
                                                <td>{{ $fare->gst_charge }}</td>
                                                <td>{{ $fare->currency . ' ' . number_format($fare->fuel_surge_charge, 2) }}</td>
                                                <td>
                                                    CTP:
                                                    {{ $fare->nsw_ctp_charge == '' ? '' : $fare->currency . ' ' . number_format($fare->nsw_ctp_charge, 2) }}<br />
                                                    GTL:
                                                    {{ $fare->nsw_gtl_charge == '' ? '' : $fare->currency . ' ' . number_format($fare->nsw_gtl_charge, 2) }}<br />
                                                </td>
                                                <td>{{ $fare->currency . ' ' . number_format($fare->booking_charge, 2) }}</td>
                                                <td>{{ $fare->currency . ' ' . number_format($fare->cancel_charge, 2) }}</td>
                                                <td>{{ $fare->currency . ' ' . number_format($fare->price_per_minute, 2) }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.charge.fare.edit', $fare->id) }}"
                                                        class="btn bg-cyan waves-effect btn-xs" data-toggle="tooltip"
                                                        data-placement="bottom" data-original-title="Edit"><i
                                                            class="material-icons">edit</i></a>
                                                    <a href="{{ route('admin.charge.fare.delete', $fare->id) }}"
                                                        class="btn bg-red waves-effect btn-xs" data-toggle="tooltip"
                                                        data-placement="bottom" data-original-title="Delete"><i
                                                            class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                        @endif
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
