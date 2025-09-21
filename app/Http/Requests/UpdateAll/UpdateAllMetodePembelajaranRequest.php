<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllMetodePembelajaranRequest extends FormRequest
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
            // Validasi untuk array metode_pembelajaran (optional karena bisa kosong jika semua dihapus)
            'metode_pembelajaran' => 'sometimes|array',
            'metode_pembelajaran.*' => 'array', // setiap item harus berupa array
            'metode_pembelajaran.*.nama_metode_pembelajaran' => 'required|string|max:255',
            
            // Validasi untuk array delete (optional)
            'delete_metode_pembelajaran' => 'sometimes|array',
            'delete_metode_pembelajaran.*' => 'integer|exists:metode_pembelajaran,id_metode_pembelajaran',
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
            'metode_pembelajaran.*.nama_metode_pembelajaran.required' => 'Nama Metode Pembelajaran tidak boleh kosong.',
            'metode_pembelajaran.*.nama_metode_pembelajaran.string' => 'Nama Metode Pembelajaran harus berupa teks.',
            'metode_pembelajaran.*.nama_metode_pembelajaran.max' => 'Nama Metode Pembelajaran maksimal 255 karakter.',
            
            'delete_metode_pembelajaran.*.integer' => 'ID yang akan dihapus harus berupa angka.',
            'delete_metode_pembelajaran.*.exists' => 'Data yang akan dihapus tidak ditemukan.',
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
            'metode_pembelajaran.*.nama_metode_pembelajaran' => 'Nama Metode Pembelajaran',
        ];
    }
}