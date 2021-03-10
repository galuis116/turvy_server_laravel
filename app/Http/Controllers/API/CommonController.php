<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Homepage;
use App\Partner;
use App\User;

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
}
