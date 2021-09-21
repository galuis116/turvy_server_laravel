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
	
	public function getnotDeclineRide($driver_id=0 ){

    $bookings = DB::table('appointments')
        ->select(
            'appointments.*',
            'users.avatar as rideravtar'
        )
        ->leftJoin('users','users.id','=','appointments.rider_id' )
        ->where('appointments.status','0')
        ->where('appointments.driver_id','=',$driver_id)
        ->orderby('appointments.id', 'DESC')
        ->first();

    //echo "<pre>";print_r($bookings);exit;

    $BookDecline = DB::table('booking_decline')
        ->where('booking_decline.booking_id', '=', $bookings->id)
        ->where('booking_decline.driver_id', '=', $driver_id)
        ->get()->count();

    if($BookDecline <= 0){
        return $bookings;    
    }

    return false;

  }

}
