<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{is_null(Auth::guard('admin')->user()->avatar) ? asset('admin-panel/images/user.png') : asset(Auth::guard('admin')->user()->avatar)}}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::guard('admin')->user()->name }}</div>
                <div class="email">{{Auth::guard('admin')->user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li @if($page == 'dashboard') class="active" @endif>
                    <a href="{{route('admin.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @canany(['usermap', 'drivermap', 'driverairport'])
                <li @if($page == 'maps') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">map</i>
                        <span>Stats on Map</span>
                    </a>
                    <ul class="ml-menu">
                        @can('usermap')
                        <li @if($page == 'maps' && $subpage == 'usermap')class="active" @endif>
                            <a href="{{route('admin.maps.usermap')}}">
                                <span>Rider Booking Stats</span>
                            </a>
                        </li>
                        @endcan
                        @can('drivermap')
                        <li @if($page == 'maps' && $subpage == 'drivermap')class="active" @endif>
                            <a href="{{route('admin.maps.drivermap')}}">
                                <span>Driver availability stats</span>
                            </a>
                        </li>
                        @endcan
                        @can('driverairport')
                        <li @if($page == 'maps' && $subpage == 'driverairportmap')class="active" @endif>
                            <a href="{{route('admin.maps.driverairport')}}">
                                <span>Drivers and airports stats</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['soscontact-list', 'sosrequest-list'])
                <li @if($page == 'sos') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">transfer_within_a_station</i>
                        <span>SOS Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('soscontact-list')
                        <li @if($page == 'sos' && $subpage == 'contact')class="active" @endif>
                            <a href="{{route('admin.sos.contact.list')}}">
                                <span>SOS Contact</span>
                            </a>
                        </li>
                        @endcan
                        @can('sosrequest-list')
                        <li @if($page == 'sos' && $subpage == 'request')class="active" @endif>
                            <a href="{{route('admin.sos.request.list')}}">
                                <span>SOS Request</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['country-list','state-list','city-list'])
                <li @if($page == 'region') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">public</i>
                        <span>Region Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('country-list')
                        <li @if($page == 'region' && $subpage == 'country')class="active" @endif>
                            <a href="{{route('admin.region.country.list')}}">
                                <span>Country</span>
                            </a>
                        </li>
                        @endcan
                        @can('state-list')
                        <li @if($page == 'region' && $subpage == 'state')class="active" @endif>
                            <a href="{{route('admin.region.state.list')}}">
                                <span>State</span>
                            </a>
                        </li>
                        @endcan
                        @can('city-list')
                        <li @if($page == 'region' && $subpage == 'city')class="active" @endif>
                            <a href="{{route('admin.region.city.list')}}">
                                <span>Region</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['currency-list','distance-list','payment-list'])
                <li @if($page == 'base') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">toll</i>
                        <span>Base Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('currency-list')
                        <li @if($page == 'base' && $subpage == 'currency')class="active" @endif>
                            <a href="{{route('admin.base.currency.list')}}">
                                <span>Currency</span>
                            </a>
                        </li>
                        @endcan
                        @can('distance-list')
                        <li @if($page == 'base' && $subpage == 'distance')class="active" @endif>
                            <a href="{{route('admin.base.distance.list')}}">
                                <span>Distance Unit</span>
                            </a>
                        </li>
                        @endcan
                        @can('payment-list')
                        <li @if($page == 'base' && $subpage == 'payment')class="active" @endif>
                            <a href="{{route('admin.base.payment.list')}}">
                                <span>Payment method</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['vehiclemake-list','vehiclemodel-list','vehicletype-list','ridetype-list'])
                <li @if($page == 'fleet') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">local_taxi</i>
                        <span>Fleet Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('vehicletype-list')
                        <li @if($page == 'fleet' && $subpage == 'serviceType')class="active" @endif>
                            <a href="{{route('admin.fleet.serviceType.list')}}">
                                <span>Vehicle Type</span>
                            </a>
                        </li>
                        @endcan
                        @can('vehiclemake-list')
                        <li @if($page == 'fleet' && $subpage == 'make')class="active" @endif>
                            <a href="{{route('admin.fleet.make.list')}}">
                                <span>Vehicle Make</span>
                            </a>
                        </li>
                        @endcan
                        @can('vehiclemodel-list')
                        <li @if($page == 'fleet' && $subpage == 'model')class="active" @endif>
                            <a href="{{route('admin.fleet.model.list')}}">
                                <span>Vehicle Model</span>
                            </a>
                        </li>
                        @endcan
                        @can('ridetype-list')
                        <li @if($page == 'fleet' && $subpage == 'rideType')class="active" @endif>
                            <a href="{{route('admin.fleet.rideType.list')}}">
                                <span>Ride Type</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @can('subadmin-list')
                <li @if($page == 'adminRole') class="active" @endif>
                    <a href="{{route('admin.roles.index')}}">
                        <i class="material-icons">view_comfy</i>
                        <span>Subadmin Management</span>
                    </a>
                </li>
                @endcan
                @canany(['superadmin-list','driver-list','rider-list','partner-list'])
                <li @if($page == 'user') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">people</i>
                        <span>User Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('superadmin-list')
                        <li @if($page == 'user' && $subpage == 'admin')class="active" @endif>
                            <a href="{{route('admin.user.admin.list')}}">
                                <span>Admin</span>
                            </a>
                        </li>
                        @endcan
                        @can('partner-list')
                        <li @if($page == 'user' && $subpage == 'partner')class="active" @endif>
                            <a href="{{route('admin.user.partner.list')}}">
                                <span>Partner</span>
                            </a>
                        </li>
                        @endcan
                        @can('driver-list')
                        <li @if($page == 'user' && $subpage == 'driver')class="active" @endif>
                            <a href="{{route('admin.user.driver.list')}}">
                                <span>Driver</span>
                            </a>
                        </li>
                        @endcan
                        @can('rider-list')
                        <li @if($page == 'user' && $subpage == 'rider')class="active" @endif>
                            <a href="{{route('admin.user.rider.list')}}">
                                <span>Rider</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @can('booking-list')
                <li @if($page == 'booking') class="active" @endif>
                    <a href="{{route('admin.booking.index')}}">
                        <i class="material-icons">pin_drop</i>
                        <span>Booking</span>
                    </a>
                </li>
                @endcan
                @canany(['activeride-list','completedride-list'])
                <li @if($page == 'ride') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">add_location</i>
                        <span>Rides Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('activeride-list')
                        <li @if($page == 'ride' && $subpage == 'active')class="active" @endif>
                            <a href="{{route('admin.ride.active.list', 'total')}}">
                                <span>Active rides</span>
                            </a>
                        </li>
                        @endcan
                        @can('completedride-list')
                        <li @if($page == 'ride' && $subpage == 'completed')class="active" @endif>
                            <a href="{{route('admin.ride.completed.list', 'total')}}">
                                <span>Completed rides</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['airport-list','airportpricing-list','destination-list'])
                <li @if($page == 'airportride') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">flight</i>
                        <span>Airport ride management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('airport-list')
                        <li @if($page == 'airportride' && $subpage == 'airport')class="active" @endif>
                            <a href="{{route('admin.airportride.airport.index')}}">
                                <span>Airport management</span>
                            </a>
                        </li>
                        @endcan
                        @can('destination-list')
                        <li @if($page == 'airportride' && $subpage == 'destination')class="active" @endif>
                            <a href="{{route('admin.airportride.destination.index')}}">
                                <span>Destination management</span>
                            </a>
                        </li>
                        @endcan
                        @can('airportpricing-list')
                        <li @if($page == 'airportride' && $subpage == 'pricing')class="active" @endif>
                            <a href="{{route('admin.airportride.pricing.index')}}">
                                <span>Pricing management</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @can('queue-list')
                <li @if($page == 'queue') class="active" @endif>
                    <a href="{{route('admin.queue.index')}}">
                        <i class="material-icons">playlist_play</i>
                        <span>Queue</span>
                    </a>
                </li>
                @endcan

                <li @if($page == 'riderequest') class="active" @endif>
                    <a href="{{route('admin.riderequest.index')}}">
                        <i class="material-icons">touch_app</i>
                        <span>Ride request management</span>
                    </a>
                </li>

                @can('heatmap')
                <li @if($page == 'heatmap') class="active" @endif>
                    <a href="{{route('admin.maps.heatmap')}}">
                        <i class="material-icons">map</i>
                        <span>Heat Map</span>
                    </a>
                </li>
                @endcan
                @canany(['charge-list','peaktime-list','nighttime-list'])
                <li @if($page == 'charge') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">monetization_on</i>
                        <span>Charge Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('charge-list')
                        <li @if($page == 'charge' && $subpage == 'fare')class="active" @endif>
                            <a href="{{route('admin.charge.fare.list')}}">
                                <span>Farecard</span>
                            </a>
                        </li>
                        @endcan
                        @can('peaktime-list')
                        <li @if($page == 'charge' && $subpage == 'peaktime')class="active" @endif>
                            <a href="{{route('admin.charge.peaktime.list')}}">
                                <span>Peak Time</span>
                            </a>
                        </li>
                        @endcan
                        @can('nighttime-list')
                        <li @if($page == 'charge' && $subpage == 'nighttime')class="active" @endif>
                            <a href="{{route('admin.charge.nighttime.list')}}">
                                <span>Night Time</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['riderreward-list','driverloyalty-list'])
                <li @if($page == 'point') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">card_giftcard</i>
                        <span>Reward Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('riderreward-list')
                        <li @if($page == 'point' && $subpage == 'reward')class="active" @endif>
                            <a href="{{route('admin.point.reward.list')}}">
                                <span>Rider reward points</span>
                            </a>
                        </li>
                        @endcan
                        @can('driverloyalty-list')
                        <li @if($page == 'point' && $subpage == 'loyalty')class="active" @endif>
                            <a href="{{route('admin.point.loyalty.list')}}">
                                <span>Driver loyalty points</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['document-list','documentstate-list'])
                <li @if($page == 'document') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">markunread_mailbox</i>
                        <span>Documents Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('document-list')
                        <li @if($page == 'document' && $subpage == 'document')class="active" @endif>
                            <a href="{{route('admin.document.document.list')}}">
                                <span>Documents</span>
                            </a>
                        </li>
                        @endcan
                        @can('documentstate-list')
                        <li @if($page == 'documentstate' && $subpage == 'documentstate')class="active" @endif>
                            <a href="{{route('admin.document.documentstate.list')}}">
                                <span>Documents To State</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @can('coupon-list')
                <li @if($page == 'coupon') class="active" @endif>
                    <a href="{{route('admin.coupon.list')}}">
                        <i class="material-icons">receipt</i>
                        <span>Promo Code Management</span>
                    </a>
                </li>
                @endcan
                @can('cancelreason-list')
                <li @if($page == 'cancelreason') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">timer_off</i>
                        <span>Cancellation Reason</span>
                    </a>
                    <ul class="ml-menu">
                        <li @if($page == 'cancelreason' && $subpage == 'rider-cancelreason')class="active" @endif>
                            <a href="{{route('admin.cancelreason.rider.list')}}">
                                <span>Rider Cancel Reason</span>
                            </a>
                        </li>
                        <li @if($page == 'cancelreason' && $subpage == 'driver-cancelreason')class="active" @endif>
                            <a href="{{route('admin.cancelreason.driver.list')}}">
                                <span>Driver Cancel Reason</span>
                            </a>
                        </li>
                    </ul>
                @endcan
                @can('notification-list')
                <li @if($page == 'notification') class="active" @endif>
                    <a href="{{route('admin.notification.index')}}">
                        <i class="material-icons">notifications</i>
                        <span>Push Notification</span>
                    </a>
                </li>
                @endcan
                @canany(['driverrating-list','riderrating-list'])
                <li @if($page == 'rating') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">grade</i>
                        <span>Ratings Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('riderrating-list')
                        <li @if($page == 'rating' && $subpage == 'rider')class="active" @endif>
                            <a href="{{route('admin.rating.rider')}}">
                                <span>Rider rating</span>
                            </a>
                        </li>
                        @endcan
                        @can('driverrating-list')
                        <li @if($page == 'rating' && $subpage == 'driver')class="active" @endif>
                            <a href="{{route('admin.rating.driver')}}">
                                <span>Driver rating</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['signup','invoice'])
                <li @if($page == 'email') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">email</i>
                        <span>Email Template Management</span>
                    </a>
                    <ul class="ml-menu">
                        @can('signup')
                        <li @if($page == 'email' && $subpage == 'signup')class="active" @endif>
                            <a href="{{route('admin.email.signup')}}">
                                <span>Signup Email</span>
                            </a>
                        </li>
                        @endcan
                        @can('invoice')
                        <li @if($page == 'email' && $subpage == 'invoice')class="active" @endif>
                            <a href="{{route('admin.email.invoice')}}">
                                <span>Invoice Email</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @can('transaction-list')
                <li @if($page == 'transaction') class="active" @endif>
                    <a href="{{route('admin.transaction.index')}}">
                        <i class="material-icons">business_center</i>
                        <span>Transactions Management</span>
                    </a>
                </li>
                @endcan
                @can('comment-list')
                <li @if($page == 'comment') class="active" @endif>
                    <a href="{{route('admin.comment.list')}}">
                        <i class="material-icons">comment</i>
                        <span>Comments Management</span>
                    </a>
                </li>
                @endcan
                @can('feedback-list')
                <li @if($page == 'feedback') class="active" @endif>
                    <a href="{{route('admin.feedback.list')}}">
                        <i class="material-icons">feedback</i>
                        <span>Feedback Management</span>
                    </a>
                </li>
                @endcan
                @can('advertise-list')
                <li @if($page == 'ad') class="active" @endif>
                    <a href="{{route('admin.ad.list')}}">
                        <i class="material-icons">ondemand_video</i>
                        <span>Ad Management</span>
                    </a>
                </li>
                @endcan
                @can('settings')
                <li @if($page == 'setting') class="active" @endif>
                    <a href="{{route('admin.setting.index')}}">
                        <i class="material-icons">settings</i>
                        <span>Setting</span>
                    </a>
                </li>
                @endcan
                @can('cms-management')
                <li class="header">CMS MANAGEMENT</li>
                @endcan
                @can('banner')
                <li @if($page == 'banner') class="active" @endif>
                    <a href="{{route('admin.cms.banner')}}">
                        <i class="material-icons col-red">donut_large</i>
                        <span>Banner</span>
                    </a>
                </li>
                @endcan
                <li @if($page == 'page') class="active" @endif>
                    <a href="javascript:void(0);" class="menu-toggle">
                       <i class="material-icons col-red">donut_large</i>
                        <span>Page Management</span>
                    </a>
                    <ul class="ml-menu">
                       @can('invoice')
                        <li @if($page == 'page' )class="active" @endif>
                            <a href="{{route('admin.cms.page')}}">
                                <span>Add Page</span>
                            </a>
                        </li>
                        @endcan
                        @can('invoice')
                        <li @if($page == 'pagelist' )class="active" @endif>
                            <a href="{{route('admin.cms.page.list')}}">
                                <span>Pages</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                
                @can('home')
                <li @if($page == 'home') class="active" @endif>
                    <a href="{{route('admin.cms.home')}}">
                        <i class="material-icons col-amber">donut_large</i>
                        <span>Home</span>
                    </a>
                </li>
                @endcan
                @can('charity')
                <li @if($page == 'charity') class="active" @endif>
                    <a href="{{route('admin.cms.charity')}}">
                        <i class="material-icons col-green">donut_large</i>
                        <span>Charity</span>
                    </a>
                </li>
                @endcan
                @can('about')
                <li @if($page == 'about') class="active" @endif>
                    <a href="{{route('admin.cms.about')}}">
                        <i class="material-icons col-light-blue">donut_large</i>
                        <span>About us</span>
                    </a>
                </li>
                @endcan
                @can('terms')
                <li @if($page == 'terms') class="active" @endif>
                    <a href="{{route('admin.cms.terms')}}">
                        <i class="material-icons col-green">donut_large</i>
                        <span>Terms of service</span>
                    </a>
                </li>
                @endcan
                @can('policy')
                <li @if($page == 'policy') class="active" @endif>
                    <a href="{{route('admin.cms.policy')}}">
                        <i class="material-icons col-red">donut_large</i>
                        <span>Privacy policy</span>
                    </a>
                </li>
                @endcan
                @can('cms-management')
                <li @if($page == 'footer') class="active" @endif>
                    <a href="{{route('admin.cms.footer')}}">
                        <i class="material-icons col-amber">donut_large</i>
                        <span>Footer Information</span>
                    </a>
                </li>
                @endcan
                @can('cms-management')
                <li @if($page == 'header') class="active" @endif>
                    <a href="{{route('admin.cms.header')}}">
                        <i class="material-icons col-amber">donut_large</i>
                        <span>Header Information</span>
                    </a>
                </li>
                @endcan
                @can('social')
                <li @if($page == 'social') class="active" @endif>
                    <a href="{{route('admin.cms.social')}}">
                        <i class="material-icons col-green">donut_large</i>
                        <span>Social Networking</span>
                    </a>
                </li>
                @endcan
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2020 <a href="javascript:void(0);">TURVY - RIDESHARE SERVICES</a>.
            </div>
            <div class="version">
                <b>Version: </b> 2.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
