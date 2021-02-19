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
                                    <a href="#now" data-toggle="tab">
                                        <i class="material-icons">directions_car</i> Ride Now Bookings
                                    </a>
                                </li>
                                <li role="presentation" @if($tab == 'ride_later') class="active" @endif>
                                    <a href="#later" data-toggle="tab">
                                        <i class="material-icons">alarm</i> Ride Later Bookings
                                    </a>
                                </li>
                                <li role="presentation" @if($tab == 'ride_cancel') class="active" @endif>
                                    <a href="#cancel" data-toggle="tab">
                                        <i class="material-icons">cancel</i> Cancelled Bookings
                                    </a>
                                </li>
                            </ul>
                
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade @if($tab == 'ride_now') in active @endif" id="now">
                                    <table class="table table-bordered table-striped js-basic-example dataTable">
                                        <thead>
                                        <tr>
                                            <th>SrNo</th>
                                            <th>Rider Details</th>
                                            <th>Driver Details</th>
                                            <th>Pickup-Drop Address</th>
                                            <th>Payment Mode</th>
                                            <th>Ride booked time</th>
                                            <th>Current Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ride_now as $index => $ride)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$ride->rider_mobile}},<br> {{$ride->rider_name}},<br> {{$ride->rider_email}}</td>
                                                <td>
                                                    @if($ride->driver_id == null)
                                                        Not assigned
                                                    @else
                                                        {{$ride->driver->name}}<br>{{$ride->driver->mobile}}<br>{{$ride->driver->email}}
                                                    @endif
                                                </td>        
                                                <td><span style="color:#2b982b">{{$ride->origin}}</span>-<span style="color:coral">{{$ride->destination}}</span></td>
                                                <td>{{$ride->payment_id == null ? 'None' : $ride->payment->name}}</td>        
                                                <td>{{$ride->booking_date}}<br> {{$ride->booking_time}}</td>        
                                                <td><span> {{getRideStatusName($ride->status)}}</span><br><span>{{$ride->updated_at}}</span></td>            
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade @if($tab == 'ride_later') in active @endif" id="later">
                                    <table class="table table-bordered table-striped js-basic-example dataTable">
                                        <thead>        
                                            <tr>        
                                                <th>SrNo</th>           
                                                <th>Rider Details</th>        
                                                <th>Driver Details</th>        
                                                <th>Pickup-Drop Address</th> 
                                                <th>Payment Mode</th>        
                                                <th>Ride booked time</th>        
                                                <th>Current Status</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ride_later as $index => $ride)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$ride->rider_mobile}},<br> {{$ride->rider_name}},<br> {{$ride->rider_email}}</td>
                                                <td>
                                                    @if($ride->driver_id == null)
                                                        Not assigned
                                                    @else
                                                        {{$ride->driver->name}}<br>{{$ride->driver->mobile}}<br>{{$ride->driver->email}}
                                                    @endif
                                                </td>        
                                                <td><span style="color:#2b982b">{{$ride->origin}}</span>-<span style="color:coral">{{$ride->destination}}</span></td>
                                                <td>{{$ride->payment_id == null ? 'None' : $ride->payment->name}}</td>        
                                                <td>{{$ride->booking_date}}<br> {{$ride->booking_time}}</td>        
                                                <td><span> {{getRideStatusName($ride->status)}}</span><br><span>{{$ride->updated_at}}</span></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade @if($tab == 'ride_cancel') in active @endif" id="cancel">
                                    <table class="table table-bordered table-striped js-basic-example dataTable">
                                        <thead>        
                                            <tr>            
                                                <th>SrNo</th>           
                                                <th>Rider Details</th>        
                                                <th>Driver Details</th>        
                                                <th>Pickup-Drop Address</th> 
                                                <th>Payment Mode</th>        
                                                <th>Ride booked time</th>        
                                                <th>Current Status</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ride_cancel as $index => $ride)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$ride->rider_mobile}},<br> {{$ride->rider_name}},<br> {{$ride->rider_email}}</td>
                                                <td>
                                                    @if($ride->driver_id == null)
                                                        Not assigned
                                                    @else
                                                        {{$ride->driver->name}}<br>{{$ride->driver->mobile}}<br>{{$ride->driver->email}}
                                                    @endif
                                                </td>        
                                                <td><span style="color:#2b982b">{{$ride->origin}}</span>-<span style="color:coral">{{$ride->destination}}</span></td>
                                                <td>{{$ride->payment_id == null ? 'None' : $ride->payment->name}}</td>        
                                                <td>{{$ride->booking_date}}<br> {{$ride->booking_time}}</td>        
                                                <td><span> {{getRideStatusName($ride->status)}}</span><br><span>{{$ride->updated_at}}</span></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection