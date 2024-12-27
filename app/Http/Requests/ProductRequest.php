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
        $productId = $this->route('product');
        return [
            'title' => 'required|string|max:255',
        'sub_title' => 'nullable|string|max:255',
        'sku_number' => 'required|string|max:255|unique:products,sku_number,' . $productId,
        'short_description' => 'nullable|string|max:1000',
        'long_description' => 'nullable|string',
        'qty' => 'nullable|integer|min:0',
        'price' => 'nullable|numeric|min:0',
        'accessories' => 'nullable|string',
        'f_1' => 'nullable|string|max:255',
        'f_2' => 'nullable|string|max:255',
        'f_3' => 'nullable|string|max:255',
        'f_4' => 'nullable|string|max:255',
        'f_5' => 'nullable|string|max:255',
        'f_6' => 'nullable|string|max:255',
        'image.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'product_category_id' => 'nullable|exists:product_categories,id',
        ];
    }
}
