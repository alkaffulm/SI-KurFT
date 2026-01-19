<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateVisiKeilmuanRequest extends FormRequest
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
            'id_ps' => 'required',
            'id_kurikulum' => 'nullable',
            'desc_vk_id' => 'required|string',
            'desc_vk_en' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'desc_vk_id.required' => 'Visi Keilmuan dalam Bahasa Indonesia wajib diisi.',
        ];
    }
}
