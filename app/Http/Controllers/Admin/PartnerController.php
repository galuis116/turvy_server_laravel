<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartner;
use App\Partner;
use App\PartnerBank;
use App\PartnerContact;
use App\State;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:partner-list|partner-create|partner-edit|partner-delete', ['only' => ['partnerList', 'showPartner']]);
        $this->middleware('permission:partner-create', ['only' => ['addPartner','storePartner']]);
        $this->middleware('permission:partner-edit', ['only' => ['editPartner','updatePartner', 'approvePartner']]);
        $this->middleware('permission:partner-delete', ['only' => ['deletePartner']]);
        
    }
    public function partnerList()
    {
        $partners = Partner::all();
        return view('admin.partner.index')
            ->with('partners', $partners)
            ->with('page', 'user')
            ->with('subpage', 'partner');
    }
    public function addPartner()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        return view('admin.partner.add')
            ->with('countries', $countries)
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('page', 'user')
            ->with('subpage', 'partner');
    }
    public function storePartner(StorePartner $request)
    {
        $request->validated();
        $partner = new Partner();
        $partner->first_name = $request->first_name;
        $partner->last_name = $request->last_name;
        $partner->email = $request->email;
        $partner->mobile = $request->phonecode.$request->mobile;
        $partner->username = $request->username;
        $partner->gender = $request->gender;
        $partner->password = bcrypt('partner123');
        if($request->has('description'))
            $partner->description = $request->description;
        $partner->organization = $request->organization;
        $partner->url = $request->url;
        $partner->country_id = $request->country_id;
        $partner->state_id = $request->state_id;
        $partner->city_id = $request->city_id;
        if($request->hasFile('avatar'))
            $partner->avatar = upload_file($request->file('avatar'), 'user/partner');
        $partner->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }   
    public function showPartner($id)
    {
        $partner = Partner::find($id);
        $partner_contact = PartnerContact::where('partner_id', $id)->first();
        $partner_bank = PartnerBank::where('partner_id', $id)->first();
        return view('admin.partner.show')
            ->with('partner', $partner)
            ->with('partner_contact', $partner_contact)
            ->with('partner_bank', $partner_bank)
            ->with('page', 'user')
            ->with('subpage', 'partner');
    }
    public function editPartner($id)
    {
        $partner = Partner::find($id);

        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        return view('admin.partner.add')
            ->with('partner', $partner)
            ->with('countries', $countries)
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('page', 'user')
            ->with('subpage', 'partner');
    }
    public function updatePartner(StorePartner $request, $id)
    {
        $request->validated();
        $partner = Partner::find($id);
        $partner->first_name = $request->first_name;
        $partner->last_name = $request->last_name;
        $partner->email = $request->email;
        $partner->mobile = $request->phonecode.$request->mobile;
        $partner->username = $request->username;
        $partner->gender = $request->gender;
        $partner->password = bcrypt('partner123');
        if($request->has('description'))
            $partner->description = $request->description;
        $partner->organization = $request->organization;
        $partner->url = $request->url;
        $partner->country_id = $request->country_id;
        $partner->state_id = $request->state_id;
        $partner->city_id = $request->city_id;
        if($request->hasFile('avatar'))
            $partner->avatar = upload_file($request->file('avatar'), 'user/partner');
        $partner->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function approvePartner($id)
    {
        $partner = Partner::find($id);
        $partner->is_approved = !$partner->is_approved;
        $partner->save();
        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deletePartner($id)
    {
        $partner = Partner::find($id);
        remove_file($partner->avatar);
        $partner->delete();

        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
