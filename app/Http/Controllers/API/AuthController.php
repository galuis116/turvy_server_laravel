<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    protected function riderValidator($data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:14'],
            'partner_id' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    protected function createRider(array $data)
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
        ]);
    }

    public function riderPostPhone(Request $request){
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

    public function riderPostVerificationCode(Request $request){
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

    public function riderRegister(Request $request){
        //Validates data
        $validator = $this->riderValidator($request->all());
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }

        $rider = $this->createRider($request->all());

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
        $token = $rider->createToken('turvy')->accessToken;
        return response()->json(['status' => 1, 'message' => 'Login Succeful.', 'user_info' => $rider, 'token' => $token ]);
    }
}
