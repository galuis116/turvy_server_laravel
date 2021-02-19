<?php

namespace App\Http\Controllers\Driver;

use App\DriverBank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver');
    }
    public function index()
    {
        $bank = DriverBank::where('driver_id', Auth::guard('driver')->user()->id)->first();
		return view('driver.bank')->with('driver_bank_detail', $bank);
    }
    public function update(Request $request)
    {
        $authenticated_driver = Auth::guard('driver')->user();
        if (!DriverBank::where('driver_id', $authenticated_driver->id)->count() > 0) {
			$bank = new DriverBank();
			$bank->driver_id = $authenticated_driver->id;
		} else {
			$bank = DriverBank::where('driver_id', $authenticated_driver->id)->first();
		}
		$bank->bsb_number = $request->bsb_number;
		$bank->bank_name = $request->bank_name;
		$bank->bank_account_number = $request->bank_account_number;
		$bank->bank_account_title = $request->account_name;
		$bank->bank_address = $request->address;
		$bank->bank_city = $request->city;
		$bank->bank_postal_code = $request->post_code;
		$bank->dob = $request->dob;
        $bank->save();
        
        return redirect()->back()->with('message', 'It has been updated Successfully.');
    }
}
