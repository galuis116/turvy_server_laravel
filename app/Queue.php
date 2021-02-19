<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    public function driver()
    {
        $this->belongsTo(Driver::class, 'driver_id');
    }
    public function airport()
    {
        $this->belongsTo(Airport::class, 'airport_id');
    }
}
