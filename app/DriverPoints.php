<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverPoints extends Model
{
    
    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }
}
