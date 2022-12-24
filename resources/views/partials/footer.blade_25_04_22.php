@php

$homepgsetting = \App\Homepage::first();

$Footers = new \App\Footers();
$Footer2 = new \App\Footer2();
$footer1 = $Footers->where('section_name','footer_1_section_1')->first();
$footerb2 = $Footers->where('section_name','footer_1_section_2')->first();
$footer2b1 = $Footer2->where('section_name','footer_2_section_1')->get();
$footer2b2 = $Footer2->where('section_name','footer_2_section_2')->get();
$footer2b3 = $Footer2->where('section_name','footer_2_section_3')->get();

/* print"<pre>";
print_r($footer2b1);
*/
//exit;

@endphp
<footer>
	  <div class="abd-top-footer " style="background-color: #011661;padding-bottom: 30px;padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="abd-footer-sidebar">
                    	<div class="row">
                    		<div class="col-lg-1 col-md-1 col-xs-1">
                    			<i class="fa fa-headphones" aria-hidden="true" style="font-size:30px;color: #fff;"></i>
                    		</div>
                       <div class="col-lg-11 col-md-11 col-xs-11">
								<p style="display: inline;color: #fff;font-size:22px;font-weight: 500;">{{isset($footer1->heading1) ? $footer1->heading1 : '' }}</p>
								<p style="color: #fff;">{{isset($footer1->subheading) ? $footer1->subheading : '' }}</p>
								<a href="{{isset($footer1->link) ? $footer1->link : '' }}" style="font-size:16px;color: #fff;font-weight:bold;"> {{isset($footer1->label_link) ? $footer1->label_link : '' }}  <i class="fa fa-arrow-right" aria-hidden="true"  style="font-size:16px;color: #fff;" ></i></a>
								</div>
								</div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4">
                    <div class="abd-footer-sidebar">
                    </div>
                 </div>
                <div class="col-lg-4 col-md-4">
                    <div class="abd-footer-sidebar">
                     	<div class="row">
                    		<div class="col-lg-1 col-md-1 col-xs-1">
                    			<i class="fas fa-shield-alt" aria-hidden="true" style="font-size:30px;color: #fff;"></i>
                    		</div>
                       <div class="col-lg-11 col-md-11 col-xs-11">
								<p style="display: inline;color: #fff;font-size:22px;font-weight: 500;">{{isset($footerb2->heading1) ? $footerb2->heading1 : '' }}</p>
								<p style="color: #fff;width: 100%;">{{isset($footerb2->subheading) ? $footerb2->subheading : '' }}</p>
								<a style="font-size:16px;color: #fff;font-weight:bold;" href="{{isset($footerb2->link) ? $footerb2->link : '' }}"> {{isset($footerb2->label_link) ? $footerb2->label_link : '' }}  <i class="fa fa-arrow-right" aria-hidden="true"  style="font-size:16px;color: #fff;" ></i></a>
								</div>
								</div>
                      	
                    </div>
                </div>
            </div>
        </div>
     </div>
    <div class="abd-top-footer " style="background-color:#142e8e;padding-bottom: 30px;padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="abd-footer-sidebar">
                    		<div class="row">
                    			<div class="col-lg-6 col-md-6 text-center">
                    				<a class="ftr-logo" href="{{route('index')}}"><img class="img-logo" style="width:100px" src="{{isset($settings['site_logo']) ? asset($settings['site_logo']) : asset('images/logo.png')}}" alt="Footer Logo"></a>
                       			 <p>{{isset($homepgsetting->footer_caption) ? $homepgsetting->footer_caption : null}}</p>
                    			</div>
                    			<div class="col-lg-6 col-md-6">
                    				 <div class="footer-ul-nav" id="footer-ul-nav" style="padding-top: 40px;">
                    				 	@foreach($footer2b1 as $ftlink1)
		                            <div><a href="{{url($ftlink1->link)}}">{{$ftlink1->label_link}}</a></div>
		                           @endforeach
		                        </div>
                    			</div>
                    		</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="abd-footer-sidebar">
                        <h3>Useful Links</h3>
                        <ul class="useful-nav">
                        
                        @foreach($footer2b2 as $ftlink2)
                        		<li><a href="{{url($ftlink2->link)}}">{{$ftlink2->label_link}}</a></li>
                         @endforeach

                        </ul>
                        <hr />
                        <h3>Head office</h3>
                        <address>
                            {{isset($homepgsetting->footer_address) ? $homepgsetting->footer_address : null}}
                        </address>
                        {{-- <div class="abd-contact">
                            <ul>
                                <li>Email Address: <a href="mailto:{{isset($homepgsetting->footer_email) ? $homepgsetting->footer_email : null}}">{{isset($homepgsetting->footer_email) ? $homepgsetting->footer_email : null}}</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <!-- <div class="col-lg-2 col-md-2">
                    <div class="abd-footer-sidebar">
                        
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-4">
                    <div class="abd-footer-sidebar abd-footer-app">
                        <h3>Useful Links</h3>
                        <div style="border:1px solid #fff;border-radius:10px;padding: 10px;">
                        		<h6 style="color:#fff;text-align: center;">Driver Application Requirements by State </h6>
                        		 <div style="align-content: center;" align="center"><ul>
                        		  @foreach($footer2b3 as $ftlink3)
                        		<li><a href="{{url($ftlink3->link)}}">{{$ftlink3->label_link}}</a></li>
                         @endforeach
		                            <!-- <li style="padding:10px;"><a href="#">NSW</a></li>
		                            <li style="padding:10px;"><a href="#">VIC</a></li>
		                            <li style="padding:10px;"><a href="#">QLD</a></li>
		                            <li style="padding:10px;"><a href="#">WA</a></li>
		                            <li style="padding:10px;"><a href="#">SA</a></li>
		                            <li style="padding:10px;"><a href="#">TAS</a></li> -->
		                        </ul></div>
                        </div>
                        <ul>
                            <li><a href="{{url($homepgsetting->andriod_app_link)}}"><img src="{{asset('images/apps/ftr-play-store.png')}}" alt="Play store"></a></li>
                            <li></li>
                            <li><a href="{{url($homepgsetting->ios_app_link)}}"><img src="{{asset('images/apps/ftr-apple-store.png')}}" alt="Apple store"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="abd-btm-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 abd-copyright">
                    <p>&copy; Copyright 2020 by Turvy LTD. All Right Reserved.</p>
                </div>
                <div class="col-md-4" style="display: flex; flex-direction: row; gap: 5px;">
                    <a href="https://www.turvy.net/term-and-conditions" style="color: white;">Term and conditions</a>/
                    <a href="{{route('policy')}}" style="color: white;">Privacy policy</a>
                </div>
                <div class="col-md-4">
                    <div class="abd-social-nav">
                        <ul>
                            <li><a href="{{isset($homepgsetting->facebook) ? $homepgsetting->facebook : null}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{isset($homepgsetting->twitter) ? $homepgsetting->twitter : null}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{isset($homepgsetting->instagram) ? $homepgsetting->instagram : null}}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{isset($homepgsetting->google) ? $homepgsetting->google : null}}"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="{{isset($homepgsetting->linkedin) ? $homepgsetting->linkedin : null}}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{isset($homepgsetting->pinterest) ? $homepgsetting->pinterest : null}}"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>