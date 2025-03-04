<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function user()
    {
        if($this->user_type == 1)
            return $this->hasOne(User::class, 'id', 'user_id');
        if($this->user_type == 2)
            return $this->hasOne(Driver::class, 'id', 'user_id');
    }
}
