<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookDecline extends Model
{
    //
   protected $table = 'booking_decline';
	public static $snakeAttributes = false;
	protected $primaryKey = 'bookdecId';

}
