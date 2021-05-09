<?php

namespace App\Http\Controllers\API;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Coupon;
use App\Homepage;
use App\Partner;
use App\Setting;
use App\State;
use App\User;
use App\VehicleMake;
use App\VehicleModel;
use App\VehicleType;

class CommonController extends Controller
{
    public function countries(){
        $countries = Country::select('id', 'name', 'nicename', 'phonecode')->get();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $countries
        ]);
    }

    public function states($country_id){
        $states = State::where('country_id', $country_id)->get();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $states
        ]);
    }

    public function cities($state_id){
        $cities = City::where('state_id', $state_id)->get();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $cities
        ]);
    }

    public function terms(){
        $content = Homepage::first();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $content->terms
        ]);
    }

    public function policy(){
        $content = Homepage::first();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $content->policy
        ]);
    }

    public function partners(){
        $partners = Partner::select('id', 'first_name', 'last_name', 'organization')->get();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $partners
        ]);
    }

    public function makes(){
        $makes = VehicleMake::where('status', 1)->get();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $makes
        ]);
    }

    public function models($make_id){
        $models = VehicleModel::where('make_id', $make_id)->where('status', 1)->get();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $models
        ]);
    }

    public function settings(){
        $info = Setting::all();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $info
        ]);
    }

    public function promocodes(){
        $coupons = Coupon::whereRaw('usetotal > usecustomer')->whereDate('expired_at', '>', date("Y-m-d"))->get();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $coupons
        ]);
    }

    public function servicetypes(){
        $servicetypes = VehicleType::where('status', 1)->get();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $servicetypes
        ]);
    }
}
