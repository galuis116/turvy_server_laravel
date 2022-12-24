<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrivingTime extends Model
{

    protected $table = 'driving_time';
    public static $snakeAttributes = false;
    protected $primaryKey = 'id';
    
    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }
}
