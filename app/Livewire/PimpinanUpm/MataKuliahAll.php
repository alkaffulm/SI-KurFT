<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\KurikulumModel;
use App\Models\MataKuliahModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class MataKuliahAll extends Component
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
        $mata_kuliah = null;

        // LOGIKA BARU: Hanya query jika Prodi DAN Kurikulum sudah dipilih
        if ($this->selectedProdi && $this->selectedKurikulum) {
            
            $query = MataKuliahModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->where('id_ps', $this->selectedProdi);

            $query->with([
                'rps' => function($q) {
                    // Filter RPS agar hanya mengambil yang sesuai Kurikulum terpilih
                    $q->where('id_kurikulum', $this->selectedKurikulum);
                },
                'koordinatorMk', // Load data dosen koordinator biar tidak N+1 Query
                'pengembangRps'  // Load data dosen pengembang biar tidak N+1 Query
            ]);
            
            // Ambil data dengan pagination
            $mata_kuliah = $query->get();
        }

        // Data pendukung filter
        $programStudi = ProgramStudiModel::all();
        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                ->where('id_ps', $this->selectedProdi)
                ->get();
        }

        return view('livewire.pimpinan-upm.mata-kuliah-all',[
            'mata_kuliah' => $mata_kuliah,
            'list_kurikulum' => $kurikulum,
            'list_prodi' => $programStudi,
        ]);
    }
}
