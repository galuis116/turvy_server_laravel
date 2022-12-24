<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function showResetForm(Request $request , $token)
    {
    	  $email = base64_decode($token);
    	 // echo $email;
    	  $email = $request->email;
    	  if(isset($request->resetpass) && $request->resetpass != ''){
    	  		 if($request->password != $request->password_confirmation){
    	  		 	return view('auth.passwords.reset')->with('token', $token)->with('email', $email)->with('message', 'Password should not be empty and password and confirm password should match.');
    	  		 }else{
    	  		 	 $admin = User::where('email',$email)
    	  	    		->update(['password' => bcrypt($request->password)]);
    	  	    		
    	  	    	 return redirect('rider/login')->with('message', 'Password reset successful.');
    	  		 }
    	  	   
    	  	    // $admin->password = ;
    	  	    //$admin->save();
    	  	    //return view('auth.passwords.reset-admin')->with('token', $token)->with('email', $email)->with('message', 'Password has been reset.');
    	  }
    	  
        return view('auth.passwords.reset')->with('token', $token)->with('email', $email);
    }
    
}
