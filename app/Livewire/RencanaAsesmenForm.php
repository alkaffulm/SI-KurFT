<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MataKuliahModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\RencanaAsesmenModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RencanaAsesmenForm extends Component
{
    public MataKuliahModel $mataKuliah;

    public $assocCpmks;          
    public $groupedCpl;        
    public $rencanaAsesmens = []; 
    public $bobotMaxPerCpmk = [];
    public $bobotStandarPerCpmk = [];
    public $mappingExists = false;
    public $totalPerCpmk = [];

    public function mount(MataKuliahModel $mataKuliah)
    {
        $this->mataKuliah = $mataKuliah;

        $this->assocCpmks = MK_CPMK_CPL_MapModel::where('id_mk', $mataKuliah->id_mk)
            ->with(['cpmk', 'cpl', 'mkcpmkbobot'])
            ->get();

        $this->mappingExists = $this->assocCpmks->isNotEmpty();

        $this->groupedCpl = $this->assocCpmks
            ->groupBy('id_cpl')
            ->map(fn($items) => [
                'cpl' => $items->first()->cpl,
                'cpmks' => $items->pluck('cpmk'),
            ]);

        foreach ($this->assocCpmks as $map) {
            $this->bobotStandarPerCpmk[$map->id_mk_cpmk_cpl] = $map->mkcpmkbobot->first()?->bobot ?? 0;
        }

        if ($this->mappingExists) {
            $this->loadRencanaAsesmen();
        }
    }

    public function loadRencanaAsesmen()
    {
        $existing = RencanaAsesmenModel::where('id_mk', $this->mataKuliah->id_mk)
            ->with(['bobotCpmk']) // belongsToMany relation
            ->get();

        $this->rencanaAsesmens = [];

        foreach ($existing as $asesmen) {
            $bobot = [];
            
            foreach ($this->assocCpmks as $map) {
                $pivot = $asesmen->bobotCpmk
                    ->firstWhere('id_mk_cpmk_cpl', $map->id_mk_cpmk_cpl);

                $bobot[$map->id_mk_cpmk_cpl] = $pivot 
                    ? $pivot->pivot->bobot 
                    : 0;
            }

            $this->rencanaAsesmens[] = [
                'id_rencana_asesmen' => $asesmen->id_rencana_asesmen,
                'tipe_komponen' => $asesmen->tipe_komponen,
                'nomor_komponen' => $asesmen->nomor_komponen,
                'bobot' => $bobot,
            ];
        }

        $this->hitungTotalPerCpmk();
    }

    public function addRow()
    {
        $defaultBobot = [];
        foreach ($this->assocCpmks as $map) {
            $defaultBobot[$map->id_mk_cpmk_cpl] = 0;
        }

        $this->rencanaAsesmens[] = [
            'id_rencana_asesmen' => null,
            'tipe_komponen' => '',
            'nomor_komponen' => null,
            'bobot' => $defaultBobot,
        ];
    }

    public function removeRow($index)
    {
        if (!empty($this->rencanaAsesmens[$index]['id_rencana_asesmen'])) {
            RencanaAsesmenModel::find($this->rencanaAsesmens[$index]['id_rencana_asesmen'])?->delete();
        }

        unset($this->rencanaAsesmens[$index]);
        $this->rencanaAsesmens = array_values($this->rencanaAsesmens);

        $this->hitungTotalPerCpmk();
    }

    public function saveRencanaAsesmen()
    {
        try {
            $this->validate([
                'rencanaAsesmens.*.tipe_komponen' => 'required|string',
                'rencanaAsesmens.*.nomor_komponen' => 'nullable|integer|min:1',
                'rencanaAsesmens.*.bobot.*' => 'nullable|numeric|min:0|max:100',
            ]);

            DB::transaction(function () {
                foreach ($this->rencanaAsesmens as $row) {
                    Log::info('Saving rencana asesmen:', [
                        'id_rencana_asesmen' => $row['id_rencana_asesmen'] ?? 'new',
                        'id_mk' => $this->mataKuliah->id_mk,
                        'tipe_komponen' => $row['tipe_komponen'],
                        'nomor_komponen' => $row['nomor_komponen'],
                    ]);

                    $asesmen = RencanaAsesmenModel::updateOrCreate(
                        ['id_rencana_asesmen' => $row['id_rencana_asesmen'] ?? null],
                        [
                            'id_mk' => $this->mataKuliah->id_mk,
                            'id_ps' => $this->mataKuliah->id_ps,
                            'id_kurikulum' => $this->mataKuliah->id_kurikulum,
                            'tipe_komponen' => $row['tipe_komponen'],
                            'nomor_komponen' => $row['nomor_komponen'] ?? null,
                        ]
                    );

                    Log::info('Rencana asesmen created/updated:', [
                        'id_rencana_asesmen' => $asesmen->id_rencana_asesmen,
                    ]);

                    foreach ($row['bobot'] as $id_mk_cpmk_cpl => $b) {
                        Log::info('Saving bobot:', [
                            'id_rencana_asesmen' => $asesmen->id_rencana_asesmen,
                            'id_mk_cpmk_cpl' => $id_mk_cpmk_cpl,
                            'bobot' => $b,
                        ]);

                        \App\Models\RencanaAsesmenCPMKBobotModel::updateOrCreate(
                            [
                                'id_rencana_asesmen' => $asesmen->id_rencana_asesmen,
                                'id_mk_cpmk_cpl' => $id_mk_cpmk_cpl,
                            ],
                            ['bobot' => $b ?? 0]
                        );
                    }
                }
            });

            session()->flash('success', 'Rencana Asesmen berhasil disimpan!');
            $this->loadRencanaAsesmen();
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Validasi gagal: ' . implode(', ', $e->validator->errors()->all()));
            Log::error('Validation error:', $e->errors());
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            Log::error('Error saving rencana asesmen: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
        }
    }


    public function updatedRencanaAsesmens($value, $name)
    {
        if (preg_match('/rencanaAsesmens\.(\d+)\.bobot\.(\d+)/', $name, $matches)) {
            $mapId = $matches[2];
            
            $map = $this->assocCpmks->firstWhere('id_mk_cpmk_cpl', $mapId);
            if (!$map) return;
            
            $cpmkId = $map->cpmk->id_cpmk;

            $total = collect($this->rencanaAsesmens)
                ->sum(fn($row) => $row['bobot'][$mapId] ?? 0);

            $this->totalPerCpmk[$cpmkId] = $total;

            $standar = $this->bobotStandarPerCpmk[$mapId] ?? 0;
            
            if ($total > $standar) {
                $this->dispatch('bobot-exceeded', [
                    'cpmkId' => $cpmkId,
                    'total' => $total,
                    'max' => $standar,
                ]);
            }
        }
    }


    public function hitungTotalPerCpmk()
    {
        $this->totalPerCpmk = [];

        foreach ($this->rencanaAsesmens as $row) {
            foreach ($row['bobot'] as $mapId => $nilai) {
                $cpmkId = $this->assocCpmks->firstWhere('id_mk_cpmk_cpl', $mapId)->cpmk->id_cpmk;
                if (!isset($this->totalPerCpmk[$cpmkId])) $this->totalPerCpmk[$cpmkId] = 0;
                $this->totalPerCpmk[$cpmkId] += $nilai;
            }
        }
    }



    public function render()
    {
        return view('livewire.rencana-asesmen-form', [
            'bobotStandarPerCpmk' => $this->bobotStandarPerCpmk,
        ]);
    }
}
