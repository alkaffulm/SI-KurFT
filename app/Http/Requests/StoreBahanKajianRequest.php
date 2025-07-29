<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBahanKajianRequest extends FormRequest
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
            'id_ps' => 'required|exists:program_studi,id_ps', 
            'nama_kode_bk' => 'required',
            'nama_bk_id' => 'required|string',
            'nama_bk_en' => 'required|string',
            'kategori' => 'required|string',
            'desc_bk_id' => 'required|string',
            'desc_bk_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_bk_id.required' => 'Nama Bahan Kajian (Indonesia) tidak boleh kosong.',
            'nama_bk_id.string'   => 'Nama Bahan Kajian (Indonesia) harus berupa string',
            'nama_bk_en.required' => 'Nama Bahan Kajian (English) tidak boleh kosong.',
            'nama_bk_en.string'   => 'Nama Bahan Kajian (English) harus berupa string',
            'nama_kode_bk' => 'Kode BK Tidak Boleh Kosong',
            'kategori.required' => 'Kategori tidak boleh kosong.',
            'kategori.string'   => 'Kategori harus berupa string',
            'desc_bk_id.required' => 'Deskripsi Bahan Kajian (Indoneia) tidak boleh kosong.',
            'desc_bk_id.string'   => 'Deskripsi Bahan Kajian (Indoneia) harus berupa string',
            'desc_bk_en.required' => 'Deskripsi Bahan Kajian (English) tidak boleh kosong.',
            'desc_bk_en.string'   => 'Deskripsi Bahan Kajian (English) harus berupa string',
        ];
    }
}
