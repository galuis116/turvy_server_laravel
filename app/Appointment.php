<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appointment extends Model
{
    protected $fillable = [
        'id',
        'rider_id',
        'rider_country_id',
        'rider_name',
        'rider_mobile',
        'rider_email',
        'is_current',
        'booking_date',
        'booking_time',
        'origin',
        'origin_lat',
        'origin_lng',
        'destination',
        'destination_lat',
        'destination_lng',
        'servicetype_id',
        'driver_id',
        'coupon_id',
        'payment_id',
        'surge_charge',
        'is_manual',
        'status',
        'cancel_reason',
        'travel_path'
    ];

    protected $appends = ['payment_total', 'payment_surge', 'payment_tip'];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function servicetype()
    {
        return $this->belongsTo(VehicleType::class, 'servicetype_id', 'id');
    }

    public function getPaymentTotalAttribute()
    {
        $payment = PaymentRequest::where('appointment_id', $this->id)->where('type', 'BOOK')->first();
        if ($payment)
            return $payment->total;
        else
            return 0;
    }

    public function getPaymentSurgeAttribute()
    {
        $payment = PaymentRequest::where('appointment_id', $this->id)->where('type', 'BOOK')->first();
        if ($payment)
            return $payment->surge;
        else
            return 0;
    }

    public function getPaymentTipAttribute()
    {
        $payment = PaymentRequest::where('appointment_id', $this->id)->where('type', 'TIP')->first();
        if ($payment)
            return $payment->total;
        else
            return 0;
    }
    
    public function getRides($type, $rider_id,$page=1, $noLimit = 'yes') {
  	   $items_per_page = 10; 
  		$offset = ($page - 1) * $items_per_page;
  		if($type == 1){
  			$rides = DB::table('appointments')
	                    ->select('appointments.*', 
	                    'payment_requests.total', 
	                    'payment_requests.subtotal',
	                    'payment_requests.surge', 
	                    'payment_requests.surgeinfo',
	                    'drivers.first_name', 
	                    'drivers.last_name', 
	                    'rider_ratings.rating',
	                    'appointments.booking_date',
	                    'appointments.booking_time',
	                    'drivers.avatar',
	                    'payments.name as paymenthod',
	                     'vehicle_types.name as servicename'
	                    )
	            ->where('appointments.rider_id', $rider_id)->where('appointments.is_current', 0)
	            ->leftJoin('payment_requests', 'payment_requests.appointment_id', '=', 'appointments.id')
	            ->leftJoin('rider_ratings', 'rider_ratings.book_id', '=', 'appointments.id')
	            ->leftJoin('drivers', 'drivers.id', '=', 'appointments.driver_id')
	            ->leftJoin('payments', 'payments.id', '=', 'appointments.payment_id')
	            ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'appointments.servicetype_id')
	            ->groupBy('appointments.id')
	            ->orderBy("appointments.booking_date","DESC")
	            ->orderBy('appointments.booking_time', 'DESC');
	            if ($noLimit == 'yes') {
	             	$rides->offset($offset);
	             	$rides->limit($items_per_page);
	             }
	           
	           $ridesData =  $rides->get(); 
	            
  		}else{
			$rides = DB::table('appointments')
	                    ->select('appointments.*', 
	                    'payment_requests.total',
	                    'payment_requests.subtotal',
	                    'payment_requests.surge', 
	                    'payment_requests.surgeinfo',
						'payment_requests.violant_end',
	                    'drivers.first_name', 
	                    'drivers.last_name', 
	                    'rider_ratings.rating',
	                    'appointments.booking_date',
	                    'appointments.booking_time',
	                     'drivers.avatar',
	                     'payments.name as paymenthod',
	                     'vehicle_types.name as servicename'
	                    )
	            ->where('appointments.rider_id', $rider_id)->where('appointments.status', $type)
	            ->leftJoin('payment_requests', 'payment_requests.appointment_id', '=', 'appointments.id')
	            ->leftJoin('rider_ratings', 'rider_ratings.book_id', '=', 'appointments.id')
	            ->leftJoin('drivers', 'drivers.id', '=', 'appointments.driver_id')
	            ->leftJoin('payments', 'payments.id', '=', 'appointments.payment_id')
	            ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'appointments.servicetype_id')
	            ->groupBy('appointments.id')
	            ->orderBy("appointments.booking_date","DESC")
	            ->orderBy('appointments.booking_time', 'DESC');
	             if ($noLimit == 'yes') {
	             	$rides->offset($offset);
	             	$rides->limit($items_per_page);
	             }
	           
	           $ridesData =  $rides->get(); 
	      }

       $ridesFormat = array();
        foreach($ridesData as $k => $ride){

            if ($ride->booking_date == date("Y-m-d")) {
                
               $ridesFormat[$k]['booking_date'] = 'Today, '; 
              
           } else {
              
                $ridesFormat[$k]['booking_date'] = date('d M Y', strtotime($ride->booking_date));

           }
          
            $ridesFormat[$k]['booking_time'] = date('h:i A',strtotime($ride->booking_time));
            $ridesFormat[$k]['end_time'] = date('h:i A',strtotime($ride->end_time));
            $ridesFormat[$k]['start_time'] = date('h:i A',strtotime($ride->start_time));

            $ridesFormat[$k]['total'] = $ride->total;
            $ridesFormat[$k]['first_name'] = $ride->first_name;
            $ridesFormat[$k]['last_name'] = $ride->last_name;
            $ridesFormat[$k]['rating'] =  $ride->rating;
            $ridesFormat[$k]['origin'] = $ride->origin;
            $ridesFormat[$k]['destination'] = $ride->destination;
            $ridesFormat[$k]['arrival_time'] = date('h:i A',strtotime($ride->arrival_time));
            $ridesFormat[$k]['avatar'] = $ride->avatar;
            $ridesFormat[$k]['id'] = $ride->id;
            $ridesFormat[$k]['paymenthod'] = $ride->paymenthod;
            $ridesFormat[$k]['servicename'] = $ride->servicename;
            $ridesFormat[$k]['origin_lat'] = $ride->origin_lat;
				$ridesFormat[$k]['origin_lng'] = $ride->origin_lng;
				$ridesFormat[$k]['destination_lat'] = $ride->destination_lat;
				$ridesFormat[$k]['destination_lng'] = $ride->destination_lng;
				$ridesFormat[$k]['subtotal'] = $ride->subtotal;
				$ridesFormat[$k]['surge'] = $ride->surge;
				$ridesFormat[$k]['surgeinfo'] = $ride->surgeinfo;
				$ridesFormat[$k]['cancellation_charge'] = $ride->violant_end;
				$ridesFormat[$k]['status'] = $ride->status;
				$ridesFormat[$k]['cancel_reason'] = $ride->cancel_reason;
				/*
				 'payment_requests.subtotal',
	          'payment_requests.surge', 
	          'payment_requests.surgeinfo',
				*/
        }

        return $ridesFormat;
    }  
    
   public function getCompleteRides() {
   	
   	$orders = DB::table('appointments')
                ->select('*', DB::raw('( 6371 * acos( cos( radians(-33.8688) ) * cos( radians( `origin_lat` ) ) * 
cos( radians( `origin_lng` ) - radians(151.2195) ) + sin( radians(-33.8688) ) * 
sin( radians( `origin_lat` ) ) ) ) AS distance'))
                ->havingRaw('distance < ?', [1000])
                ->get();
       return $orders;
   }
   
     public function getRidesRecepit($rider_id,$book_id) {
  	   
			$rides = DB::table('appointments')
	                    ->select('appointments.*', 
	                    'payment_requests.total',
	                    'payment_requests.subtotal',
	                    'payment_requests.surge', 
	                    'payment_requests.surgeinfo',
	                    'drivers.first_name', 
	                    'drivers.last_name', 
	                    'rider_ratings.rating',
	                    'appointments.booking_date',
	                    'appointments.booking_time',
	                    'appointments.trip_distance',
	                    'appointments.trip_duration',
	                    'drivers.avatar',
	                    'payments.name as paymenthod',
	                    'vehicle_types.name as servicename',
						'driver_vehicles.color',
						'vehicle_makes.name as make',
						'vehicle_models.name as model' 
	                    )
	            ->where('appointments.rider_id', $rider_id)
	            ->where('appointments.id',$book_id)
	            ->leftJoin('payment_requests', 'payment_requests.appointment_id', '=', 'appointments.id')
	            ->leftJoin('rider_ratings', 'rider_ratings.book_id', '=', 'appointments.id')
	            ->leftJoin('drivers', 'drivers.id', '=', 'appointments.driver_id')
	            ->leftJoin('payments', 'payments.id', '=', 'appointments.payment_id')
	            ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'appointments.servicetype_id')
	            ->leftJoin('driver_vehicles', 'driver_vehicles.driver_id', '=', 'appointments.driver_id')
	            ->leftJoin('vehicle_models', 'vehicle_models.id', '=', 'driver_vehicles.model_id')
 				   ->leftJoin('vehicle_makes', 'vehicle_makes.id', '=', 'vehicle_models.make_id')
	            ->groupBy('appointments.id')
	            ->orderBy("appointments.booking_date","DESC")
	            ->get(); 
	    
       $ridesFormat = array();
        foreach($rides as $k => $ride){
        

            if ($ride->booking_date == date("Y-m-d")) {
                
               $ridesFormat[$k]['booking_date'] = 'Today, '.date('d M Y', strtotime($ride->booking_date)); 
              
           } else {
              
                $ridesFormat[$k]['booking_date'] = date('d M Y', strtotime($ride->booking_date));

           }
          
            $ridesFormat[$k]['booking_time'] = date('h:i A',strtotime($ride->booking_time));
            $ridesFormat[$k]['end_time'] = date('h:i A',strtotime($ride->end_time));
            $ridesFormat[$k]['start_time'] = date('h:i A',strtotime($ride->start_time));

            $ridesFormat[$k]['total'] = $ride->total;
            $ridesFormat[$k]['first_name'] = $ride->first_name;
            $ridesFormat[$k]['last_name'] = $ride->last_name;
            $ridesFormat[$k]['rating'] =  $ride->rating;
            $ridesFormat[$k]['origin'] = $ride->origin;
            $ridesFormat[$k]['destination'] = $ride->destination;
            $ridesFormat[$k]['arrival_time'] = date('h:i A',strtotime($ride->arrival_time));
            $ridesFormat[$k]['avatar'] = $ride->avatar;
            $ridesFormat[$k]['id'] = $ride->id;
   
         $ridesFormat[$k]['trip_duration'] = $ride->trip_duration;
         $ridesFormat[$k]['trip_distance'] = $ride->trip_distance;
            
         $ridesFormat[$k]['paymenthod'] = $ride->paymenthod;
         $ridesFormat[$k]['servicename'] = $ride->servicename;
         $ridesFormat[$k]['origin_lat'] = $ride->origin_lat;
			$ridesFormat[$k]['origin_lng'] = $ride->origin_lng;
			$ridesFormat[$k]['destination_lat'] = $ride->destination_lat;
			$ridesFormat[$k]['destination_lng'] = $ride->destination_lng;
			$ridesFormat[$k]['subtotal'] = $ride->subtotal;
			$ridesFormat[$k]['surge'] = $ride->surge;
			$ridesFormat[$k]['surgeinfo'] = $ride->surgeinfo;
			$ridesFormat[$k]['status'] = $ride->status;
			$ridesFormat[$k]['cancel_reason'] = $ride->cancel_reason;

			$ridesFormat[$k]['make'] = $ride->make;
			$ridesFormat[$k]['model'] = $ride->model;
			$ridesFormat[$k]['color'] = $ride->color;
			$duration = $this->gettimefromdate($ride->start_time,$ride->end_time);
			$ridesFormat[$k]['trip_duration'] = $duration;
			
				/*
				 'payment_requests.subtotal',
	          'payment_requests.surge', 
	          'payment_requests.surgeinfo',
				*/
         }
			
        return $ridesFormat;
    }  
    
    
    public function gettimefromdate($start='0000-00-00 00:00:00',$end='0000-00-00 00:00:00'){
			//$now = new DateTime();
			$durtaion ='';
			if($end != null && $start != null){
				
				 $end_date = new \DateTime($end);
			    $start_date = new \DateTime($start);
			    
			    $interval = $end_date->diff($start_date);
			    $durtaion = '';
			    if((($interval->format("%a") * 24) + $interval->format("%h")) != 0){
			    	$durtaion = ($interval->format("%a") * 24) + $interval->format("%h"). " hours ";
			    }
			    if($interval->format("%i") != 0){
			    	$durtaion .= $interval->format(" %i min ");
			    }
			     // echo $interval->format("%s") ;
			     if($interval->format("%s") != 0){
			    	$durtaion .= $interval->format(" %s sec ");
			    }
			}
		   
		    return  $durtaion;
		    //print_r($start_date->format('Y-m-d H:i:s'));
		    //print_r($end_date->format('Y-m-d H:i:s'));
        
    }
   
  
}
