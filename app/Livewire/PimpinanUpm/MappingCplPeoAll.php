<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\CPLModel;
use App\Models\PEOModel;
use Livewire\WithPagination;
use App\Models\CPLPLMapModel;
use App\Models\PLPEOMapModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class MappingCplPeoAll extends Component
{
    use WithPagination; 

    public $selectedProdi = '';
    public $selectedKurikulum = '';

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
        $cpl = null;
        $peo = collect();
        $cpl_peo_map = []; // Ini array hasil kalkulasi

        if ($this->selectedProdi && $this->selectedKurikulum) {
            // 1. Ambil Baris (CPL) & Kolom (PEO)
            $cpl = CPLModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->paginate(10);

            $peo = PEOModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->get();

            // 2. LOGIKA Kalkulasi Relasi (Indirect)
            // Ambil semua data mapping mentah
            $all_cpl_pl = CPLPLMapModel::all(); 
            $all_pl_peo = PLPEOMapModel::all();

            // Loop untuk mencocokkan: CPL -> PL -> PEO
            foreach ($all_cpl_pl as $rel_cpl_pl) {
                // $rel_cpl_pl->id_cpl  (Ini CPL nya)
                // $rel_cpl_pl->id_pl   (Ini jembatannya)

                foreach ($all_pl_peo as $rel_pl_peo) {
                    // Jika Jembatan (PL) nya sama
                    if ($rel_cpl_pl->id_pl === $rel_pl_peo->id_pl) {
                        
                        // Maka CPL ini terhubung ke PEO ini
                        $id_cpl = $rel_cpl_pl->id_cpl;
                        $id_peo = $rel_pl_peo->id_peo;

                        // Simpan ke array map (Cegah duplikat)
                        // Gunakan key array untuk memudahkan pengecekan di view
                        if (!isset($cpl_peo_map[$id_cpl])) {
                            $cpl_peo_map[$id_cpl] = [];
                        }
                        
                        if (!in_array($id_peo, $cpl_peo_map[$id_cpl])) {
                            $cpl_peo_map[$id_cpl][] = $id_peo;
                        }
                    }
                }
            }
        }

        // Data Pendukung Filter
        $programStudi = ProgramStudiModel::all();
        $kurikulum = [];
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                        ->where('id_ps', $this->selectedProdi)
                        ->get();
        }
        
        return view('livewire.pimpinan-upm.mapping-cpl-peo-all', [
            'cpl' => $cpl,
            'peo' => $peo,
            'cpl_peo_map' => $cpl_peo_map,
            'list_prodi' => $programStudi,
            'list_kurikulum' => $kurikulum,
        ]);
    }
}
