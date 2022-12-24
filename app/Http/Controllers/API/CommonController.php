<?php

namespace App\Http\Controllers\API;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Coupon;
use App\Fare;
use App\Homepage;
use App\Partner;
use App\Setting;
use App\State;
use App\User;
use App\VehicleMake;
use App\VehicleModel;
use App\VehicleType;
use App\Airport;
use Twilio\Rest\Client;
use Twilio\TwiML\VoiceResponse;

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

    public function farecard($state_id, $vehicletype_id){
        $farecard = Fare::where('state_id', $state_id)->where('servicetype_id', $vehicletype_id)->first();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $farecard
        ]);
    }

     public function farecardall($state_id){
        $farecards = Fare::where('state_id', $state_id)->get();
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $farecards
        ]);
    }
  
    public function tips(){
        $is_tips = Setting::where('key', 'is_tips')->first();
        $amount = Setting::where('key', 'tip_amount')->first();
        if ($is_tips && $amount) {
            if ($is_tips->value == 1 && !is_null($amount->value)) {
                return response()->json([
                    'status' => 1,
                    'datetime' => date('Y-m-d H:i'),
                    'data' => explode(",", $amount->value)
                ]);
            }
        }
        return response()->json([
            'status' => 0,
            'datetime' => date('Y-m-d H:i'),
            'message' => "The tips feature was disabled."
        ]);
    }
    
    
    public function airport_polygon(){
        //$Airports = Airport::first();
        //$Airports = Airport::where('id', 6)->first();
        $Airports = Airport::get();
        //$amount = Setting::where('key', 'tip_amount')->first();
       
        $polygon_CoordArr =  array();
        $polyArr = array();
        if ($Airports) {
            foreach($Airports as $index => $item){
                if ($item->coordinates != '') {
                    $coordinates_div = explode("|",$item->coordinates);
                    if(count($coordinates_div) > 0){
                        $polygon_Coord =  array();
                        foreach($coordinates_div as $key=>$loc){
                            if($loc != ''){
                                $loc_div = explode(",",$loc);
                                $polygon_Coord[$key]['latitude'] = $loc_div[0];
                                $polygon_Coord[$key]['longitude'] = $loc_div[1];
                                
                            }
                        }
                        $polygon_CoordArr[$index]['coords'] = $polygon_Coord;
                        $polygon_CoordArr[$index]['airport_name'] = $item->name;
                        $polygon_CoordArr[$index]['airport_id'] = $item->id;
                    }
                 
               }
               
            }
            return response()->json([
                'status' => 1,
                'datetime' => date('Y-m-d H:i'),
                'message' => 'Airports Data',
                'data' => $polygon_CoordArr,
                'Airports' => $Airports,
            ]);
            /* if ($Airports->coordinates != '') {
                 $coordinates_div = explode("|",$Airports->coordinates);
                 if(count($coordinates_div) > 0){
						foreach($coordinates_div as $key=>$loc){
							if($loc != ''){
								$loc_div = explode(",",$loc);
								$polygon_Coord[$key]['latitude'] = $loc_div[0];
								$polygon_Coord[$key]['longitude'] = $loc_div[1];
								//print"<pre>";
			              // print_r($loc_div);
			               //exit;	
							}
						}
						
						 return response()->json([
			            'status' => 1,
			            'datetime' => date('Y-m-d H:i'),
			            'message' => $Airports->name,
			             'data' => $polygon_Coord,
                         'Airports' => $Airports,
			        ]);
        
						                 
                 }
              
            } */
        }
        return response()->json([
            'status' => 0,
            'datetime' => date('Y-m-d H:i'),
            'message' => "Airport data not found."
        ]);
    }

    public function twilioMakeCall(){

        $token = config("services.twilio.authtoken");
        $twilio_sid = config("services.twilio.sid");
        

        try {
            $twilio = new Client($twilio_sid, $token);
            $call = $twilio->calls
               ->create("+919588421767", // to
                        "+61253008384", // from                        
                        [
                            "twiml" => "<Response><Dial>+919766901626</Dial></Response>"
                        ]
                );
               
            return response()->json(['status' => 1, 'message' => 'SMS has be sent to your phone number.']);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }

    }//end of fun

    public function twilioResponseCall(){
        $response = new VoiceResponse();
        $response->dial('+919588421767');
        //$response->say('Goodbye');
        echo $response;
    }

    public function pusherinfo(){
        $apikey['APP_KEY'] = '389d667a3d4a50dc91a6';
        $apikey['APP_CLUSTER'] = 'ap2';
        return response()->json([
            'status' => 1,
            'datetime' => date('Y-m-d H:i'),
            'data' => $apikey
        ]);
    }
  
    
}
