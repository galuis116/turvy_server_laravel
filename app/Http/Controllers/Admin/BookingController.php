<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Country;
use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use App\VehicleType;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:booking-list|booking-create', ['only' => ['index']]);
        $this->middleware('permission:booking-create', ['only' => ['store']]);
    }
    public function index()
    {
        $countries = Country::all();
        $vehicles = VehicleType::all();
        $payments = Payment::all();
        return view('admin.booking.index')
            ->with('countries', $countries)
            ->with('vehicles', $vehicles)
            ->with('payments', $payments)
            ->with('page', 'booking');
    }
    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->rider_id = $request->user_id;
        $appointment->rider_country_id = $request->country;
        $appointment->rider_name = $request->username;
        $appointment->rider_email = $request->email;
        $appointment->rider_mobile = $request->phonecode . $request->userphone;
        $appointment->is_current = $request->ride_now;
        if ($request->has('datepicker')) {
            $appointment->booking_date = date('Y-m-d', strtotime($request->datepicker));
        } else {
            $appointment->booking_date = date('Y-m-d');
        }
        if ($request->has('timepicker')) {
            $appointment->booking_time = date('H:i', strtotime($request->timepicker));
        } else {
            $appointment->booking_time = date('H:i');
        }
        $appointment->origin = $request->get('origin-input');
        $appointment->destination = $request->get('destination-input');
        $appointment->servicetype_id = $request->vehicleType;

        if ($request->has('driver')) {
            $appointment->driver_id = $request->driver;
        }

        if ($request->has('coupon') && $request->coupon != "") {
            $coupon = Coupon::where('code', $request->coupon)->first();
            $appointment->coupon_id = $coupon->id;
        }
        $appointment->payment_id = $request->payment_option_id;
        $appointment->is_manual = 1;
        $appointment->status = 0;
        $appointment->save();

        return redirect()->back()->with('message', 'It has been booked successfully.');
    }
}
