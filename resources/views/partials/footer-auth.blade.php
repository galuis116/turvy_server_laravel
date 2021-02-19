<!-- footer -->
<footer>
    <div class="abd-sign-reg-ftr">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <a class="ftr-logo" href="#"><img width="250px" src="{{asset('images/footer-logo.png')}}" alt="Footer Logo"></a>
                </div>
                <div class="col-lg-6 col-md-6">
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
                <div class="col-lg-2 col-md-6">
                    <div class="abd-footer-app">
                        <ul>
                            <li><a href="#"><img src="{{asset('images/apps/ftr-play-store.png')}}" alt="Play store"></a></li>
                            <li><a href="#"><img src="{{asset('images/apps/ftr-apple-store.png')}}" alt="Apple store"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="abd-btm-footer sign-reg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 abd-copyright">
                    <p>&copy; Copyright 2020 by Turvy LTD. All Right Reserved.</p>
                </div>
                <div class="col-md-6">
                    <ul class="abd-priv-terms">
                        <li><a href="{{route('policy')}}">Privacy</a></li>
                        <li><a href="{{route('terms')}}">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- footer /end -->