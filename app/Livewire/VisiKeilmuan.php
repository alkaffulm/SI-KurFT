<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\VisiKeilmuanModel;

class VisiKeilmuan extends Component
{
    public $visi; // Ini akan berisi Model Object (bukan collection) atau null

    public function mount()
    {
        $this->loadVisi(session('id_kurikulum_aktif'));
    }

    #[On('kurikulum-changed')]
    public function updateVisi($idKurikulum)
    {
        $this->loadVisi($idKurikulum);
    }

    public function loadVisi($idKurikulum)
    {
        if(!$idKurikulum) {
            $this->visi = null;
            return;
        }

        // Ambil SATU data saja (first), karena logikanya 1 Kurikulum = 1 Visi Keilmuan
        $this->visi = VisiKeilmuanModel::where('id_kurikulum', $idKurikulum)->first();
    }

    public function render()
    {
        return view('livewire.visi-keilmuan');
    }
}