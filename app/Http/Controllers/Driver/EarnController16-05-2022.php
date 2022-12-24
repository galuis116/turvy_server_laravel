<?php

namespace App\Http\Controllers\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentRequest;
use Illuminate\Support\Facades\Auth;

class EarnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver');
    }
    public function index()
    {
        $payments = PaymentRequest::where('driver_id', '<>', null)->where('driver_id', Auth::guard('driver')->user()->id)->get();
        return view('driver.payments')->with('payments', $payments);
    }
}
