<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeknikPenilaianRequest extends FormRequest
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
            'nama_teknik_penilaian' => 'required|string|max:255|unique:teknik_penilaian,nama_teknik_penilaian',
            'kategori' => 'required|in:test,non-test',
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
            'nama_teknik_penilaian.required' => 'Nama Teknik Penilaian tidak boleh kosong.',
            'nama_teknik_penilaian.string' => 'Nama Teknik Penilaian harus berupa teks.',
            'nama_teknik_penilaian.max' => 'Nama Teknik Penilaian maksimal 255 karakter.',
            'nama_teknik_penilaian.unique' => 'Nama Teknik Penilaian sudah ada. Silakan gunakan nama lain.',
            
            'kategori.required' => 'Kategori tidak boleh kosong.',
            'kategori.in' => 'Kategori harus dipilih antara Test atau Non-Test.',
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
            'nama_teknik_penilaian' => 'Nama Teknik Penilaian',
            'kategori' => 'Kategori',
        ];
    }
}