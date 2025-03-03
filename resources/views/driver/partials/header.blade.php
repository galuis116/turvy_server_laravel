<header class="header">
    <div id="slide-menu" class="side-navigation">
        <ul class="navbar-nav">
            <li id="close"><a href="#"><i class="fa fa-close"></i></a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Sign in</a></li>
            <li><a href="#">Register</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Contact us</a></li>
        </ul>
    </div>
    
    <div class="navigation-row">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-4"><strong class="logo"> <a href="{{route('index')}}"> <img src="{{asset('images/logo.png')}}" width="auto" height="60px" alt=""> </a> </strong></div>
                <div class="col-md-9 col-sm-6 col-xs-8 login_header_profile">
                    <div class="topbar">
                        <ul class="top-listed">
                            <li>
                                <div class="dropdown" style="float:right;">
                                    @if(Auth::guard('driver')->user()->avatar == '')
                                    <img alt="" src="{{asset('images/no-person.png')}}" class="img-rounded header_profile_img">
                                    @else
                                    <img src="{{asset(Auth::guard('driver')->user()->avatar)}}" class="img header_profile_img">
                                    <span class="profile_name">{{Auth::guard('driver')->user()->name}} </span> <span class="caret"></span>
                                    @endif
                                    <div class="dropdown-content">
                                        <a href="{{route('driver.profile')}}">Profile<i class="fa fa-user"></i></a>
                                        <a href="{{route('driver.inbox')}}">Inbox<i class="fa fa-envelope"></i></a>
                                        <a href="{{route('driver.trips')}}">My Rides<i class="fa fa-car"></i></a>
                                        <a href="{{route('driver.payments')}}">Earning History<i class="fa fa-car"></i></a>
                                        <a href="{{route('driver.document')}}">Documents<i class="fa fa-file-text"></i></a>
                                        <a href="{{route('driver.bank')}}">Bank Details<i class="fa fa-file-text"></i></a>
                                        <a href="{{route('driver.changepassword')}}">Change Password<i class="fa fa-lock"></i></a>
                                        <a href="{{route('driver.support')}}">Customer Support<i class="fa fa-life-ring"></i></a>
                                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout<i class="fa fa-sign-out"></i></a>
                                        <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li id="push" class="sidemenu visible-xs"><a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>