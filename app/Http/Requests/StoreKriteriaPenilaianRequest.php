<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKriteriaPenilaianRequest extends FormRequest
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
            'nama_kriteria_penilaian' => 'required|string|max:255|unique:kriteria_penilaian,nama_kriteria_penilaian',
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
            'nama_kriteria_penilaian.required' => 'Nama kriteria Penilaian tidak boleh kosong.',
            'nama_kriteria_penilaian.string' => 'Nama kriteria Penilaian harus berupa teks.',
            'nama_kriteria_penilaian.max' => 'Nama kriteria Penilaian maksimal 255 karakter.',
            'nama_kriteria_penilaian.unique' => 'Nama kriteria Penilaian sudah ada. Silakan gunakan nama lain.',
            
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
            'nama_kriteria_penilaian' => 'Nama kriteria Penilaian',
        ];
    }
}