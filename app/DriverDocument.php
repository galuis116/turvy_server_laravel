<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverDocument extends Model
{
    public function document()
    {
        return $this->hasOne(Document::class, 'id', 'document_id');
    }
    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }
}
