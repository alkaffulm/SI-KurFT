<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MataKuliahModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\RencanaAsesmenModel;
use Illuminate\Support\Facades\Auth;

class RencanaAssesment extends Component
{
    public $mataKuliahDosenTerkait;
    public $selectedMataKuliah;
    public $allMataKuliah;
    public $assocCpmks;
    public $groupedCpl = [];
    public $rencanaAsesmen;
    public $totalPerCpmk = [];
    public $bobotStandarPerCpmk = [];

    public function mount()
    {
        $this->mataKuliahDosenTerkait = MataKuliahModel::tanggungJawabDosen(Auth::id())
            ->with('rps')
            ->get();
    }

    public function updatedSelectedMataKuliah($id_mk)
    {
        if (!$id_mk) {
            $this->reset([
                'allMataKuliah', 'assocCpmks', 'groupedCpl',
                'rencanaAsesmen', 'totalPerCpmk', 'bobotStandarPerCpmk'
            ]);
            return;
        }

        $this->allMataKuliah = MataKuliahModel::find($id_mk);

        $this->assocCpmks = MK_CPMK_CPL_MapModel::where('id_mk', $id_mk)
            ->with(['cpmk', 'cpl', 'mkcpmkbobot'])
            ->get();

        foreach ($this->assocCpmks as $map) {
            $this->bobotStandarPerCpmk[$map->id_cpmk][$map->id_cpl] = $map->mkcpmkbobot->first()?->bobot ?? 0;
        }

        $this->groupedCpl = $this->assocCpmks
            ->groupBy('id_cpl')
            ->map(fn($items) => [
                'cpl' => $items->first()->cpl,
                'cpmks' => $items,
            ]);

        $this->rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $id_mk)
            ->with('bobotCpmk')
            ->get();

        $this->hitungTotalPerCpmk();
    }

    public function hitungTotalPerCpmk()
    {
        $this->totalPerCpmk = [];

        if (empty($this->rencanaAsesmen)) return;

        foreach ($this->rencanaAsesmen as $rencana) {
            foreach ($rencana->bobotCpmk as $mkCpmkMap) {
                $idMkCpmkCpl = $mkCpmkMap->id_mk_cpmk_cpl;
                $idCpmk = $mkCpmkMap->id_cpmk;
                $idCpl = $mkCpmkMap->id_cpl;
                $nilai = $mkCpmkMap->pivot->bobot ?? 0;

                // Simpan total per kombinasi CPMK-CPL
                // Key: "id_cpmk-id_cpl" untuk membedakan CPMK yang sama di CPL berbeda
                $key = "{$idCpmk}-{$idCpl}";
                $this->totalPerCpmk[$key] = ($this->totalPerCpmk[$key] ?? 0) + $nilai;
            }
        }
    }

    public function render()
    {
        return view('livewire.rencana-assesment', [
            'mataKuliahDosenTerkait' => $this->mataKuliahDosenTerkait,
            'assocCpmks' => $this->assocCpmks,
            'groupedCpl' => $this->groupedCpl,
            'rencanaAsesmen' => $this->rencanaAsesmen,
            'totalPerCpmk' => $this->totalPerCpmk,
            'bobotStandarPerCpmk' => $this->bobotStandarPerCpmk,
            'allMataKuliah' => $this->allMataKuliah,
        ]);
    }
}