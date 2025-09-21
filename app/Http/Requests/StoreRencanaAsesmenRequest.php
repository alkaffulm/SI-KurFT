<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRencanaAsesmenRequest extends FormRequest
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
            'rencanaAsesmens' => 'required|array',
            'rencanaAsesmens.*.id_rencana_asesmen' => 'nullable|exists:rencana_asesmen,id_rencana_asesmen',
            'rencanaAsesmens.*.tipe_komponen' => 'required',
            'rencanaAsesmens.*.nomor_komponen' => 'required_if:rencanaAsesmens.*.tipe_komponen,tugas,kuis|nullable|integer|min:1',
            'rencanaAsesmens.*.bobot' => 'required', 
            'rencanaAsesmens.*.bobot.*' => 'nullable|numeric|min:0|max:100', 
        ];
    }

    public function messages(): array
    {
        return [
            'rencanaAsesmens.required' => 'Rencana Assesment Wajib Diisi!',
            'rencanaAsesmens.*.tipe_komponen.required' => 'Tipe Komponen Wajib Diisi!',
            'rencanaAsesmens.*.nomor_komponen.required_if' => 'Nomor Komponen Wajib Diisi!',
            'rencanaAsesmens.*.nomor_komponen.min' => 'Nomor Komponen Tidak Boleh Dibawah 1!',
            'rencanaAsesmens.*.nomor_komponen.integer' => 'Nomor Komponen Hanya Menerima Bilangan Bulat!',
            'rencanaAsesmens.*.bobot.required' => 'Bobot Wajib Diisi!',
            'rencanaAsesmens.*.bobot.*.numeric'   => 'Bobot Hanya Berupa Angka!',
            'rencanaAsesmens.*.bobot.*.min'   => 'Bobot Paling Minimal Bernilai 0!',
            'rencanaAsesmens.*.bobot.*.max'   => 'Bobot Paling Maksimal Bernilai 100!',
        ];
    }
}
