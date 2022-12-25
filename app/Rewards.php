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

    public function rider() {
        return $this->belongsTo(User::class, 'rider_id', 'id');
    }

    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

}
