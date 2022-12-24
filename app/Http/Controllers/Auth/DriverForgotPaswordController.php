<?php

namespace App\Http\Controllers\Auth;
use Session;
use App\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class DriverForgotPaswordController extends Controller
{
    //
   

     /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email-driver');
    }
    
    
    public function sendresetEmail(Request $request){
    	$to = $request->email;
    	$token = base64_encode($request->email);
    	$mailSub = "Reset Password Notification";
    	$bcc = array();
    	$url  = url('/driver/password/reset/'.$token);
    	$mailBody ='<p>Hello!</p>
                  <p>You are receiving this email because we received a password reset request for your account.</p>
                  <p></p>
                  <p><a href="'.$url.'" target="_blank">Click here to reset password<a/></p>';
    	 Mail::send('emails.template', ['mailBody' => $mailBody], function ($m) use ($to, $mailSub, $bcc)  {
			if (!empty($bcc)) {
				$m->bcc($bcc);
			}
			$m->to($to)->subject($mailSub);
        });
        Session::flash('status', 'Mail send to your email');
        return view('auth.passwords.email-driver');
    }
    
      public function showResetForm(Request $request , $token)
    {
    	  $email = base64_decode($token);
    	  if(isset($request->resetpass) && $request->resetpass != ''){
    	  		 if($request->password != $request->password_confirmation){
    	  		 	return view('auth.passwords.reset-driver')->with('token', $token)->with('email', $email)->with('message', 'Password should not be empty and password and confirm password should match.');
    	  		 }else{
    	  		 	 $admin = Driver::where('email',$email)
    	  	    		->update(['password' => bcrypt($request->password)]);
    	  	    	 return redirect('driver/login')->with('message', 'Password reset successfully.');
    	  		 }
    	  	   
    	  	    // $admin->password = ;
    	  	    //$admin->save();
    	  	    //return view('auth.passwords.reset-admin')->with('token', $token)->with('email', $email)->with('message', 'Password has been reset.');
    	  }
    	  
        return view('auth.passwords.reset-driver')->with('token', $token)->with('email', $email);
    }
    
    
}
