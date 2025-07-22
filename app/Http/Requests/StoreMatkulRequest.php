<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatkulRequest extends FormRequest
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
            'nama_matkul_id' => 'required|string',
            'nama_matkul_en' => 'required|string',
            'matkul_desc_id' => 'required|string',
            'matkul_desc_en' => 'required|string',
            'jumlah_sks' => 'required|integer',
            'semester' => 'required|integer'
        ];
    }
}
