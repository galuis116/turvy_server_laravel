<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    public function make()
    {
        return $this->belongsTo(VehicleMake::class, 'make_id', 'id');
    }
    public function servicetype()
    {
        return $this->belongsTo(VehicleType::class, 'servicetype_id', 'id');
    }
}
