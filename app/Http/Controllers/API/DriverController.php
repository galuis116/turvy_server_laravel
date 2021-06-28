<?php

namespace App\Http\Controllers\API;

use App\Appointment;
use App\Driver;
use App\DriverLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DriverController extends Controller
{
    public function onlineDriver(Request $request){
        $id = Auth::guard('apidriver')->user()->id;
        // Get POST data
        $lat = $request->lat;
        $lng = $request->lng;

        $rl = DriverLocation::where('driverId', $id)->first();
        if($rl)
        {
            $rl->lat = $lat;
            $rl->lng = $lng;
            $rl->save();
        }
        else
        {
            DriverLocation::create([
                'driverId' => $id,
                'lat' => $lat,
                'lng' => $lng,
            ]);
        }
        return response()->json([
            'status' => 1,
            'message' => 'Store your location into our system.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function offlineDriver(){
        $id = Auth::guard('apidriver')->user()->id;
        DriverLocation::where('driverId', $id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'You are released from our obseverablity.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function getDriverInfo(){
        $driver = Auth::guard('apidriver')->user();
        return response()->json([
            'status' => 1,
            'message' => 'Driver personal info.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driver
        ]);
    }

    public function updateDevice(Request $request){
        $driver = Driver::find(Auth::guard('apidriver')->user()->id);
        $driver->device_type = $request->device_type;
        $driver->device_token = $request->device_token;
        $driver->update();

        return response()->json([
            'status' => 1,
            'message' => 'Device information has been updated.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function acceptBook($book_id)
    {
        $ride = Appointment::find($book_id);
        $ride->driver_id = Auth::guard('apidriver')->user()->id;
        $ride->status = 1;
        $ride->start_time = date('Y-m-d H:m:s');
        $ride->save();
        return response()->json([
            'status' => 1,
            'message' => 'Accepted',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function declineBook($book_id)
    {
        // remove this deriver from queue of this ride
        return response()->json([
            'status' => 1,
            'message' => 'Declined',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function cancelBook(Request $request, $book_id)
    {
        $reason = $request->reason;
        $ride = Appointment::find($book_id);
        $ride->status = 2;
        $ride->cancel_reason = $reason;
        $ride->save();
        return response()->json([
            'status' => 1,
            'message' => 'Cancelled.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function endBook(Request $request, $book_id)
    {
        $path = $request->travel_path;
        $ride = Appointment::find($book_id);
        $ride->status = 3;
        $ride->travel_path = $path;
        $ride->end_time = date('Y-m-d H:m:s');
        $ride->save();
        return response()->json([
            'status' => 1,
            'message' => 'Success.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }
}
