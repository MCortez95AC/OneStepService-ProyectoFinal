<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'image' => 'required|image',
            'name' => 'required|string',
            'price' => 'required|min:0.50',
            'description' => 'required|max:500'
        ];
    }
    public function messages(){
    return [
        'name.required' => 'The :attribute is required, please fill it',
        'name.string' => 'The :attribute must be text',
        'price.required' => 'Add product :attribute please',
        'price.min' => 'The :attribute should be minin 1',
        'description.required' => 'The :attribute is required, please fill it',
        'image.required' => 'Please add a product image',
        'image.image' => 'Wrong file type, please add a jpg/png image' 
    ];
    }
}
