<?php

namespace App\Http\Controllers\Dosen;

use App\Models\RPSModel;
use App\Models\UserModel;
use App\Models\SubCPMKModel;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MKCPMKBobotModel;
use App\Models\Scopes\ProdiScope;
use Illuminate\Support\Facades\DB;
use App\Livewire\PembobotanCpmkCpl;
use App\Models\RencanaAsesmenModel;
use Spatie\Browsershot\Browsershot;
use App\Http\Controllers\Controller;
use App\Models\MK_CPMK_CPL_MapModel;
use Illuminate\Support\Facades\Auth;
use App\Models\Scopes\KurikulumScope;
use App\Http\Requests\StoreRPSRequest;
use App\Models\MediaPembelajaranModel;
use App\Models\ModelPembelajaranModel;
use App\Models\RencanaAsesmenCPMKBobotModel;

class RPSController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
    }
    
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $mata_kuliah = MataKuliahModel::all();

    //     return view('dosen.rps', ['mata_kuliah' => $mata_kuliah]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id_mk = $request->query('id_mk');
        $mata_kuliah = MataKuliahModel::with(['bahanKajian.cpls', 'cpmks'])->findOrFail($id_mk);
        $assocCpls = $mata_kuliah->bahanKajian->flatMap(function ($bahanKajian) {
            return $bahanKajian->cpls;
        })->unique('id_cpl');

        $mappings = MK_CPMK_CPL_MapModel::where('id_mk', $mata_kuliah->id_mk)->with('cpl', 'cpmk')->get();
        $relevantCpl = $mappings->pluck('cpl')->unique('id_cpl')->sortBy('nama_kode_cpl');
        $relevantCpmk = $mappings->pluck('cpmk')->unique('id_cpmk')->sortBy('nama_kode_cpmk');

        $correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        $allMatkul = MataKuliahModel::where('id_mk','!=', $id_mk)->get();

        $mediaPerangkatLunak = MediaPembelajaranModel::where('tipe', 'perangkat_lunak')->get();
        $mediaPerangkatKeras = MediaPembelajaranModel::where('tipe', 'perangkat_keras')->get();
        $modelPembelajaran = ModelPembelajaranModel::all();

        return view('dosen.form.rps.rpsFormAdd', [
            'mata_kuliah' => $mata_kuliah, 
            'allMatkul' => $allMatkul, 
            'assocCpls' => $relevantCpl, 
            'assocCpmk' => $relevantCpmk,
            'mediaPerangkatLunak' => $mediaPerangkatLunak,
            'mediaPerangkatKeras' => $mediaPerangkatKeras,
            'modelPembelajaran' => $modelPembelajaran,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRPSRequest $request)
    {
        $id_ps = session('userRoleId');
        // Kita cari: Siapa user di prodi ini ($id_ps_aktif) yang punya role Kaprodi (3)?
        $kaprodiPivot = DB::table('user_role_map')
                            ->where('id_ps', $id_ps)
                            ->where('id_role', 3) // Asumsi: 3 adalah ID Role Kaprodi
                            ->first();
        
        // Validasi jika Kaprodi belum di-set di database
        if (!$kaprodiPivot) {
            return back()->withErrors(['msg' => 'Data Kaprodi untuk Program Studi ini belum ditemukan. Hubungi Admin.']);
        }

        $validated = $request->validated();

        $rps = RPSModel::create([
            'id_mk' => $validated['id_mk'],
            'id_kaprodi' => $kaprodiPivot->id_user,
            'id_model_pembelajaran' => $validated['id_model_pembelajaran'] ?? null,
            'id_kurikulum' => session('id_kurikulum_aktif'),
            'id_ps' => $id_ps,
            'tanggal_disusun' => now(),
            'materi_pembelajaran' => $validated['materi_pembelajaran'] ?? null,
            'pustaka_utama' => $validated['pustaka_utama'] ?? null,
            'pustaka_pendukung' => $validated['pustaka_pendukung'] ?? null,
        ]);

        $rps->mataKuliahSyarat()->sync($validated['id_mk_syarat'] ?? []);
        $rps->mediaPembelajaran()->sync($validated['media_pembelajaran'] ?? []);

        return to_route('rps.edit', $rps)->with('success', 'Berhasil membuat data induk RPS');
    }

    /**
     * Display the specified resource.
     */

    // public function show(RPSModel $rp)
    // {
 
    //     $this->authorize('view', $rp);

    //     $rp->load([
    //         'mataKuliah', 
    //         'mediaPembelajaran',
    //         'modelPembelajaran',
    //         'mataKuliah.pengembangRps',
    //         'mataKuliah.koordinatorMk',
    //         'kurikulum',
    //         'programStudi',
    //         'topics.weeks',
    //         'topics.subCpmk',
    //         'topics.subCpmk.cpmk',
    //         'topics.kriteriaPenilaian',
    //         'topics.teknikPenilaian',
    //         'topics.aktivitasPembelajaran',
    //         'topics.aktivitasPembelajaran.metodePembelajaran',
    //         'topics.aktivitasPembelajaran.bentukPenugasan'
    //     ]);

    //     $mappings = MK_CPMK_CPL_MapModel::where('id_mk', $rp->id_mk)->with('cpl', 'cpmk')->get();
    //     $relevantCpl = $mappings->pluck('cpl')->unique('id_cpl');
    //     $relevantCpmk = $mappings->pluck('cpmk')->unique('id_cpmk');
    //     $relevantsubCpmk = SubCPMKModel::whereIn('id_cpmk', $relevantCpmk->pluck('id_cpmk'))->with('cpmk')->get();

    //     $correlationCpmkCplMap = [];
    //     foreach($mappings as $mapping) {
    //         $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
    //     }

    //     // Ambil Bobot Korelasi CPMK-CPL (Baris & Kolom Tabel)
    //     $bobotCplCpmkRaw = MKCPMKBobotModel::whereHas('mkcpmkbobot', function ($query) use ($rp) {
    //                             $query->where('id_mk', $rp->id_mk);
    //                         })
    //                         ->with(['mkcpmkbobot.cpl', 'mkcpmkbobot.cpmk'])
    //                         ->get();

    //     $bobotCplCpmk = $bobotCplCpmkRaw->map(function ($bobot) {
    //         return (object)[
    //             'id_mk_cpmk_cpl' => $bobot->id_mk_cpmk_cpl, // Pastikan ID Mapping ini dibawa
    //             'id_cpl' => $bobot->mkcpmkbobot->id_cpl,
    //             'id_cpmk' => $bobot->mkcpmkbobot->id_cpmk,
    //             'id_mk' => $bobot->mkcpmkbobot->id_mk,
    //             'bobot' => $bobot->bobot,
    //             'cpl' => $bobot->mkcpmkbobot->cpl,
    //             'cpmk' => $bobot->mkcpmkbobot->cpmk,
    //         ];
    //     });

    //     // Ambil SEMUA entri bobot penilaian untuk MK ini sekaligus agar efisien
    //     $allBobotPenilaianEntries = RencanaAsesmenCPMKBobotModel::whereHas('rencanaAsesmen', function ($q) use ($rp) {
    //             $q->where('id_mk', $rp->id_mk);
    //         })
    //         ->with(['rencanaAsesmen'])
    //         ->get();

    //     $bobotPenilaian = [];

    //     // KUNCI PERBAIKAN: Loop berdasarkan Bobot Korelasi (Bukan sekedar CPMK)
    //     foreach ($bobotCplCpmk as $mapping) {
    //         // Filter entri yang HANYA milik mapping (CPMK-CPL) tertentu ini
    //         $entriesForThisMap = $allBobotPenilaianEntries->where('id_mk_cpmk_cpl', $mapping->id_mk_cpmk_cpl);
            
    //         // Helper function untuk pencocokan string yang tidak sensitif huruf besar/kecil (Insensitive)
    //         $getSumByTipe = function($entries, $tipe) {
    //             return $entries->filter(function($entry) use ($tipe) {
    //                 $dbTipe = strtolower(trim($entry->rencanaAsesmen?->tipe_komponen ?? ''));
    //                 return $dbTipe === strtolower(trim($tipe));
    //             })->sum('bobot');
    //         };

    //         // Hitung menggunakan Sum untuk semua agar lebih akurat
    //         $totalTugas = $getSumByTipe($entriesForThisMap, 'tugas');
    //         $bobotUts = $getSumByTipe($entriesForThisMap, 'uts');
    //         $bobotUas = $getSumByTipe($entriesForThisMap, 'uas');
    //         $bobotHasilProyek = $getSumByTipe($entriesForThisMap, 'Hasil Proyek');
    //         $bobotKegiatanPartisipatif = $getSumByTipe($entriesForThisMap, 'Kegiatan Partisipatif');

    //         // Simpan dengan key unik (Gabungan ID CPMK dan CPL) agar tidak tertimpa
    //         $bobotPenilaian[$mapping->id_cpmk][$mapping->id_cpl] = [
    //             'tugas' => $totalTugas,
    //             'uts'   => $bobotUts,
    //             'uas'   => $bobotUas,
    //             'hasil_proyek' => $bobotHasilProyek,
    //             'kegiatan_partisipatif' => $bobotKegiatanPartisipatif,
    //         ];
    //     }

    //     $bentukPenilaian = ['tugas', 'uts', 'uas', 'hasil_proyek', 'kegiatan_partisipatif'];
    //     $countPenilaian = array_fill_keys($bentukPenilaian, 0);

    //     foreach ($bobotPenilaian as $cpmkId => $cplBobots) {
    //         foreach ($cplBobots as $cplId => $bobotValues) {
    //             foreach ($bentukPenilaian as $bentuk) {
    //                 if (($bobotValues[$bentuk] ?? 0) > 0) {
    //                     $countPenilaian[$bentuk]++;
    //                 }
    //             }
    //         }
    //     }

    //     return view('dosen.showrps', [
    //         'rps' => $rp, 
    //         'assocCpls' => $relevantCpl, 
    //         'assocCpmk' => $relevantCpmk, 
    //         'assocSubCpmk' => $relevantsubCpmk,
    //         'correlationCpmkCplMap' => $correlationCpmkCplMap,
    //         'bobotCplCpmk' => $bobotCplCpmk,
    //         'bobotPenilaian' => $bobotPenilaian,
    //         'countPenilaian' => $countPenilaian,
    //     ]);
    // }

    public function show(RPSModel $rp)
    {
 
        $this->authorize('view', $rp);

        $userRole = session()->get('userRole');

        // DAFTAR ROLE YANG BOLEH AKSES GLOBAL (Tanpa Batas Prodi)
        $globalAccessRoles = ['pimpinan', 'upm'];
        $isGlobalAccess = in_array($userRole, $globalAccessRoles);
        
        $relations = [
            'mataKuliah', 
            'mediaPembelajaran',
            'modelPembelajaran',
            'mataKuliah.pengembangRps',
            'mataKuliah.koordinatorMk',
            'kurikulum',
            'programStudi',
            'topics.weeks',
            'topics.subCpmk',
            'topics.subCpmk.cpmk',
            'topics.kriteriaPenilaian',
            'topics.teknikPenilaian',
            'topics.aktivitasPembelajaran',
            'topics.aktivitasPembelajaran.metodePembelajaran',
            'topics.aktivitasPembelajaran.bentukPenugasan'
        ];

        if (in_array($userRole, $globalAccessRoles)) {

            // 2. Ubah array string menjadi array dengan closure 'withoutGlobalScopes'
            $eagerLoad = [];

            foreach ($relations as $relation) {
                // Kunci array adalah nama relasi, nilainya adalah fungsi untuk matikan scope
                $eagerLoad[$relation] = function ($query) {
                    $query->withoutGlobalScopes(); 
                };
            }

            // 3. Lakukan Load
            $rp->load($eagerLoad);
        } 
        else {
            // KASUS 2: Jika Dosen/Kaprodi/Mahasiswa, load relasi DENGAN Scope (Default)
            // Laravel otomatis menerapkan Scope. Jika MK beda prodi, hasilnya akan null.
            $rp->load($relations);
        }


    $queryMappings = MK_CPMK_CPL_MapModel::query()->where('id_mk', $rp->id_mk);
        
        if ($isGlobalAccess) {
            // Matikan scope pada query mapping utama
            $queryMappings->withoutGlobalScopes();
            // Matikan scope pada relasi yang di-load (cpl, cpmk)
            $queryMappings->with([
                'cpl' => fn($q) => $q->withoutGlobalScopes(), 
                'cpmk' => fn($q) => $q->withoutGlobalScopes()
            ]);
        } 
        else {
            $queryMappings->with('cpl', 'cpmk');
        }
        
        $mappings = $queryMappings->get();

        $relevantCpl = $mappings->pluck('cpl')->unique('id_cpl');
        $relevantCpmk = $mappings->pluck('cpmk')->unique('id_cpmk');
        
        $querySubCpmk = SubCPMKModel::whereIn('id_cpmk', $relevantCpmk->pluck('id_cpmk'));
            
        if ($isGlobalAccess) {
            $querySubCpmk->withoutGlobalScopes();
            $querySubCpmk->with(['cpmk' => fn($q) => $q->withoutGlobalScopes()]);
        } 
        else {
            $querySubCpmk->with('cpmk');
        }
        $relevantsubCpmk = $querySubCpmk->get();

        $correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        // Ambil Bobot Korelasi CPMK-CPL (Baris & Kolom Tabel)
        $queryBobot = MKCPMKBobotModel::query();

            if ($isGlobalAccess) {
                $queryBobot->withoutGlobalScopes(); // Matikan scope model utama
                $queryBobot->whereHas('mkcpmkbobot', function ($query) use ($rp) {
                    $query->withoutGlobalScopes()->where('id_mk', $rp->id_mk); // Matikan scope di whereHas
                });
                // Matikan scope di Eager Loading
                $queryBobot->with([
                    'mkcpmkbobot' => fn($q) => $q->withoutGlobalScopes(),
                    'mkcpmkbobot.cpl' => fn($q) => $q->withoutGlobalScopes(),
                    'mkcpmkbobot.cpmk' => fn($q) => $q->withoutGlobalScopes()
                ]);
            } 
            else {
                $queryBobot->whereHas('mkcpmkbobot', function ($query) use ($rp) {
                    $query->where('id_mk', $rp->id_mk);
                });
                $queryBobot->with(['mkcpmkbobot.cpl', 'mkcpmkbobot.cpmk']);
            }

        $bobotCplCpmkRaw = $queryBobot->get();

        $bobotCplCpmk = $bobotCplCpmkRaw->map(function ($bobot) {
            return (object)[
                'id_mk_cpmk_cpl' => $bobot->id_mk_cpmk_cpl, // Pastikan ID Mapping ini dibawa
                'id_cpl' => $bobot->mkcpmkbobot->id_cpl,
                'id_cpmk' => $bobot->mkcpmkbobot->id_cpmk,
                'id_mk' => $bobot->mkcpmkbobot->id_mk,
                'bobot' => $bobot->bobot,
                'cpl' => $bobot->mkcpmkbobot->cpl,
                'cpmk' => $bobot->mkcpmkbobot->cpmk,
            ];
        });

        // Ambil SEMUA entri bobot penilaian untuk MK ini sekaligus agar efisien
        $queryAsesmen = RencanaAsesmenCPMKBobotModel::query();
            
        if ($isGlobalAccess) {
            $queryAsesmen->withoutGlobalScopes();
            $queryAsesmen->whereHas('rencanaAsesmen', function ($q) use ($rp) {
                $q->withoutGlobalScopes()->where('id_mk', $rp->id_mk);
            });
            $queryAsesmen->with(['rencanaAsesmen' => fn($q) => $q->withoutGlobalScopes()]);
        } 
        else {
            $queryAsesmen->whereHas('rencanaAsesmen', function ($q) use ($rp) {
                $q->where('id_mk', $rp->id_mk);
            });
            $queryAsesmen->with(['rencanaAsesmen']);
        }
            
        $allBobotPenilaianEntries = $queryAsesmen->get();

        $bobotPenilaian = [];

        // KUNCI PERBAIKAN: Loop berdasarkan Bobot Korelasi (Bukan sekedar CPMK)
        foreach ($bobotCplCpmk as $mapping) {
            // Filter entri yang HANYA milik mapping (CPMK-CPL) tertentu ini
            $entriesForThisMap = $allBobotPenilaianEntries->where('id_mk_cpmk_cpl', $mapping->id_mk_cpmk_cpl);
            
            // Helper function untuk pencocokan string yang tidak sensitif huruf besar/kecil (Insensitive)
            $getSumByTipe = function($entries, $tipe) {
                return $entries->filter(function($entry) use ($tipe) {
                    $dbTipe = strtolower(trim($entry->rencanaAsesmen?->tipe_komponen ?? ''));
                    return $dbTipe === strtolower(trim($tipe));
                })->sum('bobot');
            };

            // Hitung menggunakan Sum untuk semua agar lebih akurat
            $totalTugas = $getSumByTipe($entriesForThisMap, 'tugas');
            $bobotUts = $getSumByTipe($entriesForThisMap, 'uts');
            $bobotUas = $getSumByTipe($entriesForThisMap, 'uas');
            $bobotHasilProyek = $getSumByTipe($entriesForThisMap, 'Hasil Proyek');
            $bobotKegiatanPartisipatif = $getSumByTipe($entriesForThisMap, 'Kegiatan Partisipatif');

            // Simpan dengan key unik (Gabungan ID CPMK dan CPL) agar tidak tertimpa
            $bobotPenilaian[$mapping->id_cpmk][$mapping->id_cpl] = [
                'tugas' => $totalTugas,
                'uts'   => $bobotUts,
                'uas'   => $bobotUas,
                'hasil_proyek' => $bobotHasilProyek,
                'kegiatan_partisipatif' => $bobotKegiatanPartisipatif,
            ];
        }

        $bentukPenilaian = ['tugas', 'uts', 'uas', 'hasil_proyek', 'kegiatan_partisipatif'];
        $countPenilaian = array_fill_keys($bentukPenilaian, 0);

        foreach ($bobotPenilaian as $cpmkId => $cplBobots) {
            foreach ($cplBobots as $cplId => $bobotValues) {
                foreach ($bentukPenilaian as $bentuk) {
                    if (($bobotValues[$bentuk] ?? 0) > 0) {
                        $countPenilaian[$bentuk]++;
                    }
                }
            }
        }

        return view('dosen.showrps', [
            'rps' => $rp, 
            'assocCpls' => $relevantCpl, 
            'assocCpmk' => $relevantCpmk, 
            'assocSubCpmk' => $relevantsubCpmk,
            'correlationCpmkCplMap' => $correlationCpmkCplMap,
            'bobotCplCpmk' => $bobotCplCpmk,
            'bobotPenilaian' => $bobotPenilaian,
            'countPenilaian' => $countPenilaian,
        ]);
    }

    // public function generatePDF(RPSModel $rps)
    // {
    //     $userRole = session()->get('userRole');

    //     // DAFTAR ROLE YANG BOLEH AKSES GLOBAL (Tanpa Batas Prodi)
    //     $globalAccessRoles = ['pimpinan', 'upm'];

    //     if (in_array($userRole, $globalAccessRoles)) {
    //         // KASUS 1: Jika Pimpinan/UPM, load relasi TANPA batasan Scope
    //         // Ini mengatasi error "Attempt to read property on null" yang dialami Pimpinan
    //         $rps->load(['mataKuliah' => function ($query) {
    //             $query->withoutGlobalScopes();
    //         }]);
    //     } 
    //     else {
    //         // KASUS 2: Jika Dosen/Kaprodi/Mahasiswa, load relasi DENGAN Scope (Default)
    //         // Laravel otomatis menerapkan Scope. Jika MK beda prodi, hasilnya akan null.
    //         $rps->load([
    //             'mataKuliah', 
    //             'mediaPembelajaran',
    //             'modelPembelajaran',
    //             'mataKuliah.pengembangRps',
    //             'mataKuliah.koordinatorMk',
    //             'kurikulum',
    //             'programStudi',
    //             'topics.weeks',
    //             'topics.subCpmk',
    //             'topics.subCpmk.cpmk',
    //             'topics.kriteriaPenilaian',
    //             'topics.teknikPenilaian',
    //             'topics.aktivitasPembelajaran',
    //             'topics.aktivitasPembelajaran.metodePembelajaran',
    //             'topics.aktivitasPembelajaran.bentukPenugasan'
    //         ]);
    //     }

    //     $mappings = MK_CPMK_CPL_MapModel::where('id_mk', $rps->id_mk)->with('cpl', 'cpmk')->get();
    //     $relevantCpl = $mappings->pluck('cpl')->unique('id_cpl');
    //     $relevantCpmk = $mappings->pluck('cpmk')->unique('id_cpmk');
    //     $relevantsubCpmk = SubCPMKModel::whereIn('id_cpmk', $relevantCpmk->pluck('id_cpmk'))->with('cpmk')->get();

    //     $correlationCpmkCplMap = [];
    //     foreach($mappings as $mapping) {
    //         $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
    //     }

    //     // PERUBAHAN DIMULAI DISINI
    //     $bobotCplCpmkRaw = MKCPMKBobotModel::whereHas('mkcpmkbobot', function ($query) use ($rps) {
    //                             $query->where('id_mk', $rps->id_mk);
    //                         })
    //                         ->with(['mkcpmkbobot.cpl', 'mkcpmkbobot.cpmk'])
    //                         ->get();

    //     // Transform supaya struktur datanya sama seperti sebelumnya (agar view tidak perlu diubah)
    //     $bobotCplCpmk = $bobotCplCpmkRaw->map(function ($bobot) {
    //         return (object)[
    //             'id_mk_cpmk_cpl' => $bobot->id_mk_cpmk_cpl,
    //             'id_cpl' => $bobot->mkcpmkbobot->id_cpl,
    //             'id_cpmk' => $bobot->mkcpmkbobot->id_cpmk,
    //             'id_mk' => $bobot->mkcpmkbobot->id_mk,
    //             'bobot' => $bobot->bobot,
    //             'cpl' => $bobot->mkcpmkbobot->cpl,
    //             'cpmk' => $bobot->mkcpmkbobot->cpmk,
    //         ];
    //     });
    //     // PERUBAHAN SELESAI

    //     // Ambil SEMUA entri bobot penilaian untuk MK ini sekaligus agar efisien
    //     $allBobotPenilaianEntries = RencanaAsesmenCPMKBobotModel::whereHas('rencanaAsesmen', function ($q) use ($rps) {
    //             $q->where('id_mk', $rps->id_mk);
    //         })
    //         ->with(['rencanaAsesmen'])
    //         ->get();

    //     $bobotPenilaian = [];

    //     // KUNCI PERBAIKAN: Loop berdasarkan Bobot Korelasi (Bukan sekedar CPMK)
    //     foreach ($bobotCplCpmk as $mapping) {
    //         // Filter entri yang HANYA milik mapping (CPMK-CPL) tertentu ini
    //         $entriesForThisMap = $allBobotPenilaianEntries->where('id_mk_cpmk_cpl', $mapping->id_mk_cpmk_cpl);
            
    //         // Helper function untuk pencocokan string yang tidak sensitif huruf besar/kecil (Insensitive)
    //         $getSumByTipe = function($entries, $tipe) {
    //             return $entries->filter(function($entry) use ($tipe) {
    //                 $dbTipe = strtolower(trim($entry->rencanaAsesmen?->tipe_komponen ?? ''));
    //                 return $dbTipe === strtolower(trim($tipe));
    //             })->sum('bobot');
    //         };

    //         // Hitung menggunakan Sum untuk semua agar lebih akurat
    //         $totalTugas = $getSumByTipe($entriesForThisMap, 'tugas');
    //         $bobotUts = $getSumByTipe($entriesForThisMap, 'uts');
    //         $bobotUas = $getSumByTipe($entriesForThisMap, 'uas');
    //         $bobotHasilProyek = $getSumByTipe($entriesForThisMap, 'Hasil Proyek');
    //         $bobotKegiatanPartisipatif = $getSumByTipe($entriesForThisMap, 'Kegiatan Partisipatif');

    //         // Simpan dengan key unik (Gabungan ID CPMK dan CPL) agar tidak tertimpa
    //         $bobotPenilaian[$mapping->id_cpmk][$mapping->id_cpl] = [
    //             'tugas' => $totalTugas,
    //             'uts'   => $bobotUts,
    //             'uas'   => $bobotUas,
    //             'hasil_proyek' => $bobotHasilProyek,
    //             'kegiatan_partisipatif' => $bobotKegiatanPartisipatif,
    //         ];
    //     }

    //     $bentukPenilaian = ['tugas', 'uts', 'uas', 'hasil_proyek', 'kegiatan_partisipatif'];
    //     $countPenilaian = array_fill_keys($bentukPenilaian, 0);

    //     foreach ($bobotPenilaian as $cpmkId => $cplBobots) {
    //         foreach ($cplBobots as $cplId => $bobotValues) {
    //             foreach ($bentukPenilaian as $bentuk) {
    //                 if (($bobotValues[$bentuk] ?? 0) > 0) {
    //                     $countPenilaian[$bentuk]++;
    //                 }
    //             }
    //         }
    //     }

    //     /** ================= GENERATE PDF ================= */
    //     $pdf = Pdf::loadView('dosen.showrpsPDF', [
    //             'rps' => $rps,
    //             'assocCpls' => $relevantCpl,
    //             'assocCpmk' => $relevantCpmk,
    //             'assocSubCpmk' => $relevantsubCpmk,
    //             'correlationCpmkCplMap' => $correlationCpmkCplMap,
    //             'bobotCplCpmk' => $bobotCplCpmk,
    //             'bobotPenilaian' => $bobotPenilaian ?? [],
    //             'countPenilaian' => $countPenilaian,
    //         ])
    //         ->setPaper('A4', 'portrait')
    //         ->setOption('isRemoteEnabled', true);

    //     return $pdf->download(
    //         'RPS_'.$rps->mataKuliah->nama_matkul_id.'.pdf'
    //     );
    // }

    public function generatePDF(RPSModel $rps)
    {
        $userRole = session()->get('userRole');

        // DAFTAR ROLE YANG BOLEH AKSES GLOBAL (Tanpa Batas Prodi)
        $globalAccessRoles = ['pimpinan', 'upm'];
        $isGlobalAccess = in_array($userRole, $globalAccessRoles);
        
        $relations = [
            'mataKuliah', 
            'mediaPembelajaran',
            'modelPembelajaran',
            'mataKuliah.pengembangRps',
            'mataKuliah.koordinatorMk',
            'kurikulum',
            'programStudi',
            'topics.weeks',
            'topics.subCpmk',
            'topics.subCpmk.cpmk',
            'topics.kriteriaPenilaian',
            'topics.teknikPenilaian',
            'topics.aktivitasPembelajaran',
            'topics.aktivitasPembelajaran.metodePembelajaran',
            'topics.aktivitasPembelajaran.bentukPenugasan'
        ];

        if (in_array($userRole, $globalAccessRoles)) {

            // 2. Ubah array string menjadi array dengan closure 'withoutGlobalScopes'
            $eagerLoad = [];

            foreach ($relations as $relation) {
                // Kunci array adalah nama relasi, nilainya adalah fungsi untuk matikan scope
                $eagerLoad[$relation] = function ($query) {
                    $query->withoutGlobalScopes(); 
                };
            }

            // 3. Lakukan Load
            $rps->load($eagerLoad);
        } 
        else {
            // KASUS 2: Jika Dosen/Kaprodi/Mahasiswa, load relasi DENGAN Scope (Default)
            // Laravel otomatis menerapkan Scope. Jika MK beda prodi, hasilnya akan null.
            $rps->load($relations);
        }


    $queryMappings = MK_CPMK_CPL_MapModel::query()->where('id_mk', $rps->id_mk);
        
        if ($isGlobalAccess) {
            // Matikan scope pada query mapping utama
            $queryMappings->withoutGlobalScopes();
            // Matikan scope pada relasi yang di-load (cpl, cpmk)
            $queryMappings->with([
                'cpl' => fn($q) => $q->withoutGlobalScopes(), 
                'cpmk' => fn($q) => $q->withoutGlobalScopes()
            ]);
        } 
        else {
            $queryMappings->with('cpl', 'cpmk');
        }
        
        $mappings = $queryMappings->get();

        $relevantCpl = $mappings->pluck('cpl')->unique('id_cpl');
        $relevantCpmk = $mappings->pluck('cpmk')->unique('id_cpmk');
        
        $querySubCpmk = SubCPMKModel::whereIn('id_cpmk', $relevantCpmk->pluck('id_cpmk'));
            
        if ($isGlobalAccess) {
            $querySubCpmk->withoutGlobalScopes();
            $querySubCpmk->with(['cpmk' => fn($q) => $q->withoutGlobalScopes()]);
        } 
        else {
            $querySubCpmk->with('cpmk');
        }
        $relevantsubCpmk = $querySubCpmk->get();

        $correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        // Ambil Bobot Korelasi CPMK-CPL (Baris & Kolom Tabel)
        $queryBobot = MKCPMKBobotModel::query();

            if ($isGlobalAccess) {
                $queryBobot->withoutGlobalScopes(); // Matikan scope model utama
                $queryBobot->whereHas('mkcpmkbobot', function ($query) use ($rps) {
                    $query->withoutGlobalScopes()->where('id_mk', $rps->id_mk); // Matikan scope di whereHas
                });
                // Matikan scope di Eager Loading
                $queryBobot->with([
                    'mkcpmkbobot' => fn($q) => $q->withoutGlobalScopes(),
                    'mkcpmkbobot.cpl' => fn($q) => $q->withoutGlobalScopes(),
                    'mkcpmkbobot.cpmk' => fn($q) => $q->withoutGlobalScopes()
                ]);
            } 
            else {
                $queryBobot->whereHas('mkcpmkbobot', function ($query) use ($rps) {
                    $query->where('id_mk', $rps->id_mk);
                });
                $queryBobot->with(['mkcpmkbobot.cpl', 'mkcpmkbobot.cpmk']);
            }

        $bobotCplCpmkRaw = $queryBobot->get();

        $bobotCplCpmk = $bobotCplCpmkRaw->map(function ($bobot) {
            return (object)[
                'id_mk_cpmk_cpl' => $bobot->id_mk_cpmk_cpl, // Pastikan ID Mapping ini dibawa
                'id_cpl' => $bobot->mkcpmkbobot->id_cpl,
                'id_cpmk' => $bobot->mkcpmkbobot->id_cpmk,
                'id_mk' => $bobot->mkcpmkbobot->id_mk,
                'bobot' => $bobot->bobot,
                'cpl' => $bobot->mkcpmkbobot->cpl,
                'cpmk' => $bobot->mkcpmkbobot->cpmk,
            ];
        });

        // Ambil SEMUA entri bobot penilaian untuk MK ini sekaligus agar efisien
        $queryAsesmen = RencanaAsesmenCPMKBobotModel::query();
            
        if ($isGlobalAccess) {
            $queryAsesmen->withoutGlobalScopes();
            $queryAsesmen->whereHas('rencanaAsesmen', function ($q) use ($rps) {
                $q->withoutGlobalScopes()->where('id_mk', $rps->id_mk);
            });
            $queryAsesmen->with(['rencanaAsesmen' => fn($q) => $q->withoutGlobalScopes()]);
        } 
        else {
            $queryAsesmen->whereHas('rencanaAsesmen', function ($q) use ($rps) {
                $q->where('id_mk', $rps->id_mk);
            });
            $queryAsesmen->with(['rencanaAsesmen']);
        }
            
        $allBobotPenilaianEntries = $queryAsesmen->get();

        $bobotPenilaian = [];

        // KUNCI PERBAIKAN: Loop berdasarkan Bobot Korelasi (Bukan sekedar CPMK)
        foreach ($bobotCplCpmk as $mapping) {
            // Filter entri yang HANYA milik mapping (CPMK-CPL) tertentu ini
            $entriesForThisMap = $allBobotPenilaianEntries->where('id_mk_cpmk_cpl', $mapping->id_mk_cpmk_cpl);
            
            // Helper function untuk pencocokan string yang tidak sensitif huruf besar/kecil (Insensitive)
            $getSumByTipe = function($entries, $tipe) {
                return $entries->filter(function($entry) use ($tipe) {
                    $dbTipe = strtolower(trim($entry->rencanaAsesmen?->tipe_komponen ?? ''));
                    return $dbTipe === strtolower(trim($tipe));
                })->sum('bobot');
            };

            // Hitung menggunakan Sum untuk semua agar lebih akurat
            $totalTugas = $getSumByTipe($entriesForThisMap, 'tugas');
            $bobotUts = $getSumByTipe($entriesForThisMap, 'uts');
            $bobotUas = $getSumByTipe($entriesForThisMap, 'uas');
            $bobotHasilProyek = $getSumByTipe($entriesForThisMap, 'Hasil Proyek');
            $bobotKegiatanPartisipatif = $getSumByTipe($entriesForThisMap, 'Kegiatan Partisipatif');

            // Simpan dengan key unik (Gabungan ID CPMK dan CPL) agar tidak tertimpa
            $bobotPenilaian[$mapping->id_cpmk][$mapping->id_cpl] = [
                'tugas' => $totalTugas,
                'uts'   => $bobotUts,
                'uas'   => $bobotUas,
                'hasil_proyek' => $bobotHasilProyek,
                'kegiatan_partisipatif' => $bobotKegiatanPartisipatif,
            ];
        }

        $bentukPenilaian = ['tugas', 'uts', 'uas', 'hasil_proyek', 'kegiatan_partisipatif'];
        $countPenilaian = array_fill_keys($bentukPenilaian, 0);

        foreach ($bobotPenilaian as $cpmkId => $cplBobots) {
            foreach ($cplBobots as $cplId => $bobotValues) {
                foreach ($bentukPenilaian as $bentuk) {
                    if (($bobotValues[$bentuk] ?? 0) > 0) {
                        $countPenilaian[$bentuk]++;
                    }
                }
            }
        }

        /** ================= GENERATE PDF ================= */
        $pdf = Pdf::loadView('dosen.showrpsPDF', [
                'rps' => $rps,
                'assocCpls' => $relevantCpl,
                'assocCpmk' => $relevantCpmk,
                'assocSubCpmk' => $relevantsubCpmk,
                'correlationCpmkCplMap' => $correlationCpmkCplMap,
                'bobotCplCpmk' => $bobotCplCpmk,
                'bobotPenilaian' => $bobotPenilaian ?? [],
                'countPenilaian' => $countPenilaian,
            ])
            ->setPaper('A4', 'portrait')
            ->setOption('isRemoteEnabled', true);

        return $pdf->download(
            'RPS_'.$rps->mataKuliah->nama_matkul_id.'.pdf'
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RPSModel $rp)
    {
        return view('dosen.form.rps.rpsFormEdit', ['rps' => $rp]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RPSModel $rp)
    {
        $rp->delete();

        return to_route('matkul.index')->with('success', 'Berhasil Menghapus RPS!');
    }
}