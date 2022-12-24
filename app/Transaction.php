<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function rider()
    {
        return $this->hasOne(User::class, 'id', 'sender');
    }
    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'receiver');
    }
    public function paymentMode()
    {
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }
}
