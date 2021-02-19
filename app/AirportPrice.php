<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirportPrice extends Model
{
    public function airport()
    {
        return $this->belongsTo(Airport::class, 'airport_id');
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
    public function servicetype()
    {
        return $this->belongsTo(VehicleType::class, 'servicetype_id');
    }
}
