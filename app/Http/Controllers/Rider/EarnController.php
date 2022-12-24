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

    public function index($page_search)
    {


        $rider_id = Auth::guard('rider')->user()->id;
        $rider_id = Auth::guard('rider')->user()->id;

        $PaymentRequest = new PaymentRequest;
        $riderPaymentHistory =   $PaymentRequest->getRiderPaymentHistory($rider_id, $page_search);


        return view('rider.payments')->with('payments', $riderPaymentHistory)
                                     ->with('page_search', $page_search);

    }
}
