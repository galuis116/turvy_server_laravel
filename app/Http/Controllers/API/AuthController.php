<?php

namespace App\Http\Controllers\API;

use App\Driver;
use App\DriverVehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\DriverEmailVerification;
use App\Mail\RiderEmailVerification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    protected function riderValidator($data)
    {
    		//'device_token' => ['required']
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:14', 'unique:users,mobile'],
            'partner_id' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'device_type' => ['required'],

        ]);
    }

    protected function driverValidator($data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:14', 'unique:drivers,mobile'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:drivers'],
            'password' => ['required', 'string', 'min:8'],
            'country_id' => ['required', 'numeric'],
            'state_id' => ['required', 'numeric'],
            'city_id' => ['required', 'numeric'],
            'make_id' => ['required', 'numeric'],
            'model_id' => ['required', 'numeric'],
            'plate' => ['required', 'string', 'max:15'],
            'device_type' => ['required']
            /*'avatar' => ['required']*/
        ]);
    }

    protected function createRider(array $data, $avatar)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
        	'gender' => 1,
            'email' => $data['email'],
            'partner_id' => $data['partner_id'],
            'mobile' => $data['phone'],
            'mobile_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make($data['password']),
            'device_type' => $data['device_type'],
            'device_token' => $data['device_token'],
            'avatar' => upload_file($avatar, 'user/rider')
        ]);
    }

    protected function createDriver(array $data)
    {
        $driver = Driver::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
        	'gender' => 1,
            'email' => $data['email'],
            'mobile' => $data['phone'],
            'mobile_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make($data['password']),
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'device_type' => $data['device_type'],
            'device_token' => $data['device_token']
        ]);

        DriverVehicle::create([
            'driver_id' => $driver->id,
            'make_id' => $data['make_id'],
            'model_id' => $data['model_id'],
            'plate' => $data['plate']
        ]);
        return $driver;
    }

    public function riderRegisterPostPhone(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:14'],
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        $token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        $twilio_verify_sid = config("services.twilio.verifysid");

        try {
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($request->phone, "sms");

            return response()->json(['status' => 1, 'message' => 'SMS has be sent to your phone number.']);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function riderPostPhone(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:14'],
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        $rider = User::where('mobile', $request->phone)->get();
        if($rider->count() == 0){
            return response()->json(['status' => 0, 'message' => 'Not registered yet.']);
        }else{
           return response()->json(['status' => 1, 'message' => 'Registered']);
        }

       /* $token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        $twilio_verify_sid = config("services.twilio.verifysid");

        try {
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($request->phone, "sms");

            return response()->json(['status' => 1, 'message' => 'SMS has be sent to your phone number.']);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
        */
    }

    public function riderVerifyOTP(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string'],
        ]);
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        try{
                $rider = User::where('mobile', $request->phone)->first();

                Auth::guard('rider')->login($rider);
                $tokenResult = $rider->createToken('turvy');
                $token = $tokenResult->token;

                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);

                $token->save();
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'rider' =>$rider,
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
        /*$validator = Validator::make($request->all(), [
            'otp' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
        ]);
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }
        /* Get credentials from .env */
        /*$token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        $twilio_verify_sid = config("services.twilio.verifysid");
        try {
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create($request->otp, array('to' => $request->phone));

            if ($verification->valid) {
                $rider = User::where('mobile', $request->phone)->first();

                Auth::guard('rider')->login($rider);
                $tokenResult = $rider->createToken('turvy');
                $token = $tokenResult->token;

                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);

                $token->save();
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
        */
    }

  public function verifyOTP(Request $request){
        $validator = Validator::make($request->all(), [
            'otp' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
        ]);
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }
        /* Get credentials from .env */
        $token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        $twilio_verify_sid = config("services.twilio.verifysid");
        try {
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create($request->otp, array('to' => $request->phone));

            if ($verification->valid) {
                return response()->json(['status' => 1, 'message' => 'Phone number verified.']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }


/*
    public function verifyOTP(Request $request){
        $validator = Validator::make($request->all(), [
            'otp' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
        ]);
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }
        /* Get credentials from .env */
      /*  $token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        $twilio_verify_sid = config("services.twilio.verifysid");
        try {
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create($request->otp, array('to' => $request->phone));

            if ($verification->valid) {
                $driver = User::where('mobile', $request->phone)->first();

                Auth::guard('driver')->login($driver);
                $tokenResult = $driver->createToken('turvy');
                $token = $tokenResult->token;

                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);

                $token->save();

                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);
                return response()->json(['status' => 1, 'message' => 'Phone number verified.']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }
  */

    public function riderRegister(Request $request){
        //Validates data
        $validator = $this->riderValidator($request->all());
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        $rider = $this->createRider($request->all(), $request->file('avatar'));

        try {
            Mail::to($request->email)->send(new RiderEmailVerification($rider));
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
        
	          $Email_data = new RiderEmailVerification($rider);
	       	 $html = $Email_data->render();

    		    $from = "admin@turvy.net";
			    $to = $request->email;
			    $subject = "Rider Email Verification";
			    $message = $html;
			    $headers = "From:Admin<" . $from.">	\r\n";
			    $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
			    $headers .= "MIME-Version: 1.0\r\n";
				 $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			    mail($to,$subject,$message, $headers);

        return response()->json(['status' => 1, 'message' => 'Rider created.']);
    }

    public function riderLogin(Request $request) {
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required|min:6'
        ]);
        if(!Auth::guard('rider')->attempt(['mobile' => $request->phone, 'password' => $request->password])){
            return response()->json(['status' => 0, 'message' => 'Password is incorrect.']);
        }
        $rider = Auth::guard('rider')->user();
        $tokenResult = $rider->createToken('turvy');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function verifyPhoneDriverForLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:14'],
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        $driver = Driver::where('mobile', $request->phone)->get();
        if($driver->count() == 0){
            return response()->json(['status' => 0, 'message' => "Wrong phone number or not registered yet."]);
        }else{
            return response()->json(['status' => 1, 'message' => "registered"]);
        }

        /*$token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        $twilio_verify_sid = config("services.twilio.verifysid");

        try {
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($request->phone, "sms");

            return response()->json(['status' => 1, 'message' => 'SMS has be sent to your phone number.']);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
        */
    }

    public function verifyPhoneDriver(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:14'],
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        $token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        $twilio_verify_sid = config("services.twilio.verifysid");

        try {
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($request->phone, "sms");

            return response()->json(['status' => 1, 'message' => 'SMS has be sent to your phone number.']);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function loginDriver(Request $request){
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required|min:6'
        ]);
        if(!Auth::guard('driver')->attempt(['mobile' => $request->phone, 'password' => $request->password])){
            return response()->json(['status' => 0, 'message' => 'Password is incorrect.']);
        }
        $driver = Auth::guard('driver')->user();
        $tokenResult = $driver->createToken('turvy');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function registerDriver(Request $request){
        //Validates data
        $validator = $this->driverValidator($request->all());
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        $driver = $this->createDriver($request->all());

        // Email integration
        try {
            Mail::to($request->email)->send(new DriverEmailVerification($driver));
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        } 

        $Email_data = new DriverEmailVerification($driver);
    	  $html = $Email_data->render();

	 		 $from = "admin@turvy.net";
		    $to = $request->email;
		    $subject = "Driver Email Verification";
		    $message = $html;
		    $headers = "From:Admin<" . $from.">	\r\n";
		    $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
		    $headers .= "MIME-Version: 1.0\r\n";
			 $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		    mail($to,$subject,$message, $headers);


        return response()->json(['status' => 1, 'message' => 'Driver created.']);
    }

  	//new fun 4-8-21
  	//get access token if phone is register.
  	public function loginOTP(Request $request){
       $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string'],
        ]);
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

    	$driver = Driver::where('mobile', $request->phone)->get();
        if($driver->count() == 0){
            return response()->json(['status' => 0, 'message' => 'Not registered yet.']);
        }

        try{

           $driver = Driver::where('mobile', $request->phone)->first();
           $driver->is_login = 1;
           $driver->save();

                Auth::guard('driver')->login($driver);
                $tokenResult = $driver->createToken('turvy');
                $token = $tokenResult->token;

                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);

                $token->save();
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);
        }catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }

        /* Get credentials from .env */
        /*$token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        $twilio_verify_sid = config("services.twilio.verifysid");
        try {
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create($request->otp, array('to' => $request->phone));

            if ($verification->valid) {
               $driver = Driver::where('mobile', $request->phone)->first();

                Auth::guard('driver')->login($driver);
                $tokenResult = $driver->createToken('turvy');
                $token = $tokenResult->token;

                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);

                $token->save();
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);
               // return response()->json(['status' => 1, 'message' => 'Phone number verified.']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
        */
    }//end of fun

   	public function gettoken(Request $request){

     $rider = User::where('mobile', $request->phone)->first();

                Auth::guard('rider')->login($rider);
                $tokenResult = $rider->createToken('turvy');
                $token = $tokenResult->accessToken;
       return response()->json(['status' => 1, 'message' => $token]);

   }

}
