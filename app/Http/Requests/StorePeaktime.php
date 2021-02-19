<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeaktime extends FormRequest
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
            'day' => 'required',
            'slot_one_starttime' => 'required',
            'slot_one_endtime' => 'required',
            'slot_two_starttime' => 'required',
            'slot_two_endtime' => 'required',
            'charges_type_id' => 'required|integer',
            'charge' => 'required'
        ];
    }
}
