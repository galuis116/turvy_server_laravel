<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PartnerContact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    public function update(Request $request)
    {
        $partner = Auth::guard('partner')->user();
        $contact = PartnerContact::where('partner_id', $partner->id)->first();
        if(!$contact)
            $contact = new PartnerContact();
        $contact->partner_id = $partner->id;
        if($request->has('facebook')){
            $contact->facebook = $request->facebook;
        }
        if($request->has('twitter')){  
            $contact->twitter = $request->twitter;
        }       
        if($request->has('google')){    
            $contact->google = $request->google;    
        }    
        if($request->has('skype')){
            $contact->skype = $request->skype;
        }    
        if($request->has('instagram')){
            $contact->instagram = $request->instagram;
        }
        if($request->has('dribble')){
            $contact->dribble = $request->dribble;
        }
        $contact->save();
        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
}
