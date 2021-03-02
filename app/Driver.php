<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;
    protected  $guard = 'driver';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  	protected $fillable = [
      'first_name', 'last_name', 'gender', 'email', 'password', 'mobile', 'country_id', 'state_id', 'city_id', 'mobile_verified_at','verification_code','email_verified_at', 'ip_address'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   //   protected $casts = [
   //     'email_verified_at' => 'datetime',
  //  ];


    protected $appends = ['name', 'is_available'];

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getIsAvailableAttribute()
    {
        if($this->is_busy == 0 && $this->is_online == 1 && $this->is_login == 1)
            return 1;
        return 0;
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function rides()
    {
        return $this->hasMany(Appointment::class, 'id', 'driver_id');
    }

    public function vehicle()
    {
        return $this->hasOne(DriverVehicle::class, 'driver_id');
    }
}
