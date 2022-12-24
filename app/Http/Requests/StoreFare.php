<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFare extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'state_id' => 'required|integer',
            'servicetype_id' => 'required|integer',
            'company_commission' => 'required',
            'base_ride_distance' => 'required',
            'base_ride_distance_charge' => 'required',
            'price_per_unit' => 'required',
            'price_per_minute' => 'required',
            'fee_waiting_time' => 'required',
            'waiting_price_per_minute' => 'required',
            'gst_charge' => 'required',
            'fuel_surge_charge' => 'required',
            'nsw_gtl_charge' => 'required',
            'nsw_ctp_charge' => 'required',
            'booking_charge' => 'required',
            'cancel_charge' => 'required',
            'minimum_fare' => 'required',
            'after_minimum_fare' => 'required'
        ];
    }
}
