<?php

namespace App\Http\Controllers\API;

use App\DriverLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RiderLocation;
use App\User;
use Illuminate\Support\Facades\Validator;

class RiderController extends Controller
{
    //
    public function getProfileInfo($id){
        $rider = User::find($id);
        if(!$rider)
            return response()->json([
                'status' => 0,
                'message' => 'Failed! No such rider in our system.',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        return response()->json([
            'status' => 1,
            'message' => 'Success.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $rider
        ]);
    }

    public function putProfileInfo(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:14',
            'partner_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors(),
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        $rider = User::find($id);
        $rider->update($request->all());

        return response()->json([
            'status' => 1,
            'message' => 'Rider created.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $rider
        ]);
    }

    public function onlineRider(Request $request, $id){
        // Get POST data
        $lat = $request->lat;
        $lng = $request->lng;

        $rl = RiderLocation::where('riderId', $id)->first();
        if($rl)
        {
            $rl->lat = $lat;
            $rl->lng = $lng;
            $rl->save();
        }
        else
        {
            RiderLocation::create([
                'riderId' => $id,
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

    public function offlineRider($id){
        RiderLocation::where('riderId', $id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'You are released from our obseverablity.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function nearByDrivers($id){
        // Get rider's location
        $rl = RiderLocation::where('riderId', $id)->first();
        if(!$rl){
            return response()->json([
                'status' => 1,
                'message' => 'Not found your location data.',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        // Base paramaters
        $distance = 2; // Get from settings
        $R = 6371;
        $lat = $rl->lat;
        $lng = $rl->lng;

        $maxLat = $lat + rad2deg($distance/$R);
        $minLat = $lat - rad2deg($distance/$R);
        $maxLng = $lng + rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
        $minLng = $lng - rad2deg(asin($distance/$R) / cos(deg2rad($lat)));

        $driverLocations = DriverLocation::where(function($q) use ($minLat, $maxLat, $minLng, $maxLng){
            $q->whereBetween('lat', array($minLat, $maxLat))
                ->whereBetween('lng', array($minLng, $maxLng));
        })->get();

        return response()->json([
            'status' => 1,
            'message' => 'return Drivers nearby your current locations.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driverLocations
        ]);
    }

    public function updateDevice(Request $request){
        $rider = User::find($request->rider_id);
        $rider->device_type = $request->device_type;
        $rider->device_token = $request->device_token;
        $rider->update();

        return response()->json([
            'status' => 1,
            'message' => 'Device information has been updated.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }
}
