<?php

namespace App\Livewire;

use App\Http\Requests\StoreRPSTopicRequest;
use Livewire\Component;
use App\Models\RPSModel;
use App\Models\RPSTopicModel;
use App\Models\MataKuliahModel;
use App\Models\BentukPembelajaranModel;
use App\Models\BentukPenugasanModel;
use App\Models\KriteriaPenilaianModel;
use App\Models\MediaPembelajaranModel;
use App\Models\MetodePembelajaranModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\ModelPembelajaranModel;
use App\Models\TeknikPenilaianModel;
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
    public $media_pembelajaran = [];
    public $id_model_pembelajaran;

    // Properti untuk data rps detail mingguan
    public $topics = [];
    public $assocSubCpmk = [];
    public $teknikTersedia = [];
    public $bentukKuliahId;
    public $bentukBelajarMandiriId;
    public $bentukPenugasanTerstrukturId;
    public $jumlah_pertemuan;
    public $jumlah_sks;
    
    // Properti untuk pilihan dropdown rps induk dan detail
    public $allMataKuliah = [];
    public $allKriteria = [];
    public $allTeknik = [];
    public $allWeek = [];
    /** @var Collection|MetodePembelajaranModel[] */
    public $allMetodePembelajaranBM = [];
    public $allMetodePembelajaranTM = [];
    public $allMediaPerangkatLunak = [];
    public $allMediaPerangkatKeras = [];
    public $allModelPembelajaran = [];
    public $allBentukPenugasan = [];
    public $allJumlahPertemuan= [];
    public $allJumlahSks= [];
    
    public function mount(RPSModel $rps) {
        $this->authorize('update', $rps);
        // untuk halaman edit RPS Induk
        $this->id_bk = $rps->id_bk;
        $this->id_mk_syarat = $rps->mataKuliahSyarat->first()?->id_mk;
        $this->media_pembelajaran = $rps->mediaPembelajaran->pluck('id_media_pembelajaran')->toArray();
        $this->materi_pembelajaran = $rps->materi_pembelajaran;
        $this->pustaka_utama = $rps->pustaka_utama;
        $this->pustaka_pendukung = $rps->pustaka_pendukung;
        $this->id_model_pembelajaran = $rps->id_model_pembelajaran;

        $mappings = MK_CPMK_CPL_MapModel::where('id_mk', $rps->id_mk)->with('cpl', 'cpmk.subCpmk')->get();
        $this->assocCpls = $mappings->pluck('cpl')->unique('id_cpl');
        $this->assocCpmk = $mappings->pluck('cpmk')->unique('id_cpmk');
        $this->assocSubCpmk = $this->assocCpmk->pluck('subCpmk')->flatten()->unique('id_sub_cpmk');

        $this->correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $this->correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        // untuk dropdown
        $this->allKriteria = KriteriaPenilaianModel::all();
        $this->allTeknik = TeknikPenilaianModel::all();
        $this->allMataKuliah = MataKuliahModel::where('id_mk', '!=', $rps->id_mk)->get();
        $this->allWeek = WeekModel::all();
        $this->allMetodePembelajaranBM = MetodePembelajaranModel::where('tipe_metode_pembelajaran', 'bm')->get();
        $this->allMetodePembelajaranTM = MetodePembelajaranModel::where('tipe_metode_pembelajaran', 'tm')->get();
        $this->allMediaPerangkatKeras = MediaPembelajaranModel::where('tipe', 'perangkat_keras')->get();
        $this->allMediaPerangkatLunak = MediaPembelajaranModel::where('tipe', 'perangkat_lunak')->get();
        $this->allModelPembelajaran = ModelPembelajaranModel::all();
        $this->allBentukPenugasan = BentukPenugasanModel::all();
        $this->allJumlahPertemuan = [
            '1' => '1x',
            '2' => '2x',
            '3' => '3x',
        ];
        $this->allJumlahSks = [
            '1x50' => '1x50',
            '2x50' => '2x50',
            '3x50' => '3x50',
        ];

        // $this->bentukKuliahId = $this->allBentukPembelajaran->firstWhere('nama_bentuk_pembelajaran', 'Kuliah')?->id_bentuk_pembelajaran;
        // $this->bentukBelajarMandiriId = $this->allBentukPembelajaran->firstWhere('nama_bentuk_pembelajaran', 'Belajar Mandiri')?->id_bentuk_pembelajaran;
        // $this->bentukPenugasanTerstrukturId = $this->allBentukPembelajaran->firstWhere('nama_bentuk_pembelajaran', 'Penugasan Terstruktur')?->id_bentuk_pembelajaran;

        // untuk halaman edit Rps topic
        $this->loadRpsTopic($rps);
    }

    public function loadRpsTopic() {
        // Ambil semua topik dengan relasinya (Ini sudah bagus!)
        $topics = $this->rps->topics()->with([
            'weeks', 
            'kriteriaPenilaian', 
            'teknikPenilaian', 
            'aktivitasPembelajaran.metodePembelajaran', 
            'aktivitasPembelajaran.bentukPembelajaran',
            'aktivitasPembelajaran.bentukPenugasan' // Tambahkan relasi ini
        ])->get();

        // --- PERBAIKAN N+1 (READ) #2 ---
        // 1. Kumpulkan semua 'teknik_penilaian_kategori' yang unik dari topik
        $allKategoris = $topics->pluck('teknik_penilaian_kategori')->filter()->unique();
        
        // 2. Lakukan SATU query untuk mengambil SEMUA teknik yang relevan
        $allAvailableTekniks = TeknikPenilaianModel::whereIn('kategori', $allKategoris)
                                ->get()
                                ->groupBy('kategori'); // Kelompokkan berdasarkan kategori
        // --- AKHIR PERBAIKAN ---

        $this->topics = $topics->map(function ($topic, $index) use ($allAvailableTekniks) {
            
            // PERBAIKAN: Ambil data dari koleksi $allAvailableTekniks (gratis), 
            // bukan menjalankan query baru.
            if($topic->teknik_penilaian_kategori) {
                $this->teknikTersedia[$index] = $allAvailableTekniks->get($topic->teknik_penilaian_kategori, collect());
            } else {
                $this->teknikTersedia[$index] = collect();
            }

            // memberikan nilai default, jika pada kasus aktivitas_pembelajaran tidak ada isinya atau null
            $defaultAktivitas = [
                'TM' => [
                    'id_aktivitas_pembelajaran' => null,
                    'selected_metode_pembelajaran' => [],
                    'selected_bentuk_penugasan' => [], // Tambah default
                    'jumlah_pertemuan' => '',
                    'jumlah_sks' => '',
                ],
                'BM' => [
                    'id_aktivitas_pembelajaran' => null,
                    'selected_metode_pembelajaran' => [],
                    'selected_bentuk_penugasan' => [], // Tambah default
                    'jumlah_pertemuan' => '',
                    'jumlah_sks' => '',
                ],
                'BT' => [
                    'id_aktivitas_pembelajaran' => null,
                    'selected_bentuk_penugasan' => [],
                    'jumlah_pertemuan' => '',
                    'jumlah_sks' => '',
                ],
            ];

            $aktivitasPembelajaran = $topic->aktivitasPembelajaran->keyBy('tipe')->map(function ($aktivitas) {
                return [
                        'id_aktivitas_pembelajaran' => $aktivitas->id_aktivitas_pembelajaran,
                        // 'id_bentuk_pembelajaran' => $aktivitas->id_bentuk_pembelajaran,
                        // 'penugasan_mahasiswa' => $aktivitas->penugasan_mahasiswa,
                        'selected_metode_pembelajaran' => $aktivitas->metodePembelajaran->pluck('id_metode_pembelajaran')->toArray(),
                        'selected_bentuk_penugasan' => $aktivitas->bentukPenugasan->pluck('id_bentuk_penugasan')->toArray(),
                        'jumlah_pertemuan' => $aktivitas->jumlah_pertemuan,
                        'jumlah_sks' => $aktivitas->jumlah_sks,
                ];
            })->toArray();

            return [
                'id_topic' => $topic->id_topic,
                'id_sub_cpmk' => $topic->id_sub_cpmk,
                'indikator' => $topic->indikator,
                'tipe' => $topic->tipe,
                // 'metode_pembelajaran' => $topic->metode_pembelajaran,
                'materi_pembelajaran' => $topic->materi_pembelajaran,
                'refrensi' => $topic->refrensi,
                'teknik_penilaian_kategori' => $topic->teknik_penilaian_kategori,
                'aktivitas_pembelajaran' => array_replace_recursive($defaultAktivitas,$aktivitasPembelajaran),
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
            'aktivitas_pembelajaran' => [
                'TM' => [
                    'selected_metode_pembelajaran' => [],
                    'jumlah_pertemuan' => '',
                    'jumlah_sks' => '',
                ],
                'BM' => [
                    'selected_metode_pembelajaran' => [],
                    'jumlah_pertemuan' => '',
                    'jumlah_sks' => '',            
                ],
                'BT' => [
                    'selected_bentuk_penugasan' => [],
                    'jumlah_pertemuan' => '',
                    'jumlah_sks' => '',
                ],
            ],
            'materi_pembelajaran' => '',
            'refrensi' => '',
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

        // dd('VALIDASI LOLOS', $validated);

        DB::transaction(function () use ($validated) {
        
            $isRevisi = $this->rps->isRevisi;

            // Rps Induk (Ini sudah efisien)
            $this->rps->update([
                // 'id_bk' => $this->id_bk,
                'materi_pembelajaran' => $validated['materi_pembelajaran'],
                'pustaka_utama' => $validated['pustaka_utama'],
                'pustaka_pendukung' => $validated['pustaka_pendukung'],
                'id_model_pembelajaran' => $validated['id_model_pembelajaran'],
            ]);

            $this->rps->mataKuliahSyarat()->sync($validated['id_mk_syarat'] ?? []);
            $this->rps->mediaPembelajaran()->sync($validated['media_pembelajaran'] ?? []);
            
            // --- PERBAIKAN N+1 WRITE (BULK SYNC) DIMULAI DI SINI ---

            // 1. Siapkan array kosong untuk menampung data pivot
            $allTopicIds = [];
            $allAktivitasIds = [];
            
            $pivotWeeks = [];
            $pivotKriteria = [];
            $pivotTeknik = [];
            $pivotMetode = [];
            $pivotBentuk = [];
            
            $timestamp = now(); // Untuk `created_at` / `updated_at`

            // 2. Loop pertama: Jalankan updateOrCreate (diperlukan untuk dapat ID)
            //    dan SIAPKAN array pivot (JANGAN sync)
            foreach ($validated['topics'] as $topicData) {
                
                // Query N+1 (1/7): updateOrCreate Topic
                // (Ini masih N+1, tapi diperlukan untuk mendapatkan $topic->id_topic)
                $topic = RPSTopicModel::updateOrCreate(
                    ['id_topic' => $topicData['id_topic'] ?? null],
                    [
                        'id_rps' => $this->rps->id_rps,
                        'id_sub_cpmk' => empty($topicData['id_sub_cpmk'] ) ? null : $topicData['id_sub_cpmk'],
                        'indikator' => $topicData['indikator'] ?? null,
                        'tipe' => $topicData['tipe'],
                        'teknik_penilaian_kategori' => $topicData['teknik_penilaian_kategori'] ?? null,
                        'materi_pembelajaran' => $topicData['materi_pembelajaran'] ?? null,
                        'refrensi' => $topicData['refrensi'] ?? null, 					
                    ]
                );
                
                // Kumpulkan ID topik untuk bulk delete nanti
                $allTopicIds[] = $topic->id_topic;

                // Siapkan data pivot untuk Topic (bukan sync)
                foreach ($topicData['minggu_ke'] ?? [] as $weekId) {
                    $pivotWeeks[] = ['id_topic' => $topic->id_topic, 'id_week' => $weekId];
                }
                foreach ($topicData['selected_kriteria'] ?? [] as $kriteriaId) {
                    $pivotKriteria[] = ['id_topic' => $topic->id_topic, 'id_kriteria_penilaian' => $kriteriaId];
                }
                foreach ($topicData['selected_teknik'] ?? [] as $teknikId) {
                    $pivotTeknik[] = ['id_topic' => $topic->id_topic, 'id_teknik_penilaian' => $teknikId];
                }

                // Handle nested Aktivitas
                if(isset($topicData['aktivitas_pembelajaran'])) {
                    foreach($topicData['aktivitas_pembelajaran'] as $tipe => $aktivitasData) {
                        
                        // Query N+1 (2/7): updateOrCreate Aktivitas (3x per topik)
                        $aktivitas = $topic->aktivitasPembelajaran()->updateOrCreate(
                            ['tipe' => $tipe],
                            [
                                // 'id_bentuk_pembelajaran' => $aktivitasData['id_bentuk_pembelajaran'],
                                // 'penugasan_mahasiswa' => $aktivitasData['penugasan_mahasiswa'],
                                'jumlah_pertemuan' => $aktivitasData['jumlah_pertemuan'],
                                'jumlah_sks' => $aktivitasData['jumlah_sks'],
                            ]
                        );

                        // Kumpulkan ID aktivitas untuk bulk delete nanti
                        $allAktivitasIds[] = $aktivitas->id_aktivitas_pembelajaran;

                        // Siapkan data pivot untuk Aktivitas (bukan sync)
                        foreach ($aktivitasData['selected_metode_pembelajaran'] ?? [] as $metodeId) {
                            $pivotMetode[] = [
                                'id_aktivitas_pembelajaran' => $aktivitas->id_aktivitas_pembelajaran, 
                                'id_metode_pembelajaran' => $metodeId
                            ];
                        }
                        foreach ($aktivitasData['selected_bentuk_penugasan'] ?? [] as $bentukId) {
                            $pivotBentuk[] = [
                                'id_aktivitas_pembelajaran' => $aktivitas->id_aktivitas_pembelajaran, 
                                'id_bentuk_penugasan' => $bentukId
                            ];
                        }
                    }
                }
            }
            
            // --- AKHIR DARI LOOP PERTAMA ---

            // 3. Lakukan BULK SYNC di LUAR LOOP
            // (Catatan: Asumsi nama tabel pivot & FK standar. Sesuaikan jika perlu)

            // Pastikan ID unik untuk menghindari error `whereIn`
            $allTopicIds = array_unique($allTopicIds);
            $allAktivitasIds = array_unique($allAktivitasIds);

            // Bersihkan relasi lama dalam 5 query (BUKAN 200 query)
            if (!empty($allTopicIds)) {
                DB::table('rps_topic_week')->whereIn('id_topic', $allTopicIds)->delete();
                DB::table('rps_topic_kriteria_penilaian')->whereIn('id_topic', $allTopicIds)->delete();
                DB::table('rps_topic_teknik_penilaian')->whereIn('id_topic', $allTopicIds)->delete();
            }
            if (!empty($allAktivitasIds)) {
                DB::table('aktivitas_metode_pembelajaran')->whereIn('id_aktivitas_pembelajaran', $allAktivitasIds)->delete();
                DB::table('aktivitas_bentuk_penugasan')->whereIn('id_aktivitas_pembelajaran', $allAktivitasIds)->delete();
            }

            // Masukkan data pivot baru secara massal dalam 5 query
            if (!empty($pivotWeeks)) DB::table('rps_topic_week')->insert($pivotWeeks);
            if (!empty($pivotKriteria)) DB::table('rps_topic_kriteria_penilaian')->insert($pivotKriteria);
            if (!empty($pivotTeknik)) DB::table('rps_topic_teknik_penilaian')->insert($pivotTeknik);
            if (!empty($pivotMetode)) DB::table('aktivitas_metode_pembelajaran')->insert($pivotMetode);
            if (!empty($pivotBentuk)) DB::table('aktivitas_bentuk_penugasan')->insert($pivotBentuk);

            // --- PERBAIKAN N+1 WRITE SELESAI ---

            // untuk jumlah revisi dan tanggal revisi
            if($isRevisi) {
                $this->rps->increment('jumlah_revisi');
                $this->rps->forceFill(['tanggal_revisi' => now()])->saveQuietly();
            }
            else {
                $this->rps->forceFill(['isRevisi' => true])->saveQuietly();
            }
        });
        // return redirect(route('rps.show', $this->rps))->with('success', 'Berhasil Menyimpan RPS!');
        session()->flash('success', 'Berhasil Menyimpan RPS!');
    } 

    public function render()
    {
        return view('livewire.rps-edit-page');
    }
}
