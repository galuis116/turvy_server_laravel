<?php

namespace App\Http\Controllers\Driver;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver');
    }
    public function index()
    {
        $rides = Appointment::where('driver_id', Auth::guard('driver')->user()->id)->get();
        return view('driver.trips')->with('rides', $rides);
    }
}
