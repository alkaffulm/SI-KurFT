<?php

namespace App\Livewire;

use App\Models\MataKuliahModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MataKuliahDashboard extends Component
{
    use WithPagination;

    public $idKurikulum;

    public function mount()
    {
        $this->idKurikulum = session('id_kurikulum_aktif');
    }

    #[On('kurikulum-changed')]
    public function updateMk($idKurikulum)
    {
        $this->idKurikulum = $idKurikulum;

        // reset ke halaman pertama saat kurikulum berubah
        $this->resetPage();
    }

    public function render()
    {
        if (!$this->idKurikulum) {
            $tanggungJawabDosen = collect();
        } else {
            $tanggungJawabDosen = MataKuliahModel::tanggungJawabDosen(Auth::id())
                ->with([
                    'bahanKajian.cpls',
                    'rps',
                    'koordinatorMk',
                    'pengembangRps'
                ])
                ->orderBy('semester')
                ->paginate(5);
        }

        return view('livewire.mata-kuliah-dashboard', [
            'tanggungJawabDosen' => $tanggungJawabDosen
        ]);
    }
}