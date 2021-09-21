<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">



        <!-- Sidebar user panel -->

        <div class="user-panel">

            <div class="pull-left image">

                <img src="@if($partner->avatar){{asset($partner->avatar)}} @else {{asset('admin-css/dist/img/avatar.png')}} @endif" alt="User Image" style="height:45px;">

            </div>

            <div class="pull-left info">

                <p>{{$partner->username}}</p>

                @if(!Auth::guard('partner')->check())

                    <a href="{{route('partner.withAdminHome', $partner->id)}}">Partner</a>

                @else

                    <a href="{{route('partner')}}">Partner</a>

                @endif

            </div>

        </div>



        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">
            <li id="rider">
              <a href="{{route('partner.rider')}}">
                <i class="fa fa-user"></i> <span>My Rider</span>
              </a>
            </li>
            <li class="treeview" id="invite">
                <a href="{{route('partner.invite')}}">
                    <i class="fa fa-users"></i> <span>Invite Friend</span>
                </a>
            </li>
            <li class="treeview" id="revenue">
                <a href="{{route('partner.revenue')}}">
                    <i class="fa fa-building"></i> <span>My Revenue</span></i>
                </a>
            </li>
            <li class="treeview" id="comment">
                <a href="{{route('partner.comment')}}">
                    <i class="fa fa-building"></i> <span>Comment</span></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>