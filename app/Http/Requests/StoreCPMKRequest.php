<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCPMKRequest extends FormRequest
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
            'id_ps' => 'required|exists:program_studi,id_ps', 
            'kode_cpmk' => 'required|integer',
            'nama_kode_cpmk' => 'required|string',
            'desc_cpmk_id' => 'required|string',
            'desc_cpmk_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_cpmk.required' => 'Kode CPMK tidak boleh kosong.',
            'kode_cpmk.string'   => 'Kode CPMK harus berupa string',
            'nama_kode_cpmk.required' => 'Kode CPMK tidak boleh kosong.',
            'nama_kode_cpmk.string'   => 'Kode CPMK harus berupa string',
            'desc_cpmk_id.required' => 'Deskripsi CPMK (Indoneia) tidak boleh kosong.',
            'desc_cpmk_id.string'   => 'Deskripsi CPMK (Indoneia) harus berupa string',
            'desc_cpmk_en.required' => 'Deskripsi CPMK (English) tidak boleh kosong.',
            'desc_cpmk_en.string'   => 'Deskripsi CPMK (English) harus berupa string',
        ];
    }
}
