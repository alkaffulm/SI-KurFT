<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllBahanKajianRequest extends FormRequest
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
            // 'id_ps' => 'required|exists:program_studi,id_ps', 
            'bk.*.nama_kode_bk' => 'required',
            'bk.*.nama_bk_id' => 'required|string',
            'bk.*.nama_bk_en' => 'required|string',
            'bk.*.kategori' => 'required|string',
            'bk.*.desc_bk_id' => 'required|string',
            'bk.*.desc_bk_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'bk.*.nama_bk_id.required' => 'Nama Bahan Kajian (Indonesia) tidak boleh kosong.',
            'bk.*.nama_bk_id.string'   => 'Nama Bahan Kajian (Indonesia) harus berupa string',
            'bk.*.nama_bk_en.required' => 'Nama Bahan Kajian (English) tidak boleh kosong.',
            'bk.*.nama_bk_en.string'   => 'Nama Bahan Kajian (English) harus berupa string',
            'bk.*.nama_kode_bk.required' => 'Kode BK Tidak Boleh Kosong',
            'bk.*.kategori.required' => 'Kategori tidak boleh kosong.',
            'bk.*.kategori.string'   => 'Kategori harus berupa string',
            'bk.*.desc_bk_id.required' => 'Deskripsi Bahan Kajian (Indoneia) tidak boleh kosong.',
            'bk.*.desc_bk_id.string'   => 'Deskripsi Bahan Kajian (Indoneia) harus berupa string',
            'bk.*.desc_bk_en.required' => 'Deskripsi Bahan Kajian (English) tidak boleh kosong.',
            'bk.*.desc_bk_en.string'   => 'Deskripsi Bahan Kajian (English) harus berupa string',
        ];
    }
}
