<?php

namespace App\Livewire;

use App\Http\Requests\StoreRPSTopicRequest;
use Livewire\Component;
use App\Models\CPLModel;
use App\Models\RPSModel;
use App\Models\RPSTopicModel;
use App\Models\MataKuliahModel;
use App\Models\BahanKajianModel;
use App\Models\KriteriaPenilaianModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\RpsTopicWeekMapModel;
use App\Models\TeknikPenilaianModel;
use App\Models\TopicWeekMapModel;
use App\Models\WeekModel;
use Illuminate\Support\Facades\DB;

class RpsEditPage extends Component
{
    public RPSModel $rps;

   // Properti untuk data induk RPS
    public $id_bk;
    public $assocCpls;
    public $assocCpmk;
    public $correlationCpmkCplMap = [];
    public $id_mk_syarat;
    public $indikator;
    public $kriteria_teknik_penilaian;
    public $materi_pembelajaran;
    public $pustaka_utama;
    public $pustaka_pendukung;

    // Properti untuk data detail mingguan
    public $topics = [];
    public $assocSubCpmk = [];
    public $teknikTersedia = [];
    public $allKriteria = [];
    public $allTeknik = [];
    public $allWeek = [];
    
    // Properti untuk pilihan dropdown
    public $allMataKuliah = [];

    public function mount(RPSModel $rps) {
        // untuk RPS Induk
        $this->id_bk = $rps->id_bk;
        $this->id_mk_syarat = $rps->mataKuliahSyarat->first()?->id_mk;
        $this->materi_pembelajaran = $rps->materi_pembelajaran;
        $this->pustaka_utama = $rps->pustaka_utama;
        $this->pustaka_pendukung = $rps->pustaka_pendukung;

        $mappings = MK_CPMK_CPL_MapModel::where('id_mk', $rps->id_mk)->with('cpl', 'cpmk')->get();
        $this->assocCpls = $mappings->pluck('cpl')->unique('id_cpl')->sortBy('nama_kode_cpl');
        $this->assocCpmk = $mappings->pluck('cpmk')->unique('id_cpmk')->sortBy('nama_kode_cpmk');
        $this->assocSubCpmk = $this->assocCpmk->pluck('subCpmk')->flatten();

        $this->correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        // untuk dropdown
        $this->allKriteria = KriteriaPenilaianModel::all();
        $this->allTeknik = TeknikPenilaianModel::all();
        $this->allMataKuliah = MataKuliahModel::where('id_mk', '!=', $rps->id_mk)->get();
        $this->allWeek = WeekModel::all();

        // untuk RPS Detail atau RPS Topic
        $this->topics = $rps->topics()->with(['weeks', 'kriteriaPenilaian', 'teknikPenilaian'])->get()->map(function ($topic, $index) {
            if($topic->teknik_penilaian_kategori) {
                $this->teknikTersedia[$index] = TeknikPenilaianModel::where('kategori', $topic->teknik_penilaian_kategori)->get();
            }

            return [
                'id_topic' => $topic->id_topic,
                'id_sub_cpmk' => $topic->id_sub_cpmk,
                'indikator' => $topic->indikator,
                'tipe' => $topic->tipe,
                'metode_pembelajaran' => $topic->metode_pembelajaran,
                'materi_pembelajaran' => $topic->materi_pembelajaran,
                'bobot_penilaian' => $topic->bobot_penilaian,
                'teknik_penilaian_kategori' => $topic->teknik_penilaian_kategori,
                'selected_kriteria' => $topic->kriteriaPenilaian->pluck('id_kriteria_penilaian')->toArray(),
                'selected_teknik' => $topic->teknikPenilaian->pluck('id_teknik_penilaian')->toArray(),
                'minggu_ke' => $topic->weeks->pluck('id_week')->toArray(),                
            ];
        })->toArray();

    }

    public function updatedTopics($value, $key) {
        $parts = explode('.', $key);
        $index = $parts[0];
        $propertyName = $parts[1];
        if ($propertyName === 'teknik_penilaian_kategori') {
            $this->topics[$index]['selected_teknik'] = [];
            if ($value) {
                // Ambil semua teknik dari database yang kolom 'kategori'-nya
                // sama persis dengan nilai yang baru saja dipilih pengguna.
                $this->teknikTersedia[$index] = TeknikPenilaianModel::where('kategori', $value)->get();
            } 
            else {
                $this->teknikTersedia[$index] = [];
            }
        }
    }

    public function addRow() {
        $this->topics[] = [
            'id_topic' => null, 
            'id_sub_cpmk' => '',
            'indikator' => '',
            'tipe' => 'topik',
            'selected_teknik' => [],
            'selected_kriteria' => [],
            'metode_pembelajaran' => '',
            'materi_pembelajaran' => '',
            'bobot_penilaian' => 0,
            'minggu_ke' => [], 

        ];
    }

    public function removeRow($index) {
        if (isset($this->topics[$index]['id_topic'])) {
            RPSTopicModel::find($this->topics[$index]['id_topic'])->delete();
        }
        unset($this->topics[$index]);
        $this->topics = array_values($this->topics); // Re-index array

    }  

    public function saveRps( ) {
        $request = new StoreRPSTopicRequest();
        $validated = $this->validate($request->rules(), $request->messages());

        DB::transaction(function () use ($validated) {
        
            $isRevisi = $this->rps->isRevisi;

            $this->rps->update([
                // 'id_bk' => $this->id_bk,
                'materi_pembelajaran' => $validated['materi_pembelajaran'],
                'pustaka_utama' => $validated['pustaka_utama'],
                'pustaka_pendukung' => $validated['pustaka_pendukung'],
            ]);

            $this->rps->mataKuliahSyarat()->sync($validated['id_mk_syarat'] ?? []);
            
            foreach ($validated['topics'] as $topicData) {
                $topic = RPSTopicModel::updateOrCreate(
                    ['id_topic' => $topicData['id_topic'] ?? null],
                    [
                        'id_rps' => $this->rps->id_rps,
                        'id_sub_cpmk' => empty($topicData['id_sub_cpmk'] ) ? null : $topicData['id_sub_cpmk'],
                        'indikator' => $topicData['indikator'] ?? null,
                        'tipe' => $topicData['tipe'],
                        'teknik_penilaian_kategori' => $topicData['teknik_penilaian_kategori'] ?? null,
                        'metode_pembelajaran' => $topicData['metode_pembelajaran'] ?? null,
                        'materi_pembelajaran' => $topicData['materi_pembelajaran'] ?? null,
                        'bobot_penilaian' => $topicData['bobot_penilaian'] ?? 0,                    
                    ]
                );

                $topic->weeks()->sync($topicData['minggu_ke'] ?? []);
                $topic->kriteriaPenilaian()->sync($topicData['selected_kriteria'] ?? []);
                $topic->teknikPenilaian()->sync($topicData['selected_teknik'] ?? []);
                    
            }

            // untuk jumlah revisi dan tanggal revisi
            if($isRevisi) {
                $this->rps->increment('jumlah_revisi');
                $this->rps->forceFill(['tanggal_revisi' => now()])->saveQuietly();
            }
            else {
                $this->rps->forceFill(['isRevisi' => true])->saveQuietly();
            }
        });
        return redirect(route('rps.show', $this->rps))->with('Success', 'Berhasil Memperbarui Rencana pembelajaran mingguan');
    }  

    public function render()
    {
        return view('livewire.rps-edit-page');
    }

}
