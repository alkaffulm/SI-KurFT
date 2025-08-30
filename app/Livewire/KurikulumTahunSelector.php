<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KurikulumModel;
use App\Models\Kurikulum_TahunAkademik;
use App\Models\TahunAkademik;

class KurikulumTahunSelector extends Component
{
    public $kurikulums = [];
    public $tahunAkademiks = [];
    public $id_kurikulum = null;

    public function mount()
    {
        $this->kurikulums = KurikulumModel::all();
    }

    public function updatedIdKurikulum($value)
    {
        if ($value) {
            $tahunIds = Kurikulum_TahunAkademik::where('id_kurikulum', $value)
                        ->pluck('id_tahun_akademik');

            $this->tahunAkademiks = TahunAkademik::whereIn('id_tahun_akademik', $tahunIds)->get();
        } else {
            $this->tahunAkademiks = [];
        }
    }

    public function render()
    {
        return view('livewire.kurikulum-tahun-selector');
    }
}
