<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Driver;
use App\DriverTransactions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;
use App\PaymentRequest;
use App\Rewards;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $driver_total = Driver::count();
        $rider_total = User::count();
        $companies = Partner::count();
        $ride_total = Appointment::count();

        $completed = Appointment::where('status',9)->count();
        $ongoing = Appointment::whereIn('status',[2,4,5,6,7,8])->count();
        $cancelled = Appointment::whereIn('status',[1,3])->count();
        $newRides = Appointment::where('status', 0)->count();

        $total = PaymentRequest::sum('total');

        $manual_ride_total = Appointment::where('is_manual', 1)->count();
        $manual_active_ride = Appointment::where('is_manual', 1)->whereIn('status', [1,3])->count();
        $manual_completed_ride = Appointment::where('is_manual', 1)->where('status', 9)->count();

        $earnings = json_decode(json_encode(array(
            'rider_reward_points' => Rewards::sum("point"),
            'drivers' => DriverTransactions::where('status', 'active')->sum("total_amount"),
            'gst' => 0,
            'turvy' => 0,
            'charity' => 0
        )));

        return view('admin.dashboard')
            ->with('driver_total', $driver_total)
            ->with('rider_total', $rider_total)
            ->with('company_total', $companies)
            ->with('total', $total)
            ->with('ride_total', $ride_total)
            ->with('completed' , $completed)
            ->with('cancelled' , $cancelled)
            ->with('ongoing' , $ongoing)
            ->with('newRides', $newRides)
            ->with('manual_ride_total', $manual_ride_total)
            ->with('manual_active_ride', $manual_active_ride)
            ->with('manual_completed_ride', $manual_completed_ride)
            ->with('earnings', $earnings)
            ->with('page', 'dashboard');
    }
}
