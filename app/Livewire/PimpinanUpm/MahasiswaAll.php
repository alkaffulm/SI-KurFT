<?php

namespace App\Livewire\PimpinanUpm;

use App\Models\KurikulumModel;
use App\Models\MahasiswaModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\KurikulumScope;
use App\Models\Scopes\ProdiScope;
use Livewire\Component;
use Livewire\WithPagination;

class MahasiswaAll extends Component
{
    use WithPagination;
    // Properti untuk Filter
    public $selectedAngkatan = '';
    public $selectedProdi = '';
    public $daftarAngkatan = [];
    public $search = '';

    public function updatingSelectedProdi()
    {
        $this->resetPage();
    }

    public function updatingSelectedAngkatan()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount() {
        // ambil daftar angkatan unik dari mahasiswa prodi ini
        $this->daftarAngkatan = MahasiswaModel::select('angkatan')
            ->where('angkatan', '>=', 2021)
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan')
            ->toArray();
    }
    
    public function render()
    {
        $query = MahasiswaModel::query()
            ->withoutGlobalScopes([
                ProdiScope::class,
                KurikulumScope::class
            ]);

        if ($this->selectedAngkatan) {
            $query->where('angkatan', $this->selectedAngkatan);
        }

        if ($this->selectedProdi) {
            $query->where('id_ps', $this->selectedProdi);
        }

        // SEARCH
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nim', 'like', '%' . $this->search . '%')
                ->orWhere('nama_lengkap', 'like', '%' . $this->search . '%');
            });
        }

        $mahasiswa = $query
            ->where('angkatan', '>=', 2021)
            ->orderBy('NIM')
            ->paginate(20, ['*'], 'mahasiswa');

        // Data pendukung untuk dropdown filter
        $programStudi = ProgramStudiModel::all();

        return view('livewire.pimpinan-upm.mahasiswa-all', [
            'mahasiswa' => $mahasiswa,
            'list_prodi' => $programStudi,
            'list_angkatan' => $this->daftarAngkatan,
        ]);
    }
}
