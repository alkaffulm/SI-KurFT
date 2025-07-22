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
            'kode_cpmk' => 'required|integer',
            'nama_kode_cpmk' => 'required|string',
            'desc_cpmk_id' => 'required|string',
            'desc_cpmk_en' => 'required|string',
        ];
    }
}
