<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreState extends FormRequest
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
            'fullname' => 'required',
            'country_id' => 'required|numeric|not_in:0',
            'currency_id' => 'required|numeric|not_in:0',
            'distance_id' => 'required|numeric|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'currency_id.not_in' => 'You must choose a special currency name in dropdown list. If it has no currency name you want, you should add the currency in base management.',
            'distance_id.not_in' => 'You must choose a special distance name in dropdown list. If it has no distance name you want, you should add the distance in base management.'
        ];
    }
}
