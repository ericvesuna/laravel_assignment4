<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name'=>'bail|required|regex:/^[a-zA-Z0-9\s]+$/',
            'product_price'=>'bail|required|numeric',
            'product_image'=>'bail|nullable|mimes:jpeg,jpg,png|max:2048',
            'category'=>'required'
        ];
    }

    public function messages()
    {
        return [
        'product_name.required'=>'Please Enter Product Name',
        'product_name.regex'=>'Product Name should be in Alphanumeric',
        'product_price.required'=>'Please Enter Product Price',
        'product_price.numeric'=>'Please enter only Numeric Value',
        'product_image.max'=>'Image Size should be less than 2MB',
        'product_image.mimes'=>'Only jpeg,jpg or png images are allowed',
        'category.required'=>'Please Select Category'
        ];
    }
}
