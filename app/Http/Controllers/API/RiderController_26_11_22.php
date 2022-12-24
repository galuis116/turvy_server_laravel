<?php

namespace App\Http\Controllers\API;

use App\Appointment;
use App\Driver;
use App\Comment;
use App\DriverLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentRequest;
use App\RiderLocation;
use App\RiderRating;
use App\BookDecline;
use App\DriverTransactions;
use App\RiderTransaction;
use App\RiderCancelreason;
use App\User;
use App\Rewards;
use App\Feedback;
use App\RiderReward;
use App\Partner;
use App\MultiDestination;
use App\PaymentTokens;
use App\Transaction;
use App\VehicleType;
use App\Notification;
use App\RiderAddresses;
use App\Fare;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;
use Twilio\TwiML\VoiceResponse;
use App\Mail\RiderEmailRecepit;
use App\Mail\RiderPDFRecepit;
use Illuminate\Support\Facades\Mail;
//use App\spipu\Html2Pdf\Html2Pdf;



class RiderController extends Controller
{
    //
    public function getProfileInfo()
    {
        $rider = Auth::guard('api')->user();
        if (!$rider)
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
    
    public function testwebhook(){
    		//@mail("ashwini.sisnolabs@gmail.com","webhook response "," RESPONSE ");
    		echo "IN TEST HOOK";
    		$book = Appointment::find(1542);
    		  $Email_data = new RiderEmailRecepit($book);
    		  $html = $Email_data->render();
    		 // print"<pre>";
    		 // print_r($Email_data->getProperty('html'));
    		    $from = "admin@turvy.net";
			    $to = "ashwini.sisnolabs@gmail.com";
			    $subject = "PHP Mail Test script";
			    $message = $html;
			    $headers = "From:" . $from."\r\n";
			    $headers .= "Reply-To: " . strip_tags($to) . "\r\n";
			    $headers .= "MIME-Version: 1.0\r\n";
				 $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			    mail($to,$subject,$message, $headers);
    		   /*try {
	           Mail::to("ashwini.sisnolabs@gmail.com")->send(new RiderEmailRecepit($book));
	        } catch (Exception $e) {
	            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
	        }
	        */
    		$token = config("services.twilio.authtoken");
       
        $twilio_sid = config("services.twilio.sid");
    	   $twilio = new Client($twilio_sid, $token);
    		//KCf34f062d1b7e45c1c7d5f60d47d07c0e
    		/*$twilio->proxy->v1->services("KS7fe7732b63ffb0b6b329f57bc0ef519f")
                  ->sessions("KCf34f062d1b7e45c1c7d5f60d47d07c0e")
                  ->delete();
                  */
    }
    public function twiliowebhook(Request $request){
    	//Request $request
    	$input = $request->all();
    	$token = config("services.twilio.authtoken");
       
        $twilio_sid = config("services.twilio.sid");
    	$twilio = new Client($twilio_sid, $token);
    	@mail("testdevaa@gmail.com","webhook response "," RESPONSE ".json_encode($input));
    	/*$twilio->proxy->v1->services("KS7fe7732b63ffb0b6b329f57bc0ef519f")
                  ->sessions("KC93cd65f77d14f479722cb37bd50a9237")
                  ->delete();
                  */
    }
    public function twilioMakeCallRider(Request $request){

        $token = config("services.twilio.authtoken");
       
        $twilio_sid = config("services.twilio.sid");
       
        $name = $request->first_name." ".$request->last_name;
        $mobile = $request->mobile;
        $rider_name = $request->rider_name;
        $rider_phone = $request->rider_phone;
        $rider_id = $request->rider_id;
        $booking_id = $request->booking_id;
        $driver_id = $request->driver_id;
        $session_uname = $booking_id."_".$rider_id."_".$driver_id."_".strtotime(date('Y-m-d h:i:s'));
        //echo $session_uname;
        try {
            $twilio = new Client($twilio_sid, $token);
            $servicuname = date('YmdHism');
            /*$service = $twilio->proxy->v1->services
                             ->create('KS7fe7732b63ffb0b6b329f57bc0ef519f');
             //$service->sid;
             
                   
            echo $service->sid." SERVICE ID <br />";      
            */   
            $session = $twilio->proxy->v1->services('KS7fe7732b63ffb0b6b329f57bc0ef519f')
                             ->sessions
                             ->create(["uniqueName" => $session_uname]);

              $sess_id = $session->sid;
              //$rider_phone = '+61285038000';
              //$rider_phone = '+61485818004';
             //$rider_phone = '+61480053894';
               //$rider_phone = '+61485817976';
            // $rider_phone = '+61485816732'; 
              //echo $sess_id." SESSION ID <br />";         
              if($sess_id){
              	  try {
              	  $participant = $twilio->proxy->v1->services('KS7fe7732b63ffb0b6b329f57bc0ef519f')
                                 ->sessions($sess_id)
                                 ->participants
                                 ->create($rider_phone, // identifier
                                          ["friendlyName" => $rider_name]
                                 );
                  } catch (\Twilio\Exceptions\RestException $e) {
			                  //	die( $e->getCode() . ' : ' . $e->getMessage() );
			            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
			        }
                 
                 $proxyIdentifiersender = $participant->proxyIdentifier;	
                 
                  //$mobile = '+61417691066';
                  //$mobile = '+61485816737';
                 // $mobile = '+61480053941';
                //  $mobile = '+61485818008';
               //  $mobile = '+61480048723';
               try {
               	$participant = $twilio->proxy->v1->services('KS7fe7732b63ffb0b6b329f57bc0ef519f')
                                 ->sessions($sess_id)
                                 ->participants
                                 ->create($mobile, // identifier
                                          ["friendlyName" => $name]
                                 );
                  } catch (\Twilio\Exceptions\RestException $e) {
			                  //	die( $e->getCode() . ' : ' . $e->getMessage() );
			            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
			        }

                 $proxyIdentifier = $participant->proxyIdentifier;	
              
              	 
              }
             
               
            return response()->json(['status' => 1, 'message' => 'SMS has be sent to your phone number.','senderphn' =>$proxyIdentifiersender ]);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Call session Error']);
        }

    }//end of fun

    public function putProfileInfo(Request $request)
    {
        $id = Auth::guard('api')->user()->id;
        /*$validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:14',
            'partner_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);
        */
         $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'partner_id' => 'required|numeric',
            'email' => 'required|string|email|max:255',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors(),
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        $rider = User::find($id);
        //
        $nwarray = array();
        $nwarray['first_name'] = $request->first_name;
        $nwarray['last_name'] = $request->last_name;
        $nwarray['partner_id'] = $request->partner_id;
        $nwarray['email'] = $request->email;
        
        if($request->password && trim($request->password) != ''){
        	$nwarray['password'] = Hash::make($request->password);
        }
        
        $rider->update($nwarray);

        return response()->json([
            'status' => 1,
            'message' => 'Rider updated.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $rider
        ]);
    }

    public function onlineRider(Request $request)
    {
        // Get POST data
        $lat = $request->lat;
        $lng = $request->lng;
        $id = Auth::guard('api')->user()->id;

        $rl = RiderLocation::where('riderId', $id)->first();
        if ($rl) {
            $rl->lat = $lat;
            $rl->lng = $lng;
            $rl->save();
        } else {
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

    public function tripreceipt($book_id)
    {
        $id = Auth::guard('api')->user()->id;
        $rider = Auth::guard('api')->user();
       $book = Appointment::find($book_id);
       
        $Appointment = new Appointment;
        
       $ridesFormat =   $Appointment->getRidesRecepit($id,$book_id);
       
      
       
       //require '/home/turvy.net/public_html/public/html2pdf/html2pdf.class.php';
        $html2pdf_path = base_path() . '/public/html2pdf/vendor/autoload.php';
        require_once($html2pdf_path);
        
		   $content = '
			<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
			    <div style="width: 100%; height: 80px; border-bottom: solid 1px #000">
			        <img src="'.asset('images/receipt-header-logo.jpg').'" >
			    </div>
			    <table cellpadding="0" cellspacing="0"  >
			    <tr>
			    <td colspan="2" style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;">
			     <h5>Here\'s your receipt for your ride, '.$ridesFormat[0]['first_name'].'  '.$ridesFormat[0]['last_name'].'</h5>
			    </td>
			    </tr>
			    	<tr >
			    		<td style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;"><strong>Total</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;">A$'.$ridesFormat[0]['total'].'</td>
			    	</tr>
			    	<tr bgcolor="#c6daff">
			    		<td colspan="2" style="border-bottom: solid 1px #ccc;padding-top:10;padding-bottom:10;">
			    		Due to unanticipated tolls or surcharges on this trip , we have adjusted your upfront fare to reflect the actually incurred charges. please see receipt breakdown for details.
			      	</td>
			      </tr><tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Trip fare</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$ridesFormat[0]['subtotal'].'</td>
			    	</tr>';
			      $surchagreinfo = $ridesFormat[0]['surgeinfo'];
			      $surchagrearr = array();
			      if($surchagreinfo != ''){
			      	$surchagrearr = json_decode(stripslashes($surchagreinfo));
			      }
			      //print"<pre>";
			      //print_r($surchagrearr);
			     if(isset($surchagrearr) > 0) {
			     	$content .= '
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>SubTotal</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$ridesFormat[0]['subtotal'].'</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Booking Fee</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$surchagrearr->booking_charge.'</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">NSW CTP Charges</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$surchagrearr->nsw_ctp_charge.'</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">NSW Government Passenger Service Levy</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$surchagrearr->nsw_gtl_charge.'</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">GST</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$surchagrearr->gst_charge.'</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Fuel SurCharge</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$surchagrearr->fuel_surge_charge.'</td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Total surge</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$ridesFormat[0]['surge'].'</td>
			    	</tr>';
			     }else{
			     	$content .= ' <tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">Total surge</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$ridesFormat[0]['surge'].'</td>
			    	</tr>';
			     }
			      
			    	$content .= '<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"><strong>Amount Charged</strong></td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;"></td>
			    	</tr>
			    	<tr>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">'.$ridesFormat[0]['paymenthod'].'</td>
			    		<td style="border-bottom: solid 1px #ccc;padding-top:5;padding-bottom:5;">A$'.$ridesFormat[0]['total'].'</td>
			    	</tr>
			    </table>
			    <div style="width: 80%; height: 10px; margin: 110px auto 0 auto; border-bottom: solid 1px #000;">
			    </div>
			    <div style="width: 100%; height: 225px; margin-top: 50px; background-color: #216da9;">
			        <img src="'.asset('images/email-footer-logo.jpg').'" style="margin-left: 20px; margin-top: 15px">
			    </div>
			    <div style="width: 100%; height: 28px; background-color: #000000; text-align: center; color: #ffffff;  font-size: 12px; padding-top: 10px">
			        Copyright 2010 by Turvy Pty Ltd. All rights Reserved
			    </div>
			</page>';
		  //$content = ob_get_clean();
		    
		  
		   
          //$content = ob_get_clean();
         $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P','A4','en',true, 'UTF-8', array(0, 0, 0, 0));
	      $html2pdf->WriteHTML($content);
	      $html2pdf->Output(base_path() . '/public/uploads/receipts/report_'.$book_id.'.pdf','F');
			//echo url('/');
			$file = url('/').'/uploads/receipts/report_'.$book_id.'.pdf';
			$data['file'] = $file;
        //RiderLocation::where('riderId', $book_id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'You are released from our obseverablity.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $data,
        ]);
    }
    
     public function emailtripreceipt($book_id)
    {
       $id = Auth::guard('api')->user()->id;
       $rider = Auth::guard('api')->user();
       $book = Appointment::find($book_id);
       $email = $book->rider_email;
      
       
      
       
       /*try {
            Mail::to($email)->send(new RiderEmailRecepit($book));
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
        */
        
          $from = "admin@turvy.net";
		    $to = $email;
		    $subject = "Rider Email Recepit";
		    $message = $html;
		    $headers = "From:Admin<" . $from.">	\r\n";
		    $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
		    $headers .= "MIME-Version: 1.0\r\n";
			 $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		    mail($to,$subject,$message, $headers);
        
        //RiderLocation::where('riderId', $book_id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Email sent.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }
    
    
    public function offlineRider()
    {
        $id = Auth::guard('api')->user()->id;
        RiderLocation::where('riderId', $id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'You are released from our obseverablity.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function nearByDrivers()
    {
        $id = Auth::guard('api')->user()->id;
        // Get rider's location
        $rl = RiderLocation::where('riderId', $id)->first();
        if (!$rl) {
            return response()->json([
                'status' => 1,
                'message' => 'Not found your location data.',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        // Base paramaters
        $distance = 50; // Get from settings
        $R = 6371;
        $lat = $rl->lat;
        $lng = $rl->lng;

        $maxLat = $lat + rad2deg($distance / $R);
        $minLat = $lat - rad2deg($distance / $R);
        $maxLng = $lng + rad2deg(asin($distance / $R) / cos(deg2rad($lat)));
        $minLng = $lng - rad2deg(asin($distance / $R) / cos(deg2rad($lat)));

        $driverLocations = DriverLocation::where(function ($q) use ($minLat, $maxLat, $minLng, $maxLng) {
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

    public function updateDevice(Request $request)
    {
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

    public function bookRide(Request $request)
    {
    	 $is_multiple = 0;
    	 if(isset($request->waypointslnglat)){
        	if(count($request->waypointslnglat) > 0){
        		 $is_multiple = 1;
        	}	
        }
        
        $origin = $request->pickup_address;
        $origin_lat = $request->pickup_lat;
        $origin_lng = $request->pickup_lng;
        $destination = $request->drop_address;
        $destination_lat = $request->drop_lat;
        $destination_lng = $request->drop_lng;
        $servicetype_id = $request->servicetype_id;
        $distance = $request->distance;
        $rider_id = Auth::guard('api')->user()->id;
        $rider_name = Auth::guard('api')->user()->name;
        $rider_mobile = Auth::guard('api')->user()->mobile;
        $rider_email = Auth::guard('api')->user()->email;
        $boookingdt = date("Y-m-d");
        $boookingtime = date("H:i:s");
        $is_schedule = 0;
        $is_current = 1;
        if($request->scheduledate != ''){
          $bkarray = explode(" ",$request->scheduledate);
          $boookingdt = $bkarray[0];
        	 $boookingtime = $bkarray[1];
          $is_current = 0;
        }
      
        $book = new Appointment();
        $book->rider_id = $rider_id;
        $book->rider_name = $rider_name;
        $book->rider_mobile = $rider_mobile;
        $book->rider_email = $rider_email;
        $book->booking_date = $boookingdt;
        $book->booking_time = $boookingtime;
        $book->origin = $origin;
        $book->origin_lat = $origin_lat;
        $book->origin_lng = $origin_lng;
        $book->destination = $destination;
        $book->destination_lat = $destination_lat;
        $book->destination_lng = $destination_lng;
        $book->servicetype_id = $servicetype_id;
        $book->is_multidest = $is_multiple;
        $book->is_current =  $is_current;
        $book->is_manual = 0;
        $book->status = 0;
        $book->trip_distance = $distance;
        $book->save();
        $book_id = $book->id;
        
        if($is_multiple == 1){
        	if(isset($request->waypointslnglat)){
	        	if(count($request->waypointslnglat) > 0){
	        		$waypints = $request->waypointslnglat;
	        		foreach($waypints as $item){
	        			$MultiDestination = new MultiDestination;
	        			$MultiDestination->stop_lat = $item['latitude'];
	        			$MultiDestination->stop_lng = $item['longitude'];
	        			$MultiDestination->stopname = $item['stopname'];
	        			$MultiDestination->book_id = $book_id;
	        			$MultiDestination->save();
	        		}
	        	}	
         }
        }
			
        return response()->json([
            'status' => 1,
            'message' => 'Your ride booked.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book
        ]);
    }
    
    public function retryBooking(Request $request,$book_id){
    	  $rider_id = Auth::guard('api')->user()->id;
        $book = Appointment::find($book_id);
        $book->status = 0;
        $book->save();
        
        if($book->payment_id == 3){
        	 	// $rider_id = Auth::guard('api')->user()->id;
	       	$rewardsinfo = Rewards::where('rider_id', $rider_id)->first();
        	 	$arraynew = array();
	       	$arraynew['amount'] = $rewardsinfo->amount-floatval($request->amount);
	       	$arraynew['point'] = $rewardsinfo->point-intval($request->point);
	       	 Rewards::where('id', $rewardsinfo->id)
	           ->update($arraynew);   
     	 }else{
     	 
     	 		$bookingtotal = 0;
        		$requestPayment = PaymentRequest::where('appointment_id',$book->id)->first();
        		if(isset($requestPayment)){
        			$bookingtotal = $requestPayment->total;
        		}
  		
        		$ridertransInfo = RiderTransaction::where('rider_id',$rider_id)
		        ->where('status','active')
		        ->orderBy('id', 'DESC')
		        ->limit(1)
		        ->first();	
      
		      $total_amount_rd = floatval($bookingtotal);
     																																		
				if(isset($ridertransInfo)){
					$total_amount_rd = floatval($ridertransInfo->total_amount) - floatval($total_amount_rd);
				}      
			  
        		$riderTransaction = new RiderTransaction;   
				$riderTransaction->rider_id = $rider_id;
				$riderTransaction->book_id = $book->id;
				$riderTransaction->amount = "-".floatval($bookingtotal);
				$riderTransaction->total_amount = $total_amount_rd;
				$riderTransaction->booking_total = floatval($bookingtotal);
				$riderTransaction->pay_type = 'wallet_deduct';
				$riderTransaction->status = 'active';
				$riderTransaction->payment_id = $book->payment_id;
        		$riderTransaction->save();
     	 }
     	 
     	  return response()->json([
            'status' => 1,
            'message' => 'Your ride re processing again.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book
        ]);
	        	 
    }

    public function cancelRide(Request $request,$book_id)
    {
        /*
        * 0: new ride, 1: progress, 2: cancel, 3: complete
        */
        $rider_id = Auth::guard('api')->user()->id;
        $book = Appointment::find($book_id);
        $book->status = 3;
        $book->save();
        
        $riderCancel = new RiderCancelreason;
        $riderCancel->book_id = $book_id;
        $riderCancel->rider_id = $rider_id;
		  $riderCancel->fee = floatval($request->fee);
        $riderCancel->reason = '-';
        $riderCancel->save();
			        
        if($request->fee == 0 && (int)$book->driver_id <= 0){
	        	 if($book->payment_id == 3){
	        	 	// $rider_id = Auth::guard('api')->user()->id;
		       	$rewardsinfo = Rewards::where('rider_id', $rider_id)->first();
	        	 	$arraynew = array();
		       	$arraynew['amount'] = $rewardsinfo->amount+floatval($request->amount);
		       	$arraynew['point'] = $rewardsinfo->point+intval($request->point);
		       	 Rewards::where('id', $rewardsinfo->id)
		           ->update($arraynew);   
	        	 }else{
	        	 
	        	 		$bookingtotal = 0;
		        		$requestPayment = PaymentRequest::where('appointment_id',$book->id)->first();
		        		if(isset($requestPayment)){
		        			$bookingtotal = $requestPayment->total;
		        		}
        		
		        		$ridertransInfo = RiderTransaction::where('rider_id',$rider_id)
				        ->where('status','active')
				        ->orderBy('id', 'DESC')
				        ->limit(1)
				        ->first();	
		      
				      $total_amount_rd = floatval($bookingtotal);
	        																																		
						if(isset($ridertransInfo)){
							$total_amount_rd = floatval($ridertransInfo->total_amount) + floatval($total_amount_rd);
						}      
					  
		        		$riderTransaction = new RiderTransaction;   
						$riderTransaction->rider_id = $rider_id;
						$riderTransaction->book_id = $book->id;
						$riderTransaction->amount = floatval($bookingtotal);
						$riderTransaction->total_amount = $total_amount_rd;
						$riderTransaction->booking_total = floatval($bookingtotal);
						$riderTransaction->pay_type = 'self_cancel';
						$riderTransaction->status = 'active';
						$riderTransaction->payment_id = $book->payment_id;
		        		$riderTransaction->save();
	        	 }
        }else{
        		/* print"<pre>";
        		print_r($book);
        		exit;
        		*/
        		
        		$socket = $this->getPusherSocket();
		      $data['id'] = $book->driver_id;
		      $data['book_id'] = $book->id;
		      $socket->trigger('turvy-channel', 'rider_cancel_booking_event', $data);
		      
		      
        		
        		$transactionsInfo = DriverTransactions::where('driver_id',$book->driver_id)
		        ->where('status','active')
		        ->orderBy('id', 'DESC')
		        ->limit(1)
		        ->first();
		      $request->fee = floatval($request->fee);
        		$feesadmin = $request->fee*(20/100);
        		$requestPayment = PaymentRequest::where('appointment_id',$book->id)->first();
        		$bookingtotal = 0;
        		
        		if(isset($requestPayment)){
        			$bookingtotal = $requestPayment->total;
        		}
        		if(isset($request->payfull) && $request->payfull == 'yes' ){
        			 $fees = floatval($bookingtotal)- floatval($feesadmin);
        			 $total_amount = floatval($fees);
        		}else{
        			$fees = floatval($request->fee)- floatval($feesadmin);
					$total_amount = floatval($fees);
        		}
        		if(isset($transactionsInfo)){
					$total_amount = floatval($transactionsInfo->total_amount) + floatval($fees);
				}  
        		      		
        		
				$driverTransactions = new DriverTransactions;  
				$driverTransactions->driver_id = $book->driver_id;
				$driverTransactions->rider_id = $rider_id;
				$driverTransactions->book_id = $book->id;
				$driverTransactions->amount = $fees;
				$driverTransactions->total_amount = $total_amount;
				$driverTransactions->pay_type = 'rider_cancel';
				$driverTransactions->status = 'active';
        		$driverTransactions->save(); 

        		
        		$ridertransInfo = RiderTransaction::where('rider_id',$rider_id)
		        ->where('status','active')
		        ->orderBy('id', 'DESC')
		        ->limit(1)
		        ->first();	
		      
		      if(isset($request->payfull) && $request->payfull == 'yes' ){
		      	$total_amount_rd = floatval($bookingtotal);
		      }else{
		      	$total_amount_rd = floatval($bookingtotal) - floatval($request->fee);
		      }
																																
				if(isset($ridertransInfo)){
					$total_amount_rd = floatval($ridertransInfo->total_amount) + floatval($total_amount_rd);
				}      
				  
        		$riderTransaction = new RiderTransaction;   
				$riderTransaction->rider_id = $rider_id;
				$riderTransaction->book_id = $book->id;
				$riderTransaction->amount = "-".$request->fee;
				$riderTransaction->total_amount = $total_amount_rd;
				$riderTransaction->booking_total = floatval($bookingtotal);
				$riderTransaction->pay_type = 'self_cancel';
				$riderTransaction->payment_id = $book->payment_id;
				$riderTransaction->status = 'active';
        		$riderTransaction->save(); 
        		
        		$socket = $this->getPusherSocket();

		      $data['id'] = $book->driver_id;
		      $data['book_id'] = $book->id;
		      $socket->trigger('turvy-channel', 'rider_cancel_booking_event', $data);
		      
        }
        
        return response()->json([
            'status' => 1,
            'message' => 'Your ride was cancelled.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book
        ]);
    }

    /**
     * Rider is able to give the rate, feedback to the driver
     * @params - rate, feedback
     * @response - JSON object
     */
    public function feedbackRide(Request $request, $book_id)
    {
        // Rider feedback
        
        $book = Appointment::find($book_id);
        $feedback = new RiderRating();
        $feedback->book_id = $book_id;
        $feedback->driver_id = $book->driver_id;
        $feedback->rider_id = $book->rider_id;
        $feedback->rating = $request->rate;
        if($request->comment == ""){
        	 $feedback->comment = "-";
        }else{
        	 $feedback->comment = $request->comment;
        }
        
        $arr = $this->getRateAnsStr($feedback->rating, $request->option);

        $feedback->que = $arr['que'];
        $feedback->ans = $arr['ans'];
        
        
        $feedback->status = 0;
        $feedback->save();
        
        $notifications = new Notification;
        $date = date('Y-m-d H:i:s');
        
        $notifications->heading = 'You got '.$request->rate.' star';
        $notifications->content = 'Rider rate you '.$request->rate.' star for trip';
        $notifications->type = 3;
        $notifications->user_type = 2;
        $notifications->receiver_ids = $book->driver_id;
        $notifications->sender_id = $book->rider_id;
        $notifications->created_at = $date;
        $notifications->updated_at = $date;
        $notifications->save();
        
        return response()->json([
            'status' => 1,
            'message' => 'Your feedback was submitted.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book
        ]);
    }

    /**
     * create payment record for tips, ride's amount
     * @queryString - book_id
     * @params - payment_method_id, type, amount
     * @response - JSON object
     */
    public function requestPayment(Request $request, $book_id)
    {
        
         // update appoint ment table payment ID       
        $bookApp = Appointment::find($book_id);
		  $bookApp->payment_id = $request->payment_method_id;
        $bookApp->surge_charge = $request->surge_charge;
        $bookApp->trip_distance = $request->distance;
        $bookApp->save();
      
        $book = Appointment::find($book_id);
        $requestPayment = new PaymentRequest();
        $requestPayment->appointment_id = $book_id;
        $requestPayment->driver_id = $book->driver_id;
        $requestPayment->rider_id = $book->rider_id;
        $requestPayment->payment_method_id = $request->payment_method_id;
        $requestPayment->type = $request->type;
        if ($request->type != 'TIP') {
            $requestPayment->subtotal = $request->amount;
            $requestPayment->surge = $request->surge_charge;
            $requestPayment->total = floatval($request->amount)+floatval($request->surge_charge);
            $requestPayment->surgeinfo = json_encode($request->selectSurInfo);
                
            /*if ($book->is_current == 0 && $book->is_manual == 1) {
                // Get driver commission
                if (!is_null($book->surge_charge))
                    $requestPayment->surge = $request->amount * $book->surge_charge / 100;
            } else {
                $requestPayment->surge = 0;
            }
           */
        } else {
        	$requestPayment->subtotal = $request->amount;
            $requestPayment->total = $request->amount;
            $requestPayment->surge = 0;
            
             $socket = $this->getPusherSocket();
	
		      $data['id'] = $book->rider_id;
		      $data['book_id'] = $book_id;
		      $data['amount'] = $request->amount;
		      $data['driver_id'] = $book->driver_id;
		      $socket->trigger('turvy-channel', 'book_tip_event', $data);

            $driverTransactions = DriverTransactions::where('book_id',$book_id)
            ->where('status','active')->first();
            if($driverTransactions){
                $driverTransactions->tip_amount = $request->amount;
                $driverTransactions->total_amount = $driverTransactions->total_amount + $request->amount;
                $driverTransactions->save();
            }
        }
        $requestPayment->status = 1;
        $requestPayment->save();
        $reqpay_id = $requestPayment->id;
        
        $Transaction = new Transaction();
		  $Transaction->request_id = $reqpay_id;
		  $Transaction->transaction_id = $reqpay_id; 
		  $Transaction->sender = intval($book->rider_id); 
		  $Transaction->receiver = intval($book->driver_id); 
		  $Transaction->amount = $requestPayment->total;  
		  $Transaction->payment_id = $request->payment_method_id;  
		  $Transaction->save();
        
        return response()->json([
            'status' => 1,
            'message' => 'Payment requested.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $requestPayment
        ]);
    }

   
  

  
     public function myrides($type,$page=1)
    {
  
        $rider_id = Auth::guard('api')->user()->id;
        $Appointment = new Appointment;
        
        $ridesFormat =  $Appointment->getRides($type, $rider_id,$page);
        if($ridesFormat){
            $dtaArr = array();
            foreach($ridesFormat as $key => $val){
                $appData = array();
                $appData = Appointment::find($val['id']);
                $ridesFormat[$key]['tip_amt'] = number_format($appData->payment_tip,2);
                //add tip in total amount
                $ridesFormat[$key]['total'] = $val['total'] + $appData->payment_tip;
            }
        }

        return response()->json([
            'status' => 1,
            'message' => 'Your rides.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $ridesFormat,
        ]);
  
     }
         
  //added TABLE  details in paymentRequest.php (Module) need to upload both files to server
   public function mypayments($page=1)
   {
   	$items_per_page = 10; 
  		$offset = ($page - 1) * $items_per_page;
  		
       $rider_id = Auth::guard('api')->user()->id;
         $payments = PaymentRequest::select('payment_requests.*','payments.name as paymethod','appointments.*','payment_requests.created_at as paiddate')
       ->leftJoin('appointments', 'appointments.id', '=','payment_requests.appointment_id')
       ->leftJoin('payments', 'payments.id', '=','payment_requests.payment_method_id')
       ->where('payment_requests.rider_id', $rider_id)->orderBy('payment_requests.id','DESC')->offset($offset)
        	   ->limit($items_per_page)->get();
        $paymentsFormat = array();
        foreach($payments as $k => $ride){
            if ($ride->booking_date == date("Y-m-d")) {
               $paymentsFormat[$k]['booking_date'] = 'Today, ';      
           } else {
             $paymentsFormat[$k]['booking_date'] = date('d/m/Y', strtotime($ride->booking_date));
           }
	         $paymentsFormat[$k]['booking_time'] = date('h:i A',strtotime($ride->booking_time));
	         $paymentsFormat[$k]['end_time'] = date('h:i A',strtotime($ride->end_time));
	         $paymentsFormat[$k]['start_time'] = date('h:i A',strtotime($ride->start_time));
	
	         $paymentsFormat[$k]['total'] = $ride->total;
	         $paymentsFormat[$k]['first_name'] = $ride->first_name;
	         $paymentsFormat[$k]['last_name'] = $ride->last_name;
	         $paymentsFormat[$k]['rating'] =  $ride->rating;
	         $paymentsFormat[$k]['origin'] = $ride->origin;
	         $paymentsFormat[$k]['destination'] = $ride->destination;
	         $paymentsFormat[$k]['arrival_time'] = date('h:i A',strtotime($ride->arrival_time));
	         $paymentsFormat[$k]['paymethod'] = $ride->paymethod; 
	         $paymentsFormat[$k]['paiddate'] = date('d/m/Y',strtotime($ride->paiddate));
        }
        
       
       return response()->json([
           'status' => 1,
           'message' => 'Your payments.',
           'datetime' => date('Y-m-d H:i'),
           'data' => $paymentsFormat
       ]);
   }
   
   
   //added TABLE  details in paymentRequest.php (Module) need to upload both files to server
   public function myTransactions($page=1)
   {
   	$items_per_page = 10; 
  		$offset = ($page - 1) * $items_per_page;
  		
       $rider_id = Auth::guard('api')->user()->id;
         $payments = RiderTransaction::select('rider_transaction.*')
       ->where('rider_transaction.rider_id', $rider_id)->orderBy('rider_transaction.id','DESC')->offset($offset)
        	   ->limit($items_per_page)->get();
        $paymentsFormat = array();
        foreach($payments as $k => $ride){
            if ($ride->created_at == date("Y-m-d")) {
               $paymentsFormat[$k]['created_at'] = 'Today, ';      
           } else {
             $paymentsFormat[$k]['created_at'] = date('d/m/Y', strtotime($ride->created_at));
           }
	        
	         $paymentsFormat[$k]['total_amount'] = $ride->total_amount;
	         $paymentsFormat[$k]['amount'] = $ride->amount;
	         $paymentsFormat[$k]['booking_total'] = $ride->booking_total;
	         $paymentsFormat[$k]['pay_type'] =  $ride->pay_type;
        }
        
       
       return response()->json([
           'status' => 1,
           'message' => 'Your Transaction.',
           'datetime' => date('Y-m-d H:i'),
           'data' => $paymentsFormat
       ]);
   }
     
   //function used to save data for comments made by rider
   public function comments(Request $request)
   {


    $id = Auth::guard('api')->user()->id;
    $commentDataGet = $request->commentData;


        $comm = new Comment();
        $comm->rider_id = $id;
        $comm->content = $commentDataGet;
        $comm->is_publish = 0;
     	//$comm->partner_id =0;
        //$comm->driver_id = 0;
        
        
        $comm->created_at = date('Y-m-d H:i:s');
        $comm->updated_at = date('Y-m-d H:i:s');
       
       if($comm->save()){
         return response()->json([
            'status' => 1,
            'message' =>  "Comment saved successfully!",
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
       }else{
         
         return response()->json([
            'status' => 0,
            'message' => "Error saving " ,
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
       }
        


   }
  
   public function requestBookStatus($book_id)
    {
    	  $rider_id = Auth::guard('api')->user()->id;
    	  $books = Appointment::where('id', $book_id)->first();
          $driver = array();
           $message ='';
    	  if($books->status == 1){
    	  	 	$message = 'progress';
            // get driver Info 
            //rideinfoinprocess
            if($books->driver_id > 0){
              $driver = Driver::where('id', $books->driver_id)->first();
            }
            
    	  }elseif($books->status == 2){
    	  		$message = 'cancel';
    	  }elseif($books->status == 3){
    	  		$message = 'complete';
    	  }elseif($books->status == 0){
           $message = 'not assigned';
        }
           $booksdata['driver'] = $driver;
           $booksdata['booking'] = $books;
           $startTime = '';
           $endTime = '';
           if(isset($books->end_time) && isset($books->start_time)){
           	$startTime = date("h:i A",strtotime($books->start_time));
           	$endTime = date("h:i A",strtotime($books->end_time));
           }
    	     $booksdata['startTime'] = $startTime;
    	     $booksdata['endTime'] = $endTime;
    	   return response()->json([
            'status' => 1,
            'message' => $message,
            'datetime' => date('Y-m-d H:i'),
            'data' => $booksdata
        ]);
    }
  
    public function assigndriver(Request $request, $book_id)
    {
 	
      $bkdecline = BookDecline::where('booking_id',$book_id)->where('driver_id',$request->driver_id)
      ->where(function($q) {
          $q->where('declineBy','=','manual')
            ->orWhere('declineBy','=', 'aftercancel');
      })->first();
      
      if($bkdecline){
         return response()->json([
            'status' => 0,
            'message' => 'Driver Decline',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
      }else{
        // check if driver exist or not 
       $driverData = Driver::where('id',$request->driver_id)->first();
       if($driverData){
       	if($driverData->is_approved == 1){
       		
       		$book = Appointment::find($book_id);
       		if($book->driver_id != $request->driver_id){
       			if($book->status == 0){
       			$book->driver_id = $request->driver_id;
	         	$book->save();
	       		}
	       		
	       		$socket = $this->getPusherSocket();
	
			      $data['id'] = $request->driver_id;
			      $data['book_id'] = $book_id;
			      $socket->trigger('turvy-channel', 'book_request_event', $data);
       		}
       		
       		
	          return response()->json([
	              'status' => 1,
	              'message' => 'Driver Assign',
	              'datetime' => date('Y-m-d H:i'),
	              'data' => null
	          ]);
       	}else{
       	   return response()->json([
              'status' => 1,
              'message' => 'Driver is not apprioved',
              'datetime' => date('Y-m-d H:i'),
              'data' => null
          	]); 
       	}
         
       }else{
         return response()->json([
              'status' => 0,
              'message' => 'Driver not exits',
              'datetime' => date('Y-m-d H:i'),
              'data' => null
          ]); 
       } // end of driver exits
        
      }
       
      
    }
    
    
    function getPusherSocket(){
        //require '/home/turvy.net/public_html/public/pusher/vendor/autoload.php';
        require base_path() .'/public/pusher/vendor/autoload.php';

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            '389d667a3d4a50dc91a6', //APP_KEY
            'e1f2e0266903857072be', //APP_SECRET
            '1309578', //APP_ID
            $options
        );

        return $pusher;
    }//end of fun
    
  
    public function driverrequestPayment(Request $request, $book_id)
    {
      /*
      PaymentRequest::where('active', 1)
      ->where('destination', 'San Diego')
      ->update(['delayed' => 1]);
      */
     if($request->driver_id > 0){
       PaymentRequest::where('appointment_id', $book_id)
      ->update(['driver_id' => $request->driver_id]);
       $total = 0;
       $points = 0;
       // get payment info 
       $paymentsInfo = PaymentRequest::where('appointment_id', $book_id)->first();
       $addreward =1;
		 if($paymentsInfo){
		 	$total = $paymentsInfo->total;
		 	/*if($request->is_vend ==  true){
		 		$total = $paymentsInfo->total+15;
		 		PaymentRequest::where('appointment_id', $book_id)
		 		->update(['violant_end' => 15,'total' => $total]);
		 	}
		 	*/
		 	
		 	if($paymentsInfo->payment_method_id == 3){
		 		$addreward = 0;
		 	}                                                                                                                                                                                                                                                         
		 	 // save transaction driver 
        $Transaction = Transaction::where('request_id', $paymentsInfo->id)
      	->update(['receiver' => $request->driver_id,'status' => 1]);
		 }	       
       
		  
       // get rider reward info 
       $riderreward = RiderReward::first();  
       if($addreward == 1){
	       $rider_id = Auth::guard('api')->user()->id;
	       $rewardsinfo = Rewards::where('rider_id', $rider_id)->first();
	       
	       if(isset($rewardsinfo->id) && $rewardsinfo->id > 0){
	       	$total = $total+ $rewardsinfo->amount;
	       	$points = $rewardsinfo->point;
	       	if(isset($riderreward) && $riderreward->id > 0){
	       		$getpoints = $total/$riderreward->start_amount;
	       		if($riderreward->start_amount <= $total){
	       			$points = abs($getpoints);       	
	       		}
	       	}
	       	$arraynew = array();
	       	$arraynew['amount'] = $total;
	       	$arraynew['point'] = $points;
	       	 Rewards::where('id', $rewardsinfo->id)
	           ->update($arraynew);       	
	       }else{
	       	if(isset($riderreward) && $riderreward->id > 0){
	       		$getpoints = $total/$riderreward->start_amount;
	       		if($riderreward->start_amount <= $total){
	       			$points = abs($getpoints);       	
	       		}
	       	}
	       	 // get eariler rewards 
			  	  $rewards = new Rewards;
			  	  $rewards->rider_id = $rider_id;
			  	  $rewards->point = $points;
			  	  $rewards->amount = $total; 	  
			  	  $rewards->driver_id = $request->driver_id; 	  
			  	  $rewards->save();
	       }
		}  	    
  	  
       return response()->json([
              'status' => 1,
              'message' => 'Driver Update for Payment',
              'datetime' => date('Y-m-d H:i'),
              'data' => null
         ]);
       
     }else{
       return response()->json([
              'status' => 1,
              'message' => 'No Driver Id',
              'datetime' => date('Y-m-d H:i'),
              'data' => null
         ]);
     }
    }
      
      public function getDeclinedriverReq(Request $request,$book_id){
        
        if($book_id){
          $driverDeclineLst = BookDecline::where('booking_id','=',$book_id)
            ->where('driver_id','=',$request->driver_id)
            ->count();
          if($driverDeclineLst > 0){
           return response()->json([
              'status' => 1,
              'message' => 'Driver Decline',
              'datetime' => date('Y-m-d H:i'),
              'data' => null,
         	]); 
          }
        }
         return response()->json([
              'status' => 0,
              'message' => 'No Driver Decline',
              'datetime' => date('Y-m-d H:i'),
              'data' => null
         ]);
    } // end of function
    
    public function uploadimage(Request $request){
    	 //move_uploaded_file($_FILES['photo']['tmp_name'], './user/rider/' . $_FILES['photo']['name']);
    	 $rider_id = $request->riderId;
    	 if(isset($_FILES)){
    	 	  $file_name = time();
		     $file_name .= rand();	
		     $file_name = sha1($file_name);
		     $base = base_path();
		     $filepath = "/uploads/user/rider/".$file_name;
		     $fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
		     $pathwitext =  $base."/public/".$filepath.".".$fileExtension;
    	 	 $resp = move_uploaded_file($_FILES['photo']['tmp_name'],$pathwitext);
    	 	//$avtar = upload_file($_FILES, 'user/rider');
    	 	$user = User::find($rider_id);
    	 	$user->avatar = $filepath.".".$fileExtension;
         $user->save();
    	 }
    	 
    	 $data['url'] = $filepath.".".$fileExtension;
    	 $data['ext'] = $rider_id;
    	 return json_encode($data);
    }
    
    public function riderRewardpoints(){
    	
    	$rider_id = Auth::guard('api')->user()->id;
		$rewardsinfo = Rewards::where('rider_id', $rider_id)->first();
		$riderTransaction = RiderTransaction::where('rider_id', $rider_id)->where('status','active')
		        ->orderBy('id', 'DESC')
		        ->limit(1)
		        ->first();
		
		if($rewardsinfo){
        return response()->json([
           'status' => 1,
           'message' => 'points available',
           'datetime' => date('Y-m-d H:i'),
           'data' => $rewardsinfo,
           'tranasctionamnt' => $riderTransaction,
      	]); 
      }else{
      	return response()->json([
           'status' => 0,
           'message' => 'No points',
           'datetime' => date('Y-m-d H:i'),
           'data' => null,
      	]); 
      }   //                      		     	
    } // end if function
    
    
    public function deductWalletAmount(Request $request){
    	 		
 		$rider_id = Auth::guard('api')->user()->id;
 		$amountused = floatval($request->amountused);
 		
 		$riderTransaction = RiderTransaction::where('rider_id', $rider_id)->where('status','active')
		        ->orderBy('id', 'DESC')
		        ->limit(1)
		        ->first();
		        		        		        		        
		$total_wallet_amount = $riderTransaction->total_amount;  
		$remaingamount = floatval($total_wallet_amount) - floatval($amountused);
	
		$RiderTransactionSave = new RiderTransaction;
		$RiderTransactionSave->amount = "-".$amountused;
		$RiderTransactionSave->rider_id = $rider_id;
		$RiderTransactionSave->total_amount = floatval($remaingamount);
		$RiderTransactionSave->pay_type = 'wallet_deduct';
		$res = $RiderTransactionSave->save();

 		if($res){
        return response()->json([
           'status' => 1,
           'message' => 'Payment done',
           'datetime' => date('Y-m-d H:i'),
           'data' => null,
      	]); 
      }else{
      	return response()->json([
           'status' => 0,
           'message' => 'No amount deducted',
           'datetime' => date('Y-m-d H:i'),
           'data' => null,
      	]); 
      }  //
                 
    } // end of function
     
     
      public function deductRewardpoints(Request $request){
 		
 		$rider_id = Auth::guard('api')->user()->id;
 		
 		$remainingpoints = floatval($request->remaingamount)/0.20;
 		$usedamount = $remainingpoints*15;
 		$updatearr = array();
 		$updatearr['amount'] = $usedamount;
 		$updatearr['point'] = intval($remainingpoints);
 		
		$res = Rewards::where('rider_id', $rider_id)->update($updatearr);   	
 		if($res){
        return response()->json([
           'status' => 1,
           'message' => 'points deducted',
           'datetime' => date('Y-m-d H:i'),
           'data' => $updatearr,
      	]); 
      }else{
      	return response()->json([
           'status' => 0,
           'message' => 'No points deducted',
           'datetime' => date('Y-m-d H:i'),
           'data' => null,
      	]); 
      }   //           
         	
    } // end of function
    
 	public function supportSave(Request $request){
 		 // $user = Auth::guard('rider')->user();
 		  $user = Auth::guard('api')->user();
        $record = new Feedback();
        $record->name = $user->first_name.' '.$user->last_name;
        $record->email = $user->email;
        $record->mobile = $user->mobile;
        $record->rider_id = $user->id;
        $record->content = $request->get('query');
        $res = $record->save();
        if($res){
 				return response()->json([
               'status' => 1,
	           'message' => 'Query Successfully Submitted!',
	           'datetime' => date('Y-m-d H:i'),
	           'data' => null,
	      	]);        
        }else{
        		return response()->json([
               'status' => 1,
	           'message' => 'Error submitting Query !',
	           'datetime' => date('Y-m-d H:i'),
	           'data' => null,
	      	]);      
        }        
 	}
 	
 	public function riderCharity(){
 		 		
    	$rider = Auth::guard('api')->user();
    	$partner_id = $rider->partner_id;
    	$rider_id = $rider->id;
		$partnerinfo = Partner::Where('id','=',$partner_id)->first();
		if($partnerinfo){
			$paymentrequest = PaymentRequest::where('rider_id', $rider_id)->get();
			$total_partner_income = 0;
        foreach($paymentrequest as $transaction){
            // Get driver's commission
            /*print"<pre>";
            print_r($transaction);
            exit;
            */
            if($transaction->driver_id && $transaction->driver_id > 0){
            	 $commission = Driver::find($transaction->driver_id)->commission;
            	 $commission = str_replace('%', '', $commission);
	            // Calculate admin income.
	            //echo $commission."<br />";
	            //echo $transaction->total."<br />";
	            $admin_income = $transaction->total * floatval($commission) / 100;
	            // Calculate partner income
	            $partner_income = $admin_income * 0.05;
	            $total_partner_income += $partner_income;
            }
           
        }
        
			return response()->json([
               'status' => 1,
	           'message' => 'Get Partner INFO!',
	           'datetime' => date('Y-m-d H:i'),
	           'partner_income' => number_format($total_partner_income,2,".",""),
	           'data' => $partnerinfo,
	      	]);  
		}else{
			return response()->json([
              'status' => 0,
	           'message' => 'No Partner Info found',
	           'datetime' => date('Y-m-d H:i'),
	           'partner_income' => 0, 
	           'data' => null,
	      	]);  
		}		   	
   } // end of function
   
   //change password
  	public function changePassword(Request $request){
      	$id = Auth::guard('api')->user()->id;
        
        $validator = Validator::make($request->all(), [            
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ]);
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }      
      	
	    $new = $request->new_password;
	    $confirm = $request->confirm_password;      
      	$User = User::find($id);
      	if($new == $confirm){
          $User->password = Hash::make($new);
          $User->save();
          
        }else{
          //return redirect()->back()->withInput()->withErrors('Your password and confirmation password do not match.');
          return response()->json(['status' => 0, 'message' => 'Your password and confirmation password do not match.']);
        }
      
        return response()->json(['status' => 1, 'message' => 'Password Updated', 'data' => $User]);
    }//end of fun
    
    	public function getRiderLastRequest(){
    	  $id = Auth::guard('api')->user()->id;
    	  
        $appointmentData = Appointment::where('rider_id',$id)
        							->where('is_current',1)
        							->where('status',1)
        							->orderBy('id','DESC')->first();
       if($appointmentData){
			return response()->json([
               'status' => 1,
	           'message' => 'On going appointment exist',
	           'datetime' => date('Y-m-d H:i'),
	           'data' => $appointmentData,
	      	]);  
		}else{
			return response()->json([
              'status' => 0,
	           'message' => 'No Request found',
	           'datetime' => date('Y-m-d H:i'),
	           'partner_income' => 0, 
	           'data' => null,
	      	]);  
		}		
    }
    
    public function addPaytoken(Request $request){
    	$id = Auth::guard('api')->user()->id;

		$tokens = PaymentTokens::where('fingerprint', $request->fingerprint)
        ->where('rider_id', $id)
        ->first();

        if(!$tokens){
            $PaymentTokens = new PaymentTokens;
            $PaymentTokens->token = $request->token;   
            $PaymentTokens->cardtoken = $request->cardtoken;
            $PaymentTokens->fingerprint = $request->fingerprint;
            $PaymentTokens->brand = str_replace(' ','',$request->brand);
            $PaymentTokens->rider_id = $id;
            $PaymentTokens->response = json_encode($request->response);
            $res = $PaymentTokens->save();
        }

		 if($res){
			return response()->json([
               'status' => 1,
	           'message' => 'Token saved',
	           'datetime' => date('Y-m-d H:i'),
	           'data' => null,
	      	]);  
		}else{
			return response()->json([
              'status' => 0,
	           'message' => 'Card already exist',
	           'datetime' => date('Y-m-d H:i'),
	           'partner_income' => 0, 
	           'data' => null,
	      	]);  
		}		
		
    }
    
    
 	public function getPaymentToken(){
 		 		
	 	$id = Auth::guard('api')->user()->id;
	 	
		$paymenttoken = PaymentTokens::Where('rider_id','=',$id)->get();
		if($paymenttoken){
			return response()->json([
              'status' => 1,
	           'message' => 'Payment Token',
	           'datetime' => date('Y-m-d H:i'),
	           'partner_income' => 0, 
	           'data' => $paymenttoken,
	      	]);  
		}else{
			return response()->json([
              'status' => 0,
	           'message' => 'Payment Token No data',
	           'datetime' => date('Y-m-d H:i'),
	           'partner_income' => 0, 
	           'data' => null,
	      	]);  
		}
	
  }
  
  public function getCurrentRunningTrip($book_id){
	 	$id = Auth::guard('api')->user()->id;
	 	
	 	$books = Appointment::where('rider_id', $id)->where('status',1)
	 	->where('id',$book_id)
	 	->where('is_current',1)
	 	->where('driver_id','>',0)
	 	->first();
	 	
		if($books){
			if($books->driver_id > 0){
           $driver = Driver::where('id', $books->driver_id)->first();
         }
         if($books->driver_id > 0){
           $driver = Driver::where('id', $books->driver_id)->first();
         }
         $VehicleType = array();
         if($books->servicetype_id > 0){
           $VehicleType = VehicleType::where('id', $books->servicetype_id)->first();
           $Fare = Fare::where('servicetype_id', $books->servicetype_id)->first();
         }
         $waypoints = array();
         $waypointsnew  = array();
         if($books->is_multidest == 1){
         	$waypoints = MultiDestination::where('book_id', $books->id)->get();
         	if($waypoints && count($waypoints) > 0){
         		foreach($waypoints as $lkey=>$val){
         			$waypointsnew[$lkey]['latitude'] = $val->stop_lat;
         			$waypointsnew[$lkey]['longitude'] = $val->stop_lng;
         			$waypointsnew[$lkey]['stopname'] = $val->stopname;
         		}
         		
         	}
         	
         
         }
         $PaymentRequest = PaymentRequest::where('appointment_id', $books->id)->first();
         
         
         
         $response = array();
         $response['booking'] = $books;
         $response['driverinfo'] = $driver;
         $response['VehicleType'] = $VehicleType;
         $response['waypoints'] = $waypointsnew;
         $response['Fare'] = $Fare; 
         $response['PaymentRequest'] = $PaymentRequest; 
          
			return response()->json([
              'status' => 1,
	           'message' => 'Get Latest Booking',
	           'datetime' => date('Y-m-d H:i'), 
	           'data' => $response,
	      	]);  
		}else{
			return response()->json([
              'status' => 0,
	           'message' => 'Get Latest Booking',
	           'datetime' => date('Y-m-d H:i'),
	           'data' => null,
	      	]);  
		}
			 	
  }
  
  
  public function getRemovedDriver(Request $request)
    {
        $rider = User::find(Auth::guard('api')->user()->id);
        $driver_list = array();
        $i = 0;
        if(isset($request->driverList) && count($request->driverList) > 0){
        	foreach($request->driverList as $dd){
        		if($dd > 0){
              $driver = Driver::where('id', $dd	)->first();
              if(!$driver){
              		$driver_list[$i] = $dd;
              		$i++;
              }
              
            }
        	}
        }

        return response()->json([
            'status' => 1,
            'message' => 'List of deleted driver.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driver_list
        ]);
    }

	 // end of function 
	 public function getcancelAmount($book_id =  0){
    	
    	$rider_id = Auth::guard('api')->user()->id;
		$riderTransaction = RiderTransaction::where('rider_id', $rider_id)->where('book_id',$book_id)->where('pay_type','self_cancel')->first();
		
		if($riderTransaction){
        return response()->json([
           'status' => 1,
           'message' => 'Transaction is self cancelled',
           'datetime' => date('Y-m-d H:i'),
           'data' => $riderTransaction,
      	]); 
      }else{
      	return response()->json([
           'status' => 0,
           'message' => 'No points',
           'datetime' => date('Y-m-d H:i'),
           'data' => null,
      	]); 
      }   //                      		     	
    } // end if function
    
     /**
    * get rider inbox messages
    * sent by admin push notification
    * @response - JSON object    
    * @call from MyMessages.js
    */
    public function mymessages($page=1){
       $rider_id = Auth::guard('api')->user()->id;
		 $items_per_page = 10; 
  		 $offset = ($page - 1) * $items_per_page;
  		
        $notifications = Notification::where('user_type', 1)
        ->whereRaw('FIND_IN_SET("'.$rider_id.'",receiver_ids)')
        ->orderBy('id', 'DESC')
        ->offset($offset)
        ->limit($items_per_page)->get();

        foreach($notifications as $k => $item){
          $notifications[$k]['notifyDate'] = date('m/d/Y g:i A',strtotime($item['created_at']));
          
           if($notifications[$k]['sender_id'] > 0){
              $senderInfo = DRIVER::find($notifications[$k]['sender_id']);
              
              $notifications[$k]['senderImg'] = 'https://turvy.net/'.$senderInfo->avatar;
              if($senderInfo->avatar == ""){
                $notifications[$k]['senderImg'] = 'https://turvy.net/images/no-person.png';
              }
              
              $notifications[$k]['senderName'] = $senderInfo->first_name.' '.$senderInfo->last_name;
          }
        }

        if($notifications){
            return response()->json([
                'status' => 1,
                'message' => 'Rider Messages',
                'datetime' => date('Y-m-d H:i'),
                'data' => $notifications
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Rider Messages not found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
        
    }//end of fun
    
    
 /**
    * get rider inbox messages
    * sent by admin push notification
    * @response - JSON object    
    * @call from MyMessages.js
    */
    public function getunreadmessagesCount(){
       $rider_id = Auth::guard('api')->user()->id;
		 
        $notifications = Notification::where('user_type', 1)->where('is_read',0)
        ->whereRaw('FIND_IN_SET("'.$rider_id.'",receiver_ids)')
        ->count();

     		$data['count'] = $notifications; 
        if($notifications){
            return response()->json([
                'status' => 1,
                'message' => 'Rider Messages',
                'datetime' => date('Y-m-d H:i'),
                'data' => $data
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Rider Messages not found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
        
    }//end of fun
    
    
    public function getMessagesBYBooking(Request $request){
    	$rider_id = Auth::guard('api')->user()->id;
    	
    	$notifications = Notification::where('bookId', $request->bookId)
        ->get();
       // $data['messages'] = $notifications; 
        foreach($notifications as $k => $item){
        	   $messages[$k]['body'] = $item->content;
        	   if($item->type == 1){
        	   	 $messages[$k]['from'] = 'rider';
        	   }else{
        	   	 $messages[$k]['from'] = 'driver';
        	   }
        }
        $data['messages'] = $messages; 
      if($notifications){
            return response()->json([
                'status' => 1,
                'message' => 'Rider Messages For Booking',
                'datetime' => date('Y-m-d H:i'),
                'data' => $data
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Rider Messages not found For Booking',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
        
    	
    }
    
    
     public function sendmessages(Request $request)
    {
 	
 		$rider_id = Auth::guard('api')->user()->id;
 		$riders = Auth::guard('api')->user();
 		
 		$date = date('Y-m-d H:i:s');
 		 
      $Notification = new Notification;
      
      //$heading_text = 'Rider message from '.$riders->name;
      $heading_text =  '';
      
      $Notification->heading =  $heading_text;
      $Notification->content =   $request->messageText;
      $Notification->type =  1;
      $Notification->user_type = 2;
      $Notification->receiver_ids = $request->receiver_id;
      $Notification->sender_id = $riders->id;
      
      if(isset($request->book_id)){
      		$Notification->bookId = $request->book_id; 
      }
      
     
      $Notification->created_at = $date;
      $Notification->updated_at = $date;
     
      if( $Notification->save()){
      	$notificationdata = array();
      	  $notificationdata['title'] = 'New message arrive from rider';
	        $notificationdata['body'] = $request->messageText;
	        $notificationdata['image'] = '';
	        $notificationdata['screen'] = 'Inbox';
	        $notificationdata['messageFrom'] = 'Rider';
	        $notificationdata['rider_id'] = $riders->id;
	        $notificationdata['driver_id'] = $request->receiver_id;
           $notificationdata['showBadge'] = 1;
      	 /*$data['title'] = $heading_text;
      	 $data['desc_body'] =  $request->messageText;
      	 $data['url'] = '';
      	 $data['image'] = '';
      	 */	
      	 $driverslist = array();
      	if($request->receiver_id > 0){
      		$driverslist_data = Driver::where('id',$request->receiver_id)->first();
      		/*print"<pre>";
      		print_r($driverslist_data);
      		exit;
      		*/
      		$driverslist[] =  $driverslist_data->device_token;
      	}
      	try {
      	$this->sendpush_notification($notificationdata,$driverslist);
         return response()->json([
            'status' => 1,
            'message' => 'Message Sent ',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
        }catch (Exception $e) {
        	return response()->json([
            'status' => 1,
            'message' => 'Error sending push notification',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
        }
        
      }else{
      	return response()->json([
            'status' => 1,
            'message' => 'Error sending message',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
      }
  
    } // end of function
    
    public function updateUnreadMessage(Request $request)
    {
 	
 		$rider_id = Auth::guard('api')->user()->id;
 		
      $resp = Notification::where('user_type', 1)->where('is_read',0)
        ->whereRaw('FIND_IN_SET("'.$rider_id.'",receiver_ids)')->update(['is_read'=>1]);
      
      
      if($resp){
         return response()->json([
            'status' => 1,
            'message' => 'Message Status update',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
      }else{
      	return response()->json([
            'status' => 1,
            'message' => 'Message status not update',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
      }
  
    } // end of function
    
    public function sendpush_notification($data,$driverslist){
    
	    $notification = array(
	        'priority' => 1,
	        'forceShow' => true, 
	        'title' => $data['title'],
	        'body' => $data['body'],
	        'sound' => 'default',      
	        'badge' => '1',
	        "image" => $data['image'],
	    );

        /*$data = array(
            'title' => $data['title'],
            'body' => $data['desc_body'],
            'showBadge' => 1,
        );
        */
	    
	    $fields = array(
	        'registration_ids' => $driverslist,
	         'notification' => $notification,
             'data' => $data,
	    );
	
	    $json = json_encode($fields);
	    
	    define('FIREBASE_SERVER_KEY', 'AAAAljjxk68:APA91bG7pN7o12_vzPglObOFi64smER2mm-HTj6LVgBQ149RCCpFAshSW-f24c2Iu8i6FEFDHiF80nzV8FMcIrGNbIEj4_Ngw6C3O48lpzRKlg419yUB1XgJLQuOIPC8V-kkEpmg2et2');

		 $url = 'https://fcm.googleapis.com/fcm/send';

	    //building headers for the request
	    $headers = array(
	        'Authorization: key=' . FIREBASE_SERVER_KEY,
	        'Content-Type: application/json'
	    );
	
	    //Initializing curl to open a connection
	    $ch = curl_init();
	
	    //Setting the curl url
	    curl_setopt($ch, CURLOPT_URL, $url);
	    
	    //setting the method as post
	    curl_setopt($ch, CURLOPT_POST, true);
	
	    //adding headers 
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	    //disabling ssl support
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    
	    //adding the fields in json format 
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	
	    //finally executing the curl request 
	    $result = curl_exec($ch);
	    if ($result === FALSE) {
	        die('Curl failed: ' . curl_error($ch));
	    }
	
	    //Now close the connection
	    curl_close($ch);
	        
    }  // end of function
    
    public function getDriverRating($driver_id)
    {
        $count = RiderRating::where('driver_id',$driver_id)->get()->count();
        $sum = RiderRating::where('driver_id',$driver_id)->sum('rating');
        if($count > 0)
            $rating = number_format($sum/$count,1);
        else
            $rating = 0.0;
        return response()->json([
          'status' => 1,
          'message' => 'Driver rating',
          'datetime' => date('Y-m-d H:i'),
          'data' => $rating
        ]);

    }//end of fun
    
    
    function getRateAnsStr($rate, $opt)
    {
        $array[1] = 'Yes';
        $array[2] = 'No';

        $array1[1] = 'No face cover or mask';
        $array1[2] = 'Late for pickup';
        $array1[3] = 'Disrespectful';
        $array1[4] = 'Conversation';
        $array1[5] = 'Other';

        $act[] = '';

        if($rate <= 4){
            $act['que'] = 'What went wrong?';
            $act['ans']  = $array1[$opt];
        }else{
            $act['que'] = 'Was your rider wearing a mask?';
            $act['ans']  = $array[$opt];
        }
        return $act;

    }//end of fun
    
    public function addRiderAddress(Request $request )
    {
  
        $rider_id = Auth::guard('api')->user()->id;
        $rideraddresscount = RiderAddresses::where('rider_id',$rider_id)->get()->count();
        $rideraddressexist = RiderAddresses::where('address',trim($request->address))->get()->count();
        if($rideraddressexist <= 0 && $request->addresastype == 'source-dest' ){
      
	        if($rideraddresscount >= 3) {
	        	$rideraddress = RiderAddresses::where('rider_id',$rider_id)->orderBy('id', 'ASC')->first();
	        	if(isset($rideraddress->id)){
	        		RiderAddresses::where('id', $rideraddress->id)->delete();
	        	}
	        }
	        $RiderAddresses = new RiderAddresses;
	        $RiderAddresses->rider_id =  $rider_id;
	        $RiderAddresses->address =  trim($request->address);
	        $RiderAddresses->coordinates =  json_encode($request->coordinates);
	        $RiderAddresses->addresastype =  $request->addresastype;
	        $RiderAddresses->save();
	        
	        return response()->json([
            'status' => 1,
            'message' => 'address Saved',
            'datetime' => date('Y-m-d H:i'),
            'data' => trim($request->address),
        ]);
        }else{
        	 if($request->addresastype != 'source-dest'){
        	 	  $RiderAddresses = new RiderAddresses;
		        $RiderAddresses->rider_id =  $rider_id;
		        $RiderAddresses->address =  trim($request->address);
		        $RiderAddresses->coordinates =  json_encode($request->coordinates);
		        $RiderAddresses->addresastype =  $request->addresastype;
		        $RiderAddresses->save();
        	 }
        	    
        		 return response()->json([
            'status' => 1,
            'message' => 'address already exist',
            'datetime' => date('Y-m-d H:i'),
            'data' => trim($request->address),
        ]);
        }
     
     } // end of function
     
    public function getRiderAddress()
    {
  
        $rider_id = Auth::guard('api')->user()->id;
        //$rideraddresscount = RiderAddresses::where('rider_id',$rider_id)->get()->count();
        $rideraddressList = RiderAddresses::where('rider_id',$rider_id)->get();
        $address_array = array();
        if(count($rideraddressList) > 0){
				foreach($rideraddressList as $kk=>$item){
					if($item->addresastype != 'source-dest'){
						$address_array[$kk]['structured_formatting']['main_text'] =$item->addresastype;
					}else{
						$address_array[$kk]['structured_formatting']['main_text'] ='';
					}
					
					$address_array[$kk]['structured_formatting']['secondary_text'] = $item->address;
					$address_array[$kk]['structured_formatting']['coordinates'] = $item->coordinates;
				   $cordinates = json_decode($item->coordinates,true);
				 //  print"<pre>";
				   //print_r($cordinates);
				   if(count($cordinates) > 0){
						$address_array[$kk]['latitude'] = floatval($cordinates['latitude']);
						$address_array[$kk]['longitude'] =floatval($cordinates['longitude']);
				   }
					
				}        
        } // end of function 
        
        return response()->json([
            'status' => 1,
            'message' => 'address Saved',
            'datetime' => date('Y-m-d H:i'),
            'data' => $address_array,
        ]);
     
     }
     
     public function addAStop(Request $request )
    {
        $rider_id = Auth::guard('api')->user()->id;
        $book = Appointment::find($request->book_id);
        
        if(isset($request->waypointslnglat)){
	        	if(count($request->waypointslnglat) > 0){
	        		$waypints = $request->waypointslnglat;
	        		foreach($waypints as $item){
	        			$MultiDestination = new MultiDestination;
	        			$MultiDestination->stop_lat = $item['latitude'];
	        			$MultiDestination->stop_lng = $item['longitude'];
	        			$MultiDestination->stopname = $item['stopname'];
	        			$MultiDestination->book_id = $request->book_id;
	        			$MultiDestination->save();
	        		} 
	        		$book->is_multidest = 1;
         		$book->save();
	        	}	
         }
         return response()->json([
            'status' => 1,
            'message' => 'address Saved',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book,
        ]);
    } // end of function
    
    
}