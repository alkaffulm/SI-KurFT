<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KurikulumModel;
use App\Models\BahanKajianModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class BahanKajianAll extends Component
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
        $bahan_kajian = null;

        // LOGIKA BARU: Hanya query jika Prodi DAN Kurikulum sudah dipilih
        if ($this->selectedProdi && $this->selectedKurikulum) {
            
            $query = BahanKajianModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->where('id_ps', $this->selectedProdi);

            // Ambil data dengan pagination
            $bahan_kajian = $query->paginate(5);
        }

        // Data pendukung filter
        $programStudi = ProgramStudiModel::all();
        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                ->where('id_ps', $this->selectedProdi)
                ->get();
        }

        return view('livewire.pimpinan-upm.bahan-kajian-all', [
            'bahan_kajian' => $bahan_kajian,
            'list_kurikulum' => $kurikulum,
            'list_prodi' => $programStudi,  
        ]);
    }
}
