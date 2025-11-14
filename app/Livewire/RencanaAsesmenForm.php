<?php

namespace App\Livewire;

use App\Http\Requests\StoreRencanaAsesmenRequest;
use Livewire\Component;
use App\Models\RPSModel;
use Illuminate\Support\Str;
use App\Models\MataKuliahModel;
use Illuminate\Support\Facades\DB;
use App\Models\RencanaAsesmenModel;
use App\Models\MK_CPMK_CPL_MapModel;

class RencanaAsesmenForm extends Component
{
    public MataKuliahModel $mataKuliah;
    public $assocCpmks;
    public $rencanaAsesmens = [];
    public $totalBobotKeseluruhan = 0;

    public $totalPerCpmk = [];

    public function mount(MataKuliahModel $mataKuliah) {
        $this->mataKuliah = $mataKuliah->load('cpmks');
        $this->assocCpmks = $mataKuliah->cpmks;

        $this->loadRencanaAssesmen();
        $this->calculateTotalBobotKeseluruh();
    }

    public function loadRencanaAssesmen() {
        $existingRencanaAsesmens = RencanaAsesmenModel::where('id_mk', $this->mataKuliah->id_mk)
            ->with('bobotCpmk')
            ->get();

        foreach ($existingRencanaAsesmens as $asesmen) {
           $bobot = $asesmen->bobotCpmk->pluck('pivot.bobot', 'id_cpmk')->toArray();
           
           $this->rencanaAsesmens[] = [
                'id_rencana_asesmen' => $asesmen->id_rencana_asesmen,
                'tipe_komponen' => $asesmen->tipe_komponen,
                'nomor_komponen' => $asesmen->nomor_komponen,
                'bobot' => $bobot
           ];
        }
    }

    public function addRow() {
        $defaultbobot = $this->assocCpmks->mapWithKeys(function ($cpmk) {
            return [$cpmk->id_cpmk => 0];
        })->toArray();

        $this->rencanaAsesmens[] = [
            'id_rencana_asesmen' => null,
            'tipe_komponen' => '',
            'komponen_evaluasi' => '',
            'nomor_komponen' => null,
            'bobot' => $defaultbobot
        ];
    }

    public function removeRow($index) {
        if(isset($this->rencanaAsesmens[$index]['id_rencana_asesmen'])) {
            RencanaAsesmenModel::find($this->rencanaAsesmens[$index]['id_rencana_asesmen'])->delete();
        }
        unset($this->rencanaAsesmens[$index]);
        $this->rencanaAsesmens = array_values($this->rencanaAsesmens);
    }

    // public function updated($key, $value)
    // {
    //     // Kita hanya ingin menghitung ulang jika yang berubah adalah salah satu input bobot.
    //     // Str::startsWith() akan memeriksa apakah nama properti dimulai dengan 'rencanaAsesmens.'.
    //     if (Str::startsWith($key, 'rencanaAsesmens.')) {
    //         $this->calculateTotalBobotKeseluruh();
    //     }
    // }

    // public function calculateTotalBobotKeseluruh(){
    //     // Gunakan collection untuk menjumlahkan semua total bobot per baris
    //     $this->totalBobotKeseluruhan = collect($this->rencanaAsesmens)->sum(function ($item) {
    //         // Pastikan 'bobot' adalah array sebelum dijumlahkan
    //         return is_array($item['bobot']) ? array_sum($item['bobot']) : 0;
    //     });
    // }

    public function calculateTotalBobotKeseluruh()
    {
        $totals = [];

        foreach ($this->assocCpmks as $cpmk) {
            $id = $cpmk->id_cpmk;
            $totals[$id] = collect($this->rencanaAsesmens)->sum(function ($asesmen) use ($id) {
                return $asesmen['bobot'][$id] ?? 0;
            });
        }

        $this->totalPerCpmk = $totals;
    }

    public function saveRencanaAsesmen() {
        $request = new StoreRencanaAsesmenRequest();
        $validated = $this->validate($request->rules(), $request->messages());

        DB::transaction(function () use ($validated) {
            foreach($validated['rencanaAsesmens'] as $asesmenData) {
                // $nomorBerikutnya = 1;

                // if(in_array($asesmenData['tipe_komponen'], ['tugas', 'kuis'])) {
                //     $nomorTerakhir = RencanaAsesmenModel::where('id_mk', $this->mataKuliah->id_mk)
                //         ->where('tipe_komponen', $asesmenData['tipe_komponen'])
                //         ->max('nomor_komponen');
                //     $nomorBerikutnya = ($nomorTerakhir ?? 0) + 1;
                // }

                $rencanaAsesmens = RencanaAsesmenModel::updateOrCreate(
                    ['id_rencana_asesmen' => $asesmenData['id_rencana_asesmen'] ?? null ],
                    [
                        'id_mk' => $this->mataKuliah->id_mk,
                        'id_ps' => $this->mataKuliah->id_ps,
                        'id_kurikulum'=> $this->mataKuliah->id_kurikulum,
                        'tipe_komponen' => $asesmenData['tipe_komponen'],
                        'nomor_komponen' => $asesmenData['nomor_komponen'] ?? null,
                    ]
                );
            // 1. Ambil data bobot mentah (misal: [44 => '10', 45 => '20'])
            $bobotData = $asesmenData['bobot'];

            // 2. Ubah formatnya menjadi [44 => ['bobot' => '10'], 45 => ['bobot' => '20']]
            $bobotUntukSync = collect($bobotData)->mapWithKeys(function ($bobot, $cpmkId) {
                return [$cpmkId => ['bobot' => $bobot]];
            })->toArray();

            // 3. Gunakan array yang sudah diformat untuk sync
            $rencanaAsesmens->bobotCpmk()->sync($bobotUntukSync);
                // $rencanaAsesmens->bobotCpmk()->sync($asesmenData['bobot']);
            }
        });

        return to_route('rencana-asesmen.index')->with('success', 'Rencana Asesmen berhasil dipearui!');
    }

    public function render()
    {
        return view('livewire.rencana-asesmen-form');
    }
}


