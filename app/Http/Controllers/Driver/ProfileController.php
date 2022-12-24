<?php

namespace App\Http\Controllers\Driver;

use App\City;
use App\Country;
use App\Driver;
use App\Notification;
use App\DriverAddressDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver');
    }
    public function index()
    {
        $driverDetail = DriverAddressDetail::where('driver_id', Auth::guard('driver')->user()->id)->first();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        return view('driver.profile')
            ->withPage('profile')
            ->with('sub_page','')
            ->with('countries', $countries)
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('driverDetail', $driverDetail);
    }
    public function update(Request $request)
    {
        $authenticated_driver = Auth::guard('driver')->user();
        $driver = Driver::find($authenticated_driver->id);

        $is_update = 0;
        if($request->has('first_name'))
        {
            $is_update = 1;
            $driver->first_name = $request->first_name;
        }
        if($request->has('last_name'))
        {
            $is_update = 1;
            $driver->last_name = $request->last_name;
        }
        if($request->hasFile('avatar'))
        {
            $is_update = 1;
            $driver->avatar = upload_file($request->file('avatar'), 'user/driver');
        }
        if($is_update)
            $driver->save();

        $driverDetail = DriverAddressDetail::where('driver_id', $driver->id)->first();
        if($driverDetail)
        {
            if($request->has('address'))
                $driverDetail->address = $request->address;
            if($request->has('postalcode'))
                $driverDetail->postalcode = $request->postalcode;
            if($request->has('home_state'))
                $driverDetail->home_state = $request->home_state;
            if($request->has('home_city'))
                $driverDetail->home_city = $request->home_city;
            $driverDetail->save();    
        }
        else
        {
            $detail = new DriverAddressDetail();
            $detail->driver_id = $driver->id;
            if($request->has('address'))
                $detail->address = $request->address;
            if($request->has('postalcode'))
                $detail->postalcode = $request->postalcode;
            if($request->has('home_state'))
                $detail->home_state = $request->home_state;
            if($request->has('home_city'))
                $detail->home_city = $request->home_city;
            $detail->save();  
        }
        return redirect()->back()->with('message', 'Your profile has been updated Successfully.');
    }

    public function changepassword()
    {
        return view('driver.changepassword');
    }

    public function resetpassword(Request $request){
	    $old = $request->get('old_password');
	    $new = $request->get('new_password');
	    $confirm = $request->get('confirm_password');
	    $driver = Driver::find(Auth::guard('driver')->user()->id);
	    if(Hash::check($old, $driver->password)){
	        if($new == $confirm){
                $driver->password = Hash::make($new);
                $driver->save();
                Auth::guard('driver')->logout();
                return redirect()->route('driver.login');
            }else{
                return redirect()->back()->withInput()->withErrors('Your password and confirmation password do not match.');
            }
        }else{
            return redirect()->back()->withInput()->withErrors('Old password is wrong');
        }
    }

    public function inbox(){
        $notifications = Notification::where('user_type', 2)->get();
        return view('driver.inbox')
            ->with('notifications', $notifications);
    }
}
