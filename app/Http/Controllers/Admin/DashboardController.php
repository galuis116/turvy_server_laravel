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

        $drivers = Driver::all();
        $total_drivers_earnings = 0;
        foreach($drivers as $k => $item){
            $transactions = DriverTransactions::where('driver_id',$item['id'])->where('pay_type', '<>', 'withdraw')->get();
            foreach($transactions as $transaction) {
                $total_drivers_earnings += $transaction->amount;
                if($transaction->tip_amount)
                    $total_drivers_earnings += $transaction->tip_amount;
            }
        }
        $total_gst = $total_drivers_earnings * 0.1;
        $total_charity_earnings = DriverTransactions::where('status', 'active')->sum("charity_amount");
        $total_turvy_earnings = DriverTransactions::where('status', 'active')->sum("company_amount");

        $earnings = json_decode(json_encode(array(
            'rider_reward_points' => Rewards::sum("point"),
            'drivers' => number_format($total_drivers_earnings,2),
            'gst' => number_format($total_gst,2),
            'turvy' => number_format($total_turvy_earnings,2),
            'charity' => number_format($total_charity_earnings,2)
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
