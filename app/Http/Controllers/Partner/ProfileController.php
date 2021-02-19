<?php

namespace App\Http\Controllers\Partner;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PartnerBank;
use App\PartnerContact;
use App\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    public function index()
    {
        $partner = Auth::guard('partner')->user();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $contact = PartnerContact::where('partner_id', $partner->id)->first();
        $bank = PartnerBank::where('partner_id', $partner->id)->first();
        return view('partner.home')
            ->with('countries', $countries)
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('contact', $contact)
            ->with('bank', $bank)
            ->withPage('profile');
    }
    public function update(Request $request)
    {
        $partner = Auth::guard('partner')->user();
        if($request->has('first_name')){
            $partner->first_name = $request->first_name;
        }
        if($request->has('last_name')){
            $partner->last_name = $request->last_name;
        }
        if($request->has('mobile')){
            $partner->mobile = $request->mobile;
        }
        if($request->has('email')){
            $partner->email = $request->email;
        }
        if($request->has('description')){
            $partner->description = $request->description;
        }
        if($request->has('address')){
            $partner->address = $request->address;
        }
        if($request->has('country_id')){
            $partner->country_id = $request->country_id;
        }
        if($request->has('state_id')){
            $partner->state_id = $request->state_id;
        }
        if($request->has('city_id')){
            $partner->city_id = $request->city_id;
        }
        if($request->has('zipcode')){
            $partner->zipcode = $request->zipcode;
        }
        $partner->save();
        return redirect()->back()->with('message', 'It has been updated successfully.');
    }

    public function changePassword(Request $request)
    {
        $old_password = $request->get('old_password');
        $new_password = $request->get('new_password');
        $confirm_password = $request->get('confirm_password');

        if($new_password != $confirm_password){
            return redirect()->back()->withErrors('It does not match between new password and confirm password.');
        }

        $partner = Auth::guard('partner')->user();

        if(Hash::check($old_password, $partner->password)){
            return redirect()->back()->withErrors('The old password is wrong.');
        }

        $partner->password = Hash::make($new_password);
        $partner->save();

        Auth::guard('partner')->logout();
        return redirect()->route('partner.login');
    }
}
