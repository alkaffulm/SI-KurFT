<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\KurikulumModel;
use App\Models\MahasiswaModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class MahasiswaAll extends Component
{
    // Properti untuk Filter
    public $selectedAngkatan = '';
    public $selectedProdi = '';
    public $daftarAngkatan = [];


    public function mount() {
        // ambil daftar angkatan unik dari mahasiswa prodi ini
        $this->daftarAngkatan = MahasiswaModel::select('angkatan')
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan')
            ->toArray();
    }
    
    public function render()
    {
        // 1. Mulai Query & Matikan Global Scope
        $query = MahasiswaModel::query()
            ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class]);

        // 2. Terapkan Filter jika ada input
        if ($this->selectedAngkatan) {
            $query->where('angkatan', $this->selectedAngkatan);
        }

        if ($this->selectedProdi) {
            $query->where('id_ps', $this->selectedProdi);
        }

        // 3. Ambil Data
        $mahasiswa = $query->get();

        // Data pendukung untuk dropdown filter
        $programStudi = ProgramStudiModel::all();

        return view('livewire.pimpinan-upm.mahasiswa-all', [
            'mahasiswa' => $mahasiswa,
            'list_prodi' => $programStudi,
            'list_angkatan' => $this->daftarAngkatan,
        ]);
    }
}
