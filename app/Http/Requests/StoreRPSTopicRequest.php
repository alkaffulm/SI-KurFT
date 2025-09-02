<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRPSTopicRequest extends FormRequest
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
            // validasi RPS Detail
            'topics' => 'required|array',
            'topics.*.id_topic' => 'nullable|exists:rps_topics,id_topic',
            'topics.*.id_sub_cpmk' => 'required_if:topics.*.tipe,topik|nullable|exists:sub_cpmk,id_sub_cpmk',
            'topics.*.indikator' => 'nullable|string',
            'topics.*.tipe' => 'required|in:topik,uts,uas',
            'topics.*.materi_pembelajaran' => 'required_if:topics.*.tipe,topik|nullable|string',
            'topics.*.metode_pembelajaran' => 'required_if:topics.*.tipe,topik|nullable|string',
            'topics.*.bobot_penilaian' => 'required|min:0|max:20|numeric',
            'topics.*.minggu_ke' => 'required|array|min:1', 
            'topics.*.teknik_penilaian_kategori' => 'nullable|string', 
            'topics.*.selected_kriteria' => 'nullable|array', 
            'topics.*.selected_teknik' => 'nullable|array', 

            // validasi RPS Induk di halaman edit
            'id_mk_syarat' => 'nullable|exists:mata_kuliah,id_mk',
            'materi_pembelajaran' => 'nullable|string',
            'pustaka_utama' => 'nullable|string',
            'pustaka_pendukung' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            // validasi RPS Detail
            'topics.required' => 'Topik Wajib Diisi!',
            'topics.*.id_sub_cpmk.required' => 'Sub CPMK Wajib Diisi!',
            'topics.*.indikator.string' => 'Indikator Harus Berupa String!',
            'topics.*.tipe.required' => 'Tipe Harus Dipilih!',
            'topics.*.materi_pembelajaran.required' => 'Materi Pembelajan Wajib Diisi!',
            'topics.*.materi_pembelajaran.string' => 'Materi Pembelajaran Harus Berupa String!',
            'topics.*.metode_pembelajaran.required' => 'Metode Pembelajaran Wajib Diisi!',
            'topics.*.bobot_penilaian.required' => 'Bobot Penilaian Wajib Diisi!',
            'topics.*.bobot_penilaian.min' => 'Bobot Penilaian Minimal Bernilai 1!',
            'topics.*.bobot_penilaian.max' => 'Bobot Penilaian Maximal Bernilai 20!',
            'topics.*.bobot_penilaian.numeric' => 'Bobot Penilaian Harus Berupa Angka!',
            'topics.*.minggu_ke.required' => 'Minggu Ke Wajib Diisi!', 

            // validasi RPS Induk di halaman edit
            'materi_pembelajaran.string' => 'Materi Pembelajaran Harus Berupa String!',
            'pustaka_utama.string' => 'Pustaka Utama Harus Berupa String!',
            'pustaka_pendukung.string' => 'Pustaka Pendukung Harus Berupa String!',
        ];
    }
}
