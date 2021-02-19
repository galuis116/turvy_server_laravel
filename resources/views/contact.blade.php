@extends('layouts.app')

@section('title') Contact us @endsection

@section('content')
    <section class="abd-inner-page-head">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="abd-breadcrumb">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a><i class="fas fa-chevron-right"></i></li>
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="abd-page-title">
                        <h2>Contact us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- inner nav /end -->

    <!-- contact form map -->
    <section class="abd-contact-form-map abd-pb abd-pt3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="abd-contact-title">
                        <h2>Send Us An Email</h2>
                    </div>
                    <form action="{{route('feedback')}}" method="post">
                        @csrf
                        <div class="ad-double-inpt">
                            <div class="abd-single-inpt">
                                <input type="text" name="name" placeholder="Your Name">
                            </div>
                            <div class="abd-single-inpt">
                                <input type="email" name="email" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="ad-double-inpt">
                            <div class="abd-single-inpt">
                                <input type="text" name="mobile" placeholder="Your Phone">
                            </div>
                            <div class="abd-single-inpt">
                                <input type="text" name="subject" placeholder="Subject">
                            </div>
                        </div>
                        <div class="abd-single-inpt">
                            <textarea name="content" id="textContainer" cols="30" rows="4" placeholder="Text Container"></textarea>
                        </div>
                        <div class="abd-send-btn">
                            <button type="submit" class="abd-btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="abd-contact-map">
                        <div id="googleMap" style="width: 100%;height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact form map /end -->
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.googlemap.apikey')}}"></script>
    <script>
        function initialize() {
            var map_canvas = document.getElementById('googleMap');
            var map_options = {
                center: new google.maps.LatLng(-33.816130, 151.019400),
                zoom: 12,
                mapId: 'af9935eed520f3ec'
            }
            var map = new google.maps.Map(map_canvas, map_options);
            var marker = new google.maps.Marker({position: new google.maps.LatLng(-33.816130, 151.019400), map: map});
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection