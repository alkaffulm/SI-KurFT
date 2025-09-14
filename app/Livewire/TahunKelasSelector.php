<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KurikulumModel;
use App\Models\TahunAkademik;
use App\Models\Kurikulum_TahunAkademik; // pivot table
use App\Models\Kelas;
use Illuminate\Support\Facades\Log;


class TahunKelasSelector extends Component
{
    public $id_kurikulum;
    public $id_tahun_akademik;

    public $kurikulums = [];
    public $tahunAkademiks = [];
    public $kelas = [];

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

    public function updatedIdTahunAkademik($value)
    {
        $this->kelas = Kelas::with(['userModel', 'mataKuliahModel' => function($q){
            $q->withoutGlobalScopes(); 
        }])
        ->where('id_kurikulum', $this->id_kurikulum)
        ->where('id_tahun_akademik', $value)
        ->get();
    }

    public function render()
    {
        return view('livewire.tahun-kelas-selector');
    }
}
