<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\CPMKModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class CpmkAll extends Component
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
        $query = CPMKModel::query()
            ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class]);

        // 2. Terapkan Filter jika ada input
        if ($this->selectedKurikulum) {
            $query->where('id_kurikulum', $this->selectedKurikulum);
        }

        if ($this->selectedProdi) {
            $query->where('id_ps', $this->selectedProdi);
        }

        // 3. Ambil Data
        $cpmk = $query->get();

        // Data pendukung untuk dropdown filter
        $programStudi = ProgramStudiModel::all();

        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])->where('id_ps', $this->selectedProdi)->get();
        }

        return view('livewire.pimpinan-upm.cpmk-all', [
            'cpmk' => $cpmk,
            'list_prodi' => $programStudi,
            'list_kurikulum' => $kurikulum
        ]);
    }
}
