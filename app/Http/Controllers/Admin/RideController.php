<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Cancelreason;
use App\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VehicleType;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:activeride-list|activeride-edit', ['only' => ['activeRides', 'trackRide']]);
        $this->middleware('permission:activeride-edit', ['only' => ['cancel', 'assignDriver']]);

        $this->middleware('permission:completedride-list', ['only' => ['completedRides']]);
    }

    public function activeRides($flag)
    {
        if($flag == 'total'){
            $ride_now = Appointment::where('is_current', 1)->whereNotIn('status', [1,3,9])->get();
            $ride_later = Appointment::where('is_current', 0)->whereNotIn('status', [1,3,9])->get();
        }
        if($flag == 'new'){
            $ride_now = Appointment::where('is_current', 1)->where('status', 0)->get();
            $ride_later = Appointment::where('is_current', 0)->where('status', 0)->get();
        }
        if($flag == 'active'){
            $ride_now = Appointment::where('is_current', 1)->whereIn('status', [2,4,5,6,7])->get();
            $ride_later = Appointment::where('is_current', 0)->whereIn('status', [2,4,5,6,7])->get();
        }
        if($flag == 'manual-active'){
            $ride_now = Appointment::where('is_current', 1)->where('is_manual', 1)->whereIn('status', [1,3])->get();
            $ride_later = Appointment::where('is_current', 0)->where('is_manual', 1)->whereIn('status', [1,3])->get();
        }

        if($flag == 'manual-total'){
            $ride_now = Appointment::where('is_current', 1)->where('is_manual', 1)->whereNotIn('status', [1,3,9])->get();
            $ride_later = Appointment::where('is_current', 0)->where('is_manual', 1)->whereNotIn('status', [1,3,9])->get();
        }

        $drivers = Driver::where('is_approved', 1)->where('is_online', 1)->where('is_busy', 0)->where('is_login', 1)->get();

        $cancels = Cancelreason::all();

        $vehicleTypes = VehicleType::where('status', 1)->get();

        $tab = 'ride_now';

        return view('admin.activeRide.index')
            ->with('page', 'ride')->with('subpage','active')->with('vehicleTypes', $vehicleTypes)
            ->with('ride_later', $ride_later)
            ->with('ride_now', $ride_now)
            ->with('drivers', $drivers)
            ->with('cancels', $cancels)
            ->with('tab', $tab);
    }
    public function cancel(Request $request)
    {
        $booking_id = $request->get('rideID');
        if($request->has('cancel_reason_id')){
            $booking = Appointment::find($booking_id);
            if($booking->rider_id == Auth::guard('admin')->user()->id){
                $booking->status = 3;
            }else{
                $booking->status = 1;
            }
            $booking->save();
            return back()->with('message', 'It has been cancelled.');
        }

        return back();
    }
    public function assignDriver(Request $request)
    {
        $ride = Appointment::find($request->get('rideId'));

        $ride->driver_id = $request->get('driverId');
        $ride->status = 7;
        $ride->save();

        return back()->with('message', 'It has been assigned');
    }
    public function trackRide($id)
    {
        $ride = Appointment::find($id);
        return view('admin.activeRide.track')->with('page', 'ride')->with('subpage', 'active')->with('ride', $ride);
    }
    public function completedRides($flag){
        $tab = 'ride_now';
        if($flag == 'total'){
            $ride_now = Appointment::where('is_current', 1)->whereIn('status', [1,3,9])->get();
            $ride_later = Appointment::where('is_current', 0)->whereIn('status', [1,3,9])->get();
            $ride_cancel = Appointment::whereIn('status', [1,3])->get();
        }
        if($flag == 'cancel'){
            $ride_now = Appointment::where('is_current', 1)->whereIn('status', [1,3])->get();
            $ride_later = Appointment::where('is_current', 0)->whereIn('status', [1,3])->get();
            $ride_cancel = Appointment::whereIn('status', [1,3])->get();
            $tab = 'ride_cancel';
        }
        if($flag == 'done'){
            $ride_now = Appointment::where('is_current', 1)->where('status', 9)->get();
            $ride_later = Appointment::where('is_current', 0)->where('status', 9)->get();
            $ride_cancel = Appointment::whereIn('status', [1,3])->get();
        }
        if($flag == 'manual-done'){
            $ride_now = Appointment::where('is_current', 1)->where('is_manual', 1)->where('status', 9)->get();
            $ride_later = Appointment::where('is_current', 0)->where('is_manual', 1)->where('status', 9)->get();
            $ride_cancel = Appointment::whereIn('status', [1,3])->get();
        }

        
        return view('admin.completedRide.index')->with('page', 'ride')->with('subpage','completed')
            ->with('ride_later', $ride_later)
            ->with('ride_now', $ride_now)
            ->with('ride_cancel', $ride_cancel)
            ->with('tab', $tab);
    }

    public function request()
    {
        $requests = [];
        return view('admin.riderequest.index')
            ->with('page', 'riderequest')
            ->with('requests', $requests);
    }
}
