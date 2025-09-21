<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMetodePembelajaranRequest extends FormRequest
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
            'nama_metode_pembelajaran' => 'required|string|max:255|unique:metode_pembelajaran,nama_metode_pembelajaran',
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
            'nama_metode_pembelajaran.required' => 'Nama Metode Penilaian tidak boleh kosong.',
            'nama_metode_pembelajaran.string' => 'Nama Metode Penilaian harus berupa teks.',
            'nama_metode_pembelajaran.max' => 'Nama Metode Penilaian maksimal 255 karakter.',
            'nama_metode_pembelajaran.unique' => 'Nama Metode Penilaian sudah ada. Silakan gunakan nama lain.',
            
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
            'nama_metode_pembelajaran' => 'Nama Metode Penilaian',
        ];
    }
}