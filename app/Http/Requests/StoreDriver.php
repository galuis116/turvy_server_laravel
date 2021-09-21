<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriver extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required|numeric',
            'email' => 'required|email',
            'phonecode' => 'required',
            'mobile' => 'required|regex:/^(\S[1-9][0-9]+)$/',
            'commission' => 'required',
            'country_id' => 'required|numeric|not_in:0',
            'state_id' => 'required|numeric|not_in:0',
            'city_id' => 'required|numeric|not_in:0',
            'make_id' => 'required|numeric|not_in:0',
            'model_id' => 'required|numeric|not_in:0',
            'servicetypeIDs' => 'required',
            'plate' => 'required',
            'color' => 'required',
            'year' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phonecode.required' => 'Choose a country.',
            'mobile.regex' => 'Phone number is invalid.',
            'country_id.not_in' => 'You must choose a country.',
            'state_id.not_in' => 'You must choose a state.',
            'city_id.not_in' => 'You must choose a city.',
            'make_id.not_in' => 'You must choose a vehicle make.',
            'model_id.not_in' => 'You must choose a vehicle model.'
        ];
    }
}
