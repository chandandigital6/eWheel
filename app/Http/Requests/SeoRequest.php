<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoRequest extends FormRequest
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
            'description' => 'nullable|string',
            'canonical' => 'nullable|url',
            'og_locale' => 'nullable|string',
            'og_type' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_url' => 'nullable|url',
            'og_site_name' => 'nullable|string',
            'article_publisher' => 'nullable|url',
            'og_image' => 'nullable|url',
            'twitter_label1' => 'nullable|string',
            'twitter_data1' => 'nullable|string',
            'twitter_label2' => 'nullable|string',
            'twitter_data2' => 'nullable|string',
            'title'=>'nullable|string',
            'course_id' => 'nullable|exists:courses,id',
        ];
    }
}
