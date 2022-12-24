<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiderTransaction extends Model
{
    
    protected $table = 'rider_transaction';
    public static $snakeAttributes = false;
    protected $primaryKey = 'id';

    /*public function rider()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }
    */
}