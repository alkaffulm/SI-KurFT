<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\BKMKMapModel;
use Livewire\WithPagination;
use App\Models\KurikulumModel;
use App\Models\MataKuliahModel;
use App\Models\BahanKajianModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class MappingBkMkAll extends Component
{
    use WithPagination; // 2. Gunakan Trait

    public $selectedProdi = '';
    public $selectedKurikulum = '';

    // Reset halaman ke 1 setiap kali filter berubah
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
        $mata_kuliah = null; 
        $bahan_kajian = collect();
        $bk_mk_map = [];

        if ($this->selectedProdi && $this->selectedKurikulum) {
            
            // A. Ambil Data KOLOM (Bahan Kajian) - Tampilkan Semua untuk Header Horizontal
            $bahan_kajian = BahanKajianModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->get();

            // B. Ambil Data BARIS (Mata Kuliah) - DENGAN PAGINATION
            $mata_kuliah = MataKuliahModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->orderBy('nama_matkul_id', 'asc') // Urutkan berdasarkan Kode MK
                ->paginate(10); // Paginate 10 MK per halaman

            // C. Ambil Data Mapping
            // Kita balik logikanya: Key utamanya adalah ID MK (Baris)
            $raw_map = BKMKMapModel::all(); 
            
            foreach ($raw_map as $relasi) {
                // Key: ID MK, Value: Array ID BK
                $bk_mk_map[$relasi->id_mk][] = $relasi->id_bk;
            }
        }

        $programStudi = ProgramStudiModel::all();
        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                        ->where('id_ps', $this->selectedProdi)
                        ->get();
        }
        
        return view('livewire.pimpinan-upm.mapping-bk-mk-all', [
            'mata_kuliah' => $mata_kuliah,   // Objek Paginator (Baris)
            'bahan_kajian' => $bahan_kajian, // Collection (Kolom)
            'bk_mk_map' => $bk_mk_map,
            'list_prodi' => $programStudi,
            'list_kurikulum' => $kurikulum,
        ]);
    }
}
