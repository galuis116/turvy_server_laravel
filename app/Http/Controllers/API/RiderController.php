<?php

namespace App\Http\Controllers\API;

use App\Appointment;
use App\DriverLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RiderLocation;
use App\RiderRating;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;

class RiderController extends Controller
{
    //
    public function getProfileInfo(){
        $rider = Auth::guard('api')->user();
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

    public function putProfileInfo(Request $request) {
        $id = Auth::guard('api')->user()->id;
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
            'message' => 'Rider updated.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $rider
        ]);
    }

    public function onlineRider(Request $request){
        // Get POST data
        $lat = $request->lat;
        $lng = $request->lng;
        $id = Auth::guard('api')->user()->id;

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

    public function offlineRider(){
        $id = Auth::guard('api')->user()->id;
        RiderLocation::where('riderId', $id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'You are released from our obseverablity.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function nearByDrivers(){
        $id = Auth::guard('api')->user()->id;
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
        $rider = User::find(Auth::guard('api')->user()->id);
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

    public function bookRide(Request $request){
        $origin = $request->pickup_address;
        $origin_lat = $request->pickup_lat;
        $origin_lng = $request->pickup_lng;
        $destination = $request->drop_address;
        $destination_lat = $request->drop_lat;
        $destination_lng = $request->drop_lng;
        $servicetype_id = $request->servicetype_id;
        $rider_id = Auth::guard('api')->user()->id;
        $rider_name = Auth::guard('api')->user()->name;
        $rider_mobile = Auth::guard('api')->user()->mobile;
        $rider_email = Auth::guard('api')->user()->email;

        $book = new Appointment();
        $book->rider_id = $rider_id;
        $book->rider_name = $rider_name;
        $book->rider_mobile = $rider_mobile;
        $book->rider_email = $rider_email;
        $book->booking_date = date("Y-m-d");
        $book->booking_time = date("H:i:s");
        $book->origin = $origin;
        $book->origin_lat = $origin_lat;
        $book->origin_lng = $origin_lng;
        $book->destination = $destination;
        $book->destination_lat = $destination_lat;
        $book->destination_lng = $destination_lng;
        $book->servicetype_id = $servicetype_id;
        $book->status = 0;
        $book->save();

        return response()->json([
            'status' => 1,
            'message' => 'Your ride booked.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book
        ]);
    }

    public function cancelRide($book_id){
        /*
        * 0: new ride, 1: progress, 2: complete, 3: cancel
        */
        $book = Appointment::find($book_id);
        $book->status = 3;
        $book->save();

        return response()->json([
            'status' => 1,
            'message' => 'Your ride was cancelled.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book
        ]);
    }

    public function feedbackRide(Request $request, $book_id){
        $book = Appointment::find($book_id);
        $feedback = new RiderRating();
        $feedback->book_id = $book_id;
        $feedback->driver_id = $book->driver_id;
        $feedback->rider_id = $book->rider_id;
        $feedback->rating = $request->rate;
        $feedback->comment = $request->comment;
        $feedback->status = 0;
        $feedback->save();

        return response()->json([
            'status' => 1,
            'message' => 'Your feedback was submitted.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book
        ]);
    }

    public function myrides($type){
        $rider_id = Auth::guard('api')->user()->id;
        $books = Appointment::where('rider_id', $rider_id)->where('status', $type)->get();
        return response()->json([
            'status' => 1,
            'message' => 'Your rides.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $books
        ]);
    }
}
