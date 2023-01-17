<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverVehicle extends Model
{
    protected $fillable = [
        'driver_id', 'make_id', 'model_id', 'servicetype_id', 'plate', 'color', 'year', 'front_photo'
    ];
    protected $appends = ['servicetype', 'carrego'];
    public function make()
    {
        return $this->hasOne(VehicleMake::class, 'id', 'make_id');
    }

    public function model()
    {
        return $this->hasOne(VehicleModel::class, 'id', 'model_id');
    }

    public function getServicetypeAttribute()
    {
        if($this->servicetype_id){
            $servicetypeIDs = explode(",", $this->servicetype_id);
            $servicetype = [];
            foreach($servicetypeIDs as $servicetypeID){
                $vehicletype = VehicleType::find($servicetypeID);
                array_push($servicetype, $vehicletype->name);
            }
            return implode(",", $servicetype);
        }else{
            return false;
        }
    }

    public function getCarregoAttribute()
    {
        return $this->make->name . ' ' . $this->model->name;
    }
}
