<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nighttime extends Model
{
    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
}
