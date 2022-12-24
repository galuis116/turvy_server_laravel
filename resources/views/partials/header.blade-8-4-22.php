<header>
    <div class="abd-top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="abd-logo">
                        <a href="{{route('index')}}"><img class="img-logo" src="{{isset($settings['site_logo']) ? asset($settings['site_logo']) : asset('images/logo.png')}}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="abd-top-right-nav non-sign">
                        <ul>
                            <li><a href="{{route('login.guide')}}" class="header-sign-link">Sign In</a></li>
                            <li><a href="{{route('register.guide')}}" class="header-sign-link text-uppercase">Become A Driver / Rider</a></li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="abd-nav-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 abd-nav-col navCenter">
                    <nav class="abd-prime-nave">
                        <ul id="menu">
                            <li @if(Route::currentRouteName()=='index') class="active" @endif><a href="{{route('index')}}"><span><i class="fas fa-home"></i></span>Home</a></li>
                            <li @if(Route::currentRouteName()=='charity') class="active" @endif><a href="{{route('charity')}}"><span><i class="fas fa-exclamation-circle"></i></span>Our Charity</a></li>
                            {{-- <li @if(Route::currentRouteName()=='contact') class="active" @endif><a href="{{route('contact')}}"><span><i class="fas fa-map-marker-alt"></i></span>Contact</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6 abd-nav-col navCenter">
                    <nav class="abd-prime-nave">
                        <ul id="menu">
                            <li @if(Route::currentRouteName()=='COVID-19-resources') class="active" @endif><a href="#">COVID-19-resources</a></li>                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
