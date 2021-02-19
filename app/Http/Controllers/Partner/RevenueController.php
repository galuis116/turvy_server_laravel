<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    public function index()
    {
        $partner = Auth::guard('partner')->user();
        $riderIds = User::where('partner_id', $partner->id)->select('id')->get();

        $payments = PaymentRequest::where('rider_id', '<>', null)->whereIn('user_id', $riderIds)->get();

        return view('partner.revenue')
            ->withpage('revenue')
            ->with('payments', $payments);
    }
}
