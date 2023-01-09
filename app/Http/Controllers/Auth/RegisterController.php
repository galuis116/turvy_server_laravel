<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\User;
use App\Http\Controllers\Controller;
use App\Mail\RiderEmailVerification;
use App\Mail\RiderEmailVerificationByAdmin;
use App\Partner;
use App\VehicleMake;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/rider';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['verify']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phonecode' => ['required', 'string', 'max:8'],
            'user_phone' => ['required', 'string', 'max:10', 'regex:/^([1-9][0-9]+)$/'],
            'partnerID' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'photo' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, $file)
    {

        $validator = $this->validator($data);

        if($validator->fails() )
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);

        } else {


            $mobile = $data['phonecode'].$data['user_phone'];

            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
            	'gender' => 1,
                'email' => $data['email'],
                'verification_code' => $data['verification_code'],
                'ip_address' => $data['ip_address'],
                'mobile' => $mobile,
                'mobile_verified_at' => date('Y-m-d H:i:s'),
                'partner_id' => $data['partnerID'],
                'password' => Hash::make($data['password']),
                'avatar' => upload_file($file, 'user/rider')
            ]);

        }


    }

    public function showRegistrationForm()
    {
        // Cache::put("key", "dd");
        // return Cache::get("key");
        $countries = Country::all();
        $partners = Partner::where('is_approved', 1)->get();
        $makes = VehicleMake::where('status', 1)->get();
        return view('auth.register-rider')
            ->with('makes', $makes)
            ->with('countries', $countries)
            ->with('partners', $partners);
    }

    public function register(Request $request)
    {
        //Validates data
        $validator = $this->validator($request->all());
        /*
        $hask_key=Cache::get('sec_key');
        if(!$hask_key || !Hash::check('world', $hask_key)){
            return response()->json(['status' => 0, 'message' => 'You are hacker!']);
        }
        */

        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        //Create rider
        $verification_code = substr(md5(rand()),0,29);

        $request->merge([
            'verification_code'=>$verification_code,
            'ip_address' => $request->ip()
        ]);

        $rider = $this->create($request->all(), $request->file('photo'));
        Cache::forget('sec_key');
        try {
            Mail::to($request->email)->send(new RiderEmailVerification($rider));
            Mail::to('fanghuateng0621@gmail.com')->send(new RiderEmailVerificationByAdmin($rider));
            // Mail::to(App::config('mail.from.address'))->send(new RiderEmailVerificationByAdmin($rider));
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }

        // $this->guard()->login($rider);

        return response()->json(['status' => 1]);
    }

    protected function guard()
    {
        return Auth::guard('rider');
    }

    public function verify()
    {
        return view('auth.email-verify');
    }

    public function verifyEmail()
    {
        return redirect()->route('rider.verify');
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
            $user = tap(User::where('mobile', $data['mobile']))->update(['mobile_verified_at' => date('Y-m-d H:i:s')]);
            /* Authenticate user */
            Auth::guard('rider')->login($user->first());
            return redirect()->route('rider')->with(['message' => 'Phone number verified']);
        }
        return back()->with(['mobile' => $data['mobile'], 'error' => 'Invalid verification code entered!']);
    }
}
