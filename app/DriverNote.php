<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;

class DriverNote extends Model
{
    public function admin()
    {
        return Admin::find($this->admin_id);
    }
}
