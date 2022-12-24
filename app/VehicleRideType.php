<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleRideType extends Model
{
    public function serviceType()
    {
        return $this->hasOne(VehicleType::class, 'id', 'serviceType_id');
    }
}
