<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignupEmail extends FormRequest
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
            'sender_email' => 'required',
            'sender_name' => 'required',
            'subject' => 'required',
            'title' => 'required',
            'body1' => 'required',
            'body2' => 'required',
            'footer' => 'required',
            'is_active' => 'required',
        ];
    }
}
