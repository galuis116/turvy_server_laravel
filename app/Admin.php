<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticate;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticate
{
    use Notifiable;
    use HasRoles;
    
    protected  $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'mobile'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
