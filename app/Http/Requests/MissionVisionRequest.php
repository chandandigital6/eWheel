<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionVisionRequest extends FormRequest
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
            // 'vision' => 'nullable|string|max:255',
            // 'vision_description' => 'nullable|string',
            // 'mission' => 'nullable|string|max:255',
            // 'mission_description' => 'nullable|string',
        ];
    }
}
