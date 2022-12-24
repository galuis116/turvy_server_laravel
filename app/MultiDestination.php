<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MultiDestination extends Model
{
    //
   protected $table = 'multi_destination';
	public static $snakeAttributes = false;
	protected $primaryKey = 'id';
	
	
}
