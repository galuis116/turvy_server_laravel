<?php

namespace App\Http\Controllers\API;

use App\Appointment;
use App\Driver;
use App\DriverLocation;
use App\BookDecline;
use App\DriverVehicle;
use App\PaymentRequest;
use App\DriverRating;
use App\VehicleType;
use App\VehicleMake;
use App\VehicleModel;
use App\Comment;
use App\DriverBank;
use App\DocumentState;
use App\Document;
use App\DriverDocument;
use App\Feedback;
use App\City;
use App\Country;
use App\State;
use App\RiderRating;
use App\DriverPoints;
use App\DrivingTime;
use App\Setting;
use App\MultiDestination;
use App\Queue;
use App\Peaktime;
use App\Notification;
use App\DriverTransactions;
use App\RiderTransaction;
use App\User;
use App\Airport;
use Twilio\Rest\Client;
use Twilio\TwiML\VoiceResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Fare;

class DriverController extends Controller
{
    public function onlineDriver(Request $request){
        $driver = Auth::guard('apidriver')->user();

        $drTime = DrivingTime::where('driver_id', $driver->id)
        ->whereDate('created_at', Carbon::today())
        ->first();

        if(!$drTime){
            $drTime = new DrivingTime;
            $drTime->driver_id = $driver->id;
            $drTime->created_at = date('Y-m-d H:i:s');
            $drTime->driving_time = 43200;
            $drTime->offline_time = 0;
            $drTime->driverOnlineTime = date('Y-m-d H:i:s');
            $drTime->drivingTimeDiff = date('Y-m-d H:i:s');
            $drTime->save();
        }else{
            $drTime->driverOnlineTime = date('Y-m-d H:i:s');
            $drTime->drivingTimeDiff = date('Y-m-d H:i:s');
            $drTime->save();
        }

        // Get POST data
        $lat = $request->lat;
        $lng = $request->lng;

        $rl = DriverLocation::where('driverId', $driver->id)->first();
        if($rl)
        {
            $rl->lat = $lat;
            $rl->lng = $lng;
            $rl->save();
        }
        else
        {
            DriverLocation::create([
                'driverId' => $driver->id,
                'lat' => $lat,
                'lng' => $lng,
            ]);
        }
        $driver_timeout = Setting::find(2,['value']);

        $socket = $this->getPusherSocket();

        $data['name'] = $driver->name;
        $data['id'] = $driver->id;
        $data['latitude'] = $lat;
        $data['longitude'] = $lng;
        $data['status'] = 'Online';        
        $socket->trigger('turvy-channel', 'driver_online_event', $data);


        return response()->json([
            'status' => 1,
            'message' => 'Store your location into our system.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driver_timeout,
        ]);
    }

