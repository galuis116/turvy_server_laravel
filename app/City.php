<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
}
