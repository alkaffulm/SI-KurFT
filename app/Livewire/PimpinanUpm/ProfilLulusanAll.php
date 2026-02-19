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
        $profil_lulusan = null; 

        // LOGIKA BARU: Hanya query jika Prodi DAN Kurikulum sudah dipilih
        if ($this->selectedProdi && $this->selectedKurikulum) {
            
            $query = ProfilLulusanModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->where('id_ps', $this->selectedProdi);

            // Ambil data dengan pagination
            $profil_lulusan = $query->paginate(5);
        }

        // Data pendukung filter
        $programStudi = ProgramStudiModel::all();
        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                ->where('id_ps', $this->selectedProdi)
                ->get();
        }

        return view('livewire.pimpinan-upm.profil-lulusan-all', [
            'profil_lulusan' => $profil_lulusan,
            'list_kurikulum' => $kurikulum,
            'list_prodi' => $programStudi,
        ]);
    }
}