    public function offlineDriver(){
        $driver = Auth::guard('apidriver')->user();
        DriverLocation::where('driverId', $driver->id)->delete();

        $socket = $this->getPusherSocket();
        $data['name'] = $driver->name;
        $data['id'] = $driver->id;
        $data['status'] = 'Offline';
        $socket->trigger('turvy-channel', 'driver_offline_event', $data);

        $drTime = DrivingTime::where('driver_id', $driver->id)
        ->whereDate('created_at', Carbon::today())
        ->first();

        if($drTime){
            $drTime->driverOfflineTime = date('Y-m-d H:i:s');
            $drTime->save();
        }

        return response()->json([
            'status' => 1,
            'message' => 'You are released from our obseverablity.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function getDriverInfo(){
        $driver = Auth::guard('apidriver')->user();
        return response()->json([
            'status' => 1,
            'message' => 'Driver personal info.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driver
        ]);
    }

    public function putProfileInfo(Request $request){
        $id = Auth::guard('apidriver')->user()->id;
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors(),
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        $driver = Driver::find($id);
        $driver->update($request->all());

        return response()->json([
            'status' => 1,
            'message' => 'Driver profile updated.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driver
        ]);
    }

    public function updateDevice(Request $request){
        $driver = Driver::find(Auth::guard('apidriver')->user()->id);
        $driver->device_type = $request->device_type;
        $driver->device_token = $request->device_token;
        $driver->update();

        return response()->json([
            'status' => 1,
            'message' => 'Device information has been updated.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function acceptBook($book_id)
    {
        $ride = Appointment::find($book_id);
        $ride->driver_id = Auth::guard('apidriver')->user()->id;
        $ride->status = 1;
        $ride->start_time = date('Y-m-d H:m:s');
        $ride->save();

        $socket = $this->getPusherSocket();
        $data['book_id'] = $book_id;        
        $data['status'] = 'Book Accept';
        $socket->trigger('turvy-channel', 'book_accept_event', $data);

        return response()->json([
            'status' => 1,
            'message' => 'Accepted',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }

    public function declineBook(Request $request, $book_id, $driver)
    {
      
        $BookDecline = new BookDecline;
        $BookDecline->booking_id = $book_id;
        $BookDecline->driver_id = (int)$driver;
        $BookDecline->declineBy = $request->declineBy;
        $BookDecline->save();

        $socket = $this->getPusherSocket();
        $data['book_id'] = $book_id;
        $data['status'] = 'Book Decline';
        $socket->trigger('turvy-channel', 'book_decline_event', $data);

        // remove this deriver from queue of this ride
        return response()->json([
            'status' => 1,
            'message' => 'Declined',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }


    public function cancelBook(Request $request, $book_id)
    {
        
        $driver_id = Auth::guard('apidriver')->user()->id;

        $reason = $request->reason;
        $ride = Appointment::find($book_id);
        $ride->status = 0;
        $ride->cancel_reason = $reason;
        $ride->save();
        
        $BookDecline = new BookDecline;
 		  $BookDecline->cancel_reason = $reason;
 		  $BookDecline->declineBy = 'aftercancel';
 		  $BookDecline->booking_id = $book_id;
 		  $BookDecline->driver_id =$driver_id;
 		  $BookDecline->save();

        $transactionsInfo = DriverTransactions::where('driver_id',$driver_id)
        ->where('status','active')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->first();

        $cancelAmt = -15;
        $total_amount = $cancelAmt;
        
        if($transactionsInfo){
            $total_amount = $transactionsInfo->total_amount + $cancelAmt;
        }

        $transactions = new DriverTransactions;
        $transactions->driver_id = $driver_id;
        $transactions->rider_id = $request->rider_id;
        $transactions->book_id = $book_id;
        $transactions->amount = $cancelAmt;
        $transactions->total_amount = $total_amount;
        $transactions->pay_type = 'self_cancel';
        $transactions->status = 'active';
        $transactions->save();



        //add cancel fee to rider.
        $riderTransactionsInfo = RiderTransaction::where('rider_id',$request->rider_id)
        ->where('status','active')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->first();

        $cancelAmt = 12;
        $total_amount = $cancelAmt;
        
        if($riderTransactionsInfo){
            $total_amount = $riderTransactionsInfo->total_amount + $cancelAmt;
        }

        $riderTransactions = new RiderTransaction;        
        $riderTransactions->rider_id = $request->rider_id;
        $riderTransactions->book_id = $book_id;
        $riderTransactions->amount = $cancelAmt;
        $riderTransactions->total_amount = $total_amount;
        $riderTransactions->pay_type = 'driver_cancel';
        $riderTransactions->status = 'active';
        $riderTransactions->save();

        $socket = $this->getPusherSocket();
        $data['book_id'] = $book_id;
        $data['status'] = 'Book cancel after accept';
        $socket->trigger('turvy-channel', 'book_aftercancel_event', $data);

        return response()->json([
            'status' => 1,
            'message' => 'Cancelled.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);


    }

    public function endBook(Request $request, $book_id)
    {
        
        $duration = ($request->trip_duration * 60);

        $trip_distance = $request->trip_distance;
        
        //waiting time in sec
        $waitingTime = $request->waitingTime;

        $ride = Appointment::find($book_id);

        if($trip_distance <= 0){
            $trip_distance = $ride->trip_distance;
        }

        $ride->status = 3;
        $ride->end_time = date('Y-m-d H:i:s');
        $ride->trip_distance = $trip_distance;
        $ride->trip_duration = $duration;
        $ride->save();
        
        $tripFare = $this->calculateTripAmount($trip_distance, $ride->servicetype_id, $waitingTime);
        

        if($request->endStatus === 'violent'){
            $socket = $this->getPusherSocket();
            $data['book_id'] = $book_id;
            $data['driver_id'] = $ride->driver_id;
            $data['status'] = 'End trip Violant';
            $data['subTotal'] = $tripFare['subTotal'];
            $data['surcharge'] = $tripFare['surcharge'];
            $data['totalAmount'] = number_format($tripFare['totalAmount'] + 15,2);
            $data['violentCharge'] = 15;
            $data['tripDistance'] = number_format($trip_distance,2);
            //$data['allFareCalc'] = $tripFare;
            $socket->trigger('turvy-channel', 'violent_end_trip_event', $data);
        }else{
            $socket = $this->getPusherSocket();
            $data['book_id'] = $book_id;
            $data['driver_id'] = $ride->driver_id;
            $data['status'] = 'End trip';
            $data['subTotal'] = $tripFare['subTotal'];
            $data['surcharge'] = $tripFare['surcharge'];
            $data['totalAmount'] = number_format($tripFare['totalAmount'],2);
            $data['tripDistance'] = number_format($trip_distance,2);
            //$data['allFareCalc'] = $tripFare;
            $socket->trigger('turvy-channel', 'end_trip_event', $data);
        }

        $points = DriverPoints::where('driver_id',$ride->driver_id)
        ->where('status','active')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->first();

        if($points){
            $points->total_points = $points->total_points + 1;
            $points->save();
        }else{
            $points = new DriverPoints;
            $points->total_points = 1;
            $points->driver_id = $ride->driver_id;
            $points->status = 'active';
            $points->created_at = date('Y-m-d H:i:s');
            $points->save();
        }

        

        $PaymentRequest = PaymentRequest::where('appointment_id', $ride->id)
        ->where('type', 'Book')
        ->first();

        $violentAmt = 0;

        if($request->endStatus === 'violent'){
            $violentAmt = 15;
        }

        if($PaymentRequest){

            /* $surgeinfo['id'] = $tripFare['id'];
            $surgeinfo['state_id'] = $tripFare['id'];
            $surgeinfo['servicetype_id'] = $tripFare['id'];
            $surgeinfo['company_commission'] = $tripFare['id'];
            $surgeinfo['base_ride_distance'] = $tripFare['id'];
            $surgeinfo['base_ride_distance_charge'] = $tripFare['id'];
            $surgeinfo['price_per_unit'] = $tripFare['id'];
            $surgeinfo['gst_charge'] = $tripFare['id'];
            $surgeinfo['fuel_surge_charge'] = $tripFare['id'];
            $surgeinfo['nsw_gtl_charge'] = $tripFare['id'];
            $surgeinfo['nsw_ctp_charge'] = $tripFare['id'];
            $surgeinfo['booking_charge'] = $tripFare['id'];
            $surgeinfo['baby_seat_charge'] = $tripFare['id'];
            $surgeinfo['pet_charge'] = $tripFare['id']; */

            /* $surgeinfo['price_per_minute'] = $tripFare['id'];
            $surgeinfo['fee_waiting_time'] = $tripFare['id'];
            $surgeinfo['waiting_price_per_minute'] = $tripFare['id'];
            $surgeinfo['cancel_charge'] = $tripFare['id'];
            $surgeinfo['minimum_fare'] = $tripFare['id'];
            $surgeinfo['after_minimum_fare'] = $tripFare['id'];
            $surgeinfo['status'] = $tripFare['id'];
            $surgeinfo['created_at'] = $tripFare['id'];
            $surgeinfo['updated_at'] = $tripFare['id'];
            $surgeinfo['distance'] = $tripFare['id'];
            $surgeinfo['currency'] = $tripFare['id']; */

            $surgeinfo = json_encode($tripFare);

            $PaymentRequest->subtotal = $tripFare['subTotal'];
            $PaymentRequest->surge = $tripFare['surcharge'];
            $PaymentRequest->total = $tripFare['totalAmount'] + $violentAmt;
            $PaymentRequest->violant_end = $violentAmt;
            $PaymentRequest->surgeinfo = $surgeinfo;
            $PaymentRequest->waitingTime = $request->waitingTime;
            $PaymentRequest->save();
        }

        $transactionsInfo = DriverTransactions::where('driver_id',$ride->driver_id)
        ->where('status','active')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->first();

        $amount = $tripFare['driverAmount'];
        if($request->endStatus === 'violent'){
            $amount = $amount + 12;
        }

        $total_amount = $amount;
        
        if($transactionsInfo){
            $total_amount = $transactionsInfo->total_amount + $amount;
        }

        $transactions = new DriverTransactions;
        $transactions->driver_id = $ride->driver_id;
        $transactions->rider_id = $request->rider_id;
        $transactions->book_id = $book_id;
        $transactions->amount = $amount;
        $transactions->total_amount = $total_amount;
        $transactions->company_amount = $tripFare['company_amount'];
        $transactions->charity_amount = $tripFare['charity_amount'];
        $transactions->pay_type = 'trip';
        $transactions->status = 'active';
        $transactions->save();

        return response()->json([
            'status' => 1,
            'message' => 'Success.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $data
        ]);
    }

    public function calculateTripAmount($distance=0, $servicetype_id, $waiting_time=0)
    {
        if($servicetype_id <= 0)
            return false;

        $fare = Fare::where('servicetype_id', $servicetype_id)->first();

        $arr = [];

        if($fare){

            $arr['id'] = $fare->id;
            $arr['state_id'] = $fare->state_id;
            $arr['servicetype_id'] = $fare->servicetype_id;
            $arr['base_ride_distance'] = $fare->base_ride_distance;
            $arr['base_ride_distance_charge'] = $fare->base_ride_distance_charge;
            $arr['price_per_unit'] = $fare->price_per_unit;
            $special_charges = 0;

            //only for TurvyFM
            $arr['baby_seat_charge'] = 0;
            $arr['pet_charge'] = 0;
            if($fare->baby_seat_charge > 0){
                $special_charges = $fare->baby_seat_charge;
                $arr['baby_seat_charge'] = $fare->baby_seat_charge;
            }
            //only for TurvyPET
            if($fare->pet_charge > 0){
                $special_charges = $fare->pet_charge;
                $arr['pet_charge'] = $fare->pet_charge;
            }

            $waiting_charge = 0;

            if($waiting_time > 0){
                $arr['waiting_time'] = $waiting_time;
                $waiting_time_in_mi = $waiting_time / 60;
                $arr['waiting_charge'] = $waiting_time_in_mi * $fare->waiting_price_per_minute;

                $waiting_charge = $arr['waiting_charge'];
                $arr['waiting_charge'] = number_format($arr['waiting_charge'],2);
            }

            //$price_per_unit = $fare->price_per_unit;

            $tripDistance = floatval($distance);

            $subTotal = $fare->price_per_unit * $tripDistance;

            //if trip distance less than base fare 
            if($tripDistance <= $fare->base_ride_distance){
                $tripDistance = $fare->base_ride_distance;
                $subTotal = $fare->base_ride_distance_charge;
            }
            
            
            //fuel charge per/KM
            //admin do not take commission from fuel charges
            $fuel_surge_charge = $fare->fuel_surge_charge * $tripDistance;
            $arr['fuel_surge_charge'] = $fuel_surge_charge;

            //ctp charge per/KM
            $nsw_ctp_charge  = $fare->nsw_ctp_charge * $tripDistance;
            $arr['nsw_ctp_charge'] = $nsw_ctp_charge;

            $surcharge = $fare->nsw_gtl_charge 
            + $nsw_ctp_charge
            + $fare->booking_charge 
            + $special_charges
            + $waiting_charge;
            
            $arr['nsw_gtl_charge'] = $fare->nsw_gtl_charge;
            $arr['booking_charge'] = $fare->booking_charge;
            

            //GST calculate on subtotal with other charges
            $gst = floatval($fare->gst_charge);
            $gstCal = ($subTotal+$surcharge+$fuel_surge_charge) * ($gst/100);
            
            $arr['gst_charge'] = $fare->gst_charge;
            $arr['gst_amt'] = $gstCal;

            $surcharge = $surcharge + $gstCal;

            
            $arr['subTotal'] = $subTotal;
            $arr['surcharge'] = $surcharge;
            $arr['totalAmount'] = $subTotal + $surcharge;
            
            $arr['subTotal'] = number_format($arr['subTotal'],2);
            $arr['surcharge'] = number_format($arr['surcharge'],2);
            $arr['totalAmount'] = number_format($arr['totalAmount'],2);
            

            $company_commission = floatval($fare->company_commission);
            $totalAmt = $arr['totalAmount'];

            $company_amount = ($totalAmt * ($company_commission/100));
            $charity_amount =  ($company_amount * (5/100));

            $driverAmount = ($totalAmt - $company_amount) + $fuel_surge_charge;

            $company_amount = $company_amount - $charity_amount;
            
            $arr['driverAmount'] = number_format($driverAmount,2);
            $arr['company_amount'] = number_format($company_amount,2);
            $arr['charity_amount'] = number_format($charity_amount,2);
        }
        return $arr;

    }//end of fun
    
    
    	//change password
  	public function changePassword(Request $request){
      	$id = Auth::guard('apidriver')->user()->id;
        
        $validator = Validator::make($request->all(), [            
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);
        if($validator->fails())
        {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        }      
      	
	    $new = $request->new_password;
	    $confirm = $request->confirm_password;      
      	$driver = Driver::find($id);
      	if($new == $confirm){
          $driver->password = Hash::make($new);
          $driver->save();
          
        }else{
          //return redirect()->back()->withInput()->withErrors('Your password and confirmation password do not match.');
          return response()->json(['status' => 0, 'message' => 'Your password and confirmation password do not match.']);
        }
      
      	return response()->json(['status' => 1, 'message' => 'Password Updated', 'data' => $driver]);
    }//end of fun
  
  	public function getBookingforDriver($book_id)
    {
        $driver_id = Auth::guard('apidriver')->user()->id;   

        $rl = DriverLocation::where('driverId', $driver_id)->first();  

        if(!$rl){
            return response()->json([
                'status' => 0,
                'message' => 'Driver Booking Not found',
                'datetime' => date('Y-m-d H:i A'),
                'data' => null
                ]);
        }   
       
        //$bookings = Appointment::where('status','0')->where('driver_id',$driver_id)->first();
        $BookDecline = new BookDecline;
    	$bookings = $BookDecline->getnotDeclineRide($driver_id, $book_id);
       
        if($bookings){
            if($bookings->is_multidest === 1){
                $multdest = MultiDestination::where('book_id', $bookings->id)
                ->get(['stop_lat','stop_lng','stopname']);

                foreach($multdest as $k => $val){
                    $multdest[$k]->latitude = $val['stop_lat'];
                    $multdest[$k]->longitude = $val['stop_lng'];
                }

                $bookings->multdest = $multdest;
            }else{
                $bookings->multdest = null;
            }
          
            return response()->json([
                'status' => 1,
                'message' => 'Driver Booking',
                'datetime' => date('Y-m-d H:i A'),
                'data' => $bookings
            ]);
        }else{
         
            return response()->json([
                'status' => 0,
                'message' => 'Driver Booking Not found',
                'datetime' => date('Y-m-d H:i A'),
                'data' => null
                ]);
       }
     
       
	    /*if($recordfound == 1){
           return response()->json([
            'status' => 1,
            'message' => 'Driver Booking',
            'datetime' => date('Y-m-d H:i'),
            'data' => $booknew
        ]);
        }else{
           return response()->json([
            'status' => 0,
            'message' => 'Driver Booking Not found',
            'datetime' => date('Y-m-d H:i'),
            'data' => $booknew
        ]);
        }
        */
       
        
    }
  
  public function getdriverVeh($driver_id = 0){
    //$id = Auth::guard('apidriver')->user()->id;
    if($driver_id > 0){
      //->groupBy('driver_vehicles.driver_id','driver_vehicles.id')
      $driveveh = DriverVehicle::select('driver_vehicles.*','vehicle_makes.name as makename','vehicle_models.name as modelname')
       ->leftJoin('vehicle_makes', 'vehicle_makes.id', '=','driver_vehicles.make_id') 
       ->leftJoin('vehicle_models', 'vehicle_models.id', '=','driver_vehicles.model_id') 
        ->where('driver_id',$driver_id)
       
        ->first();
      return response()->json([
            'status' => 1,
            'message' => 'Driver Vehcile Info',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driveveh
         ]);
    }else{

         return response()->json([
            'status' => 0,
            'message' => 'Driver Booking Not found',
            'datetime' => date('Y-m-d H:i'),
             'data' => null
         ]);
    }
  }
  
  	public function getDriverEarning($page)
    {
        $driver_id = Auth::guard('apidriver')->user()->id;        

        $items_per_page = 10;
        $offset = ($page - 1) * $items_per_page;

        $transactions = DriverTransactions::where('driver_id',$driver_id)
        ->where('status','active')
        ->orderBy('id', 'DESC')
        ->offset($offset)
        ->limit($items_per_page)
        ->get();
      
      	$grantAmt = 0;
      	foreach($transactions as $k => $item){
            $transactions[$k]['isPositive'] = ($item['amount'] > 0) ? 'Yes' : 'No';
            $transactions[$k]['transactionDate'] = date('d/m/Y h:i A',strtotime($item['created_at']));
            $transactions[$k]['amount'] = ($item['amount'] + $item['tip_amount']);
            $transactions[$k]['amount'] = number_format($transactions[$k]['amount'],2);
            $transactions[$k]['amount'] = ($transactions[$k]['amount'] > 0) ? 'A$'.$transactions[$k]['amount'] : str_replace('-', '-A$', $transactions[$k]['amount']);

            $transactions[$k]['pay_type'] = $this->getTransactionText($item['pay_type']);



        }

        $transactionsInfo = DriverTransactions::where('driver_id',$driver_id)
        ->where('status','active')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->first();

        //$grantAmt = number_format($grantAmt,2);      
        $grantAmt = number_format($transactionsInfo->total_amount,2);

        $grantAmt = ($grantAmt > 0) ? '$'.$grantAmt : str_replace('-', '-$', $grantAmt);

        $driver_points = $this->getDriverPoints($driver_id);
       
       if($transactions){          
          return response()->json([
              'status' => 1,
              'message' => 'Driver Earning Data',
              'grantAmt' => $grantAmt,	
              'driver_points' => $driver_points,
              'datetime' => date('Y-m-d H:i:s'),
              'data' => $transactions
          ]);
        }else{         
         	return response()->json([
              'status' => 0,
              'message' => 'Records Not found',
              'datetime' => date('Y-m-d H:i:s'),
              'data' => null
            ]);
       	}
        
    }//end of fun
  
  	/**
     * Driver is able to give the rate, feedback to the rider
     * @params - rate, feedback
     * @response - JSON object
     */
    public function feedbackTrip(Request $request, $book_id)
    {
        // Driver feedback
        $book = Appointment::find($book_id);
        $feedback = new DriverRating();
        $feedback->book_id = $book_id;
        $feedback->driver_id = $book->driver_id;
        $feedback->rider_id = $book->rider_id;
        $feedback->rating = $request->rate;
        if($request->comment != ''){
            $feedback->comment = $request->comment;
        }else{
            $feedback->comment = '';
        }
        
        $arr = $this->getRateAnsStr($feedback->rating, $request->option);

        $feedback->que = $arr['que'];
        $feedback->ans = $arr['ans'];
        
        $feedback->status = 0;
        $feedback->save();

        $notifications = new Notification;
        $date = date('Y-m-d H:i:s');
        
        $notifications->heading = 'You got '.$request->rate.' star';
        $notifications->content = 'Driver rate you '.$request->rate.' star for trip';
        $notifications->type = 3;
        $notifications->user_type = 1;
        $notifications->receiver_ids = $book->rider_id;
        $notifications->sender_id = $book->driver_id;
        $notifications->created_at = $date;
        $notifications->updated_at = $date;
        $notifications->save();

        return response()->json([
            'status' => 1,
            'message' => 'Your feedback was submitted.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book
        ]);
    }//end of fun
  
  	/**
     * Check booking is cancel or not
     * @params - book_id
     * @response - JSON object
     */
  	public function checkTripStatus($book_id)
    {
      $book = Appointment::find($book_id,['status','cancel_reason']);
      //$book = Appointment::select('status')->where('id',$book_id)->first();      
      
      return response()->json([
            'status' => 1,        	
            'message' => 'Book status.',
            'datetime' => date('Y-m-d H:i'),
            'bookStatus' => $book->status,
            'reason' => $book->cancel_reason
        ]);
      
    }//end of fun
  
  	/**
     * Get driver services
     * @params - $driver_id
     * @response - JSON object
     */
  	public function getDriverServices($driver_id)
    {
    	$driveVehicle = DriverVehicle::where('driver_id',$driver_id)->first();
        
        $serviceTypes = VehicleType::where('status', 1)->get();

        $returnData = [];
        $openServices = [];
        if($driveVehicle['open_services']){
            $openServices = explode(',',$driveVehicle['open_services']);
        }

        if($driveVehicle['servicetype_id']){
            $driverServices = explode(',',$driveVehicle['servicetype_id']);
            $i=0;
            foreach($serviceTypes as $key => $val){
                if (strpos($driveVehicle['servicetype'], $val['name']) !== false) {
                    if (in_array($driverServices[$i], $openServices)){
                        $val['selected'] = 1;
                    }else{
                        $val['selected'] = 0;
                    }
                    //$val['selected'] = 1;
                    $returnData[$i] = $val;
                    $i++;
                }
            }
        }

        /*if($driveVehicle['servicetype_id']){
            foreach($serviceTypes as $key => $val){
                if (strpos($driveVehicle['servicetype'], $val['name']) !== false) {
                    $serviceTypes[$key]['selected'] = 1;
                }else{
                    $serviceTypes[$key]['selected'] = 0;
                }
            }
        }*/

      
        return response()->json([
          'status' => 1,
          'message' => 'Driver Vehcile Info',
          'datetime' => date('Y-m-d H:i'),
          'data' => $returnData
        ]);
    
    }//end of fun

    /**
     * update driver services
     * @params - request service ids comma separeted ,$driver_id
     * @response - JSON object
     */
    public function updateDriverServices(Request $request, $driver_id)
    {        
        $servicetype_id = rtrim($request->servicetype_id, ',');

        $driveVehicle = DriverVehicle::where('driver_id',$driver_id)->update(
            ['open_services' => $servicetype_id]
        );
        
        return response()->json([
          'status' => 1,
          'message' => 'Driver services updated',
          'datetime' => date('Y-m-d H:i'),
        ]);
    
    }//end of fun

    /**
     * get rider rating by rider_id
     * @params - rider_id
     * @response - JSON object
     */
    public function getRiderRating($rider_id)
    {
        $count = DriverRating::where('rider_id',$rider_id)->get()->count();
        $sum = DriverRating::where('rider_id',$rider_id)->sum('rating');
        if($count > 0)
            $rating = number_format($sum/$count,1);
        else
            $rating = 0.0;
        return response()->json([
          'status' => 1,
          'message' => 'Rider rating',
          'datetime' => date('Y-m-d H:i'),
          'data' => $rating
        ]);

    }//end of fun

    /**
     * Get latest Appointment data.
     * @params - book_id
     * @response - JSON object
     */
    public function getAppointmentData($book_id)
    {
      $book = Appointment::find($book_id);      
      
      return response()->json([
            'status' => 1,          
            'message' => 'Book status.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $book
        ]);
      
    }//end of fun

    /**
     * get rider rating by rider_id
     * @params - rider_id
     * @response - JSON object
     */
    public function getRiderRatingForFun($rider_id)
    {
        $count = DriverRating::where('rider_id',$rider_id)->get()->count();
        $sum = DriverRating::where('rider_id',$rider_id)->sum('rating');
        if($count > 0)
            $rating = number_format($sum/$count,1);
        else
            $rating = 0.0;

        return $rating;
    }//end of fun

    public function completedTrip($page)
    {
        $driver_id = Auth::guard('apidriver')->user()->id;
        
        $items_per_page = 10;
        $offset = ($page - 1) * $items_per_page;

        $bookings = Appointment::join('users','users.id','=','appointments.rider_id')
          ->where('appointments.status','3')
          ->where('driver_id',$driver_id)
          ->orderBy('appointments.id', 'DESC')
          ->offset($offset)
          ->limit($items_per_page)
          ->get(['appointments.*', 'users.avatar']);
      
        
        foreach($bookings as $k => $item){
          $bookings[$k]['bookingDate'] = date('d/m/Y h:i A',strtotime($item['created_at']));
          $bookings[$k]['totalAmt'] = ($item['payment_total'] + $item['payment_tip']);
          $bookings[$k]['totalAmt'] = number_format($bookings[$k]['totalAmt'],2);
          $bookings[$k]['payment_total1'] = number_format($item['payment_total'],2);
          $bookings[$k]['payment_tip1'] = number_format($item['payment_tip'],2);
          $bookings[$k]['rating'] = $this->getRiderRatingForFun($item['rider_id']);
          $bookings[$k]['arrivalTime'] = date('h:i A',strtotime($item['end_time']));
          $bookings[$k]['pickupTime'] = date('h:i A',strtotime($item['start_time']));
        }
       
        if($bookings){          
          return response()->json([
              'status' => 1,
              'message' => 'Driver completed Data',
              'datetime' => date('Y-m-d H:i:s'),
              'data' => $bookings
          ]);
        }else{         
            return response()->json([
              'status' => 0,
              'message' => 'Records Not found',
              'datetime' => date('Y-m-d H:i:s'),
              'data' => null
            ]);
        }

    }//end of fun

    public function canceledTrip($page)
    {
        $driver_id = Auth::guard('apidriver')->user()->id;

        $items_per_page = 10;
        $offset = ($page - 1) * $items_per_page;

        $bookings = Appointment::join('users','users.id','=','appointments.rider_id')
          ->where('appointments.status','2')
          ->where('driver_id',$driver_id)
          ->orderBy('appointments.id', 'DESC')
          ->offset($offset)
          ->limit($items_per_page)
          ->get(['appointments.*', 'users.avatar']);
      
        
        foreach($bookings as $k => $item){
          $bookings[$k]['bookingDate'] = date('d/m/Y h:i A',strtotime($item['created_at']));
          $bookings[$k]['totalAmt'] = ($item['payment_total'] + $item['payment_tip']);
          $bookings[$k]['totalAmt'] = number_format($bookings[$k]['totalAmt'],2);
          $bookings[$k]['payment_total1'] = number_format($item['payment_total'],2);
          $bookings[$k]['payment_tip1'] = number_format($item['payment_tip'],2);
          $bookings[$k]['rating'] = $this->getRiderRatingForFun($item['rider_id']);
          $bookings[$k]['arrivalTime'] = date('h:i A',strtotime($item['end_time']));
          $bookings[$k]['pickupTime'] = date('h:i A',strtotime($item['start_time']));
        }
       
        if($bookings){          
          return response()->json([
              'status' => 1,
              'message' => 'Driver completed Data',
              'datetime' => date('Y-m-d H:i:s'),
              'data' => $bookings
          ]);
        }else{         
            return response()->json([
              'status' => 0,
              'message' => 'Records Not found',
              'datetime' => date('Y-m-d H:i:s'),
              'data' => null
            ]);
        }

    }//end of fun

    public function upcomingTrip($page)
    {
        $driver_id = Auth::guard('apidriver')->user()->id;
        $items_per_page = 10;
        $offset = ($page - 1) * $items_per_page;
        $bookings = Appointment::join('users','users.id','=','appointments.rider_id')
          ->where('appointments.status','0')
          ->where('driver_id',$driver_id)
          ->where('is_current','0')
          ->orderBy('appointments.id', 'DESC')
          ->offset($offset)
          ->limit($items_per_page)
          ->get(['appointments.*', 'users.avatar']);
      
        
        foreach($bookings as $k => $item){
          $bookings[$k]['bookingDate'] = date('d/m/Y h:i A',strtotime($item['created_at']));
          $bookings[$k]['totalAmt'] = ($item['payment_total'] + $item['payment_tip']);
          $bookings[$k]['totalAmt'] = number_format($bookings[$k]['totalAmt'],2);
          $bookings[$k]['payment_total1'] = number_format($item['payment_total'],2);
          $bookings[$k]['payment_tip1'] = number_format($item['payment_tip'],2);
          $bookings[$k]['rating'] = $this->getRiderRatingForFun($item['rider_id']);
          $bookings[$k]['arrivalTime'] = date('h:i A',strtotime($item['end_time']));
          $bookings[$k]['pickupTime'] = date('h:i A',strtotime($item['start_time']));
        }

        
       
        if($bookings){          
          return response()->json([
              'status' => 1,
              'message' => 'Driver completed Data',
              'datetime' => date('Y-m-d H:i:s'),
              'data' => $bookings,        
          ]);
        }else{         
            return response()->json([
              'status' => 0,
              'message' => 'Records Not found',
              'datetime' => date('Y-m-d H:i:s'),
              'data' => null
            ]);
        }

    }//end of fun

    public function vehicleDetails()
    {
        $driver_id = Auth::guard('apidriver')->user()->id;

        $driveVehicle = DriverVehicle::where('driver_id',$driver_id)->first();
        if($driveVehicle->front_photo){
            $driveVehicle->front_photo = 'https://turvy.net/'.$driveVehicle->front_photo;
        }
        
        $vehicleMake = VehicleMake::find($driveVehicle->make_id);

        $vehicleModel = VehicleModel::find($driveVehicle->model_id);

        if($vehicleMake){
            $driveVehicle->make_name = $vehicleMake->name;
            $driveVehicle->make_image = $vehicleMake->image;
        }
        if($vehicleModel){
            $driveVehicle->model_name = $vehicleModel->name;
        }
        if($driveVehicle->open_services){
            $servicetype = [];
            $openService = explode(",", $driveVehicle->open_services);
            $serviceName = VehicleType::whereIn('id', $openService)->get();
            foreach($serviceName as $item){
                array_push($servicetype, $item->name);
            }
            //$driveVehicle->open_serviceName = implode(",", $servicetype);
            $driveVehicle->open_serviceName = $servicetype[0];
            //serviceName
            //$driveVehicle->serviceName = $servicetype;
        }

        if($driveVehicle){
            return response()->json([
                'status' => 1,
                'message' => 'Driver Vehicle Details',
                'datetime' => date('Y-m-d H:i:s'),
                'data' => $driveVehicle,                
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Driver Vehicle Details Not found',
                'datetime' => date('Y-m-d H:i:s'),
                'data' => null
            ]);
        }
        
    }//end of fun

    public function updateVehicleDetails(Request $request, $vehicle_id)
    {
        
        $validator = Validator::make($request->all(), [
            'make_id' => 'required',
            'model_id' => 'required',
            'plate' => 'required',
            'color' => 'required',
            'year' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors(),
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        $vehicle = DriverVehicle::find($vehicle_id);
        $vehicle->make_id = $request->make_id;
        $vehicle->model_id = $request->model_id;
        $vehicle->plate = $request->plate;
        $vehicle->color = $request->color;
        $vehicle->year = $request->year;
        $vehicle->update();

        return response()->json([
            'status' => 1,
            'message' => 'Vehicle information has been updated.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);

    }//end of fun

    //function used to save data for comments made by driver
    public function driverComments(Request $request)
    {
        $driver_id = Auth::guard('apidriver')->user()->id;
        $commentDataGet = $request->commentData;

        $comm = new Comment();        
        $comm->content = $commentDataGet;
        $comm->is_publish = 0;
        $comm->driver_id = $driver_id;

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
    }//end of fun

    
    /**
    * Update driver prifile image
    * @params - $_FILES array
    * @response - JSON object
    * @call from UploadImage.js
    */
    public function updateProfileImage(Request $request, $driver_id){
        
        /*$driver_id = Auth::guard('apidriver')->user()->id;
        return response()->json([
                'status' => 0,
                'message' =>  "Error in Image upload!",
                'datetime' => date('Y-m-d H:i'),
                'data' => $driver_id
            ]);*/
        if(isset($_FILES)){
            $file_name = time();
            $file_name .= rand();
            $file_name = sha1($file_name);
            $base = base_path();
            $filepath = "uploads/user/driver/".$file_name;
            $fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $pathwitext =  $base."/public/".$filepath.".".$fileExtension;
            move_uploaded_file($_FILES['photo']['tmp_name'],$pathwitext);
            //$avtar = upload_file($_FILES, 'user/rider');
            
            $driver = Driver::find($driver_id);
            $driver->avatar = $filepath.".".$fileExtension;
            $driver->save();

            return response()->json([
                'status' => 1,
                'message' =>  "Image uploaded successfully!",
                'datetime' => date('Y-m-d H:i'),
                'data' => $driver
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' =>  "Error in Image upload!",
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

    }//end of fun

    /**
    * Update driver ABN
    * @params - ABN $request
    * @response - JSON object
    * @call from Abn.js
    */
    public function driverAbn(Request $request){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $driver = Driver::find($driver_id);
        $driver->abn = $request->abn;
        $driver->save();

        return response()->json([
            'status' => 1,
            'message' =>  "Your ABN successfully submited!",
            'datetime' => date('Y-m-d H:i'),
            'data' => $driver
        ]);

    }//end of fun
    
    /**
    * Update driver Bank detail
    * update if exist, insert in not exits
    * @params - Bank $request
    * @response - JSON object
    * @call from Bank.js
    */
    public function driverBank(Request $request)
    {
        $driver_id = Auth::guard('apidriver')->user()->id;

        $bsb_number = $request->bsb_number;
        $bank_name = $request->bank_name;
        $bank_account_number = $request->bank_account_number;
        $bank_account_title = $request->bank_account_title;
        $bank_address = $request->bank_address;
        $bank_city = $request->bank_city;
        $bank_postal_code = $request->bank_postal_code;
        $dob = $request->dob;

        $bank = DriverBank::where('driver_id', $driver_id)->first();
        if($bank){
            $bank->bsb_number = $bsb_number;
            $bank->bank_name = $bank_name;
            $bank->bank_account_number = $bank_account_number;
            $bank->bank_account_title = $bank_account_title;
            $bank->bank_address = $bank_address;
            $bank->bank_city = $bank_city;
            $bank->bank_postal_code = $bank_postal_code;
            $bank->dob = $dob;
            $bank->save();        
        }else{
            $bank = new DriverBank;
            $bank->driver_id = $driver_id;
            $bank->bsb_number = $bsb_number;
            $bank->bank_name = $bank_name;
            $bank->bank_account_number = $bank_account_number;
            $bank->bank_account_title = $bank_account_title;
            $bank->bank_address = $bank_address;
            $bank->bank_city = $bank_city;
            $bank->bank_postal_code = $bank_postal_code;
            $bank->dob = $dob;
            $bank->save();
        }
        return response()->json([
            'status' => 1,
            'message' => 'Store your bank details into our system.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $bank
        ]);

    }//end of fun

    
    /**
    * Get driver Bank detail    
    * @params - Bank $request
    * @response - JSON object    
    * @call from Bank.js
    */
    public function getDriverBank(Request $request)
    {
        $driver_id = Auth::guard('apidriver')->user()->id;
        
        $bank = DriverBank::where('driver_id', $driver_id)->first();
        
        if($bank){
            return response()->json([
                'status' => 1,
                'message' => 'Bank details',
                'datetime' => date('Y-m-d H:i'),
                'data' => $bank
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Bank details not found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
    }//end of fun

    
    /**
    * Get driver document list by state
    * @params - state_id
    * @response - JSON object    
    * @call from Documents.js
    */
    public function getDocuments(Request $request)
    {
        $driver = Auth::guard('apidriver')->user();

        $result=[];

        $documentstate = DocumentState::where('state_id',$driver->state_id)->first();
        if($documentstate){
            $documents = Document::whereIn('id', explode(',', $documentstate->document_ids))->get();
            foreach($documents as $index => $document){
                $result[$index] = [];
                $result[$index]['document_id'] = $document->id;
                $result[$index]['document_name'] = $document->name;
                $driver_document = DriverDocument::where('driver_id', $driver->id)->where('document_id', $document->id)->first();
                if($driver_document){
                    $result[$index]['document_url'] = $driver_document->document_url;

                    if($result[$index]['document_url']){
                        $result[$index]['document_url'] = 'https://turvy.net/'.$result[$index]['document_url'];
                    }

                    $result[$index]['document_expire_date'] = $driver_document->expiredate;
                }else{
                    $result[$index]['document_url'] = '';
                    $result[$index]['document_expire_date'] = '';
                }
            }
        }

        return response()->json([
            'status' => 1,
            'message' => 'Bank details',
            'datetime' => date('Y-m-d H:i'),
            'data' => $result
        ]);

    }//end of fun

    
    /**
    * Get driver document list by state
    * @params - state_id
    * @response - JSON object    
    * @call from Documents.js
    */
    public function updateDocuments(Request $request, $document_id)
    {
        $driver = Auth::guard('apidriver')->user();

        $driver_document = DriverDocument::where('driver_id', $driver->id)->where('document_id', $document_id)->first();

        if($driver_document){
            $driver_document->expiredate = $request->document_expire_date;
            $driver_document->save(); 
        }else{
            $driver_document = new DriverDocument;            
            $driver_document->expiredate = $request->document_expire_date;
            $driver_document->driver_id = $driver->id;
            $driver_document->document_id = $document_id;
            $driver_document->save(); 
        }

        return response()->json([
            'status' => 1,
            'message' => 'Bank details',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driver_document
        ]);

    }//end of fun

    
    /**
    * Get driver document list by state
    * @params - state_id
    * @response - JSON object    
    * @call from Documents.js
    */
    public function updateDriverDocuments(Request $request, $document_id, $driver_id)
    {
        

        if(isset($_FILES)){
            $file_name = time();
            $file_name .= rand();
            $file_name = sha1($file_name);
            $base = base_path();
            $filepath = "uploads/document/".$file_name;
            $fileExtension = pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION);
            $pathwitext =  $base."/public/".$filepath.".".$fileExtension;
            move_uploaded_file($_FILES['document']['tmp_name'],$pathwitext);            

            $driver_document = DriverDocument::where('driver_id', $driver_id)->where('document_id', $document_id)->first();

            if($driver_document){
                $driver_document->document_url = $filepath.".".$fileExtension;
                $driver_document->save(); 
            }else{
                $driver_document = new DriverDocument;            
                $driver_document->document_url = $filepath.".".$fileExtension;
                $driver_document->driver_id = $driver_id;
                $driver_document->document_id = $document_id;
                $driver_document->save(); 
            }

            return response()->json([
                'status' => 1,
                'message' =>  "Document uploaded successfully!",
                'datetime' => date('Y-m-d H:i'),
                'data' => $driver_document
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' =>  "Error in Image upload!",
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
    }//end of fun

    public function putSupport(Request $request){
        
        $user = Auth::guard('apidriver')->user();
        $record = new Feedback();
        $record->name = $user->first_name.' '.$user->last_name;
        $record->email = $user->email;
        $record->mobile = $user->mobile;
        $record->driver_id = $user->id;
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
    }//end of fun

    
    /**
    * upload driver vehicle front image
    * @params - driver_id
    * @response - JSON object    
    * @call from VehicleDetails.js
    */
    public function updateVehicleImage(Request $request, $driver_id)
    {
        if(isset($_FILES)){
            $file_name = time();
            $file_name .= rand();
            $file_name = sha1($file_name);
            $base = base_path();
            $filepath = "uploads/user/driver/".$file_name;
            $fileExtension = pathinfo($_FILES['frontImage']['name'], PATHINFO_EXTENSION);
            $pathwitext =  $base."/public/".$filepath.".".$fileExtension;
            move_uploaded_file($_FILES['frontImage']['tmp_name'],$pathwitext);  

            $driveVehicle = DriverVehicle::where('driver_id',$driver_id)->first();
            if($driveVehicle){
                if($driveVehicle->front_photo){
                    unlink($base.'/'.$driveVehicle->front_photo);
                }

                $driveVehicle->front_photo = $filepath.".".$fileExtension;
                $driveVehicle->save(); 
            }

            return response()->json([
                'status' => 1,
                'message' =>  "Vehicle front photo uploaded successfully!",
                'datetime' => date('Y-m-d H:i'),
                'data' => $driveVehicle
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' =>  "Error in Image upload!",
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
    }//end of fun

    /**
    * Get driver current day stat. eg. today's trips count and amount, last trip.    
    * @response - JSON object    
    * @call from RewardInfoSlider.js
    */
    public function getTripStat(Request $request)
    {
        $driver_id = Auth::guard('apidriver')->user()->id;

        $driverStat=[];

        //get today total trips
        $todayTrip = Appointment::where('status','3')
        ->whereDate('created_at', Carbon::today())
        ->get();
        
        $driverStat['today_trips'] = 0;
        $driverStat['today_amt'] = 0;
        if($todayTrip){
            foreach($todayTrip as $k => $item){
                $driverStat['today_amt'] = $driverStat['today_amt'] + ($item['payment_total'] + $item['payment_tip']);
                $driverStat['today_trips'] = $driverStat['today_trips'] + 1;
            }
        }
        
        $driverStat['today_amt'] = number_format($driverStat['today_amt'],2);


        //get today last trip
        //if($driverStat['today_trips'] > 0){
            $lastTrip = Appointment::where('status','3')            
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->first();

            if($lastTrip){
                $driverStat['last_amt'] = number_format(($lastTrip->payment_total + $lastTrip->payment_tip),2);
                $driverStat['last_time'] = date('H:i A', strtotime($lastTrip->end_time));            
                $driverStat['last_rider'] = $lastTrip->rider_name;
            }
        //}

        $driverStat['driver_points'] = $this->getDriverPoints($driver_id);
        
        if($driverStat){          
          return response()->json([
              'status' => 1,
              'message' => 'Driver completed Data',
              'datetime' => date('Y-m-d H:i:s'),
              'data' => $driverStat
          ]);
        }else{         
            return response()->json([
              'status' => 0,
              'message' => 'Records Not found',
              'datetime' => date('Y-m-d H:i:s'),
              'data' => null
            ]);
        }
    }//end of fun


    /**
    * Get driver profile details for profile screen
    * @response - JSON object    
    * @call from Profile.js
    */
    public function getDriverProfile(){
        $driver = Auth::guard('apidriver')->user();
        $country = Country::find($driver->country_id);
        $state = State::find($driver->state_id);
        $city = City::find($driver->city_id);
        $driver->country_name = $country->name;
        $driver->state_name = $state->fullname.' ('.$state->name.')';
        $driver->city_name = $city->name;

        

        $from = new \DateTime($driver->created_at);
        $to   = new \DateTime('today');
        $diff = $from->diff($to);
        $driver->joinTime = $diff->y.'.'.$diff->m;

        $count = RiderRating::where('driver_id',$driver->id)->get()->count();
        $sum = RiderRating::where('driver_id',$driver->id)->sum('rating');
        if($count > 0)
            $driver->rating = number_format($sum/$count,1);
        else
            $driver->rating = 0.0;
        return response()->json([
            'status' => 1,
            'message' => 'Driver personal info.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driver
        ]);
    }//end of fun

    /**
    * Get driver feedback
    * @response - JSON object    
    * @call from DriverFeedback.js
    */
    public function getDriverFeedback($page){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $items_per_page = 10;
        $offset = ($page - 1) * $items_per_page;

        $rating = RiderRating::join('appointments','rider_ratings.book_id','=','appointments.id')
        ->join('users','rider_ratings.rider_id','=','users.id')
        ->where('rider_ratings.driver_id',$driver_id)
        ->orderBy('rider_ratings.id', 'DESC')
        ->offset($offset)
        ->limit($items_per_page)
        ->get([
            'rider_ratings.*', 
            'appointments.origin',
            'appointments.destination',
            'users.first_name',
            'users.last_name',
            'users.avatar'
        ]);

        if($rating){

            foreach($rating as $k => $item){
                $rating[$k]['rateDate'] = date('d/m/Y h:i A',strtotime($item['created_at']));
                $rating[$k]['rateStar'] = number_format($item['rating'],1);
                $rating[$k]['rider_name'] = $item['first_name'].' '.$item['last_name'];
                $rating[$k]['rider_rating'] = $this->getRiderRatingForFun($item['rider_id']);
            }

            return response()->json([
                'status' => 1,
                'message' => 'Driver feedback info.',
                'datetime' => date('Y-m-d H:i'),
                'data' => $rating
            ]); 
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'No records found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]); 
        }

    }//end of fun

    /**
    * Get driver rewards points
    * @response - JSON object    
    * @call from same class
    */
    public function getDriverPoints($driver_id){

        $points = DriverPoints::where('driver_id',$driver_id)
        ->where('status','active')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->first();

        if($points){
            return $points->total_points;
        }

        return 0;

    }//end of fun

    /**
    * Get driver last trip
    * @response - JSON object    
    * @call from LastTrip.js
    */
    public function getDriverLastTrip(){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $lastTrip = Appointment::where('status','3')
            ->where('driver_id',$driver_id)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->first();

        if($lastTrip){
            $lastTrip->start_date = date('j M Y, g:i A',strtotime($lastTrip->start_time));
            $lastTrip->start_time = date('g:i A',strtotime($lastTrip->start_time));
            $lastTrip->end_time = date('g:i A',strtotime($lastTrip->end_time));
            $payment_total = ($lastTrip->payment_total + $lastTrip->payment_tip);
            $lastTrip->payment = number_format($payment_total,2);

            $serviceTypes = VehicleType::find($lastTrip->servicetype_id);
            $lastTrip->serviceType = $serviceTypes->name;

            $rate = RiderRating::where('book_id',$lastTrip->id)
            ->first();
            if($rate){
                $lastTrip->rating = ($rate->rating > 0) ? number_format($rate->rating,1) : 0;
                $lastTrip->feedback = $rate->comment;
            }
            
            if($lastTrip->is_multidest === 1){
                $multdest = MultiDestination::where('book_id', $lastTrip->id)
                ->get(['stop_lat','stop_lng','stopname']);

                foreach($multdest as $k => $val){
                    $multdest[$k]->latitude = $val['stop_lat'];
                    $multdest[$k]->longitude = $val['stop_lng'];
                }

                $lastTrip->multdest = $multdest;
            }else{
                $lastTrip->multdest = null;
            }

            return response()->json([
                'status' => 1,
                'message' => 'Driver Last trip.',
                'datetime' => date('Y-m-d H:i'),
                'data' => $lastTrip
            ]); 
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'No records found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]); 
        }    
    }//end of fun

    /**
    * Get driver last trip
    * @response - JSON object    
    * @call from LastTrip.js
    */
    public function getDrivingTime(){

        $driver_id = Auth::guard('apidriver')->user()->id;

        $drTime = DrivingTime::where('driver_id', $driver_id)
        ->whereDate('created_at', Carbon::today())
        ->first();
        if($drTime){
            $drTime->driving_time_text = $this->secondsToTime($drTime->driving_time);
            $drTime->offline_time_text = $this->secondsToTime($drTime->offline_time);

            if($drTime->offline_time > 0){
                $drTime->offline_per = number_format(($drTime->offline_time/43200),2);
            }else{
                $drTime->offline_per = 0;
            }
            if($drTime->driving_time > 0){
                $drTime->driving_per = number_format(($drTime->driving_time/43200),2);
            }else{
                $drTime->driving_per = 0;
            }
        }

        //$drTime->path = base_path();

        return response()->json([
            'status' => 1,
            'message' => 'Driving Time.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $drTime
        ]);

        

        /* if($drTime && $onlineRec){
            $drTime->driving_time_text = $this->secondsToTime($drTime->driving_time);
            $drTime->offline_time_text = $this->secondsToTime($drTime->offline_time);
            if($drTime->offline_time > 0){
                $drTime->offline_per = number_format(($drTime->offline_time/21600),2);
            }else{
                $drTime->offline_per = 0;
            }
            if($drTime->driving_time > 0){
                $drTime->driving_per = number_format(($drTime->driving_time/43200),2);
                $drTime->offline_per = 0;
                $drTime->offline_time_text = $this->secondsToTime(0);
            }else{
                $drTime->driving_per = 0;
            }

            return response()->json([
                'status' => 1,
                'message' => 'Driving Time.',
                'datetime' => date('Y-m-d H:i'),
                'data' => $drTime
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'No records found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        } */
        
    }//end of fun

    public function checkDrivingTime(){

        $driver_id = Auth::guard('apidriver')->user()->id;

        $drTime = DrivingTime::where('driver_id', $driver_id)
        ->whereDate('created_at', Carbon::today())
        ->first();

        $onlineRec = DriverLocation::where('driverId', $driver_id)->first();

        if(!$onlineRec){
            return response()->json([
                'status' => 0,
                'message' => 'Driver not online.',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        if($drTime && $drTime->driving_time > 0 && $onlineRec){
            $start = strtotime($drTime->drivingTimeDiff);
            if($start <= 0){
                $start = time();
            }
            $end = time();
            $timeDiff = ($end - $start);
            
            /* if($drTime->driving_time <= 39600){
                $drTime->offline_time = $drTime->driving_time;
            } */

            $drTime->offline_time = (43200 - $drTime->driving_time);

            $driving_time = ($drTime->driving_time - $timeDiff);
            $driving_time = ($driving_time > 0) ? $driving_time : 0;
            if($driving_time == 0){
                $drTime->offlineStartTime = date('Y-m-d H:i:s');
            }
            $drTime->driving_time = $driving_time;
            $drTime->driverOnlineTime = $onlineRec->created_at;
            $drTime->drivingTimeDiff = date('Y-m-d H:i:s');
            $drTime->save();

            $drTime->driving_time_text = $this->secondsToTime($drTime->driving_time);
            $drTime->offline_time_text = $this->secondsToTime($drTime->offline_time);

            if($drTime->offline_time > 0){
                $drTime->offline_per = number_format(($drTime->offline_time/43200),2);
            }else{
                $drTime->offline_per = 0;
            }
            if($drTime->driving_time > 0){
                $drTime->driving_per = number_format(($drTime->driving_time/43200),2);
                
            }else{
                $drTime->driving_per = 0;
            }

        }

        

        //$drTime->path = base_path();

        return response()->json([
            'status' => 1,
            'message' => 'Driving Time.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $drTime
        ]);

    }//end of fun

    public function avialableDrivingTime(){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $drTime = DrivingTime::where('driver_id', $driver_id)
        ->whereDate('created_at', Carbon::today())
        ->first();

        $data = array();

        if($drTime){
            $start = strtotime($drTime->offlineStartTime);
            if($start <= 0){
                $start = time();
            }
            $end = time();
            $timeDiff = ($end - $start);

            $offlineTime = (8*60*60) - $timeDiff;

            $data['driving_time'] = $drTime->driving_time;
            $data['offlineTimeDiff'] = $offlineTime;
            $data['offlineTimeTxt'] = $this->secondsToTime($offlineTime);
            if($offlineTime <= 0){
                $data['offlineTimeDiff'] = 0;
                $data['offlineTimeTxt'] = "";
            }
            
            return response()->json([
                'status' => 1,
                'message' => 'Message sent',
                'datetime' => date('Y-m-d H:i'),
                'data' => $data,
            ]); 
        }

        return response()->json([
            'status' => 0,
            'message' => 'Message sent',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);

    }//end of fun

    /**
    * Update driver offline time
    * @response - JSON object    
    * @call from DrivingTime.js
    */
    public function startOfflineTime(){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $drTime = DrivingTime::where('driver_id', $driver_id)
        ->whereDate('created_at', Carbon::today())
        ->first();
        
        if($drTime && $drTime->isOfflineStart > 0){            
            $start = strtotime($drTime->offlineStartTime);
            $end = time();            
            $timeDiff = ($end - $start);
            

            $offline_time = (21600 - $timeDiff);
            $offline_time = ($offline_time > 0) ? $offline_time : 0;
            $drTime->offline_time = $offline_time;
            $drTime->save();
            
            //$drTime->time_diff = $mins;


            $drTime->driving_time_text = $this->secondsToTime($drTime->driving_time);
            $drTime->offline_time_text = $this->secondsToTime($drTime->offline_time);
            if($drTime->offline_time > 0){
                $drTime->offline_per = number_format(($drTime->offline_time/21600),2);
            }else{
                $drTime->offline_per = 0;
            }
            if($drTime->driving_time > 0){
                $drTime->driving_per = number_format(($drTime->driving_time/43200),2);
            }else{
                $drTime->driving_per = 0;
            }

            return response()->json([
                'status' => 1,
                'message' => 'Driving Time.',
                'datetime' => date('Y-m-d H:i'),
                'data' => $drTime
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'No records found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
    }//end of fun
    
    /**
    * get driver booking by id
    * @response - JSON object    
    * @call from BookingMap.js
    */
    public function getRunningBook($book_id){
        $driver_id = Auth::guard('apidriver')->user()->id;

        //$bookings = Appointment::find($book_id);
        $bookings = Appointment::join('users','users.id','=','appointments.rider_id')
          ->where('appointments.id',$book_id)
          ->where('driver_id',$driver_id)
          ->first(['appointments.*', 'users.avatar']);

        if($bookings){
            if($bookings->is_multidest === 1){
                $multdest = MultiDestination::where('book_id', $bookings->id)
                ->get(['stop_lat','stop_lng','stopname']);

                foreach($multdest as $k => $val){
                    $multdest[$k]->latitude = $val['stop_lat'];
                    $multdest[$k]->longitude = $val['stop_lng'];
                }

                $bookings->multdest = $multdest;
            }else{
                $bookings->multdest = null;
            }

            $serviceTypes = VehicleType::find($bookings->servicetype_id);
            $bookings->servicetype_name = $serviceTypes->name;

            return response()->json([
                'status' => 1,
                'message' => 'Driving Time.',
                'datetime' => date('Y-m-d H:i'),
                'data' => $bookings

            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'No records found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
    }//end of fun

    /**
    * get driver acceptance and declined trip Rate
    * @response - JSON object    
    * @call from Profile.js
    */
    public function getAcceptanceRate(){
        $driver_id = Auth::guard('apidriver')->user()->id;
        $tripRate=[];

        $fromDate = date('Y-m-d',time() - 30*24*60*60);
        $fromDate = $fromDate.' 00:00:00';
        $toDate = date('Y-m-d H:i:s');

        $acceptRate = Appointment::where('driver_id',$driver_id)
        ->where('status', '>', '0')
        ->whereBetween('created_at', [$fromDate, $toDate])
        ->get()
        ->count();

        $completedTrip = Appointment::where('driver_id',$driver_id)
        ->where('status', '=', '3')
        ->whereBetween('created_at', [$fromDate, $toDate])
        ->get()
        ->count();

        $canceledTrip = Appointment::where('driver_id',$driver_id)
        ->where('status', '=', '2')
        ->where('cancel_reason','!=', NULL)
        ->whereBetween('created_at', [$fromDate, $toDate])
        ->get()
        ->count();

        $declineRate = BookDecline::where('driver_id',$driver_id)
        ->whereBetween('created_at', [$fromDate, $toDate])
        ->get()
        ->count();

        $totalTrips = Appointment::where('driver_id',$driver_id)
        ->where('status', '=', '3')        
        ->get()
        ->count();

        $totalRequest = $acceptRate + $declineRate;
        $acceptPercent = 0;
        if($totalRequest > 0){
            $acceptPercent = ($acceptRate/$totalRequest)*100;
        }
        $acceptPercent = number_format($acceptPercent);
        $canceledPercent = 0;
        if($acceptRate > 0){
            $canceledPercent = ($canceledTrip/$acceptRate)*100;    
        }
        
        $canceledPercent = number_format($canceledPercent);

        $tripRate['tripAccept'] =  $acceptRate;
        $tripRate['tripDecline'] =  $declineRate;
        $tripRate['totalRequest'] = $totalRequest;
        $tripRate['completedTrip'] =  $completedTrip;
        $tripRate['canceledTrip'] =  $canceledTrip;
        $tripRate['acceptPercent'] =  $acceptPercent;
        $tripRate['canceledPercent'] =  $canceledPercent;
        $tripRate['fromDate'] =  date('M j',strtotime($fromDate));
        $tripRate['toDate'] =  date('M j',strtotime($toDate));
        $tripRate['totalTrips'] = $totalTrips;
        

        if($tripRate){
            return response()->json([
                'status' => 1,
                'message' => 'Trip Rate.',
                'datetime' => date('Y-m-d H:i'),
                'data' => $tripRate

            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'No records found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);    
        }
    }//end of fun

    /**
    * get driver weekly earning summary
    * @response - JSON object    
    * @call from WeeklySummary.js
    */
    public function getWeeklySummary(){
        $driver_id = Auth::guard('apidriver')->user()->id;        

        $week = $this->x_week_range(date('Y-m-d'));

        $fromDate = $week[0].' 00:00:00';
        $toDate = $week[1].' 23:59:59';
       
        $bookings = Appointment::where('status','3')
          ->where('driver_id',$driver_id)
          ->whereBetween('created_at', [$fromDate, $toDate])
          ->orderBy('id', 'DESC')
          ->get();

        $result = [];
        $details = [];
        $i=0;
        foreach($bookings as $key => $item){
            $date = date('Y-m-d',strtotime($item['created_at']));
            $result[$date][$i]['created_at'] = $date;
            $result[$date][$i]['payment_total'] = $item['payment_total'];
            $result[$date][$i]['payment_tip'] = $item['payment_tip'];
            $result[$date][$i]['id'] = $item['id'];
            $i++;
        }
        $i=0;
        $grantAmt = 0;
        foreach($result as $k => $item){
            $pay = 0;
            $tips = 0;
            $trips=0;
            $details[$i]['created_at'] = date('M j',strtotime($k)); 
            foreach ($item as $key => $value) {
                $pay = $pay + $value['payment_total'];
                $tips = $tips + $value['payment_tip'];
                $trips = $trips + 1;
            }
            $details[$i]['payment_total'] = number_format($pay,2,'.',','); 
            $details[$i]['payment_tip'] = number_format($tips,2,'.',',');
            $total = $pay + $tips;            
            $details[$i]['total_amount'] = number_format($total,2,'.',',');
            $details[$i]['total_trips'] = $trips;
            $grantAmt = $grantAmt + $total;
            $i++;
        }

        $dateRange = date('M j',strtotime($fromDate)).' - '.date('M j',strtotime($toDate));
        $grantAmt = number_format($grantAmt,2,'.',',');

        

        if($details){
            return response()->json([
                'status' => 1,
                'message' => 'Weekly Summary.',
                'dateRange' => $dateRange,
                'grantAmt' => $grantAmt,
                'data' => $details
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'No records found',
                'dateRange' => $dateRange,
                'grantAmt' => $grantAmt,
                'data' => null,
                'week' => $week
            ]);    
        }
    }//end of fun

    /**
    * get driver rating stat
    * @response - JSON object    
    * @call from DriverFeedback.js
    */
    public function getRatingStat(){
        $driver_id = Auth::guard('apidriver')->user()->id;        
        $driverStat=[];
        
        $count = RiderRating::where('driver_id',$driver_id)->get()->count();
        $sum = RiderRating::where('driver_id',$driver_id)->sum('rating');

        $five = RiderRating::where('driver_id',$driver_id)
        ->where('rating',5)
        ->get()
        ->count();

        $four = RiderRating::where('driver_id',$driver_id)
        ->where('rating',4)
        ->get()
        ->count();

        $three = RiderRating::where('driver_id',$driver_id)
        ->where('rating',3)
        ->get()
        ->count();

        $two = RiderRating::where('driver_id',$driver_id)
        ->where('rating',2)
        ->get()
        ->count();

        $one = RiderRating::where('driver_id',$driver_id)
        ->where('rating',1)
        ->get()
        ->count();

        $driverStat['five'] = $five;
        $driverStat['four'] = $four;
        $driverStat['three'] = $three;
        $driverStat['two'] = $two;
        $driverStat['one'] = $one;

        if($count > 0){
            $driverStat['rating'] = number_format($sum/$count,2);
            $driverStat['perFive'] = number_format($five/$count,1);
            $driverStat['perFour'] = number_format($four/$count,1);
            $driverStat['perThree'] = number_format($three/$count,1);
            $driverStat['perTwo'] = number_format($two/$count,1);
            $driverStat['perOne'] = number_format($one/$count,1);
        }else{
            $driverStat['rating'] = 0.00;
            $driverStat['perFive'] = 0;
            $driverStat['perFour'] = 0;
            $driverStat['perThree'] = 0;
            $driverStat['perTwo'] = 0;
            $driverStat['perOne'] = 0;
        }
        return response()->json([
            'status' => 1,
            'message' => 'Driver rating info.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driverStat
        ]);
    }//end of fun

    /**
    * Add driver in airport queue
    * @response - JSON object    
    * @call from AirportQueue.js
    */
    public function add_queue(Request $request){
        $driver_id = Auth::guard('apidriver')->user()->id;
        $open_services = explode(",", $request->open_services)[0];

        if(!$open_services){
            return response()->json([
                'status' => 0,
                'message' => 'no open services.',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        $driver_queue = Queue::where('driver_id', $driver_id)->first();

        $queueCount = Queue::where('airport_id', $request->airport_id)
        ->where('open_services', $open_services)
        ->max('position');

        $position = 1;

        if($queueCount > 0){
            $position = $queueCount + 1;
        }

        if(!$driver_queue){
            $date = date('Y-m-d H:i:s');
            $driver_queue = new Queue;
            $driver_queue->driver_id = $driver_id;
            $driver_queue->airport_id = $request->airport_id;
            $driver_queue->request_id = 1;
            $driver_queue->position = $position;
            $driver_queue->is_alive = 1;
            $driver_queue->open_services = $open_services;
            $driver_queue->priority_time = $date;
            $driver_queue->enterance_time = $date;
            $driver_queue->last_sync = $date;
            $driver_queue->leave_time = $date;
            $driver_queue->created_at = $date;
            $driver_queue->updated_at = $date;
            $driver_queue->save(); 
        }
       

        return response()->json([
            'status' => 1,
            'message' => 'Driver rating info.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $position,
            'open_services' => $open_services
        ]);
    }//end of fun
    
    /**
    * Remove driver from airport queue
    * @response - JSON object    
    * @call from AirportQueue.js
    */
    public function remove_queue(){
        $driver_id = Auth::guard('apidriver')->user()->id;
        
        $driverData = Queue::where('driver_id', $driver_id)->first();

        $pos = $driverData->position;

        Queue::where('open_services', $driverData->open_services)
        ->where('position', '>', $pos)
        ->decrement('position');

        Queue::where('driver_id', $driver_id)->delete();

        return response()->json([
            'status' => 1,
            'message' => 'You are left from airport queue.',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);
    }//end of fun

    public function quepos(){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $driverData = Queue::where('driver_id', $driver_id)->first();
        
        return response()->json([
            'status' => 1,
            'message' => 'Latest position',
            'datetime' => date('Y-m-d H:i'),
            'data' => $driverData->position
        ]);
    }//end of fun

    
    public function airportQueueDetails($page){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $items_per_page = 10;
        $offset = ($page - 1) * $items_per_page;

        $driverData = Queue::where('driver_id', $driver_id)->first();
        if(!$driverData){
            return response()->json([
                'status' => 0,
                'message' => 'Driver not in queue',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        $Airports = Airport::where('id', $driverData->airport_id)->first();

        $queueData = Queue::join('vehicle_types','vehicle_types.id','=','queues.open_services')
        ->where('airport_id', $driverData->airport_id)
        ->orderBy('queues.open_services', 'ASC')
        ->offset($offset)
        ->limit($items_per_page)
        ->get(['queues.*', 'vehicle_types.name']);

        /* $bookings = Appointment::join('users','users.id','=','appointments.rider_id')
          ->where('appointments.id',$book_id)
          ->where('driver_id',$driver_id)
          ->first(['appointments.*', 'users.avatar']); */
        
        if($queueData){
            return response()->json([
                'status' => 1,
                'message' => 'Queue list',
                'datetime' => date('Y-m-d H:i'),
                'data' => $queueData,
                'airportName' => $Airports->name
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Queue is empty',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
    }//end of fun


    

    /**
    * get peaktime for driver
    * @response - JSON object    
    * @call from Recommended.js
    */
    public function getPeaktime(){
        $state_id = Auth::guard('apidriver')->user()->state_id;
        
        $peaktime = Peaktime::where('state_id', $state_id)->first();
        $peaktime->day = getDayName($peaktime->day);
        $peaktime->slot_one_endtime = date('g:i A',strtotime($peaktime->slot_one_endtime));
        $peaktime->slot_one_starttime = date('g:i A',strtotime($peaktime->slot_one_starttime));
        $peaktime->slot_two_starttime = date('g:i A',strtotime($peaktime->slot_two_starttime));
        $peaktime->slot_two_endtime = date('g:i A',strtotime($peaktime->slot_two_endtime));


        $peaktime->str = 'MSP has the heaviest flight traffic on '.$peaktime->day.' between ';
        if($peaktime->slot_one_starttime && $peaktime->slot_one_endtime){
            $peaktime->str .= $peaktime->slot_one_starttime.' - '.$peaktime->slot_one_endtime;
        }

        if($peaktime->slot_one_starttime && $peaktime->slot_one_endtime && $peaktime->slot_two_starttime && $peaktime->slot_two_endtime){
            $peaktime->str .= ' and ';
        }

        if($peaktime->slot_two_starttime && $peaktime->slot_two_endtime){
            $peaktime->str .= $peaktime->slot_two_starttime.' - '.$peaktime->slot_two_endtime;
        }
        
        if($peaktime){
            return response()->json([
                'status' => 1,
                'message' => 'Driver peaktime by state',
                'datetime' => date('Y-m-d H:i'),
                'data' => $peaktime
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Driver peaktime not found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

    }//end of fun

    /**
    * get driver inbox messages
    * sent by admin push notification
    * @response - JSON object    
    * @call from Inbox.js
    */
    public function inbox(){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $resp = Notification::where('user_type', 2)->where('is_read',0)
        ->whereRaw('FIND_IN_SET("'.$driver_id.'",receiver_ids)')->update(['is_read'=>1]);

        $notifications = Notification::where('user_type', 2)
        ->whereRaw('FIND_IN_SET("'.$driver_id.'",receiver_ids)')
        ->orderBy('id', 'DESC')
        ->get();
        

        foreach($notifications as $k => $item){
          $notifications[$k]['notifyDate'] = date('m/d/Y g:i A',strtotime($item['created_at']));
          if($notifications[$k]['sender_id'] > 0){
              $senderInfo = User::find($notifications[$k]['sender_id']);
              if($senderInfo){
                $pos = substr($senderInfo->avatar,0,1);
                $slash = "";
                if($pos != '/'){
                    $slash = "/";
                }
                $notifications[$k]['senderImg'] = 'https://turvy.net'.$slash.$senderInfo->avatar;
                if($senderInfo->avatar == ""){
                    $notifications[$k]['senderImg'] = '';
                }
                
                $notifications[$k]['senderName'] = $senderInfo->first_name.' '.$senderInfo->last_name;
                $notifications[$k]['pos'] = $pos;
            }
          }
        }

        if($notifications){
            return response()->json([
                'status' => 1,
                'message' => 'Driver notifications',
                'datetime' => date('Y-m-d H:i'),
                'data' => $notifications
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Driver notifications not found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
        
    }//end of fun

    /**
    * driver tap to depart
    * sent pusher event to rider
    * @response - JSON object    
    * @call from BookingMap.js
    */
    public function driverStartTrip($book_id){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $socket = $this->getPusherSocket();
        $data['book_id'] = $book_id;
        $data['driver_id'] = $driver_id;
        $data['status'] = 'Driver tap to depart';
        $socket->trigger('turvy-channel', 'tap_to_depart_event', $data);

        $ride = Appointment::find($book_id);
        $ride->start_time = date('Y-m-d H:i:s');
        $ride->save();

        return response()->json([
            'status' => 0,
            'message' => 'Driver tap to depart',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]);

    }//end of fun

    /**
    * Get driver trip details
    * @response - JSON object    
    * @call from TripDetails.js
    */
    public function getDriverTripDetails($book_id){
        $driver_id = Auth::guard('apidriver')->user()->id;

        $lastTrip = Appointment::find($book_id);

        if($lastTrip){
            $lastTrip->start_date = date('j M Y',strtotime($lastTrip->start_time));
            $lastTrip->start_time = date('g:i A',strtotime($lastTrip->start_time));
            $lastTrip->end_time = date('g:i A',strtotime($lastTrip->end_time));
            $payment_total = ($lastTrip->payment_total + $lastTrip->payment_tip);
            

            $serviceTypes = VehicleType::find($lastTrip->servicetype_id);
            $lastTrip->serviceType = $serviceTypes->name;

            $rate = RiderRating::where('book_id',$lastTrip->id)
            ->first();
            if($rate){
                $lastTrip->rating = ($rate->rating > 0) ? number_format($rate->rating,1) : 0;
                $lastTrip->feedback = $rate->comment;
            }
            
            if($lastTrip->is_multidest === 1){
                $multdest = MultiDestination::where('book_id', $lastTrip->id)
                ->get(['stop_lat','stop_lng','stopname']);

                foreach($multdest as $k => $val){
                    $multdest[$k]->latitude = $val['stop_lat'];
                    $multdest[$k]->longitude = $val['stop_lng'];
                }

                $lastTrip->multdest = $multdest;
            }else{
                $lastTrip->multdest = null;
            }

            $transactions = DriverTransactions::where('driver_id',$driver_id)
            ->where('book_id',$book_id)
            ->first();
            if($transactions){
                $lastTrip->tripStatus = $transactions->pay_type;
                $lastTrip->statusText = ucfirst(str_replace('_', ' ', $transactions->pay_type));
                $payment_total = $transactions->amount + $lastTrip->payment_tip;
                /* if($transactions->pay_type == 'self_cancel' || $transactions->pay_type == 'rider_cancel'){
                    $payment_total = $transactions->amount;
                } */
                
            }

            $lastTrip->payment = number_format($payment_total,2);

            $lastTrip->payment = ($lastTrip->payment > 0) ? 'A$'.$lastTrip->payment : str_replace('-', '-A$', $lastTrip->payment);

            //$lastTrip->payment_total = number_format($payment_total,2);

            $PaymentRequest = PaymentRequest::where('appointment_id', $book_id)
            ->where('type', 'Book')
            ->first();
            if($PaymentRequest){
                $payData = json_decode($PaymentRequest->surgeinfo);
                $payData->fuel_surge_charge = number_format($payData->fuel_surge_charge,2);
                
                //if($payData->company_amount > 0){
                if (property_exists($payData, 'company_amount')){
                    $payData->serviceFee = ($payData->company_amount + $payData->charity_amount);
                    $payData->serviceFee = number_format($payData->serviceFee,2);
                }

                $payData->tpTotal = ($payData->nsw_gtl_charge + $payData->nsw_ctp_charge);
                $payData->tpTotal = number_format($payData->tpTotal,2);

                $payData->nsw_gtl_charge = number_format($payData->nsw_gtl_charge,2);
                $payData->nsw_ctp_charge = number_format($payData->nsw_ctp_charge,2);
                $payData->violant_end = $PaymentRequest->violant_end > 0 ? 12 : 0;
            }

            return response()->json([
                'status' => 1,
                'message' => 'Driver trip details.',
                'datetime' => date('Y-m-d H:i'),
                'data' => $lastTrip,
                'payData' => $payData
            ]); 
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'No records found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]); 
        }    
    }//end of fun
    
    /**
    * save trip tip in notification table
    * and send notification to rider
    * @response - JSON object    
    * @call from TipReceived.js
    */
    public function putTipThanksMessage(Request $request){

        $socket = $this->getPusherSocket();    
        $data['rider_id'] = $request->rider_id;
        $data['book_id'] = $request->book_id;        
        $data['driver_id'] = $request->driver_id;
        $data['driver_name'] = $request->driver_name;        
        $socket->trigger('turvy-channel', 'tip_thanks_event', $data);

        $notifications = new Notification;
        $date = date('Y-m-d H:i:s');
        
        //$notifications->heading = 'Thank you for a tip';
        $notifications->content = $data['driver_name'].' say thank you for a tip';
        $notifications->type = 3;
        $notifications->user_type = 1;
        $notifications->receiver_ids = $data['rider_id'];
        $notifications->sender_id = $data['driver_id'];
        $notifications->created_at = $date;
        $notifications->updated_at = $date;
        $notifications->save();

        return response()->json([
            'status' => 1,
            'message' => 'Thanks notifications store',
            'datetime' => date('Y-m-d H:i'),
            'data' => null
        ]); 

    }//end of fun

    /**
    * get driver unread count messages
    * sent by admin push notification
    * @response - JSON object    
    * @call from SideBar.js
    */
    public function driverUnreadMessagesCount(){
       $driver_id = Auth::guard('apidriver')->user()->id;
         
        $notifications = Notification::where('user_type', 2)->where('is_read',0)
        ->whereRaw('FIND_IN_SET("'.$driver_id.'",receiver_ids)')
        ->count();

       $data['count'] = $notifications;

        if($notifications){
            return response()->json([
                'status' => 1,
                'message' => 'Driver new messages count',
                'datetime' => date('Y-m-d H:i'),
                'data' => $data
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Driver Messages not found',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }
        
    }//end of fun

    /**
    * save trip tip in notification table
    * and send notification to rider
    * @response - JSON object    
    * @call from TipReceived.js
    */
    public function sendMesaageToRider(Request $request){

        $driver = Auth::guard('apidriver')->user();

        $data['receiver_id'] = $request->receiver_id;
        $data['receiver_name'] = $request->receiver_name;
        $data['bookId'] = 0;
        if($request->bookId > 0){
            $data['bookId'] = $request->bookId;
        }
          
        $data['sender_id'] = $driver->id;
        $data['sender_name'] = $driver->name; 
        $data['messageText'] = $request->messageText;

        $notifications = new Notification;
        $date = date('Y-m-d H:i:s');
        
        //$notifications->heading = 'Driver message from '.$data['sender_name'];
        $notifications->content = $data['messageText'];
        $notifications->type = 3;
        $notifications->user_type = 1;
        $notifications->receiver_ids = $data['receiver_id'];
        $notifications->sender_id = $data['sender_id'];
        $notifications->bookId = $data['bookId'];
        $notifications->created_at = $date;
        $notifications->updated_at = $date;
        $notifications->save();


        $rider = User::find($data['receiver_id']);
        //$rider->device_token;       

        $notification['title'] = 'New message arrive from driver';
        $notification['body'] = $data['messageText'];
        $notification['image'] = '';
        $notification['screen'] = 'Inbox';
        $notification['messageFrom'] = 'Driver';
        $notification['rider_id'] = $data['receiver_id'];
        $notification['driver_id'] = $data['sender_id'];

        $driverslist = array($rider->device_token);

        $this->sendpush_notification($notification,$driverslist);

        return response()->json([
            'status' => 1,
            'message' => 'Message sent',
            'datetime' => date('Y-m-d H:i'),
            'data' => $rider
        ]); 

    }//end of fun

    public function MakeCallToRider(Request $request){

        $driver = Auth::guard('apidriver')->user();

        /* return response()->json(['status' => 1, 'message' => 'Call has be sent to your phone number.','senderphn' => $driver ]); */

        $token = config("services.twilio.authtoken");
       
        $twilio_sid = config("services.twilio.sid");
       
        $name = $driver->name;
        $mobile = $driver->mobile;
        $rider_name = $request->rider_name;
        $rider_phone = $request->rider_phone;
        $rider_id = $request->rider_id;
        $booking_id = $request->booking_id;
        $driver_id = $driver->id;
        $session_uname = $booking_id."_".$rider_id."_".$driver_id."_".strtotime(date('Y-m-d h:i:s'));
        //echo $session_uname;
        try {
            $twilio = new Client($twilio_sid, $token);
            $session = $twilio->proxy->v1->services("KS7fe7732b63ffb0b6b329f57bc0ef519f")
                             ->sessions
                             ->create(["uniqueName" => $session_uname]);

                $sess_id = $session->sid;
                //$rider_phone = '+61285038000';
                if($sess_id){

                    // $mobile = '+61421567346';
                    $participant = $twilio->proxy->v1->services("KS7fe7732b63ffb0b6b329f57bc0ef519f")
                    ->sessions($sess_id)
                    ->participants
                    ->create($mobile, // identifier
                                ["friendlyName" => $name]
                    );

                    $proxyIdentifiersender = $participant->proxyIdentifier;	
                        
                    $participant = $twilio->proxy->v1->services("KS7fe7732b63ffb0b6b329f57bc0ef519f")
                    ->sessions($sess_id)
                    ->participants
                    ->create($rider_phone, // identifier
                        ["friendlyName" => $rider_name]
                    );
                    $proxyIdentifier = $participant->proxyIdentifier;	
                    
                
                }
             
               
            return response()->json(['status' => 1, 'message' => 'Call has be sent to your phone number.','senderphn' =>$proxyIdentifiersender ]);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Call session Error']);
        }

    }//end of fun

    
    public function notifyRiderRemainTime(Request $request){

        $driver = Auth::guard('apidriver')->user();

        $socket = $this->getPusherSocket();

        $data['rider_id'] = $request->rider_id;
        $data['durationRemaining'] = $request->duration;
        $data['driver_id'] = $driver->id;
                
        $socket->trigger('turvy-channel', 'notify_rider_remain_time', $data);


        return response()->json([
            'status' => 1,
            'message' => 'Notify rider remain time',
            'datetime' => date('Y-m-d H:i'),
            'data' => $data,
        ]);

    }//end of fun

    function secondsToTime($seconds) {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%h hr %i min');

        //return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
    }

    function x_week_range($date) {
        $ts = strtotime($date);
        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
        return array(date('Y-m-d', $start),
                     date('Y-m-d', strtotime('next saturday', $start)));
    }

    function getTransactionText($str){
        switch ($str) {
            case 'trip':
                return 'You completed trip';
                break;
            case 'tip':
                return 'Rider give you tip';
                break;
            case 'self_cancel':
                return 'You cancelled trip';
                break;
            case 'rider_cancel':
                return 'Trip cancelled by rider.';
                break;
        }
    }

    function getPusherSocket(){
        require base_path().'/public/pusher/vendor/autoload.php';

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

    public function sendpush_notification($dataArr,$driverslist){
    
	    $notification = array(
	        'priority' => 1,
	        'forceShow' => true, 
	        'title' => $dataArr['title'],
	        'body' => $dataArr['body'],
	        'sound' => 'default',      
	        'badge' => '1',
	        "image" => $dataArr['image'],
	    );

        $data = $dataArr;
	    
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

}//end of class
