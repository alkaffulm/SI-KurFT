<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRPSRequest extends FormRequest
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
            'id_mk' => 'required|exists:mata_kuliah,id_mk',
            'id_mk_syarat' => 'nullable|exists:mata_kuliah,id_mk',
            'materi_pembelajaran' => 'required|string',
            'pustaka_utama' => 'required|string',
            'pustaka_pendukung' => 'required|string',
            // 'media_pembelajaran' => 'required|array',
            // 'media_pembelajaran.*' => 'string'
            'media_pembelajaran' => 'required|array',
            'media_pembelajaran.*' => 'string|exists:media_pembelajaran,id_media_pembelajaran'
        ];
    }

    public function messages(): array
    {
        return [
            'id_mk.required' => 'Mata Kuliah Tidak Boleh Kosong!',
            'materi_pembelajaran.numeric' => 'Materi Pembelajaran Harus Berupa String!',
            'materi_pembelajaran.required' => 'Materi Pembelajaran Wajib Diisi!',
            'pustaka_utama.string' => 'Pustaka Utama Harus Berupa String!',
            'pustaka_utama.required' => 'Pustaka Utama Wajib Diisi!',
            'pustaka_pendukung.string' => 'Pustaka Pendukung Harus Berupa String!',
            'pustaka_pendukung.required' => 'Pustaka Pendukung Wajib Diisi!',
        ];
    }
}
