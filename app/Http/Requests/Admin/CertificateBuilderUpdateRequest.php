<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CertificateBuilderUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title_x' => 'required|integer',
            'title_y' => 'required|integer',
            'title_color' => 'required|string',
            'subtitle_x' => 'required|integer',
            'subtitle_y' => 'required|integer',
            'subtitle_color' => 'required|string',
            'description_x' => 'required|integer',
            'description_y' => 'required|integer',
            'description_color' => 'required|string',
            'signature_x' => 'required|integer',
            'signature_y' => 'required|integer',
            'show_grid' => 'boolean',
        ];
    }
}
