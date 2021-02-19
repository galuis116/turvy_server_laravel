<?php

namespace App\Http\Controllers\Admin;

use App\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
use App\User;

class StatsMapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:usermap', ['only' => ['usermap']]);
        $this->middleware('permission:drivermap', ['only' => ['drivermap']]);
        $this->middleware('permission:driverairport', ['only' => ['driverairport']]);
        $this->middleware('permission:heatmap', ['only' => ['heatmap']]);
    }
    public function usermap()
    {
        $users = Location::where('rider_id', '<>', null)->get();
        $page = 'maps';
        $subpage = 'usermap';
        return view('admin.maps.usermap', compact('users', 'page', 'subpage'));
    }
    public function drivermap()
    {
        $drivers = Location::where('driver_id', '<>', null)->get();
        $page = 'maps';
        $subpage = 'drivermap';
        return view('admin.maps.drivermap', compact('drivers', 'page', 'subpage'));
    }

    public function driverairport()
    {
        $airports = [];
        $drivers = Location::where('driver_id', '<>', null)->get();
        $page = 'maps';
        $subpage = 'driverairportmap';
        return view('admin.maps.driverairportmap', compact('drivers', 'airports', 'page', 'subpage'));
    }

    public function heatmap()
    {
        $points = array();
        return view('admin.maps.heatmap')->withPage('heatmap')->with('points', $points);
    }
}
