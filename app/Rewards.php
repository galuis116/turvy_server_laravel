<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rewards extends Model
{
    //
   protected $table = 'rewards';
	public static $snakeAttributes = false;
	protected $primaryKey = 'id';
  
}
