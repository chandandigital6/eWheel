<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'sku_number' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'qty' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'category_name' => 'nullable|string|max:255',
            'f_1' => 'nullable|string|max:255',
            'f_2' => 'nullable|string|max:255',
            'f_3' => 'nullable|string|max:255',
            'f_4' => 'nullable|string|max:255',
            'f_5' => 'nullable|string|max:255',
            'f_6' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
