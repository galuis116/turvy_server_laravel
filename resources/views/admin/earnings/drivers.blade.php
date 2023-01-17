@extends('admin.layouts.app')

@section('title', 'Drivers Earnings')

@section('styles')
    <style>
        .daterange-container {
            margin-top: 10px;
        }
        #daterange {
            width: 170px;
        }
        .paid {
            font-size: 14pt;
            color: green;
        }
        .pending {
            font-size: 14pt;
            color: red;
        }
    </style>
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Drivers Earnings
                            </h2>
                            <div class="daterange-container">
                                <button id="prev-week"> < </button>
                                <input type="text" id="daterange" name="daterange"/>
                                <button id="next-week"> > </button>
                            </div>
                        </div>
                        <div class="body table-responsive">
                            <table class="table  table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Driver ID</th>
                                    <th>Driver Name / Car Rego</th>
                                    <th>Starting Date / Time</th>
                                    <th>Ending Date / Time</th>
                                    <th>Total Weekly Amount</th>
                                    <th>Transfered To</th>
                                    <th>Date Paid</th>
                                    <th>Current Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $idx => $transaction)
                                    <tr>
                                        <td>{{ $idx+1 }}</td>
                                        <td><a href={{route('admin.user.driver.show', $transaction->driver_id)}}>{{ $transaction->driver_id }}</a></td>
                                        <td>
                                            @if(isset($transaction->driver))
                                            {{ $transaction->driver->name }} <br/> {{ $transaction->driver->vehicle->carrego }} <br/> {{ $transaction->driver->vehicle->plate}}
                                            @else
                                            Deleted Driver (#{{$transaction->driver_id}})
                                            @endif
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($startDate)->format('F j, Y') }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($endDate)->format('F j, Y') }}
                                        </td>
                                        <td>A${{ number_format($transaction->total_amount, 2) }}</td>
                                        <td>
                                            @if(isset($transaction->driver->bank))
                                                <a href="#">{{$transaction->driver->bank->bank_name}}</a>
                                            @else
                                                Not Available
                                            @endif
                                        </td>
                                        <td>
                                            {{ $transaction->status == 'active' ? '---' : $transaction->updated_at }}
                                        </td>
                                        <td>
                                            @if($transaction->status == 'active')
                                            <span class="pending">Pending</span>
                                            @else
                                            <span class="paid">Paid</span>
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

@section('scripts')
<script type="text/javascript">
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            startDate: moment("{{ $startDate }}"),
            endDate: moment("{{ $endDate }}"),
            opens: 'right',
            drops: 'down',
            ranges: {
                'This Week': [moment().startOf('week'), moment().endOf('week')],
                'Previous Week': [moment().add(-1, 'weeks').startOf('week'), moment().add(1, 'weeks').endOf('week')],
                'Next Week': [moment().add(1, 'weeks').startOf('week'), moment().add(1, 'weeks').endOf('week')],
            },
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                format: 'MM/DD/YYYY',
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function(start, end, label) {
            window.location = "{{ route('admin.earnings.drivers') }}" + `?startDate=${start.format('YYYY-MM-DD')}&endDate=${end.format('YYYY-MM-DD')}`;
        });
        $("#prev-week").on("click", function() {
            var startDate = $("#daterange").data('daterangepicker').startDate;
            var newStartDate = startDate.subtract(7, 'days');
            var newEndDate = newStartDate.clone().add(6, 'days');
            $("#daterange").data('daterangepicker').setStartDate(newStartDate);
            $("#daterange").data('daterangepicker').setEndDate(newEndDate);
            window.location = "{{ route('admin.earnings.drivers') }}" + `?startDate=${newStartDate.format('YYYY-MM-DD')}&endDate=${newEndDate.format('YYYY-MM-DD')}`;
        });
        $("#next-week").on("click", function() {
            var startDate = $("#daterange").data('daterangepicker').startDate;
            var newStartDate = startDate.add(7, 'days');
            var newEndDate = newStartDate.clone().add(6, 'days');
            $("#daterange").data('daterangepicker').setStartDate(newStartDate);
            $("#daterange").data('daterangepicker').setEndDate(newEndDate);
            window.location = "{{ route('admin.earnings.drivers') }}" + `?startDate=${newStartDate.format('YYYY-MM-DD')}&endDate=${newEndDate.format('YYYY-MM-DD')}`;
        });
    });
    </script>
@endsection
