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
            'kode_peo' => 'required|integer',
            'desc_peo' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_peo.required' => 'Kode PEO tidak boleh kosong.',
            'kode_peo.integer'   => 'Kode PEO harus berupa integer',
            'desc_peo.required' => ' Deskripsi wajib diisi.',
        ];
    }
}
