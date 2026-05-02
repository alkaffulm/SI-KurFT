<?php

namespace App\Livewire;

use App\Models\Kelas;
use App\Models\Kurikulum_TahunAkademik; // pivot table
use App\Models\KurikulumModel;
use App\Models\TahunAkademik;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;


class TahunKelasSelector extends Component
{
    use WithPagination;

    public $id_kurikulum;
    public $id_tahun_akademik;

    public $kurikulums = [];
    public $tahunAkademiks = [];
    // public $kelas = [];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingIdKurikulum()
    {
        $this->resetPage();
    }

    public function updatingIdTahunAkademik()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->kurikulums = KurikulumModel::all();
    }

    public function updatedIdKurikulum($value)
    {
        $this->id_tahun_akademik = null;
        $this->kelas = [];

        $this->tahunAkademiks = TahunAkademik::whereIn('id_tahun_akademik', function($q) use ($value) {
            $q->select('id_tahun_akademik')
              ->from((new Kurikulum_TahunAkademik)->getTable())
              ->where('id_kurikulum', $value);
        })->get();
    }

    // public function updatedIdTahunAkademik($value)
    // {
    //     $this->kelas = Kelas::with(['userModel', 'mataKuliahModel' => function($q){
    //         $q->withoutGlobalScopes(); 
    //     }])
    //     ->where('id_kurikulum', $this->id_kurikulum)
    //     ->where('id_tahun_akademik', $value)
    //     ->get();
    // }

    public function render()
    {
        $kelas = collect();

        if ($this->id_kurikulum && $this->id_tahun_akademik) {

            $kelas = Kelas::with([
                    'userModel',
                    'mataKuliahModel' => function ($q) {
                        $q->withoutGlobalScopes();
                    }
                ])
                ->where('id_kurikulum', $this->id_kurikulum)
                ->where('id_tahun_akademik', $this->id_tahun_akademik)
                ->whereHas('mataKuliahModel', function ($q) {
                    $q->withoutGlobalScopes()
                        ->when($this->search, function ($sub) {
                            $sub->where('nama_matkul_id', 'like', '%' . $this->search . '%');
                    });
                })
                ->paginate(5);
        }

        return view('livewire.tahun-kelas-selector', [
            'kelas' => $kelas
        ]);
    }
}
