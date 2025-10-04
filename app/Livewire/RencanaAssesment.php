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

    public function mount() {
        $this->mataKuliahDosenTerkait = MataKuliahModel::tanggungJawabDosen(Auth::id())->with('rps')->get();
    }
    
    public function updatedSelectedMataKuliah($id_mk) {
        if(!empty($id_mk)) {
            $this->allMataKuliah = MataKuliahModel::find($id_mk);
            $this->assocCpmks = $this->allMataKuliah->cpmks->unique('id_cpmk');
            $assocCpmksIds = $this->assocCpmks->pluck('id_cpmk');

            // $this->rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $id_mk)->get();
            $this->rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $id_mk)
                ->with(['bobotCpmk' => function ($query) use ($assocCpmksIds) {
                    $query->whereIn('cpmk.id_cpmk', $assocCpmksIds);
                }])->get();
        }
        else {
            $this->assocCpmks = [];
            $this->rencanaAsesmen = [];
        }
    }
 
    public function render()
    {
        return view('livewire.rencana-assesment');
    }
}
