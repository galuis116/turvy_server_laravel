<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VehicleMake extends Model
{
    //
    private $name;
    /**
     * @var string
     */
    private $image;

    public function models()
    {
        $this->hasMany(VehicleModel::class, 'id', 'make_id');
    }

    public function drivers()
    {
        $this->hasMany(DriverVehicle::class, 'id', 'make_id');
    }
}
