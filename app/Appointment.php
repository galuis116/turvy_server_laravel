<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'id',
        'rider_id',
        'rider_country_id',
        'rider_name',
        'rider_mobile',
        'rider_email',
        'is_current',
        'booking_date',
        'booking_time',
        'origin',
        'origin_lat',
        'origin_lng',
        'destination',
        'destination_lat',
        'destination_lng',
        'servicetype_id',
        'driver_id',
        'coupon_id',
        'payment_id',
        'is_manual',
        'status',
        'cancel_reason',
        'travel_path'
    ];

    protected $appends = ['payment_total', 'payment_surge', 'payment_tip'];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function servicetype()
    {
        return $this->belongsTo(VehicleType::class, 'servicetype_id', 'id');
    }

    public function getPaymentTotalAttribute()
    {
        $payment = PaymentRequest::where('appointment_id', $this->id)->where('type', 'BOOK')->first();
        if ($payment)
            return $payment->total;
        else
            return 0;
    }

    public function getPaymentSurgeAttribute()
    {
        $payment = PaymentRequest::where('appointment_id', $this->id)->where('type', 'BOOK')->first();
        if ($payment)
            return $payment->surge;
        else
            return 0;
    }

    public function getPaymentTipAttribute()
    {
        $payment = PaymentRequest::where('appointment_id', $this->id)->where('type', 'TIP')->first();
        if ($payment)
            return $payment->total;
        else
            return 0;
    }
}
