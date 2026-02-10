<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProfilLulusanModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class ProfilLulusanAll extends Component
{

    // Properti untuk Filter
    public $selectedKurikulum = '';
    public $selectedProdi = '';

    public function updatedSelectedProdi()
    {
        // Reset pilihan kurikulum agar tidak nyangkut data dari prodi sebelumnya
        $this->selectedKurikulum = ''; 
    }

    public function render()
    {
        // 1. Mulai Query & Matikan Global Scope
        $query = ProfilLulusanModel::query()
            ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class]);

        // 2. Terapkan Filter jika ada input
        if ($this->selectedKurikulum) {
            $query->where('id_kurikulum', $this->selectedKurikulum);
        }

        if ($this->selectedProdi) {
            $query->where('id_ps', $this->selectedProdi);
        }

        // 3. Ambil Data
        $profil_lulusan = $query->get();

        // Data pendukung untuk dropdown filter
        $programStudi = ProgramStudiModel::all();

        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])->where('id_ps', $this->selectedProdi)->get();
        }

        return view('livewire.pimpinan-upm.profil-lulusan-all', [
            'profil_lulusan' => $profil_lulusan,
            'list_kurikulum' => $kurikulum,
            'list_prodi' => $programStudi,
        ]);
    }
}
