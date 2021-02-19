<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fare extends Model
{
    protected $appends = ['distance', 'currency'];

    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function serviceType()
    {
        return $this->hasOne(VehicleType::class, 'id', 'servicetype_id');
    }

    public function getDistanceAttribute()
    {
        $state = State::find($this->state_id);
        if($state)
        {
            $distance = Distance::find($state->distance_id);
            if($distance)
                return $distance->unit;
            return '?';
        }
        return '?';
    }

    public function getCurrencyAttribute()
    {
        $state = State::find($this->state_id);
        if($state)
        {
            $currency = Currency::find($state->currency_id);
            if($currency)
                return $currency->symbol;
            return '?';
        }
        return '?';
    }
}
