<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookDecline extends Model
{
    //
   protected $table = 'booking_decline';
	public static $snakeAttributes = false;
	protected $primaryKey = 'bookdecId';
	
	public function getnotDeclineRide($driver_id=0, $book_id=0){

    $bookings = DB::table('appointments')
        ->select(
            'appointments.*',
            'users.avatar as rideravtar'
        )
        ->leftJoin('users','users.id','=','appointments.rider_id' )
        ->where('appointments.id',$book_id)
        ->where('appointments.status','0')
        ->where('appointments.driver_id','=',$driver_id)        
        ->orderby('appointments.id', 'DESC')
        ->first();

    //echo "<pre>";print_r($bookings);exit;
        //->where('appointments.created_at', '>', date('Y-m-d H:i:s',(time() - 24*60*60))

    if($bookings){
        $booTime = strtotime($bookings->created_at);
        $checkTime = (time() - 5*60*60);
        if($booTime < $checkTime){
            return false;
        }
        $BookDecline = DB::table('booking_decline')
            ->where('booking_decline.booking_id', '=', $bookings->id)
            ->where('booking_decline.driver_id', '=', $driver_id)
             ->where(function($q) {
          		$q->where('declineBy','=','manual')
            	->orWhere('declineBy','=', 'aftercancel');
      		})
            ->get()->count();

        if($BookDecline <= 0 ){
        	
        	 $BookDeclineauto = DB::table('booking_decline')
            ->where('booking_decline.booking_id', '=', $bookings->id)
            ->where('booking_decline.driver_id', '=', $driver_id)
            ->where('declineBy','=','auto')
            ->get()->count();
            if($BookDeclineauto <= 3){
            	return $bookings;    
            }
        }
    }

    return false;

  }

}
