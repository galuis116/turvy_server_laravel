<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PaymentRequest extends Model
{
    





 public function getRiderPaymentHistory($rider_id, $page_search = 'today') {

//print $page_search;
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
                ->where('payment_requests.rider_id', $rider_id);

                    $dateToday = date('Y-m-d');

                if (trim($page_search) != '' && trim($page_search) == 'this_week'){
                  
                    $weekstart = strtotime("next Monday") - 604800; 
                    $weekend = strtotime("next Monday") - 1; 

                    $monday = date('Y-m-d',$weekstart);
                    $sunday = date('Y-m-d',$weekend);
 
                   // echo "start of week is: ".date("Y-m-d", $weekstart)."\n"; 
                    
                    $weekend = strtotime("next Monday") - 1; 

                    //echo  ' week end : '.date("Y-m-d", $weekend);

                    $rides->whereBetween('payment_requests.created_at', [$monday, $sunday]);


                } elseif (trim($page_search) != '' && trim($page_search) == 'last_week') {

                    $weekstart = date('Y-m-d', strtotime("monday -2 week"));
                    $weekend = date('Y-m-d', strtotime("sunday -1 week"));


                    $rides->whereBetween('payment_requests.created_at', [$weekstart, $weekend]);

                } elseif (trim($page_search) != '' && trim($page_search) == 'this_month') {

                    $rides->whereMonth('payment_requests.created_at', date('m'));

                }elseif (trim($page_search) != '' && trim($page_search) == 'this_year') {
                     
                     $rides->whereYear('payment_requests.created_at', date('Y'));

                } elseif (trim($page_search) != '' && trim($page_search) == 'last_year') {

                    $lastYear =  date("Y-m-d",strtotime("-1 year"));

                    $rides->whereYear('payment_requests.created_at', date('Y', strtotime('-1 year')));

                } else { 

                    $rides->whereDate('payment_requests.created_at', '=', date('Y-m-d'));
                }
                $rides->leftJoin('appointments', 'payment_requests.appointment_id', '=', 'appointments.id');
                $rides->leftJoin('drivers', 'drivers.id', '=', 'appointments.driver_id');
                $rides->groupBy('payment_requests.id');
                $rides->orderBy("payment_requests.id","DESC");

               //echo  $rides->toSql();


                $ridsResult = $rides->get(); 
    
        
       $ridesFormat = array();
        foreach($ridsResult as $k => $ride){
    
          
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











public function getDriverPaymentHistory($page_search = 'today'){


        $driver_id = Auth::guard('driver')->user()->id;


                    $rides = DB::table('driver_transactions')
                        ->select('driver_transactions.amount',
                            'driver_transactions.total_amount',
                        'appointments.origin',
                        'appointments.destination',
                        'appointments.start_time',
                        'appointments.end_time',
                        'appointments.created_at'
                        )
                ->where('driver_transactions.driver_id', $driver_id);
                $rides->leftJoin('appointments', 'driver_transactions.book_id', '=', 'appointments.id');
                $ridsResult = $rides->get(); 
    
        
           $ridesFormat = array();
            foreach($ridsResult as $k => $ride){
    
          
            $ridesFormat[$k]['paid_time'] = date('d M Y h:i A',strtotime($ride->created_at));
            $ridesFormat[$k]['end_time'] = date('h:i A',strtotime($ride->end_time));
            $ridesFormat[$k]['start_time'] = date('h:i A',strtotime($ride->start_time));
            $ridesFormat[$k]['amount'] = $ride->amount;
            $ridesFormat[$k]['total_amount'] = $ride->total_amount;
            $ridesFormat[$k]['origin'] = $ride->origin;
            $ridesFormat[$k]['destination'] = $ride->destination;
               
         }
            
        return $ridesFormat;



  
    }//end of fun

}
