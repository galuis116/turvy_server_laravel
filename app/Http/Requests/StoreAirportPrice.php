<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAirportPrice extends FormRequest
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
            'package_name' => 'required|unique:airport_prices,package_name,'.$this->id,
            'airport_id' => 'required|numeric',
            'destination_id' => 'required|numeric',
            'servicetype_id' => 'required|numeric',
            'price' => 'required|numeric',
            'number_tolls' => 'required|numeric',
        ];
    }
    
    public function messages()
    {
        return [
            'airport_id.numeric' => 'You must choose an airport in dropdown list. If it has no an airport you want, you should add the airport in airport management.',
            'destination_id.numeric' => 'You must choose a destination name in dropdown list. If it has no a destination name you want, you should add the destination in destination management.',
            'servicetype_id.numeric' => 'You must choose a vehicle type name in dropdown list. If it has no a vehicle type name you want, you should add the vehicle type in vehicle type management.'
        ];
    }
}
