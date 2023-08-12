<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Driver;
use App\DriverVehicle;
use App\Http\Controllers\Controller;
use App\Partner;
use App\VehicleMake;
use App\Mail\DriverEmailVerification;
use App\Mail\DriverEmailVerificationByAdmin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class DriverRegisterController extends Controller
{
    protected $redirectPath = '/driver';
    //shows registration form to seller
    public function showRegistrationForm(Request $request)
    {
        $user_country_iso = getVisIpAddr();

        $user_country = Country::where('iso', $user_country_iso)->first();
      
        $countries = Country::all();
        $partners = Partner::where('is_approved', 1)->get();
        $makes = VehicleMake::where('status', 1)->get();
        return view('auth.register-driver')
            ->with('makes', $makes)
            ->with('countries', $countries)
            ->with('partners', $partners)
            ->with('user_country_iso', $user_country->iso)
            ->with('user_country_phonecode', $user_country->phonecode);
    }
    //Handles registration request for driver
    public function register(Request $request)
    {
        //Validates data
        $this->validator($request->all())->validate();
        //Create driver
        $verification_code = substr(md5(rand()),0,29);

        /*$hask_key=Cache::get('sec_key');

      	print"<pre>";
      	print_r($hask_key);
      	exit;
        if(!$hask_key || !Hash::check('world', $hask_key)){
            return redirect()->back()->with(['error' => 'You are hacker!']);
        }
        */


        $request->merge([
            'verification_code'=>$verification_code,
            'ip_address' => $request->ip()
        ]);

        $driver = $this->create($request->all());
        Cache::forget('sec_key');
        try {
            Mail::to($request->email)->send(new DriverEmailVerification($driver));
            Mail::to(config('mail.staff.address'))->send(new DriverEmailVerificationByAdmin($driver));
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }

        //Redirects driver
        return redirect()->route('driver.verify')->with(['email' => $request->email]);
    }
    //Validates driver's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phonecode' => ['required', 'string', 'max:10'],
            'user_phone' => ['required', 'string', 'max:14', 'regex:/^([1-9][0-9]+)$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:drivers'],
            'password' => ['required', 'string', 'min:8'],
            'country_id' => ['required', 'numeric'],
            'city_id' => ['required', 'numeric'],
            'state_id' => ['required', 'numeric'],
            'make_id' => ['required', 'numeric'],
            'model_id' => ['required', 'numeric'],
            'plate' => ['required', 'string', 'max:15'],
        ]);
    }
    //Create a new driver instance after a validation.
    protected function create(array $data)
    {
        $mobile = $data['phonecode'].$data['user_phone'];

        $driver = Driver::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => 1,
            'email' => $data['email'],
            'mobile' => $mobile,
            'mobile_verified_at' => date('Y-m-d H:i:s'),
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'ip_address' => $data['ip_address'],
            'mobile_verified_at' => $data['mobile_verified_at'],
            'password' => Hash::make($data['password']),
        ]);
        DriverVehicle::create([
            'driver_id' => $driver->id,
            'make_id' => $data['make_id'],
            'model_id' => $data['model_id'],
            'plate' => $data['plate']
        ]);
        return $driver;
    }
    //Get the guard to authenticate driver
    protected function guard()
    {
        return Auth::guard('driver');
    }

    public function verify()
    {
        return view('auth.mobile-verify-driver');
    }

    protected function verifyProcess(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'mobile' => ['required', 'string'],
        ]);
        /* Get credentials from .env */
        $token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        $twilio_verify_sid = config("services.twilio.verifysid");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['mobile']));

        if ($verification->valid) {
            $driver = tap(Driver::where('mobile', $data['mobile']))->update(['mobile_verified_at' => date('Y-m-d H:i:s')]);
            /* Authenticate user */
            Auth::guard('driver')->login($driver->first());
            return redirect()->route('driver.document')->with(['message' => 'Phone number verified']);
        }
        return back()->with(['mobile' => $data['mobile'], 'error' => 'Invalid verification code entered!']);
    }
}
