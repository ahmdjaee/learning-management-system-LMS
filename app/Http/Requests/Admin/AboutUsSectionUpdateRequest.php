<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsSectionUpdateRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'max:3000'], // max: 3000 KB (3MB)
            'round_text' => ['nullable', 'string', 'max:255'],
            'learner_count' => ['nullable', 'string', 'max:255'],
            'learner_count_text' => ['nullable', 'string', 'max:255'],
            'learner_image' => ['nullable', 'image', 'max:3000'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'url', 'max:255'],
            'video_url' => ['nullable', 'url', 'max:255'],
            'video_image' => ['nullable', 'image', 'max:3000'],
        ];
    }
}
