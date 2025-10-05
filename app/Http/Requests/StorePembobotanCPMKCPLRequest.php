<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembobotanCPMKCPLRequest extends FormRequest
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
            'id_ps' => 'required|exists:program_studi,id_ps', 
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
            'bobot' => 'nullable|array',
            'bobot.*.*' => 'nullable|numeric|min:0|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'bobot.*.*.numeric'   => 'Bobot Hanya Berupa Angka!',
            'bobot.*.*.min'   => 'Bobot Paling Minimal Bernilai 0!',
            'bobot.*.*.max'   => 'Bobot Paling Maksimal Bernilai 100!',
        ];
    }
}
