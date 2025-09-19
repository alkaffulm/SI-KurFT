<?php

namespace App\Livewire;

use App\Models\CPMKModel;
use App\Models\MataKuliahModel;
use Livewire\Component;

class ShowSubCpmk extends Component
{
    public $mata_kuliah;
    public $selectedMataKuliah;
    public $assocCpmks = [];
    public $subCpmks = [];
    public $mataKuliah;

    public function mount() {
        $this->mata_kuliah = MataKuliahModel::all();
    }

    public function updatedSelectedMataKuliah($id_mk) {
        if(!empty($id_mk)) {
            $this->mataKuliah = MataKuliahModel::find($id_mk);
            // $this->cpmks = CPMKModel::where('id_mk', $id_mk)->get();

            $this->assocCpmks = $this->mataKuliah->mkcpmkcpl()->with('cpmk')->get();
        }
        else {
            $this->assocCpmks = [];
            $this->subCpmks = [];
        }
    }

    public function render()
    {
        return view('livewire.show-sub-cpmk');
    }
}
