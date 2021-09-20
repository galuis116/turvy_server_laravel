<?php

namespace App\Http\Controllers\Rider;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:rider']);
    }
    public function index(){
        $rides = Appointment::where('rider_id', Auth::guard('rider')->user()->id)->orderBy('id', 'desc')->limit(1)->get();
        return view('rider.dashboard')->with('rides', $rides);
    }
}
