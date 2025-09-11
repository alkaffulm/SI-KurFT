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
        return Auth::user() && Auth::user()->role === 'kaprodi';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'desc_vk_id' => 'required|string|min:20',
            'desc_vk_en' => 'nullable|string|min:20',
        ];
    }

    public function messages(): array
    {
        return [
            'desc_vk_id.required' => 'Visi Keilmuan dalam Bahasa Indonesia wajib diisi.',
            'desc_vk_id.min'      => 'Visi Keilmuan minimal harus 20 karakter.',
            'desc_vk_en.min'      => 'Visi Keilmuan dalam Bahasa Inggris minimal harus 20 karakter.',
        ];
    }
}
