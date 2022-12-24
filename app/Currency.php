<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function states()
    {
        return $this->hasMany(State::class, 'id', 'state_id');
    }
}
