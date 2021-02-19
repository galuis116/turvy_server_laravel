<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('admin.dashboard')}}">
                <img src="{{isset($settings['site_logo']) ? asset($settings['site_logo']) : asset('admin-panel/images/admin_panel_logo.png')}}"/>
            </a>
        </div>
    </div>
</nav>
