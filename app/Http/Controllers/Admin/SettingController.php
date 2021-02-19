<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:settings', ['only' => ['index', 'store']]);
    }
    public function index()
    {
        return view('admin.setting.index')
            ->with('page', 'setting');
    }
    public function store(Request $request)
    {
        if($request->has('site_name'))
        {
            $setting = Setting::where('key', 'site_name')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'site_name';
            $setting->value = $request->site_name;
            $setting->save();
        }
        if($request->has('driver_timeout'))
        {
            $setting = Setting::where('key', 'driver_timeout')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'driver_timeout';
            $setting->value = $request->driver_timeout;
            $setting->save();
        }
        if($request->has('search_radius'))
        {
            $setting = Setting::where('key', 'search_radius')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'search_radius';
            $setting->value = $request->search_radius;
            $setting->save();
        }
        if($request->has('paypal_client_id'))
        {
            $setting = Setting::where('key', 'paypal_client_id')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'paypal_client_id';
            $setting->value = $request->paypal_client_id;
            $setting->save();
        }
        if($request->has('paypal_secret'))
        {
            $setting = Setting::where('key', 'paypal_secret')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'paypal_secret';
            $setting->value = $request->paypal_secret;
            $setting->save();
        }
        if($request->has('stripe_publishable_key'))
        {
            $setting = Setting::where('key', 'stripe_publishable_key')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'stripe_publishable_key';
            $setting->value = $request->stripe_publishable_key;
            $setting->save();
        }
        if($request->has('stripe_secret_key'))
        {
            $setting = Setting::where('key', 'stripe_secret_key')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'stripe_secret_key';
            $setting->value = $request->stripe_secret_key;
            $setting->save();
        }
        if($request->has('twilio_sid'))
        {
            $setting = Setting::where('key', 'twilio_sid')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'twilio_sid';
            $setting->value = $request->twilio_sid;
            $setting->save();
        }
        if($request->has('twilio_token'))
        {
            $setting = Setting::where('key', 'twilio_token')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'twilio_token';
            $setting->value = $request->twilio_token;
            $setting->save();
        }
        if($request->has('twilio_from'))
        {
            $setting = Setting::where('key', 'twilio_from')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'twilio_from';
            $setting->value = $request->twilio_from;
            $setting->save();
        }
        if($request->has('google_api_key'))
        {
            $setting = Setting::where('key', 'google_api_key')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'google_api_key';
            $setting->value = $request->google_api_key;
            $setting->save();
        }
        if($request->has('fcm_server_key'))
        {
            $setting = Setting::where('key', 'fcm_server_key')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'fcm_server_key';
            $setting->value = $request->fcm_server_key;
            $setting->save();
        }
        if($request->has('fcm_sender_id'))
        {
            $setting = Setting::where('key', 'fcm_sender_id')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'fcm_sender_id';
            $setting->value = $request->fcm_sender_id;
            $setting->save();
        }
        if($request->has('admin_email_address'))
        {
            $setting = Setting::where('key', 'admin_email_address')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'admin_email_address';
            $setting->value = $request->admin_email_address;
            $setting->save();
        }
        if($request->has('support_email_address'))
        {
            $setting = Setting::where('key', 'support_email_address')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'support_email_address';
            $setting->value = $request->support_email_address;
            $setting->save();
        }
        if($request->hasFile('site_logo'))
        {
            $setting = Setting::where('key', 'site_logo')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'site_logo';
            $setting->value = upload_file($request->file('site_logo'), 'logo');
            $setting->save();
        }
        if($request->hasFile('site_favicon'))
        {
            $setting = Setting::where('key', 'site_favicon')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'site_favicon';
            $setting->value = upload_file($request->file('site_favicon'), 'logo');
            $setting->save();
        }
        if($request->hasFile('email_logo'))
        {
            $setting = Setting::where('key', 'email_logo')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'email_logo';
            $setting->value = upload_file($request->file('email_logo'), 'logo');
            $setting->save();
        }
        if($request->hasFile('site_footer_logo'))
        {
            $setting = Setting::where('key', 'site_footer_logo')->first();
            if(!$setting)
                $setting = new Setting();
            $setting->key = 'site_footer_logo';
            $setting->value = upload_file($request->file('site_footer_logo'), 'logo');
            $setting->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
}
