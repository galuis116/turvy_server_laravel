<header class="main-header">

    <!-- Logo -->

    <a href="" class="logo">

        <!-- mini logo for sidebar mini 50x50 pixels -->

        <span class="logo-mini">Turvy Family</span>

        <!-- logo for regular state and mobile devices -->

        <span class="logo-lg">Turvy Family</span>

    </a>



    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">



        <!-- Sidebar toggle button-->

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

        </a>



        <div class="navbar-custom-menu">



            <ul class="nav navbar-nav">



                <li class="dropdown user user-menu">



                    <a href="{{route('partner.profile', $partner->id)}}" class="dropdown-toggle" data-toggle="dropdown">

                      <img src="@if($partner->avatar){{asset($partner->avatar)}} @else {{asset('partner-panel/dist/img/avatar.png')}} @endif" class="user-image" alt="User Image" style="border-radius: 0;">

                      <span class="hidden-xs">{{$partner->name}}</span>

                    </a>



                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="@if($partner->avatar){{asset($partner->avatar)}} @else {{asset('partner-panel/dist/img/avatar.png')}} @endif" alt="User Image">
                            <p>
                                {{$partner->name}}
                                <small>Partner</small>
                            </p>
                        </li>

                        <!-- Menu Body -->



                      <!-- Menu Footer-->

                        <li class="user-footer">

                            <div class="pull-left">

                                <a href="{{route('partner')}}" class="btn btn-default btn-flat"><i class="fa fa-user"></i> My profile</a>

                            </div>

                            <div class="pull-right">

                                @if(Auth::guard('partner')->check())

                                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Sign Out</a>
                                    <form id="logout-form" action="{{ route('partner.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                @else

                                    <a href="{{route('home.partner_go_admin_dashboard')}}" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Sign Out</a>

                                @endif

                            </div>

                        </li>

                    </ul>

                </li>



            </ul>



        </div>

    </nav>



</header>

