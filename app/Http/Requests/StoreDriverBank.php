<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverBank extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bsb_number' => 'required',
            'bank_name' => 'required',
            'bank_account_number' => 'required',
            'bank_account_title' => 'required',
            'bank_address' => 'required',
            'bank_city' => 'required',
            'bank_postal_code' => 'required',
            'dob' => 'required',
        ];
    }
}
