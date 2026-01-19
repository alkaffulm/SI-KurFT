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
            'id_ps' => 'required|exists:program_studi,id_ps', 
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
            'nama_pl_id' => 'required|string',
            'nama_pl_en' => 'required|string',
            'desc_pl_id' => 'required|string',
            'desc_pl_en' => 'required|string',
            'profesi' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_pl.required' => 'Kode PL tidak boleh kosong.',
            'kode_pl.string'   => 'Kode PL harus berupa string',
            'nama_pl_id.required' => 'Nama Profil Lulusan (Indonesia) tidak boleh kosong.',
            'nama_pl_id.string'   => 'Nama Profil Lulusan (Indonesia) harus berupa String',
            'nama_pl_en.required' => 'Nama Profil Lulusan (English) tidak boleh kosong.',
            'nama_pl_en.string'   => 'Nama Profil Lulusan (English) harus berupa String',
            'desc_pl_id.required' => 'Deskripsi Profil Lulusan (Indonesia) tidak boleh kosong.',
            'desc_pl_id.string'   => 'Deskripsi Profil Lulusan (Indonesia) harus berupa string',
            'desc_pl_en.required' => 'Deskripsi Profil Lulusan (English) tidak boleh kosong.',
            'desc_pl_en.string'   => 'Deskripsi Profil Lulusan (English) harus berupa string',
            'profesi.required' => 'Profesi tidak boleh kosong.',
            'profesi.string'   => 'Profesi harus berupa string',
        ];
    }
}
