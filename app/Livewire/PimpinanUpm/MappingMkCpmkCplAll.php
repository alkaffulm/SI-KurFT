<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\CPLModel;
use App\Models\CPMKModel;
use Livewire\WithPagination;
use App\Models\KurikulumModel;
use App\Models\MataKuliahModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\Scopes\KurikulumScope;

class MappingMkCpmkCplAll extends Component
{
    use WithPagination;

    public $selectedProdi = '';
    public $selectedKurikulum = '';

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
        $cpl = collect();
        $mk_cpmk_cpl_map = [];
        $cpmk_list = []; // Array lookup untuk Nama CPMK biar efisien

        if ($this->selectedProdi && $this->selectedKurikulum) {
            
            // A. KOLOM: Ambil CPL
            $cpl = CPLModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->orderBy('nama_kode_cpl', 'asc')
                ->get();

            // B. BARIS: Ambil Mata Kuliah (Paginated)
            $mata_kuliah = MataKuliahModel::query()
                ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->orderBy('kode_mk', 'asc')
                ->paginate(10); 

            // C. MAPPING & LOOKUP DATA
            // Ambil semua data mapping yang relevan
            // Optimasi: Bisa di-filter by kurikulum jika tabel map punya kolom kurikulum/prodi
            // Kalau tidak, ambil all() lalu filter via PHP (seperti controller anda)
            $raw_map = MK_CPMK_CPL_MapModel::all(); 
            
            // Ambil semua CPMK untuk lookup nama (key: id_cpmk, value: nama_kode_cpmk)
            // Ini agar kita tidak perlu query CPMK satu-satu di view
            $cpmk_lookup = CPMKModel::withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
                            ->get()
                            ->keyBy('id_cpmk'); // Key array pakai ID

            foreach ($raw_map as $relasi) {
                $id_mk = (int) $relasi->id_mk;
                $id_cpl = (int) $relasi->id_cpl;
                $id_cpmk = (int) $relasi->id_cpmk;

                // Simpan ID CPMK ke dalam struktur map: [MK][CPL] = [id_cpmk1, id_cpmk2, ...]
                // Karena satu sel (MK-CPL) bisa berisi lebih dari satu CPMK
                $mk_cpmk_cpl_map[$id_mk][$id_cpl][] = $id_cpmk;
            }

            // Simpan lookup data ke property public/variable view
            $cpmk_list = $cpmk_lookup;
        }

        $programStudi = ProgramStudiModel::all();
        $kurikulum = [];
        
        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([ProdiScope::class])
                        ->where('id_ps', $this->selectedProdi)
                        ->get();
        }

        return view('livewire.pimpinan-upm.mapping-mk-cpmk-cpl-all', [
            'mata_kuliah' => $mata_kuliah,
            'cpl' => $cpl,
            'mk_cpmk_cpl_map' => $mk_cpmk_cpl_map,
            'cpmk_list' => $cpmk_list, // Kirim list CPMK lengkap ke view
            'list_prodi' => $programStudi,
            'list_kurikulum' => $kurikulum,
        ]);
    }
}
