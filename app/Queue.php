<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
	
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }
    public function airport()
    {
        return $this->belongsTo(Airport::class, 'airport_id');
    }
}
