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
            'topics.*.indikator' => 'required_if:topics.*.tipe,topik|nullable|string',
            'topics.*.tipe' => 'required|in:topik,uts,uas',
            'topics.*.materi_pembelajaran' => 'required_if:topics.*.tipe,topik|nullable|string',
            // 'topics.*.metode_pembelajaran' => 'required_if:topics.*.tipe,topik|nullable|string',
            'topics.*.refrensi' => 'required_if:topics.*.tipe,topik|nullable',
            'topics.*.minggu_ke' => 'required|array|min:1', 
            'topics.*.teknik_penilaian_kategori' => 'required_if:topics.*.tipe,topik|nullable', 
            'topics.*.selected_kriteria' => 'required_if:topics.*.tipe,topik|nullable|array', 
            'topics.*.selected_teknik' => 'required_if:topics.*.tipe,topik|nullable|array', 
            'topics.*.aktivitas_pembelajaran' => 'required_if:topics.*.tipe,topik|array',
            'topics.*.aktivitas_pembelajaran.*.id_bentuk_pembelajaran' => 'required_if:topics.*.tipe,topik',
            'topics.*.aktivitas_pembelajaran.*.penugasan_mahasiswa' => 'nullable',
            'topics.*.aktivitas_pembelajaran.*.selected_metode_pembelajaran' => 'nullable',

            // validasi RPS Induk di halaman edit
            'id_mk_syarat' => 'nullable|exists:mata_kuliah,id_mk',
            'materi_pembelajaran' => 'required|string',
            'pustaka_utama' => 'required|string',
            'pustaka_pendukung' => 'required|string',
            'media_pembelajaran' => 'nullable',
            'media_pembelajaran.*' => 'string|exists:media_pembelajaran,id_media_pembelajaran'
        ];
    }

    public function messages(): array
    {
        return [
            // validasi RPS Detail
            'topics.required' => 'Topik Wajib Diisi!',
            'topics.*.id_sub_cpmk.required_if' => 'Sub CPMK Wajib Diisi!',
            'topics.*.indikator.string' => 'Indikator Harus Berupa String!',
            'topics.*.indikator.required_if' => 'Indikator Wajib Diisi!',
            'topics.*.tipe.required' => 'Tipe Harus Dipilih!',
            'topics.*.materi_pembelajaran.required_if' => 'Materi Pembelajan Wajib Diisi!',
            'topics.*.materi_pembelajaran.string' => 'Materi Pembelajaran Harus Berupa String!',
            'topics.*.metode_pembelajaran.required_if' => 'Metode Pembelajaran Wajib Diisi!',
            'topics.*.refrensi.required_if' => 'Refrensi Wajib Diisi!',
            'topics.*.teknik_penilaian_kategori.required_if' => 'Kategori Teknik Penilaian Wajib Diisi!',
            'topics.*.selected_kriteria.required_if' => 'Kriteria Wajib Diisi!',
            'topics.*.selected_teknik.required_if' => 'Teknik Penilaian Wajib Diisi!',
            'topics.*.minggu_ke.required' => 'Minggu Ke Wajib Diisi!', 
            // 'topics.*.aktivitas_pembelajaran.*.selected_metode_pembelajaran.required_if' => 'Metode Pembelajaran Wajib Diisi',

            // validasi RPS Induk di halaman edit
            'materi_pembelajaran.string' => 'Materi Pembelajaran Harus Berupa String!',
            'materi_pembelajaran.required' => 'Materi Pembelajaran Wajib Diisi!',
            'pustaka_utama.string' => 'Pustaka Utama Harus Berupa String!',
            'pustaka_utama.required' => 'Pustaka Utama Wajib Diisi!',
            'pustaka_pendukung.string' => 'Pustaka Pendukung Harus Berupa String!',
            'pustaka_pendukung.required' => 'Pustaka Pendukung Wajib Diisi!',
            // 'media_pembelajaran.required' => 'Media Pembelajaran Wajib Diisi!'
        ];
    }
}
