<?php

namespace App\Http\Controllers\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentRequest;
use App\RiderTransaction;
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
        $transactions = RiderTransaction::where('rider_id', $rider_id)->orderBy('updated_at', 'DESC')->get();

        return view('rider.payments')->with('payments', $transactions)
                                     ->with('page_search', $page_search);

    }
}
