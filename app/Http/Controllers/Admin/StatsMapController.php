<?php

namespace App\Http\Controllers\Admin;

use App\Driver;
use App\DriverLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
use App\User;
use App\Appointment;

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
        /*$users = Appointment::where('rider_id', '<>', null)->where('status','=',3)->get();
        */
         $Appointment = new Appointment;
         $users =   $Appointment->getCompleteRides();
         
        $page = 'maps';
        $subpage = 'usermap';
        return view('admin.maps.usermap', compact('users', 'page', 'subpage'));
    }
    public function drivermap()
    {
        $drivers = DriverLocation::all();
       	/*print"<pre>";
       	print_r($drivers);
       	exit;
       	*/
        $page = 'maps';
        $subpage = 'drivermap';
        return view('admin.maps.drivermap', compact('drivers', 'page', 'subpage'));
    }
    
    public function drveraval_data()
    {
        $drivers = DriverLocation::all();
        $newdriverData = array();
        $i = 0;
        if(count($drivers) > 0){
        	foreach($drivers as $kk=>$drv){

        		if(isset($drv->driver) && $drv->driver->name != ''){
        			$newdriverData[$i]['driver_id'] = $drv->driverId;
        			$newdriverData[$i]['name'] = $drv->driver->name;
        			$newdriverData[$i]['lat'] = $drv->lat;
	        		$newdriverData[$i]['lng'] = $drv->lng;
	        		$newdriverData[$i]['available'] = 1;
	        		$i++;
        		}else{
        			//$newdriverData[$kk]['name'] = '';
        		}
        		
        		
        	}
        	 return response()->json([ 
        	 	'data' => $newdriverData  
        	 ]);
        }else{
        	  return response()->json([ 
        	 	'data' => null
        	 ]);
        } 
        
       
        echo json_encode($result);
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
