<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Driver;

class DriverLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:driver', ['except' => ['logout']]);
    }
    public function showLoginForm(Request $request)
    {

        $user_country_iso = getVisIpAddr();

        $user_country = Country::where('iso', $user_country_iso)->first();
        
        $countries = Country::all();
        return view('auth.login-driver')
            ->with('countries', $countries)
            ->with('user_country_iso', $user_country->iso)
            ->with('user_country_phonecode', $user_country->phonecode);
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
            $driver = Auth::guard('driver')->user();

            $driver_db = Driver::find($driver->id);
            // $driver_db->is_online = 1;
            $driver_db->is_login = 1;
            $driver_db->save();
            return redirect()->intended(route('driver.dashboard'));
        }

        return redirect()->back()->withInput($request->only('username'))->withErrors('Your credentials doesn\'t match the existing ones');
    }
    public function logout()
    {
        $driver = Auth::guard('driver')->user();

        $driver_db = Driver::find($driver->id);
        // $driver_db->is_online = 0;
        $driver_db->is_login = 0;
        $driver_db->save();

        Auth::guard('driver')->logout();
        return redirect()->route('driver');
    }
}
