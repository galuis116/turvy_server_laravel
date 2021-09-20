<footer>
    <div class="abd-top-footer abd-pt abd-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="abd-footer-sidebar">
                        <a class="ftr-logo" href="#"><img class="img-logo" src="{{isset($settings['site_footer_logo']) ? asset($settings['site_footer_logo']) : asset('images/footer-logo.png')}}" alt="Footer Logo"></a>
                        <p>{{isset($content->footer_caption) ? $content->footer_caption : null}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="abd-footer-sidebar">
                        <h3>Useful Links</h3>
                        <ul class="useful-nav">
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            {{-- <li><a href="{{route('contact')}}">Contact</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="abd-footer-sidebar">
                        <h3>Head office</h3>
                        <address>
                            {{isset($content->footer_address) ? $content->footer_address : null}}
                        </address>
                        {{-- <div class="abd-contact">
                            <ul>
                                <li>Email Address: <a href="mailto:{{isset($content->footer_email) ? $content->footer_email : null}}">{{isset($content->footer_email) ? $content->footer_email : null}}</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="abd-footer-sidebar abd-footer-app">
                        <h3>Download Mobile App</h3>
                        <ul>
                            <li><a href="#"><img src="{{asset('images/apps/ftr-play-store.png')}}" alt="Play store"></a></li>
                            <li><a href="#"><img src="{{asset('images/apps/ftr-apple-store.png')}}" alt="Apple store"></a></li>
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
                    <a href="{{route('terms')}}" style="color: white;">Term and conditions</a>/
                    <a href="{{route('policy')}}" style="color: white;">Privacy policy</a>
                </div>
                <div class="col-md-4">
                    <div class="abd-social-nav">
                        <ul>
                            <li><a href="{{isset($content->facebook) ? $content->facebook : null}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{isset($content->twitter) ? $content->twitter : null}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{isset($content->instagram) ? $content->instagram : null}}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{isset($content->google) ? $content->google : null}}"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="{{isset($content->linkedin) ? $content->linkedin : null}}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{isset($content->pinterest) ? $content->pinterest : null}}"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>