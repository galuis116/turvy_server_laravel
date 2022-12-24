<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiderAddresses extends Model
{
	protected $table = 'rider_addresses';
	
   /* public function rider()
    {
        return $this->hasOne(User::class, 'id', 'rider_id');
    }
    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }
    */
}
