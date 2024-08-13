<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'about_us' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
    }
}
