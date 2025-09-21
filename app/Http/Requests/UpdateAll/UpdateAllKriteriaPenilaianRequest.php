<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllKriteriaPenilaianRequest extends FormRequest
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
            // Validasi untuk array kriteria_penilaian (optional karena bisa kosong jika semua dihapus)
            'kriteria_penilaian' => 'sometimes|array',
            'kriteria_penilaian.*' => 'array', // setiap item harus berupa array
            'kriteria_penilaian.*.nama_kriteria_penilaian' => 'required|string|max:255',
            
            // Validasi untuk array delete (optional)
            'delete_kriteria_penilaian' => 'sometimes|array',
            'delete_kriteria_penilaian.*' => 'integer|exists:kriteria_penilaian,id_kriteria_penilaian',
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
            'kriteria_penilaian.*.nama_kriteria_penilaian.required' => 'Nama kriteria Penilaian tidak boleh kosong.',
            'kriteria_penilaian.*.nama_kriteria_penilaian.string' => 'Nama kriteria Penilaian harus berupa teks.',
            'kriteria_penilaian.*.nama_kriteria_penilaian.max' => 'Nama kriteria Penilaian maksimal 255 karakter.',
            
            'delete_kriteria_penilaian.*.integer' => 'ID yang akan dihapus harus berupa angka.',
            'delete_kriteria_penilaian.*.exists' => 'Data yang akan dihapus tidak ditemukan.',
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
            'kriteria_penilaian.*.nama_kriteria_penilaian' => 'Nama kriteria Penilaian',
        ];
    }
}