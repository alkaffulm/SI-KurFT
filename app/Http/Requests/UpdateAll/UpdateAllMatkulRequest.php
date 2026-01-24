<?php

namespace App\Http\Requests\UpdateAll;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllMatkulRequest extends FormRequest
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
            'matkul.*.kode_mk' => 'required|string',
            'matkul.*.nama_matkul_id' => 'required|string',
            'matkul.*.nama_matkul_en' => 'required|string',
            'matkul.*.matkul_desc_id' => 'required|string',
            'matkul.*.matkul_desc_en' => 'required|string',
            'matkul.*.id_pengembang_rps' => 'nullable',
            'matkul.*.id_koordinator_mk' => 'nullable',
            'matkul.*.sks_teori' => 'integer|nullable',
            'matkul.*.sks_praktikum' => 'integer|nullable',
            'matkul.*.semester' => 'nullable|integer|min:0|max:8'
        ];
    }

    public function messages(): array
    {
        return [
            'matkul.*.kode_mk.required' => 'Kode Mata Kuliah tidak boleh kosong.',
            'matkul.*.kode_mk.string'   => 'Kode Mata Kuliah harus berupa string',
            'matkul.*.nama_matkul_id.required' => 'Nama Mata Kuliah (Indonesia) tidak boleh kosong.',
            'matkul.*.nama_matkul_id.string'   => 'Nama Mata Kuliah (Indonesia) harus berupa string',
            'matkul.*.nama_matkul_en.required' => 'Nama Mata Kuliah (English) enak boleh kosong.',
            'matkul.*.nama_matkul_en.string'   => 'Nama Mata Kuliah (English) enrus berupa string',
            'matkul.*.id_pengembang_rps' => 'Dosen Pengembang RPS Wajib Diisi!',
            'matkul.*.id_koordinator_mk' => 'Koordinator Mata Kuliah Wajib Diisi!',
            'matkul.*.sks_teori.integer'   => 'Jumlah SKS Teori harus berupa integer',
            'matkul.*.sks_praktikum.integer'   => 'Jumlah SKS Praktikum harus berupa integer',
            // 'matkul.*.semester.required' => 'Semester tidak boleh kosong.',
            'matkul.*.semester.integer'   => 'Semester harus berupa integer',
            'matkul.*.semester.min' => 'Semester tidak bisa dibawah 0.',
            'matkul.*.semester.max'   => 'Semester tidak bisa diatas 8',
            'matkul.*.matkul_desc_id.required' => 'Deskripsi Mata Kuliah (Indoneia) tidak boleh kosong.',
            'matkul.*.matkul_desc_id.string'   => 'Deskripsi Mata Kuliah (Indoneia) harus berupa string',
            'matkul.*.matkul_desc_en.required' => 'Deskripsi Mata Kuliah (English) tidak boleh kosong.',
            'matkul.*.matkul_desc_en.string'   => 'Deskripsi Mata Kuliah (English) harus berupa string',
        ];
    }
}
