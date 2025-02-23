<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductReqValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:225',
            'description' => 'required|string',
            'sku' => "required|unique:products,sku," . $this->route('id'),
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Product name is required.',
            'category_id.required' => 'Category Id is required.',
            'price.required' => 'Product price is required and must be a number.',
        ];
    }
}