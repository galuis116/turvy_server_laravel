@php
$sitelogo_image = isset($settings['cdnlogoimage']) ? $settings['cdnlogoimage'] : '';
if(trim($sitelogo_image) == ""){
	$sitelogo_image = isset($settings['site_logo']) ? asset($settings['site_logo']) : '';
}

@endphp
<div id="preloader">
    <div class="loading-area">
        <div class="tt-logo">
            <img class="img-logo" src="{{isset($sitelogo_image) ? $sitelogo_image : asset('images/logo.png')}}" alt="Turvy" >
        </div>
        <br>
        <div class="loading">
            <span>loading...</span>
        </div>
    </div>
    <div class="left-side"></div>
    <div class="right-side"></div>
</div>