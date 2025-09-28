<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FeatureUpdateRequest extends FormRequest
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
            'title_1' => 'nullable|string|max:255',
            'sub_title_1' => 'nullable|string|max:255',
            'image_1' => 'nullable|image|max:3000',

            'title_2' => 'nullable|string|max:255',
            'sub_title_2' => 'nullable|string|max:255',
            'image_2' => 'nullable|image|max:3000',
            
            'title_3' => 'nullable|string|max:255',
            'sub_title_3' => 'nullable|string|max:255',
            'image_3' => 'nullable|image|max:3000',
        ];
    }
}
