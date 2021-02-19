<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PartnerBank;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    public function update(Request $request)
    {
        $partner = Auth::guard('partner')->user();
        $bank = PartnerBank::where('partner_id', $partner->id)->first();
        if(!$bank)
            $bank = new PartnerBank();
        $bank->partner_id = $partner->id;
        if($request->has('account_name')){
            $bank->account_name = $request->account_name;
        }
        if($request->has('bank_name')){
            $bank->bank_name = $request->bank_name;
        }
        if($request->has('bsb')){
            $bank->bsb = $request->bsb;
        }
        if($request->has('account_number')){
            $bank->account_number = $request->account_number;
        }
        $bank->save();
        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
}
