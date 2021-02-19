<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartner extends FormRequest
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
            'username' => 'required|unique:partners,username,'.$this->id,
            'phonecode' => 'required',
            'mobile' => 'required|regex:/^(\S[1-9][0-9]+)$/',
            'organization' => 'required',
            'url' => 'required',
            'country_id' => 'required|numeric|not_in:0',
            'state_id' => 'required|numeric|not_in:0',
            'city_id' => 'required|numeric|not_in:0',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'country_id.not_in' => 'You must choose a special country name in dropdown list. If it has no country name you want, you should add the country in region management.',
            'state_id.not_in' => 'You must choose a special state name in dropdown list. If it has no state name you want, you should add the state in region management.',
            'city_id.not_in' => 'You must choose a special city name in dropdown list. If it has no city name you want, you should add the city in region management.',
            'mobile.regex' => 'Phone number is invalid.'
        ];
    }
}
