<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'con_title' => 'nullable|string|max:255',
        'title' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'open_time' => 'nullable|string|max:255',
        'map_url' => 'nullable',
        'fb_url' => 'nullable|url',
        'insta_url' => 'nullable|url',
        'wtsapp_url' => 'nullable|url',
        'twi_url' => 'nullable|url',
        'you_url' => 'nullable|url',
        'other_url' => 'nullable|url',
        ];
    }
}
