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
            'kode_mk' => 'required|string',
            'nama_matkul_id' => 'required|string',
            'nama_matkul_en' => 'required|string',
            'matkul_desc_id' => 'required|string',
            'matkul_desc_en' => 'required|string',
            'jumlah_sks' => 'required|integer',
            'semester' => 'required|integer|min:1|max:8'
        ];
    }

    public function messages(): array
    {
        return [
            'kode_mk.required' => 'Kode Mata Kuliah tidak boleh kosong.',
            'kode_mk.string'   => 'Kode Mata Kuliah harus berupa string',
            'nama_matkul_id.required' => 'Nama Mata Kuliah (Indonesia) tidak boleh kosong.',
            'nama_matkul_id.string'   => 'Nama Mata Kuliah (Indonesia) harus berupa string',
            'nama_matkul_en.required' => 'Nama Mata Kuliah (English) enak boleh kosong.',
            'nama_matkul_en.string'   => 'Nama Mata Kuliah (English) enrus berupa string',
            'jumlah_sks.required' => 'Jumlah SKS tidak boleh kosong.',
            'jumlah_sks.integer'   => 'Jumlah SKS harus berupa integer',
            'semester.required' => 'Semester tidak boleh kosong.',
            'semester.integer'   => 'Semester harus berupa integer',
            'semester.min' => 'Semester tidak bisa dibawah 1.',
            'semester.max'   => 'Semester tidak bisa diatas 8',
            'matkul_desc_id.required' => 'Deskripsi Mata Kuliah (Indoneia) tidak boleh kosong.',
            'matkul_desc_id.string'   => 'Deskripsi Mata Kuliah (Indoneia) harus berupa string',
            'matkul_desc_en.required' => 'Deskripsi Mata Kuliah (English) tidak boleh kosong.',
            'matkul_desc_en.string'   => 'Deskripsi Mata Kuliah (English) harus berupa string',
        ];
    }
}
