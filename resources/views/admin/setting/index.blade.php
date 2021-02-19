@extends('admin.layouts.app')

@section('title', 'Settings')

@php
    $site_logo = isset($settings['site_logo']) ? $settings['site_logo'] : 'images/no-image.png';
    $site_favicon = isset($settings['site_favicon']) ? $settings['site_favicon'] : 'images/no-image.png';
    $email_logo = isset($settings['email_logo']) ? $settings['email_logo'] : 'images/no-image.png';
    $site_footer_logo = isset($settings['site_footer_logo']) ? $settings['site_footer_logo'] : 'images/no-image.png';
@endphp

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @include('admin.partials.message')
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Site settings</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.setting.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-8 col-sm-12 col-xs-12">
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                                <label for="image">Site logo</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail">
                                                                    <img src="{{asset($site_logo)}}" width="150px" height="150px" alt=""/>
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"></div>
                                                                <div>
                                                                    <span class="btn btn-default btn-file">
                                                                        <span class="fileinput-new">Select image </span>
                                                                        <span class="fileinput-exists">Change </span>
                                                                        <input type="file" name="site_logo">
                                                                    </span>
                                                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                                <label for="image">Site favicon</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail">
                                                                    <img src="{{asset($site_favicon)}}" width="150px" height="150px" alt=""/>
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"></div>
                                                                <div>
                                                                    <span class="btn btn-default btn-file">
                                                                        <span class="fileinput-new">Select image </span>
                                                                        <span class="fileinput-exists">Change </span>
                                                                        <input type="file" name="site_favicon">
                                                                    </span>
                                                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                                <label for="image">Site footer logo</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail">
                                                                    <img src="{{asset($site_footer_logo)}}" width="150px" height="150px" alt=""/>
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"></div>
                                                                <div>
                                                                    <span class="btn btn-default btn-file">
                                                                        <span class="fileinput-new">Select image </span>
                                                                        <span class="fileinput-exists">Change </span>
                                                                        <input type="file" name="site_footer_logo">
                                                                    </span>
                                                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                                <label for="image">Email logo</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail">
                                                                    <img src="{{asset($email_logo)}}" width="150px" height="150px" alt=""/>
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"></div>
                                                                <div>
                                                                    <span class="btn btn-default btn-file">
                                                                        <span class="fileinput-new">Select image </span>
                                                                        <span class="fileinput-exists">Change </span>
                                                                        <input type="file" name="email_logo">
                                                                    </span>
                                                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="site_name">Site Name</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="site_name" name="site_name" class="form-control" placeholder="Enter site name" value="{{isset($settings['site_name']) ? $settings['site_name'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="driver_timeout">Driver Timeout(in secs)</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" id="driver_timeout" name="driver_timeout" class="form-control" placeholder="Enter driver timeout" value="{{isset($settings['driver_timeout']) ? $settings['driver_timeout'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="search_radius">Search Radius(in Kms)</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" id="search_radius" name="search_radius" class="form-control" placeholder="Enter search redius" value="{{isset($settings['search_radius']) ? $settings['search_radius'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="paypal_client_id">Paypal client id</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="paypal_client_id" name="paypal_client_id" class="form-control" placeholder="Enter paypal client id" value="{{isset($settings['paypal_client_id']) ? $settings['paypal_client_id'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="paypal_secret">Paypal secret</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="paypal_secret" name="paypal_secret" class="form-control" placeholder="Enter paypal secret" value="{{isset($settings['paypal_secret']) ? $settings['paypal_secret'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="stripe_publishable_key">Stripe Publishable Key</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="stripe_publishable_key" name="stripe_publishable_key" class="form-control" placeholder="Enter stripe publishable key" value="{{isset($settings['stripe_publishable_key']) ? $settings['stripe_publishable_key'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="stripe_secret_key">Stripe Secret Key</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="stripe_secret_key" name="stripe_secret_key" class="form-control" placeholder="Enter stripe secret key" value="{{isset($settings['stripe_secret_key']) ? $settings['stripe_secret_key'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="twilio_sid">Twilio sid</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="twilio_sid" name="twilio_sid" class="form-control" placeholder="Enter twilio sid" value="{{isset($settings['twilio_sid']) ? $settings['twilio_sid'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="twilio_token">Twilio token</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="twilio_token" name="twilio_token" class="form-control" placeholder="Enter twilio token" value="{{isset($settings['twilio_token']) ? $settings['twilio_token'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="twilio_from">Twilio from</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="twilio_from" name="twilio_from" class="form-control" placeholder="Enter twilio from" value="{{isset($settings['twilio_from']) ? $settings['twilio_from'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="google_api_key">Google API key</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="google_api_key" name="google_api_key" class="form-control" placeholder="Enter google api key" value="{{isset($settings['google_api_key']) ? $settings['google_api_key'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="fcm_server_key">FCM server key</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="fcm_server_key" name="fcm_server_key" class="form-control" placeholder="Enter fcm server key" value="{{isset($settings['fcm_server_key']) ? $settings['fcm_server_key'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="fcm_sender_id">FCM sender id</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="fcm_sender_id" name="fcm_sender_id" class="form-control" placeholder="Enter fcm sender id" value="{{isset($settings['fcm_sender_id']) ? $settings['fcm_sender_id'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="admin_email_address">Admin email address</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="admin_email_address" name="admin_email_address" class="form-control" placeholder="Enter admin email address" value="{{isset($settings['admin_email_address']) ? $settings['admin_email_address'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="support_email_address">Support email address</label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="support_email_address" name="support_email_address" class="form-control" placeholder="Enter support email address" value="{{isset($settings['support_email_address']) ? $settings['support_email_address'] : ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5 pull-right">
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

@endsection
