<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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

            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'number' => 'required|string|max:255',
            'msg' => 'nullable',
            'product_name' => 'required|string|max:255',
            'book_date' => 'nullable|date|after_or_equal:today',

        ];
    }
}
