@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
                @can('sosrequest-list')
                <a href="{{route('admin.sos.request.list')}}" class="pull-right btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light">SOS</a>
                @else
                <a class="pull-right btn bg-black btn-circle-lg waves-effect waves-circle waves-float waves-light" disabled="disabled" data-toggle="tooltip" data-placement="bottom" data-original-title="You have no permission for this process.">SOS</a>
                @endcan
            </div>

            <!-- Widgets -->
            <div class="row">
                <div class="col-md-12">
                    <h1>Site Statistics</h1>
                </div>
            </div>
            <div class="row clearfix">
                <a @can('rider-list') href="{{route('admin.user.rider.list')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">directions_run</i>
                        </div>
                        <div class="content">
                            <div class="text">RIDERS</div>
                            <div class="number count-to" data-from="0" data-to="{{$rider_total}}" data-speed="2" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a @can('driver-list') href="{{route('admin.user.driver.list')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">DRIVERS</div>
                            <div class="number count-to" data-from="0" data-to="{{$driver_total}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a @can('partner-list') href="{{route('admin.user.partner.list')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">business</i>
                        </div>
                        <div class="content">
                            <div class="text">COMPANIES</div>
                            <div class="number count-to" data-from="0" data-to="{{$company_total}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a @can('transaction-list') href="{{route('admin.transaction.index')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text">EARNINGS</div>
                            <div class="number count-to" data-from="0" data-to="{{isset($total) ? $total : 0}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- #END# Widgets -->
            <div class="row">
                <div class="col-md-12">
                    <h1>Ride Statistics</h1>
                </div>
            </div>
            <div class="row clearfix">
                <a @can('activeride-list') href="{{route('admin.ride.active.list', 'total')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">directions_car</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL</div>
                            <div class="number count-to" data-from="0" data-to="{{$ride_total}}" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a @can('activeride-list') href="{{route('admin.ride.active.list', 'active')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_car_wash</i>
                        </div>
                        <div class="content">
                            <div class="text">ON GOING</div>
                        <div class="number count-to" data-from="0" data-to="{{$ongoing}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a @can('completedride-list') href="{{route('admin.ride.completed.list', 'cancel')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">close</i>
                        </div>
                        <div class="content">
                            <div class="text">CANCEL</div>
                            <div class="number count-to" data-from="0" data-to="{{$cancelled}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a @can('completedride-list') href="{{route('admin.ride.completed.list', 'done')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="text">DONE</div>
                            <div class="number count-to" data-from="0" data-to="{{$completed}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="row clearfix">
                <a @can('activeride-list') href="{{route('admin.ride.active.list', 'new')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">create_new_folder</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW RIDE</div>
                            <div class="number count-to" data-from="0" data-to="{{$newRides}}" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a @can('activeride-list') href="{{route('admin.ride.active.list', 'manual-total')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">collections</i>
                        </div>
                        <div class="content">
                            <div class="text">MANUAL TOTAL RIDES</div>
                            <div class="number count-to" data-from="0" data-to="{{$manual_ride_total}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a @can('activeride-list') href="{{route('admin.ride.active.list', 'manual-active')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">flash_auto</i>
                        </div>
                        <div class="content">
                            <div class="text">MANUAL ACTIVE</div>
                            <div class="number count-to" data-from="0" data-to="{{$manual_active_ride}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a @can('activeride-list') href="{{route('admin.ride.completed.list', 'manual-done')}}" @endcan>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">beenhere</i>
                        </div>
                        <div class="content">
                            <div class="text">COMPLETED</div>
                            <div class="number count-to" data-from="0" data-to="{{$manual_completed_ride}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- #END# Widgets -->
            <div class="row">
                <div class="col-md-12">
                    <h1>Earnings Statistics</h1>
                </div>
            </div>
            <div class="row clearfix">
                <a href="{{route('admin.earnings.rewards')}}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">directions_run</i>
                        </div>
                        <div class="content">
                            <div class="text">RIDERS REWARD POINTS</div>
                            <div class="number count-to" data-from="0" data-to="{{$earnings->rider_reward_points}}" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a href="{{route('admin.earnings.drivers')}}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">DRIVERS</div>
                        <div class="number">A${{$earnings->drivers}}</div>
                        </div>
                    </div>
                </div>
                </a>
                <a href="{{route('admin.earnings.government')}}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">business</i>
                        </div>
                        <div class="content">
                            <div class="text">GOVERNMENT LEVY/GST</div>
                            <div class="number">A${{$earnings->gst}}</div>
                        </div>
                    </div>
                </div>
                </a>
                <a href="{{route('admin.earnings.turvy')}}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text">TURVY</div>
                            <div class="number">A${{$earnings->turvy}}</div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="row clearfix">
                <a href="{{route('admin.earnings.charity')}}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">create_new_folder</i>
                        </div>
                        <div class="content">
                            <div class="text">CHARITY</div>
                            <div class="number">A${{$earnings->charity}}</div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </section>
@endsection

