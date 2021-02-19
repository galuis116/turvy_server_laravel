<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoupon extends FormRequest
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
            'code' => 'required',
            'started_at' => 'required',
            'expired_at' => 'required',
            'type' => 'required',
            'value' => 'required',
            'usetotal' => 'required',
            'usecustomer' => 'required',
        ];
    }
}
