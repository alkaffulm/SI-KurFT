<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllCPMKRequest extends FormRequest
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
            'cpmk.*.id_mk' => 'required|exists:mata_kuliah,id_mk', 
            'cpmk.*.kode_cpmk' => 'required|integer',
            'cpmk.*.nama_kode_cpmk' => 'required|string',
            'cpmk.*.desc_cpmk_id' => 'required|string',
            'cpmk.*.desc_cpmk_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'cpmk.*.kode_cpmk.required' => 'Kode CPMK tidak boleh kosong.',
            'cpmk.*.kode_cpmk.string'   => 'Kode CPMK harus berupa string',
            'cpmk.*.nama_kode_cpmk.required' => 'Kode CPMK tidak boleh kosong.',
            'cpmk.*.nama_kode_cpmk.string'   => 'Kode CPMK harus berupa string',
            'cpmk.*.desc_cpmk_id.required' => 'Deskripsi CPMK (Indoneia) tidak boleh kosong.',
            'cpmk.*.desc_cpmk_id.string'   => 'Deskripsi CPMK (Indoneia) harus berupa string',
            'cpmk.*.desc_cpmk_en.required' => 'Deskripsi CPMK (English) tidak boleh kosong.',
            'cpmk.*.desc_cpmk_en.string'   => 'Deskripsi CPMK (English) harus berupa string',
        ];
    }
}
