<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MataKuliahModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\MKCPMKBobotModel;

class MKCPMKBobot extends Component
{
    public $selectedMataKuliah = null;
    public $assocCpmks;
    public $bobots = [];

    public function mount()
    {
        $this->assocCpmks = collect();
    }

    public function updatedSelectedMataKuliah()
    {
        if (!$this->selectedMataKuliah) {
            $this->assocCpmks = collect();
            $this->bobots = [];
            return;
        }

        $this->assocCpmks = MK_CPMK_CPL_MapModel::with(['cpmk', 'cpl'])
            ->where('id_mk', $this->selectedMataKuliah)
            ->get();

        $existingBobots = MKCPMKBobotModel::whereIn(
            'id_mk_cpmk_cpl',
            $this->assocCpmks->pluck('id_mk_cpmk_cpl')
        )->pluck('bobot', 'id_mk_cpmk_cpl')->toArray();

        $this->bobots = [];
        foreach ($this->assocCpmks as $map) {
            $this->bobots[$map->id_mk_cpmk_cpl] = (int) ($existingBobots[$map->id_mk_cpmk_cpl] ?? 0);
        }
    }

    public function render()
    {
        return view('livewire.mk-cpmk-bobot', [
            'mata_kuliah' => MataKuliahModel::all(),
        ]);
    }
}