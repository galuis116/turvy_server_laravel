<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiderLocation extends Model
{
    protected $fillable = ['riderId', 'lat', 'lng'];
}
