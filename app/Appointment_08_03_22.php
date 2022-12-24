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
    
    public function getRides($type, $rider_id,$page=1) {
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
	            ->orderBy('appointments.booking_time', 'DESC')
	            ->offset($offset)
	        	   ->limit($items_per_page)
	            ->get(); 
	            
  		}else{
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
	            ->where('appointments.rider_id', $rider_id)->where('appointments.status', $type)
	            ->leftJoin('payment_requests', 'payment_requests.appointment_id', '=', 'appointments.id')
	            ->leftJoin('rider_ratings', 'rider_ratings.book_id', '=', 'appointments.id')
	            ->leftJoin('drivers', 'drivers.id', '=', 'appointments.driver_id')
	            ->leftJoin('payments', 'payments.id', '=', 'appointments.payment_id')
	            ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'appointments.servicetype_id')
	            ->groupBy('appointments.id')
	            ->orderBy("appointments.booking_date","DESC")
	            ->orderBy('appointments.booking_time', 'DESC')
	             ->offset($offset)
	        	   ->limit($items_per_page)
	            ->get(); 
	      }

       $ridesFormat = array();
        foreach($rides as $k => $ride){

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
   
  
}
