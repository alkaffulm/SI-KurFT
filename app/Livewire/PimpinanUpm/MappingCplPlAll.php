<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\CPLModel;
use Livewire\WithPagination;
use App\Models\CPLPLMapModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\ProfilLulusanModel;
use App\Models\Scopes\KurikulumScope;

class MappingCplPlAll extends Component
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
        $cpl = null;
        $profil_lulusan = collect();
        $cpl_pl_map = [];

        if ($this->selectedProdi && $this->selectedKurikulum) {
            // Baris: CPL
            $cpl = CPLModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->paginate(10);

            // Kolom: Profil Lulusan (PL)
            $profil_lulusan = ProfilLulusanModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->get();

            // Mapping: CPL -> PL
            $raw_map = CPLPLMapModel::all(); 
            foreach ($raw_map as $relasi) {
                $cpl_pl_map[$relasi->id_cpl][] = $relasi->id_pl;
            }
        }

        $programStudi = ProgramStudiModel::all();
        $kurikulum = [];
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                        ->where('id_ps', $this->selectedProdi)
                        ->get();
        }

        return view('livewire.pimpinan-upm.mapping-cpl-pl-all', [
            'cpl' => $cpl,
            'profil_lulusan' => $profil_lulusan,
            'cpl_pl_map' => $cpl_pl_map,
            'list_prodi' => $programStudi,
            'list_kurikulum' => $kurikulum,
        ]  );
    }
}
