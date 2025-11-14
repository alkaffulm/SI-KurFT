<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CPMKModel;
use App\Models\MataKuliahModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\RencanaAsesmenCPMKBobotModel;
use App\Models\RencanaAsesmenModel;
use Illuminate\Support\Facades\Auth;

class RencanaAssesment extends Component
{
    public $mataKuliahDosenTerkait;
    public $selectedMataKuliah;
    public $rencanaAsesmen;
    public $allMataKuliah;
    public $assocCpmks;
    public $rencanaAsesmenCpmkBobot;
    public $totalPerCpmk = [];

    public function mount() {
        $this->mataKuliahDosenTerkait = MataKuliahModel::tanggungJawabDosen(Auth::id())->with('rps')->get();
    }

    public function hitungTotalPerCpmk()
    {
        $this->totalPerCpmk = [];

        if (empty($this->rencanaAsesmen)) return;

        foreach ($this->rencanaAsesmen as $rencana) {
            if (!empty($rencana->bobotCpmk)) {
                foreach ($rencana->bobotCpmk as $bobot) {
                    $idCpmk = $bobot->id_cpmk;
                    $nilai = $bobot->pivot->bobot ?? 0;

                    if (!isset($this->totalPerCpmk[$idCpmk])) {
                        $this->totalPerCpmk[$idCpmk] = 0;
                    }

                    $this->totalPerCpmk[$idCpmk] += $nilai;
                }
            }
        }
    }
    
    public function updatedSelectedMataKuliah($id_mk) {
        if(!empty($id_mk)) {
            $this->allMataKuliah = MataKuliahModel::find($id_mk);
            $this->assocCpmks = $this->allMataKuliah->cpmks->unique('id_cpmk');
            $assocCpmksIds = $this->assocCpmks->pluck('id_cpmk');

            $this->rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $id_mk)
                ->with(['bobotCpmk' => function ($query) use ($assocCpmksIds) {
                    $query->whereIn('cpmk.id_cpmk', $assocCpmksIds);
                }])->get();

            // 🔹 panggil perhitungan total
            $this->hitungTotalPerCpmk();
        }
        else {
            $this->assocCpmks = [];
            $this->rencanaAsesmen = [];
            $this->totalPerCpmk = [];
        }
    }




 
    public function render()
    {
        return view('livewire.rencana-assesment');
    }
}
