<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\MataKuliahModel;
use Illuminate\Support\Facades\Auth;

class MataKuliah extends Component
{

    public $tanggungJawabDosen; // Ini akan berisi Model Object (bukan collection) atau null

    public function mount()
    {
        $this->loadMk(session('id_kurikulum_aktif'));
    }

    #[On('kurikulum-changed')]
    public function updateMk($idKurikulum)
    {
        $this->loadMk($idKurikulum);
    }

    public function loadMk($idKurikulum)
    {
        if(!$idKurikulum) {
            $this->tanggungJawabDosen = null;
            return;
        }

        // Ambil SATU data saja (first), karena logikanya 1 Kurikulum = 1 Visi Keilmuan
        $this->tanggungJawabDosen = MataKuliahModel::tanggungJawabDosen(Auth::id())
                                    ->with(['bahanKajian.cpls', 'rps', 'koordinatorMk', 'pengembangRps'])
                                    ->get();
    }
    public function render()
    {
        return view('livewire.mata-kuliah');
    }
}
