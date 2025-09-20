<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCPLRequest extends FormRequest
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
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
            'nama_kode_cpl' => 'required|string',
            'desc_cpl_id' => 'required|string',
            'desc_cpl_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kode_cpl.required' => 'Kode CPL tidak boleh kosong.',
            'nama_kode_cpl.string'   => 'Kode CPL harus berupa string',
            'desc_cpl_id.required' => 'Deskripsi CPL (Indonesia) tidak boleh kosong.',
            'desc_cpl_id.string'   => 'Deskripsi CPL (Indonesia) harus berupa string',
            'desc_cpl_en.required' => 'Deskripsi CPL (English) enak boleh kosong.',
            'desc_cpl_en.string'   => 'Deskripsi CPL (English) harus berupa string',
        ];
    }
}
