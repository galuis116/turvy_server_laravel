<?php

namespace App\Http\Controllers\Rider;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {
        $rides = Appointment::where('rider_id', Auth::guard('rider')->user()->id)->get();
        return view('rider.trips')->with('rides', $rides);
    }
    
    
     public function myrecepits($page_id) {
    	 $rider_id = Auth::guard('rider')->user()->id;
    	 $Appointment = new Appointment;
       $ridesFormat =   $Appointment->getRides(3, $rider_id,$page_id);
        /* print"<pre>";
        print_r($ridesFormat);
        */
       return view('rider.myrecepits')->with('rides', $ridesFormat);
    }
    
     public function receipt($book_id) {
    	 $rider_id = Auth::guard('rider')->user()->id;
    	 $Appointment = new Appointment;
 
       $ridesFormat =   $Appointment->getRidesRecepit($rider_id,$book_id);
       $item = $ridesFormat[0];
       $surchagreinfo = $ridesFormat[0]['surgeinfo'];
       $surchagrearr = array();
      if($surchagreinfo != ''){
      	$surchagrearr = json_decode(stripslashes($surchagreinfo));
      }
        /* print"<pre>";
        print_r($ridesFormat);
        */
       return view('rider.receipt')->with([ 'recepit_data' => $item,
                'surchagrearr' => $surchagrearr, ]);
    }
}
