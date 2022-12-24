<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class RiderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    public function index()
    {
        $partner = Auth::guard('partner')->user();
        $riders = User::where('partner_id', $partner->id)->get();
        return view('partner.rider')
            ->withPage('rider')
            ->with('riders', $riders);
    }
}
