<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DriverLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:driver', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        $countries = Country::all();
        return view('auth.login-driver')
            ->with('countries', $countries);
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required',
            'phonecode' => 'required',
            'password' => 'required|min:6'
        ]);
        $mobile = $request->phonecode.$request->mobile;
        if(Auth::guard('driver')->attempt(['mobile' => $mobile, 'password' => $request->password])){
            return redirect()->intended(route('driver.dashboard'));
        }

        return redirect()->back()->withInput($request->only('username'))->withErrors('Your credentials doesn\'t match the existing ones');
    }
    public function logout()
    {
        Auth::guard('driver')->logout();
        return redirect()->route('driver');
    }
}
