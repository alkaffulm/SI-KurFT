<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllSubCPMKRequest extends FormRequest
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
            'subCpmk.*.id_cpmk' => 'required|exists:cpmk,id_cpmk',
            'subCpmk.*.nama_kode_sub_cpmk' => 'required|string',
            'subCpmk.*.desc_sub_cpmk_id' => 'required|string',
            'subCpmk.*.desc_sub_cpmk_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'subCpmk.*.nama_kode_sub_cpmk.required' => 'Nama Kode Sub CPMK enak boleh kosong.',
            'subCpmk.*.nama_kode_sub_cpmk.string'   => 'Nama Kode Sub CPMK enrus berupa string',
            'subCpmk.*.desc_sub_cpmk_id.required' => 'Deskripsi Sub CPMK (Indoneia) tidak boleh kosong.',
            'subCpmk.*.desc_sub_cpmk_id.string'   => 'Deskripsi Sub CPMK (Indoneia) harus berupa string',
            'subCpmk.*.desc_sub_cpmk_en.required' => 'Deskripsi Sub CPMK (English) tidak boleh kosong.',
            'subCpmk.*.desc_sub_cpmk_en.string'   => 'Deskripsi Sub CPMK (English) harus berupa string',
        ];
    }
}
