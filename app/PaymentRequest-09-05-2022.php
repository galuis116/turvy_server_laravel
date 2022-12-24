<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaymentRequest extends Model
{
    





 public function getRiderPaymentHistory($rider_id, $page_search = 'today') {




       
            $rides = DB::table('payment_requests')
                        ->select('payment_requests.total',
                        'drivers.first_name', 
                        'drivers.last_name', 
                        'appointments.origin',
                        'appointments.destination',
                        'appointments.start_time',
                        'appointments.end_time',
                        'appointments.created_at'
                        )
                ->where('payment_requests.rider_id', $rider_id)
                ->whereDate('payment_requests.created_at', '=', date('Y-m-d'))

              // ->where('payment_requests.created_at', $search_date)
                ->whereDate('payment_requests.created_at', '=', date('Y-m-d'))

                ->leftJoin('appointments', 'payment_requests.appointment_id', '=', 'appointments.id')
                ->leftJoin('drivers', 'drivers.id', '=', 'appointments.driver_id')
                ->groupBy('payment_requests.id')
                ->orderBy("payment_requests.id","DESC")
                ->get(); 
    
        
       $ridesFormat = array();
        foreach($rides as $k => $ride){
    
          
            $ridesFormat[$k]['paid_time'] = date('d M Y h:i A',strtotime($ride->created_at));
            $ridesFormat[$k]['end_time'] = date('h:i A',strtotime($ride->end_time));
            $ridesFormat[$k]['start_time'] = date('h:i A',strtotime($ride->start_time));
            $ridesFormat[$k]['total'] = $ride->total;
            $ridesFormat[$k]['first_name'] = $ride->first_name;
            $ridesFormat[$k]['last_name'] = $ride->last_name;
            $ridesFormat[$k]['origin'] = $ride->origin;
            $ridesFormat[$k]['destination'] = $ride->destination;
               
         }
            
        return $ridesFormat;
    }  


}
