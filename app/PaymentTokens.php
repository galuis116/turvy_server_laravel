<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaymentTokens extends Model
{
    //
   protected $table = 'payment_tokens';
	public static $snakeAttributes = false;
	protected $primaryKey = 'id';
	
	
}
