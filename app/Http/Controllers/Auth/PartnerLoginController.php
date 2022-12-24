<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PartnerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:partner', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        $countries = Country::all();
        return view('auth.login-partner')
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
        if(Auth::guard('partner')->attempt(['mobile' => $mobile, 'password' => $request->password])){
            return redirect()->intended(route('partner.dashboard'));
        }

        return redirect()->back()->withInput($request->only('mobile'))->withErrors('Your credentials doesn\'t match the existing ones');
    }
    public function logout()
    {
        Auth::guard('partner')->logout();
        return redirect()->route('partner');
    }
}
