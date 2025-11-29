<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllProfilLulusanRequest extends FormRequest
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
            'pl.*.kode_pl' => 'required|string',
            'pl.*.nama_pl_id' => 'required|string',
            'pl.*.nama_pl_en' => 'required|string',
            'pl.*.desc_pl_id' => 'required|string',
            'pl.*.desc_pl_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'pl.*.kode_pl.required' => 'Kode PL tidak boleh kosong.',
            'pl.*.kode_pl.string'   => 'Kode PL harus berupa string',
            'pl.*.nama_pl_id.required' => 'Nama Profil Lulusan (Indonesia) tidak boleh kosong.',
            'pl.*.nama_pl_id.string'   => 'Nama Profil Lulusan (Indonesia) harus berupa String',
            'pl.*.nama_pl_en.required' => 'Nama Profil Lulusan (English) tidak boleh kosong.',
            'pl.*.nama_pl_en.string'   => 'Nama Profil Lulusan (English) harus berupa String',
            'pl.*.desc_pl_id.required' => 'Deskripsi Profil Lulusan (Indonesia) tidak boleh kosong.',
            'pl.*.desc_pl_id.string'   => 'Deskripsi Profil Lulusan (Indonesia) harus berupa string',
            'pl.*.desc_pl_en.required' => 'Deskripsi Profil Lulusan (English) tidak boleh kosong.',
            'pl.*.desc_pl_en.string'   => 'Deskripsi Profil Lulusan (English) harus berupa string',
        ];
    }
}
