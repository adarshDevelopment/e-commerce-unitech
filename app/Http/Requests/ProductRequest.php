<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|unique:products'.(request()->method()== "POST" ? '' : ',title,'.$this->id),
            'slug' => 'required|unique:products'.(request()->method()== "POST" ? '' : ',slug,'.$this->id),
            'status' => 'required',
            'price' => 'required',
            'subcategory_id' => 'required',
            'short_description' => 'required'
        ];
    }
}
