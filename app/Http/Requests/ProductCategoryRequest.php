<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'The category name is required.',
            'category_name.string' => 'The category name must be a string.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be of type: jpg, jpeg, png, gif.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    }
}
