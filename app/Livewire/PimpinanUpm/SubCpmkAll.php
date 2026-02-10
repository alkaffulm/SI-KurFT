<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\SubCPMKModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class SubCpmkAll extends Component
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
        $query = SubCPMKModel::query()
            ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class]);

        // 2. Terapkan Filter jika ada input
        if ($this->selectedKurikulum) {
            $query->where('id_kurikulum', $this->selectedKurikulum);
        }

        if ($this->selectedProdi) {
            $query->where('id_ps', $this->selectedProdi);
        }

        // 3. Ambil Data
        $sub_cpmk = $query->get();

        // Data pendukung untuk dropdown filter
        $programStudi = ProgramStudiModel::all();

        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])->where('id_ps', $this->selectedProdi)->get();
        }

        return view('livewire.pimpinan-upm.sub-cpmk-all', [
            'sub_cpmk' => $sub_cpmk,
            'list_kurikulum' => $kurikulum,
            'list_prodi' => $programStudi,
        ]);
    }
}
