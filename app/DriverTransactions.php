<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverTransactions extends Model
{
    
    protected $table = 'driver_transactions';
    public static $snakeAttributes = false;
    protected $primaryKey = 'id';

    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }
}