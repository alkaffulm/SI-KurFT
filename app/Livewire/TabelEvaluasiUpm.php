<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EvaluasiUpmModel;

class TabelEvaluasiUpm extends Component
{
    use WithPagination;

    public function render()
    {
    // Query: Ambil evaluasi HANYA untuk prodi si Kaprodi ini
        $evaluasi = EvaluasiUpmModel::with(['tahunakademik']) // Eager load tahun akademik
                    ->where('id_ps', session()->get('userRoleId', 0))
                    ->latest()
                    ->paginate(10); // Pagination kecil agar rapi

        return view('livewire.tabel-evaluasi-upm', [
            'evaluasi' => $evaluasi
        ]);
    }
}
