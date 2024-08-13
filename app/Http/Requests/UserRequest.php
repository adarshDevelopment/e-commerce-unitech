<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => 'required|unique:users'.(request()->method()== "POST" ? '' : ',name,'.$this->id),
            'name' => 'required',
            'role_id' => 'required'
        ];
    }
}
