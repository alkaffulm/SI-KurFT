<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllModelPembelajaranRequest extends FormRequest
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
            // Validasi untuk array model_pembelajaran (optional karena bisa kosong jika semua dihapus)
            'model_pembelajaran' => 'sometimes|array',
            'model_pembelajaran.*' => 'array', // setiap item harus berupa array
            'model_pembelajaran.*.nama_model_pembelajaran' => 'required|string|max:255',
            
            // Validasi untuk array delete (optional)
            'delete_model_pembelajaran' => 'sometimes|array',
            'delete_model_pembelajaran.*' => 'integer|exists:model_pembelajaran,id_model_pembelajaran',
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
            'model_pembelajaran.*.nama_model_pembelajaran.required' => 'Nama Teknik Penilaian tidak boleh kosong.',
            'model_pembelajaran.*.nama_model_pembelajaran.string' => 'Nama Teknik Penilaian harus berupa teks.',
            'model_pembelajaran.*.nama_model_pembelajaran.max' => 'Nama Teknik Penilaian maksimal 255 karakter.',

            'delete_model_pembelajaran.*.integer' => 'ID yang akan dihapus harus berupa angka.',
            'delete_model_pembelajaran.*.exists' => 'Data yang akan dihapus tidak ditemukan.',
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
            'model_pembelajaran.*.nama_model_pembelajaran' => 'Nama Teknik Penilaian',
        ];
    }
}