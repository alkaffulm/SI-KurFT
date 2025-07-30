<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePEORequest extends FormRequest
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
            'id_ps' => 'required|exists:program_Studi,id_ps', 
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
            'kode_peo' => 'required|string',
            'desc_peo_id' => 'required|string',
            'desc_peo_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_peo.required' => 'Kode PEO tidak boleh kosong.',
            'kode_peo.string'   => 'Kode PEO harus berupa string',
            'desc_peo_id.required' => 'Deskripsi PEO (Indonesia) tidak boleh kosong.',
            'desc_peo_id.string' => 'Deskripsi PEO (Indonesia) harus berupa string',
            'desc_peo_en.required' => 'Deskripsi PEO (English) tidak boleh kosong.',
            'desc_peo_en.string' => 'Deskripsi PEO (English) harus berupa string',
        ];
    }
}
