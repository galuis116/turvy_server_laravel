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

$sitelogo_image = isset($settings['cdnlogoimage']) ? $settings['cdnlogoimage'] : '';
if(trim($sitelogo_image) == ""){
    $sitelogo_image = isset($settings['site_logo']) ? asset($settings['site_logo']) : '';
}

@endphp
<footer>
    
    <div class="abd-top-footer " style="background-color:#142e8e;padding-bottom: 30px;padding-top: 30px;">
        <div style="width: 100%;">
            <div class="row">

           
<!-- LOGO COL -->
           <div class="col-md-3">

                <a class="ftr-logo" href="{{route('index')}}"><img class="img-logo" style="width:100px" src="{{isset($sitelogo_image) ? asset($sitelogo_image) : asset('images/logo.png')}}" alt="Footer Logo"></a>
                <p>{{isset($homepgsetting->footer_caption) ? $homepgsetting->footer_caption : null}}</p>

           </div>
<!-- LOGO COL END -->
<!-- ABOUT COL -->
            <div class="col-md-3">


            <div class="footer-ul-nav" id="footer-ul-nav" style="padding-top: 5px;">
                    @foreach($footer2b1 as $ftlink1)
                        <div><a href="{{url($ftlink1->link)}}" style="color: white;" >{{$ftlink1->label_link}}</a></div>
                    @endforeach
            </div>


            </div>


<!-- ABOUT COL  END-->
<!-- USEFUL LUINK COL -->

             <div class="col-md-3">

                <h5 style="color: white;" >Useful Links</h5>
                <ul class="useful-nav">
                
                @foreach($footer2b2 as $ftlink2)
                        <li><a href="{{url($ftlink2->link)}}" style="color: white;">{{$ftlink2->label_link}}</a></li>
                 @endforeach

                </ul>
             </div>

<!-- USEFUL LUINK  END-->
<!-- OFFICE ADDRESS COL -->




             <div class="col-md-3">

                    <h5 style="color: white;">Head office</h5>
                        <address style="color: white;">
                            {{isset($homepgsetting->footer_address) ? $homepgsetting->footer_address : null}}
                        </address>
             </div>

<!-- OFFICE ADDRESS END -->
        </div>

        <!-- FIRST ROW END-->



            <div class="row">

                <div class="col-md-3">
                </div>

                <div class="col-md-3">
                </div>


                <div class="col-md-3">
                    <a href="{{url($homepgsetting->andriod_app_link)}}"><img src="{{ isset($homepgsetting->cdn_andriod_app_image) && $homepgsetting->cdn_andriod_app_image != '' ? $homepgsetting->cdn_andriod_app_image : asset('images/apps/ftr-play-store.png')}}" alt="Play store"></a>
                </div>


                <div class="col-md-3">
                    <a href="{{url($homepgsetting->ios_app_link)}}"><img src="{{ isset($homepgsetting->cdn_ios_app_image) && $homepgsetting->cdn_ios_app_image != '' ? $homepgsetting->cdn_ios_app_image : asset('images/apps/ftr-apple-store.png')}}" alt="Apple store"></a>
                </div>


                      
            </div>

            <!-- SECOND ROW ENDS -->


<!-- THIRD ROW BLACK STARTS -->

    </div>



</div>




<!-- 
NEW AREA STARTS -->






    <div class="abd-btm-footer" style="background-color: #000; border: 1px solid #fff; line-height: 3px!important;">
       
           

            <div class="row" style="width: 100%;">
                <div class="col-md-6 abd-copyright">
                    <p style="color:white; font-size:12px;">&copy; Copyright 2020 by Turvy LTD. All Right Reserved.</p>
                </div>
                <div class="col-md-6 abd-copyright">
                    <a href="https://www.turvy.net/term-and-conditions" style="color: white;">Term and conditions</a>/<a href="{{route('policy')}}" style="color: white;">Privacy policy</a>
                </div>
               
                </div>
            </div>

    
    </div>



</footer>