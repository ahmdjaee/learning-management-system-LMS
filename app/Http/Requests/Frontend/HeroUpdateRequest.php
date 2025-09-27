<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class HeroUpdateRequest extends FormRequest
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
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'video_button_text' => 'nullable|string|max:255',
            'video_button_url' => 'nullable|string|max:255',
            'banner_item_title' => 'nullable|string|max:255',
            'banner_item_sub_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:3000',
            'round_text' => 'nullable|string|max:255',
        ];
    }
}
