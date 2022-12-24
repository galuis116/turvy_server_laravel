<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Driver;

class LoginController extends Controller
{
   /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   use AuthenticatesUsers;

   /**
    * Where to redirect users after login.
    *
    * @var string
    */
   protected $redirectTo = '/rider/dashboard';

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('guest')->except('logout');
   }
   public function showLoginForm()
   {
      $countries = Country::all();
      return view('auth.login-rider')
         ->with('countries', $countries);
   }
   public function login(Request $request)
   {
      $this->validate($request, [
         'phonecode' => 'required',
         'mobile' => 'required',
         'password' => 'required|min:6'
      ]);
      $mobile_number = $request->phonecode . $request->mobile;
      if (Auth::guard('rider')->attempt(['mobile' => $mobile_number, 'password' => $request->password])) {
         return response()->json(['status' => 1, 'redirect_link' => route('rider.dashboard')]);
      }
      return response()->json(['status' => 0, 'message' => 'Password is incorrect.']);
   }

   public function verifyMail($id, $type)
   {
      $user_id=decrypt($id);
     

      if($type == 'driver'){
      	$driver = Driver::find($user_id);
      	if($driver){
	        	$driver->update([
	            'email_verified_at'=>date('Y-m-d h:i:s')
	         ]);
	      }
         return redirect()->route('driver.login');
      }else{
      	$user = User::find($user_id);
      	if($user){
	         $user->update([
	            'email_verified_at'=>date('Y-m-d h:i:s')
	         ]);
	      }
         return redirect()->route('rider.login');
      };
   }
}
