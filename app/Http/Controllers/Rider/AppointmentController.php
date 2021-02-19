<?php

namespace App\Http\Controllers\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use App\VehicleType;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {
        $servicetypes = VehicleType::where('status', 1)->get();
        $payments = Payment::where('status', 1)->get();
        return view('rider.booking')->with('servicetypes', $servicetypes)->with('payments', $payments);
    }
}
