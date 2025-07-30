<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCPMKRequest extends FormRequest
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
            'id_cpmk' => 'required|exists:cpmk,id_cpmk',
            'id_ps' => 'required|exists:program_studi,id_ps',  
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
            'nama_kode_sub_cpmk' => 'required|string',
            'desc_sub_cpmk_id' => 'required|string',
            'desc_sub_cpmk_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kode_sub_cpmk.required' => 'Nama Kode Sub CPMK enak boleh kosong.',
            'nama_kode_sub_cpmk.string'   => 'Nama Kode Sub CPMK enrus berupa string',
            'desc_sub_cpmk_id.required' => 'Deskripsi Sub CPMK (Indoneia) tidak boleh kosong.',
            'desc_sub_cpmk_id.string'   => 'Deskripsi Sub CPMK (Indoneia) harus berupa string',
            'desc_sub_cpmk_en.required' => 'Deskripsi Sub CPMK (English) tidak boleh kosong.',
            'desc_sub_cpmk_en.string'   => 'Deskripsi Sub CPMK (English) harus berupa string',
        ];
    }
}
