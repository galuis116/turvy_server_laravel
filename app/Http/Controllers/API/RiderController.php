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
use App\RiderCancelreason;
use App\User;
use App\Rewards;
use App\Feedback;
use App\RiderReward;
use Illuminate\Support\Facades\Validator;
use Auth;


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

    public function putProfileInfo(Request $request)
    {
        $id = Auth::guard('api')->user()->id;
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:14',
            'partner_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
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
        $rider->update($request->all());

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
        //$book->is_schedule = $is_schedule;
        $book->is_current =  $is_current;
        $book->is_manual = 0;
        $book->status = 0;
        $book->save();

        return response()->json([
            'status' => 1,
            'message' => 'Your ride booked.',
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
        $book->status = 2;
        $book->save();
        
        $riderCancel = new RiderCancelreason;
        $riderCancel->book_id = $book_id;
        $riderCancel->rider_id = $rider_id;
		$riderCancel->fee = $request->fee;
        $riderCancel->reason = '-';
        $riderCancel->save();
      
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
       
        $feedback->status = 0;
        $feedback->save();

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
        $bookApp->save();
      
        $book = Appointment::find($book_id);
        $requestPayment = new PaymentRequest();
        $requestPayment->appointment_id = $book_id;
        $requestPayment->driver_id = $book->driver_id;
        $requestPayment->rider_id = $book->rider_id;
        $requestPayment->payment_method_id = $request->payment_method_id;
        $requestPayment->type = $request->type;
        if ($request->type != 'TIP') {
            $requestPayment->total = $request->amount;
            $requestPayment->surge = $request->surge_charge;
            /*if ($book->is_current == 0 && $book->is_manual == 1) {
                // Get driver commission
                if (!is_null($book->surge_charge))
                    $requestPayment->surge = $request->amount * $book->surge_charge / 100;
            } else {
                $requestPayment->surge = 0;
            }
           */
        } else {
            $requestPayment->total = $request->amount;
            $requestPayment->surge = 0;
        }
        $requestPayment->status = 1;
        $requestPayment->save();
        
        
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
        
          $ridesFormat =   $Appointment->getRides($type, $rider_id,$page);

        return response()->json([
            'status' => 1,
            'message' => 'Your rides.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $ridesFormat
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
    	  
    	   return response()->json([
            'status' => 1,
            'message' => $message,
            'datetime' => date('Y-m-d H:i'),
            'data' => $booksdata
        ]);
    }
  
    public function assigndriver(Request $request, $book_id)
    {
       $bkdecline = BookDecline::where('booking_id',$book_id)->where('driver_id',$request->driver_id)->where('declineBy','=','manual')->first();
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
         $book = Appointment::find($book_id);
         $book->driver_id = $request->driver_id;
         $book->save();
      
          return response()->json([
              'status' => 1,
              'message' => 'Driver Assign',
              'datetime' => date('Y-m-d H:i'),
              'data' => null
          ]);
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
		 if($paymentsInfo){
		 	$total = $paymentsInfo->total;
		 }	       
       
       // get rider reward info 
       $riderreward = RiderReward::first();  
       
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
		     $pathwitext =  $base.$filepath.".".$fileExtension;
    	 	  move_uploaded_file($_FILES['photo']['tmp_name'],$pathwitext);
    	 	//$avtar = upload_file($_FILES, 'user/rider');
    	 	$user = User::find($rider_id);
    	 	$user->avatar = $filepath.".".$fileExtension;
         $user->save();
         
    	 }
    	
    	 $data['ext'] = $rider_id;
    	 return json_encode($data);
    }
    
    public function riderRewardpoints(){
    	
    	$rider_id = Auth::guard('api')->user()->id;
		$rewardsinfo = Rewards::where('rider_id', $rider_id)->first();
		
		if($rewardsinfo){
        return response()->json([
           'status' => 1,
           'message' => 'points available',
           'datetime' => date('Y-m-d H:i'),
           'data' => $rewardsinfo,
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
     
      public function deductRewardpoints(Request $request){
 		
 		$rider_id = Auth::guard('api')->user()->id;
 		
 		$remainingpoints = floatval($request->remaingamount)/0.20;
 		$usedamount = $remainingpoints*15;
 		$updatearr = array();
 		$updatearr['amount'] = $usedamount;
 		$updatearr['point'] = $remainingpoints;
 		
		$res = Rewards::where('rider_id', $rider_id)->update($updatearr);   	
 		if($res){
        return response()->json([
           'status' => 1,
           'message' => 'points deducted',
           'datetime' => date('Y-m-d H:i'),
           'data' => $remainingpoints,
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
}