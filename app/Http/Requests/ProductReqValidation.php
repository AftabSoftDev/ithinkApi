<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

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
            'sku' => "required|unique:product,sku," . $this->route('id'),
            'price' => 'required|numeric',
            'category_id' => 'required|exists:category,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Product name is required.',
            'name.string' => 'Product name must be a valid string.',
            'name.max' => 'Product name must not exceed 225 characters.',
            'description.required' => 'Product description is required.',
            'description.string' => 'Product description must be a valid string.',
            'sku.required' => 'Product SKU is required.',
            'sku.unique' => 'The SKU must be unique, this SKU is already in use.',
            'price.required' => 'Product price is required and must be a valid number.',
            'price.numeric' => 'Product price must be a valid numeric value.',
            'category_id.required' => 'Category ID is required.',
            'category_id.exists' => 'The selected Category ID is invalid. Please choose a valid category.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        // Handle failed validation and throw an exception with custom error messages
        throw new ValidationException($validator, response()->json([
            'code' => 422,
            'status' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422)); // 422 is Unprocessable Entity status code
    }

}