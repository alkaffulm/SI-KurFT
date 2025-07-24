<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfilLulusanRequest extends FormRequest
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
            'kode_pl' => 'required|string',
            'id_ps' => 'required|exists:program_Studi,id_ps', 
            'profil_lulusan' => 'required|string',
            'desc' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'kode_pl.required' => 'Kode PL tidak boleh kosong.',
            'kode_pl.string'   => 'Kode PL harus berupa string',
            'profil_lulusan.required' => 'Profil Lulusan tidak boleh kosong.',
            'profil_lulusan.string'   => 'Profil Lulusan harus berupa String',
            'desc.required' => 'Deskripsi tidak boleh kosong.',
            'desc.string'   => 'Deskripsi harus berupa string',
        ];
    }
}
