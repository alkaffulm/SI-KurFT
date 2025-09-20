<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModelPembelajaranRequest extends FormRequest
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
            'nama_model_pembelajaran' => 'required|string|max:255|unique:model_pembelajaran,nama_model_pembelajaran',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama_model_pembelajaran.required' => 'Nama Model Pembelajarantidak boleh kosong.',
            'nama_model_pembelajaran.string' => 'Nama Model Pembelajaranharus berupa teks.',
            'nama_model_pembelajaran.max' => 'Nama Model Pembelajaranmaksimal 255 karakter.',
            'nama_model_pembelajaran.unique' => 'Nama Model Pembelajaransudah ada. Silakan gunakan nama lain.',
            
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nama_model_pembelajaran' => 'Nama Model Pembelajaran',
        ];
    }
}