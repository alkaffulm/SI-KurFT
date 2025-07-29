<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllCPLRequest extends FormRequest
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
            // 'id_ps' => 'required|exists:program_studi,id_ps', 
            // 'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
            'cpl.*.nama_kode_cpl' => 'required|string',
            // 'bobot_maksimum' => 'required|integer',
            'cpl.*.desc_cpl_id' => 'required|string',
            'cpl.*.desc_cpl_en' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'cpl.*.nama_kode_cpl.required' => 'Kode CPL tidak boleh kosong.',
            'cpl.*.nama_kode_cpl.string'   => 'Kode CPL harus berupa string',
            // 'bobot_maksimum.required' => 'Bobot Maksimum tidak boleh kosong.',
            // 'bobot_maksimum.integer'   => 'Bobot Maksimum harus berupa integer',
            'cpl.*.desc_cpl_id.required' => 'Deskripsi CPL (Indonesia) tidak boleh kosong.',
            'cpl.*.desc_cpl_id.string'   => 'Deskripsi CPL (Indonesia) harus berupa string',
            'cpl.*.desc_cpl_en.required' => 'Deskripsi CPL (English) enak boleh kosong.',
            'cpl.*.desc_cpl_en.string'   => 'Deskripsi CPL (English) harus berupa string',
        ];
    }
}
