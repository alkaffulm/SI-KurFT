<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllTeknikPenilaianRequest extends FormRequest
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
            // Validasi untuk array teknik_penilaian (optional karena bisa kosong jika semua dihapus)
            'teknik_penilaian' => 'sometimes|array',
            'teknik_penilaian.*' => 'array', // setiap item harus berupa array
            'teknik_penilaian.*.nama_teknik_penilaian' => 'required|string|max:255',
            'teknik_penilaian.*.kategori' => 'required|in:test,non-test',
            
            // Validasi untuk array delete (optional)
            'delete_teknik_penilaian' => 'sometimes|array',
            'delete_teknik_penilaian.*' => 'integer|exists:teknik_penilaian,id_teknik_penilaian',
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
            'teknik_penilaian.*.nama_teknik_penilaian.required' => 'Nama Teknik Penilaian tidak boleh kosong.',
            'teknik_penilaian.*.nama_teknik_penilaian.string' => 'Nama Teknik Penilaian harus berupa teks.',
            'teknik_penilaian.*.nama_teknik_penilaian.max' => 'Nama Teknik Penilaian maksimal 255 karakter.',
            
            'teknik_penilaian.*.kategori.required' => 'Kategori tidak boleh kosong.',
            'teknik_penilaian.*.kategori.in' => 'Kategori harus dipilih antara Test atau Non-Test.',
            
            'delete_teknik_penilaian.*.integer' => 'ID yang akan dihapus harus berupa angka.',
            'delete_teknik_penilaian.*.exists' => 'Data yang akan dihapus tidak ditemukan.',
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
            'teknik_penilaian.*.nama_teknik_penilaian' => 'Nama Teknik Penilaian',
            'teknik_penilaian.*.kategori' => 'Kategori',
        ];
    }
}