<?php

namespace App\Livewire;

use App\Models\CPLCPMKBobotModel;
use Livewire\Component;
use App\Models\MataKuliahModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\RencanaAsesmenModel;
use Illuminate\Support\Facades\Auth;

class PembobotanCpmkCpl extends Component
{
    public $selectedMataKuliah;
    public $allMataKuliah;
    public $MataKuliah;
    public $assocCpmks;
    public $assocCpls;
    public $bobotCpmkCpl;
    public $correlationMap;

    public function mount() {
        $this->allMataKuliah = MataKuliahModel::all();
    }
    
    public function updatedSelectedMataKuliah($id_mk) {
        if(!empty($id_mk)) {
            $this->MataKuliah = MataKuliahModel::find($id_mk);
            $this->assocCpmks = $this->MataKuliah->cpmks->unique('id_cpmk');
            $this->assocCpls = $this->MataKuliah->cpls->unique('id_cpl');
            $this->bobotCpmkCpl = CPLCPMKBobotModel::where('id_mk', $id_mk)->get()->keyBy(fn($item) => $item->id_cpl . '-' . $item->id_cpmk);

                    // Ambil peta korelasi yang valid untuk mata kuliah ini
            $this->correlationMap = MK_CPMK_CPL_MapModel::where('id_mk', $id_mk)
                ->whereNotNull('id_cpmk') // Hanya ambil yang punya relasi ke CPMK
                ->get()
                ->groupBy('id_cpl') // Kelompokkan berdasarkan CPL
                ->map(function ($items) {
                    // Untuk setiap CPL, buat daftar ID CPMK yang terhubung dengannya
                    return $items->pluck('id_cpmk')->all();
                });
        }
        else {
            $this->assocCpmks = [];
        }
    }
    
    public function render()
    {
        return view('livewire.pembobotan-cpmk-cpl');
    }
}
