<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'email', 'password', 'mobile', 'mobile_verified_at', 'verification_code', 'partner_id','email_verified_at', 'ip_address', 'device_type', 'device_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['name', 'partner_income'];

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getPartnerIncomeAttribute()
    {
        // Get transactions associated with current rider.
        $transactions = Transaction::where('sender', $this->id)->get();
        $total_partner_income = 0;
        foreach($transactions as $transaction){
            // Get driver's commission
            $commission = Driver::find($transaction->receiver)->commission;
            // Calculate admin income.
            $admin_income = $transaction->amount * $commission / 100;
            // Calculate partner income
            $partner_income = $admin_income * 0.05;
            $total_partner_income += $partner_income;
        }
        return $total_partner_income;
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

}
