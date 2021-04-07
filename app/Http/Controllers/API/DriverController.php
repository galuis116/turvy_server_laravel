<?php

namespace App\Http\Controllers\API;

use App\Driver;
use App\DriverLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function onlineDriver(Request $request, $id){
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

    public function offlineDriver($id){
        DriverLocation::where('driverId', $id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'You are released from our obseverablity.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function getDriverInfo($id){
        $driver = Driver::find($id);
        return response()->json([
            'status' => 1,
            'message' => 'Driver personal info.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driver
        ]);
    }

    public function updateDevice(Request $request){
        $driver = Driver::find($request->driver_id);
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
}
