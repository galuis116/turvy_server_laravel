<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCity extends FormRequest
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
            'name' => 'required',
            'country_id' => 'required|numeric|not_in: 0',
            'state_id' => 'required|numeric|not_in: 0'
        ];
    }

    public function messages()
    {
        return [
            'country_id.not_in' => 'You must choose a special country name in dropdown list. If it has no country name you want, you should add the country in base management.',
            'state_id.not_in' => 'You must choose a special state name in dropdown list. If it has no state name you want, you should add the state in base management.'
        ];
    }
}
