@php
$Header = new \App\Header();
$headerTop = $Header->where('section_name','header_top')->get();
$headerLeft = $Header->where('section_name','header_left')->get();
$headerRight = $Header->where('section_name','header_right')->get();

$sitelogo_image = isset($settings['cdnlogoimage']) ? $settings['cdnlogoimage'] : '';
if(trim($sitelogo_image) == ""){
	$sitelogo_image = isset($settings['site_logo']) ? asset($settings['site_logo']) : '';
}

@endphp
<header>
    <div class="abd-top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="abd-logo">
                        <a href="{{route('index')}}"><img class="img-logo" src="{{isset($sitelogo_image) ? $sitelogo_image : asset('images/logo.png')}}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="abd-top-right-nav non-sign" style="justify-content: center;">
                        <ul>
                            @foreach($headerTop as $items)
                            <li><a href="{{url($items->link)}}" class="header-sign-link">{{$items->label_link}}</a></li>
                            <!-- <li><a href="{{route('register.guide')}}" class="header-sign-link text-uppercase">Become A Driver / Rider</a></li> -->                            
                            @endforeach
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
                            @foreach($headerLeft as $items)
                            <li @if(url()->current() == url($items->link)) class="active" @endif ><a href="{{url($items->link)}}" data-link=""><span><i class="{{$items->iconClass}}"></i></span>{{$items->label_link}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6 abd-nav-col navCenter">
                    <nav class="abd-prime-nave">
                        <ul id="menu">
                        @foreach($headerRight as $items)
                            <li @if(url()->current() == url($items->link)) class="active" @endif ><a href="{{url($items->link)}}">{{$items->label_link}}</a></li>
                        @endforeach    
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
