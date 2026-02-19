<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\CPMKModel;
use Livewire\WithPagination;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class CpmkAll extends Component
{
    use WithPagination;

    // Properti untuk Filter
    public $selectedKurikulum = '';
    public $selectedProdi = '';

    public function updatedSelectedProdi()
    {
        // Reset pilihan kurikulum agar tidak nyangkut data dari prodi sebelumnya
        $this->selectedKurikulum = ''; 
        $this->resetPage(); 
    }

    public function updatedSelectedKurikulum()
    {
        $this->resetPage(); 
    }

    public function render()
    {
        // Default: Data kosong jika filter belum lengkap
        $cpmk = null; 

        // LOGIKA BARU: Hanya query jika Prodi DAN Kurikulum sudah dipilih
        if ($this->selectedProdi && $this->selectedKurikulum) {
            
            $query = CPMKModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->where('id_ps', $this->selectedProdi);

            // Ambil data dengan pagination
            $cpmk = $query->paginate(5);
        }

        // Data pendukung filter
        $programStudi = ProgramStudiModel::all();
        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                ->where('id_ps', $this->selectedProdi)
                ->get();
        }

        return view('livewire.pimpinan-upm.cpmk-all', [
            'cpmk' => $cpmk,
            'list_prodi' => $programStudi,
            'list_kurikulum' => $kurikulum
        ]);
    }
}
