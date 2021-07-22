@extends('admin.layouts.app')

@section('title', "Actived Rides")

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" @if($tab == 'ride_now') class="active" @endif>
                                    <a href="#all" data-toggle="tab">
                                        <i class="material-icons">directions_car</i> Ride Now Bookings
                                    </a>
                                </li>
                                <li role="presentation" @if($tab == 'ride_later') class="active" @endif>
                                    <a href="#city" data-toggle="tab">
                                        <i class="material-icons">alarm</i> Ride Later Bookings
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade @if($tab == 'ride_now') in active @endif" id="all">
                                    <table class="table table-bordered table-striped js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>SrNo</th>
                                                <th>Rider Details</th>
                                                <th>Driver Details</th>
                                                <th>Pickup Address</th>
                                                <th>Drop Address</th>
                                                <th>Payment Mode</th>
                                                <th>Payment Amount</th>
                                                <th>Ride booked time</th>
                                                <th>Current Status</th>
                                                <th>Ride Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ride_now as $index => $ride)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>
                                                    {{$ride->rider_mobile}},<br> {{$ride->rider_name}},<br> {{$ride->rider_email}}
                                                </td>
                                                <td>
                                                    @if($ride->driver_id == null)
                                                        <h4 style="color:red;">Not Assign</h4>
                                                    @else
                                                        {{$ride->driver->name}}<br>{{$ride->driver->mobile}}<br>{{$ride->driver->email}}
                                                    @endif
                                                </td>
                                                <td>{{$ride->origin}}</td>
                                                <td>{{$ride->destination}}</td>
                                                <td>{{$ride->payment_id == null ? 'None' : $ride->payment->name}}</td>
                                                <td>
                                                    Total: {{ currency_format($ride->payment_total) }} <br/>
                                                    Surge: {{ currency_format($ride->payment_surge) }} <br/>
                                                    Tips: {{ currency_format($ride->payment_tip) }}
                                                </td>
                                                <td>{{$ride->booking_date}} <br> {{$ride->booking_time}}</td>
                                                <td><span> {{getRideStatusName($ride->status)}}</span><br><span>{{$ride->updated_at}}</span></td>
                                                <td align="center">
                                                    @if($ride->status == 1)
                                                        <span data-target="#ridenowcancel{{$ride->id}}" data-toggle="modal">
                                                            <a data-original-title="Cancel Ride"  data-toggle="tooltip" data-placement="top" class="btn bg-orange waves-effect"> <i class="material-icons">clear</i> </a>
                                                        </span>
                                                    @else
                                                        <span data-target="#ridenowcancel{{$ride->id}}" data-toggle="modal">
                                                            <a data-original-title="Cancel Ride"  data-toggle="tooltip" data-placement="top" class="btn bg-orange waves-effect"> <i class="material-icons">clear</i> </a>
                                                        </span>
                                                        @if($ride->status != 0)
                                                            <a target="_blank" href="" data-original-title="Track" data-toggle="tooltip" data-placement="top" class="btn menu-icon btn_edit"> <i class="ion-android-locate"></i> </a>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade @if($tab == 'ride_later') in active @endif" id="city">
                                    <table class="table table-bordered table-striped js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>SrNo</th>
                                                <th>Rider Details</th>
                                                <th>Driver Details</th>
                                                <th>Pickup-Drop Address</th>
                                                <th>Payment Mode</th>
                                                <th>Payment Amount</th>
                                                <th>Ride booked time</th>
                                                <th>Current Status</th>
                                                <th>Ride Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ride_later as $index => $ride)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$ride->rider_mobile}},<br> {{$ride->rider_name}},<br> {{$ride->rider_email}}</td>
                                                <td>
                                                    @if($ride->driver_id == null)
                                                        <button  class="btn btn-success waves-effect"  data-target="#DriverAssign{{$ride->id}}" data-toggle="modal" >Assign</button>
                                                    @else
                                                        {{$ride->driver->name}}<br>{{$ride->driver->mobile}}<br>{{$ride->driver->email}}
                                                    @endif
                                                </td>
                                                <td><span style="color:#2b982b">{{$ride->origin}}</span>-<span style="color:coral">{{$ride->destination}}</span></td>
                                                <td>{{$ride->payment_id == null ? 'None' : $ride->payment->name}}</td>
                                                <td>
                                                    Total: {{ currency_format($ride->payment_total) }} <br/>
                                                    Surge: {{ currency_format($ride->payment_surge) }} <br/>
                                                    Tips: {{ currency_format($ride->payment_tip) }}
                                                </td>
                                                <td>{{$ride->booking_date}}<br> {{$ride->booking_time}}</td>
                                                <td><span> {{getRideStatusName($ride->status)}}</span><br><span>{{$ride->updated_at}}</span></td>
                                                <td align="center">
                                                    @if($ride->status == 1)
                                                        <span data-target="#ridelatercancel{{$ride->id}}" data-toggle="modal">
                                                            <a data-original-title="Cancel Ride"  data-toggle="tooltip" data-placement="top" class="btn bg-orange waves-effect"> <i class="material-icons">clear</i> </a>
                                                        </span>
                                                    @else
                                                        <span data-target="#ridelatercancel{{$ride->id}}" data-toggle="modal">
                                                            <a data-original-title="Cancel Ride"  data-toggle="tooltip" data-placement="top" class="btn bg-orange waves-effect"> <i class="material-icons">clear</i> </a>
                                                        </span>
                                                        @if($ride->status != 0)
                                                            <a target="_blank" href="{{route('admin.ride.active.track', $ride->id)}}" data-original-title="Track" data-toggle="tooltip" data-placement="top" class="btn btn-primary waves-effect"> <i class="material-icons">replay</i> </a>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @foreach($ride_later as $ride)
                                <div class="modal fade"  id="DriverAssign{{$ride->id}}" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Assign Driver for Ride Id #{{$ride->id}}</h4>
                                                <div id="assign_driver_success" style="display:none;"> <br>
                                                    <div class="alert alert-succ$pages->driver_idess"> <strong>Success!</strong> Driver Assigned for Ride Id #{{$ride->id}}</div>
                                                </div>
                                            </div>

                                            <div class="modal-body" >
                                                <div class="tab-content">
                                                    <div id="booking_status_on" class="tab-pane fade in active" style="max-height: 400px; overflow-x: auto;">
                                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1" >
                                                            <tr>
                                                                <th>Driver Name</th>
                                                                <th>Assign</th>
                                                            </tr>
                                                            @forelse($drivers as $driver)
                                                            <tr>
                                                                <td>{{$driver->name}}</td>
                                                                <td>
                                                                    <form id="frm-{{$ride->id}}-{{$driver->id}}" method="post" action="{{route('admin.ride.active.assignDriver')}}">
                                                                        @csrf
                                                                        <input type="hidden" name="rideId" value="{{$ride->id}}"/>
                                                                        <input type="hidden" name="driverId" value="{{$driver->id}}"/>
                                                                        <button type="submit" class="btn btn-success br2 btn-xs fs12 activebtn" >Assign</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                                <tr><td colspan="2">No available drivers for now.</td></tr>
                                                            @endforelse
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($ride_later as $ride)
                                <div class="modal fade"  id="ridelatercancel{{$ride->id}}" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Cancel Ride #{{$ride->id}}</h4>
                                            </div>
                                            <form method="post" action="{{route('admin.ride.active.cancel')}}">
                                                @csrf
                                                <input type="hidden" name="rideID" value="{{$ride->id}}">
                                                <div class="modal-body">
                                                    <table class="table table-striped table-hover table-bordered">
                                                        <tbody>
                                                            @foreach($cancels as $cancel)
                                                                <tr>
                                                                    <td>
                                                                        <input type="radio" id="reason{{$ride->id}}-{{$cancel->id}}" name="cancel_reason_id" class="radio-col-light-blue" value="{{$cancel->id}}"> <label for="reason{{$ride->id}}-{{$cancel->id}}">{{$cancel->reason}}</label>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success waves-effect">SAVE CHANGES</button>
                                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($ride_now as $ride)
                                <div class="modal fade" id="ridenowcancel{{$ride->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">Cancel Ride #{{$ride->id}}</h4>
                                            </div>
                                            <form method="post" action="{{route('admin.ride.active.cancel')}}">
                                            @csrf
                                            <input type="hidden" name="rideID" value="{{$ride->id}}">
                                            <div class="modal-body">
                                                <table class="table table-striped table-hover table-bordered">
                                                    <tbody>
                                                        @foreach($cancels as $cancel)
                                                            <tr>
                                                                <td>
                                                                    <input type="radio" id="reason{{$ride->id}}-{{$cancel->id}}" name="cancel_reason_id" class="radio-col-light-blue" value="{{$cancel->id}}"> <label for="reason{{$ride->id}}-{{$cancel->id}}">{{$cancel->reason}}</label>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success waves-effect">SAVE CHANGES</button>
                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection
