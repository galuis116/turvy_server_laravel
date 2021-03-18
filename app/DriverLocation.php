<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverLocation extends Model
{
    protected $fillable = ['driverId', 'lat', 'lng'];

    public function driver(){
        return $this->belongsTo(Driver::class, 'driverId');
    }
}
