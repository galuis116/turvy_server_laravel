<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    public function model()
    {
        return $this->hasMany(VehicleModel::class, 'id', 'servicetype_id');
    }
}
