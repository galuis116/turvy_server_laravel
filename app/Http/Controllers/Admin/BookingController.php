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
        $rider_id = $request->user_id;
        $rider_country_id = $request->country;
        $rider_name = $request->username;
        $rider_email = $request->email;
        $rider_mobile = $request->phonecode.$request->userphone;
        $is_current = $request->ride_now;
        if($request->has('datepicker'))
        {
            $booking_date = date('Y-m-d', strtotime($request->datepicker));
        }
        else
        {
            $booking_date = date('Y-m-d');
        }
        if($request->has('timepicker'))
        {
            $booking_time = date('H:i',strtotime($request->timepicker));
        }
        else
        {
            $booking_time = date('H:i');
        }
        $origin = $request->get('origin-input');
        $destination = $request->get('destination-input');
        $servicetype_id = $request->vehicleType;
        if($request->has('driver'))
        {
            $driver_id = $request->driver;
        }
        else
        {
            $driver_id = 0;
        }
            
        if($request->has('coupon') && $request->coupon != "")
        {
            $coupon = Coupon::where('code', $request->coupon)->first();
            $coupon_id = $coupon->id;
        }
        else
        {
            $coupon_id = 0;
        }
        $payment_id = $request->payment_option_id;
        $is_manual = 1;
        $status = 0;
        Appointment::create([
            'rider_id' => $rider_id,
            'rider_country_id' => $rider_country_id,
            'rider_name' => $rider_name,
            'rider_email' => $rider_email,
            'rider_mobile' => $rider_mobile,
            'is_current' => $is_current,
            'booking_date' => $booking_date,
            'booking_time' => $booking_time,
            'origin' => $origin,
            'destination' => $destination,
            'servicetype_id' => $servicetype_id,
            'driver_id' => $driver_id,
            'coupon_id' => $coupon_id,
            'payment_id' => $payment_id,
            'is_manual' => $is_manual,
            'status' => $status
        ]);
        return redirect()->back()->with('message', 'It has been booked successfully.');
    }
}
