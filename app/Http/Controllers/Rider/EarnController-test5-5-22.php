<?php

namespace App\Http\Controllers\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentRequest;
use Illuminate\Support\Facades\Auth;

class EarnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {
        $payments = PaymentRequest::where('rider_id', Auth::guard('rider')->user()->id)->get();
        return view('rider.payments')->with('payments', $payments);
    }
}
