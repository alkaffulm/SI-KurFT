<?php

namespace App\Livewire;

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
use Illuminate\Support\Facades\DB;

class RpsEditPage extends Component
{
    public RPSModel $rps;

   // Properti untuk data induk RPS
    public $id_bk;
    // public $cpl_ids = [];
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
    public $allSubCpmks = [];
    public $teknikTersedia = [];
    public $allKriteria = [];
    public $allTeknik = [];
    
    // Properti untuk pilihan dropdown
    public $allBahanKajian = [];
    public $allMataKuliah = [];

    public function mount(RPSModel $rps) {
        $this->rps = $rps->load('mataKuliah.bahanKajian.cpls');
        // untuk RPS Induk
        $this->id_bk = $rps->id_bk;
        // $this->cpl_ids = $rps->cpls->pluck('id_cpl')->toArray();
        $this->id_mk_syarat = $rps->mataKuliahSyarat->first()?->id_mk;
        $this->materi_pembelajaran = $rps->materi_pembelajaran;
        $this->pustaka_utama = $rps->pustaka_utama;
        $this->pustaka_pendukung = $rps->pustaka_pendukung;

        $this->assocCpls = $rps->mataKuliah->bahanKajian->flatMap(function ($bahanKajian) {return $bahanKajian->cpls;})->unique('id_cpl');

        $mappings = MK_CPMK_CPL_MapModel::where('id_mk', $rps->id_mk)->with('cpl', 'cpmk')->get();
        $this->assocCpls = $mappings->pluck('cpl')->unique('id_cpl')->sortBy('nama_kode_cpl');
        $this->assocCpmk = $mappings->pluck('cpmk')->unique('id_cpmk')->sortBy('nama_kode_cpmk');

        $this->correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        // untuk dropdown
        // $this->allCpl = CPLModel::all();
        // $this->allBahanKajian = BahanKajianModel::all();
        $this->allKriteria = KriteriaPenilaianModel::all();
        $this->allTeknik = TeknikPenilaianModel::all();
        $this->allMataKuliah = MataKuliahModel::where('id_mk', '!=', $rps->id_mk)->get();

        // untuk RPS Detail atau RPS Topic
        $this->allSubCpmks = $rps->mataKuliah->cpmks->pluck('subCpmk')->flatten();
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
                'minggu_ke' => $topic->weeks->pluck('minggu_ke')->toArray(),                
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

    public function saveRps() {
        $this->validate([
            // validasi RPS Detail
            'topics.*.id_sub_cpmk' => 'required_if:topics.*.tipe,topik|nullable|exists:sub_cpmk,id_sub_cpmk',
            'topics.*.indikator' => 'nullable|string',
            'topics.*.tipe' => 'required|in:topik,uts,uas',
            'topics.*.materi_pembelajaran' => 'required_if:topics.*.tipe,topik|nullable|string',
            'topics.*.metode_pembelajaran' => 'required_if:topics.*.tipe,topik|nullable|string',
            'topics.*.bobot_penilaian' => 'required|min:0|max:100|numeric',
            'topics.*.minggu_ke' => 'array|min:1', 
            'topics.*.teknik_penilaian_kategori' => 'nullable|string', 
            'topics.*.selected_kriteria' => 'nullable|array', 
            'topics.*.selected_teknik' => 'nullable|array', 

            // validasi RPS Induk
            // 'id_bk' => 'required|exists:bahan_kajian,id_bk',
            'id_mk_syarat' => 'nullable|exists:mata_kuliah,id_mk',
            // 'cpl_ids' => 'required|array',
            // 'cpl_ids.*' => 'exists:cpl,id_cpl', // Pastikan setiap ID CPL valid
            'materi_pembelajaran' => 'nullable|string',
            'pustaka_utama' => 'nullable|string',
            'pustaka_pendukung' => 'nullable|string',
        ]);

    // protected $messages = [
    //     'topics.*.id_sub_cpmk.required' => 'Setiap topik harus memiliki Sub-CPMK.',
    //     'topics.*.materi_pembelajaran.required' => 'Setiap topik harus memiliki materi pembelajaran.',
    //     'topics.*.minggu_ke.required' => 'Setiap topik harus dijadwalkan setidaknya untuk satu minggu.',        
    // ];

        DB::transaction(function () {
        
        $isRevisi = $this->rps->isRevisi;

        $this->rps->update([
            // 'id_bk' => $this->id_bk,
            'materi_pembelajaran' => $this->materi_pembelajaran,
            'pustaka_utama' => $this->pustaka_utama,
            'pustaka_pendukung' => $this->pustaka_pendukung,
        ]);

        // $this->rps->cpls()->sync($this->cpl_ids);
        $this->rps->mataKuliahSyarat()->sync($this->id_mk_syarat ?? []);
        
        foreach ($this->topics as $topicData) {
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

            RpsTopicWeekMapModel::where('id_topic', $topic->id_topic)->delete();
            $weekMappings = [];
            foreach ($topicData['minggu_ke'] as $week) {
                $weekMappings[] = ['id_topic' => $topic->id_topic, 'minggu_ke' => $week];                
            }
            RpsTopicWeekMapModel::insert($weekMappings);  
                
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
