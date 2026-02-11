<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\KurikulumModel;
use App\Models\PEOModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class PeoAll extends Component
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
    // Default: Data kosong jika filter belum lengkap
        $peo = null; 

        // LOGIKA BARU: Hanya query jika Prodi DAN Kurikulum sudah dipilih
        if ($this->selectedProdi && $this->selectedKurikulum) {
            
            $query = PEOModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->where('id_ps', $this->selectedProdi);

            // Ambil data dengan pagination
            $peo = $query->paginate(5);
        }

        // Data pendukung filter
        $programStudi = ProgramStudiModel::all();
        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                ->where('id_ps', $this->selectedProdi)
                ->get();
        }

        return view('livewire.pimpinan-upm.peo-all', [
            'peo' => $peo,
            'list_kurikulum' => $kurikulum,
            'list_prodi' => $programStudi,
        ]);
    }
}
