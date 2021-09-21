<?php

namespace App\Http\Controllers\Rider;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {
        $rides = Appointment::where('rider_id', Auth::guard('rider')->user()->id)->get();
        return view('rider.trips')->with('rides', $rides);
    }
}
