<?php

namespace App\Livewire\PimpinanUpm;

use App\Models\KurikulumModel;
use App\Models\MataKuliahModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\KurikulumScope;
use App\Models\Scopes\ProdiScope;
use Livewire\Component;
use Livewire\WithPagination;

class MataKuliahAll extends Component
{
    use WithPagination;

    public $selectedKurikulum = '';
    public $selectedProdi = '';
    public $search = '';

    public function updatedSelectedProdi()
    {
        $this->selectedKurikulum = '';
        $this->resetPage();
    }

    public function updatedSelectedKurikulum()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $mata_kuliah = null;

        if ($this->selectedProdi && $this->selectedKurikulum) {

            $query = MataKuliahModel::query()
                ->withoutGlobalScopes([
                    ProdiScope::class,
                    KurikulumScope::class
                ])
                ->where('id_kurikulum', $this->selectedKurikulum)
                ->where('id_ps', $this->selectedProdi)

                ->when($this->search, function ($q) {
                    $q->where(function ($sub) {
                        $sub->where('kode_mk', 'like', '%' . $this->search . '%')
                            ->orWhere('nama_matkul_id', 'like', '%' . $this->search . '%')
                            ->orWhere('nama_matkul_en', 'like', '%' . $this->search . '%');
                    });
                })

                ->orderBy('semester');

            $query->with([
                'rps' => function($q) {
                    $q->where('id_kurikulum', $this->selectedKurikulum);
                },
                'koordinatorMk',
                'pengembangRps'
            ]);

            $mata_kuliah = $query->paginate(10);
        }

        $programStudi = ProgramStudiModel::all();

        $kurikulum = [];

        if (!empty($this->selectedProdi)) {
            $kurikulum = KurikulumModel::withoutGlobalScopes([
                    ProdiScope::class
                ])
                ->where('id_ps', $this->selectedProdi)
                ->get();
        }

        return view('livewire.pimpinan-upm.mata-kuliah-all', [
            'mata_kuliah' => $mata_kuliah,
            'list_kurikulum' => $kurikulum,
            'list_prodi' => $programStudi,
        ]);
    }
}