<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\PEOModel;
use Livewire\WithPagination;
use App\Models\PLPEOMapModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\ProfilLulusanModel;
use App\Models\Scopes\KurikulumScope;

class MappingPlPeoAll extends Component
{
    use WithPagination;

    // Filter Properties
    public $selectedProdi = '';
    public $selectedKurikulum = '';

    // Reset kurikulum jika prodi berubah
    public function updatedSelectedProdi()
    {
        $this->selectedKurikulum = '';
        $this->resetPage(); 
    }

    public function updatedSelectedKurikulum()
    {
        $this->resetPage();
    }

    public function render()
    {
        // 1. Inisialisasi variabel kosong (agar tidak error di view jika belum dipilih)
        $peo = collect(); 
        $profil_lulusan = null;
        $pl_peo_map = [];

        // 2. LOGIKA UTAMA: Hanya jalankan query jika Prodi DAN Kurikulum sudah dipilih
        if ($this->selectedProdi && $this->selectedKurikulum) {
            
            // Query PEO
            $peo = PEOModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->get();

            // Query Profil Lulusan
            $profil_lulusan = ProfilLulusanModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->paginate(10);

            // Query Mapping
            $pl_peo_raw = PLPEOMapModel::all();
            foreach ($pl_peo_raw as $relasi) {
                $pl_peo_map[$relasi->id_pl][] = $relasi->id_peo;
            }
        }

        // 3. Data Pendukung Filter (Harus selalu ada agar dropdown muncul)
        $programStudi = ProgramStudiModel::all();
        
        $kurikulum = [];
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                        ->where('id_ps', $this->selectedProdi)
                        ->get();
        }

        return view('livewire.pimpinan-upm.mapping-pl-peo-all', [
            'profil_lulusan' => $profil_lulusan,
            'peo' => $peo,
            'pl_peo_map' => $pl_peo_map,
            'list_prodi' => $programStudi,
            'list_kurikulum' => $kurikulum,
        ]);
    }
}
