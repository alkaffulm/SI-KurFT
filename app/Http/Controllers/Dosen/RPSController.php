<?php

namespace App\Http\Controllers\Dosen;

use App\Models\RPSModel;
use App\Models\UserModel;
use App\Models\SubCPMKModel;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use App\Models\MKCPMKBobotModel;
use Illuminate\Support\Facades\DB;
use App\Livewire\PembobotanCpmkCpl;
use App\Models\RencanaAsesmenModel;
use Spatie\Browsershot\Browsershot;
use App\Http\Controllers\Controller;
use App\Models\MK_CPMK_CPL_MapModel;
use Illuminate\Support\Facades\Auth;
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
    public function index()
    {
        $mata_kuliah = MataKuliahModel::all();

        return view('dosen.rps', ['mata_kuliah' => $mata_kuliah]);
    }

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
        $programStudi = UserModel::find(Auth::id())->programStudiModel;
        if($programStudi) {
            $kaprodi = $programStudi->userModel()->whereHas('roles', function ($query) {
                $query->where('role.id_role', 3);
            })->first();
        }

        $validated = $request->validated();

        $rps = RPSModel::create([
            'id_mk' => $validated['id_mk'],
            'id_kaprodi' => $kaprodi->id_user,
            'id_model_pembelajaran' => $validated['id_model_pembelajaran'] ?? null,
            'id_kurikulum' => session('id_kurikulum_aktif'),
            'id_ps' => session('userRoleId'),
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
    public function show(RPSModel $rp)
    {
        $rp->load([
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
        ]);

        $mappings = MK_CPMK_CPL_MapModel::where('id_mk', $rp->id_mk)->with('cpl', 'cpmk')->get();
        $relevantCpl = $mappings->pluck('cpl')->unique('id_cpl');
        $relevantCpmk = $mappings->pluck('cpmk')->unique('id_cpmk');
        $relevantsubCpmk = SubCPMKModel::whereIn('id_cpmk', $relevantCpmk->pluck('id_cpmk'))->with('cpmk')->get();

        $correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        // PERUBAHAN DIMULAI DISINI
        $bobotCplCpmkRaw = MKCPMKBobotModel::whereHas('mkcpmkbobot', function ($query) use ($rp) {
                                $query->where('id_mk', $rp->id_mk);
                            })
                            ->with(['mkcpmkbobot.cpl', 'mkcpmkbobot.cpmk'])
                            ->get();

        // Transform supaya struktur datanya sama seperti sebelumnya (agar view tidak perlu diubah)
        $bobotCplCpmk = $bobotCplCpmkRaw->map(function ($bobot) {
            return (object)[
                'id_cpl' => $bobot->mkcpmkbobot->id_cpl,
                'id_cpmk' => $bobot->mkcpmkbobot->id_cpmk,
                'id_mk' => $bobot->mkcpmkbobot->id_mk,
                'bobot' => $bobot->bobot,
                'cpl' => $bobot->mkcpmkbobot->cpl,
                'cpmk' => $bobot->mkcpmkbobot->cpmk,
            ];
        });
        // PERUBAHAN SELESAI

        $validCpmks = $bobotCplCpmk->pluck('cpmk')->unique('id_cpmk');

        // Ambil semua id_mk_cpmk_cpl yang relevan untuk mata kuliah ini
        $relevantMkCpmkCplIds = MK_CPMK_CPL_MapModel::where('id_mk', $rp->id_mk)
            ->whereIn('id_cpmk', $validCpmks->pluck('id_cpmk'))
            ->pluck('id_mk_cpmk_cpl');

        $allBobotPenilaianEntries = RencanaAsesmenCPMKBobotModel::whereIn('id_mk_cpmk_cpl', $relevantMkCpmkCplIds)
            ->whereHas('rencanaAsesmen', function ($q) use ($rp) {
                $q->where('id_mk', $rp->id_mk);
            })
            ->with(['rencanaAsesmen', 'mkCpmkMap'])
            ->get();

        foreach ($validCpmks as $cpmk) {
            // Filter berdasarkan id_cpmk dari relasi mkCpmkMap
            $entriesForThisCpmk = $allBobotPenilaianEntries->filter(function($entry) use ($cpmk) {
                return $entry->mkCpmkMap->id_cpmk == $cpmk->id_cpmk;
            });
            
            $totalTugas = $entriesForThisCpmk->filter(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'tugas')->sum('bobot');
            $bobotUts = $entriesForThisCpmk->first(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'uts')?->bobot ?? 0;
            $bobotUas = $entriesForThisCpmk->first(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'uas')?->bobot ?? 0;
            $bobotHasilProyek = $entriesForThisCpmk->first(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'Hasil Proyek')?->bobot ?? 0;
            $bobotKegiatanPartisipatif = $entriesForThisCpmk->first(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'Kegiatan Partisipatif')?->bobot ?? 0;

            $bobotPenilaian[$cpmk->id_cpmk] = [
                'tugas' => $totalTugas,
                'uts'   => $bobotUts,
                'uas'   => $bobotUas,
                'hasil_proyek' => $bobotHasilProyek,
                'kegiatan_partisipatif' => $bobotKegiatanPartisipatif,
            ];
        }

        $this->authorize('view', $rp);
        return view('dosen.showrps', [
            'rps' => $rp, 
            'assocCpls' => $relevantCpl, 
            'assocCpmk' => $relevantCpmk, 
            'assocSubCpmk' => $relevantsubCpmk,
            'correlationCpmkCplMap' => $correlationCpmkCplMap,
            'bobotCplCpmk' => $bobotCplCpmk,
            'bobotPenilaian' => $bobotPenilaian ?? [],
        ]);
    }
    
    public function generatePDF(RPSModel $rps)
    {
        $rps->load([
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
        ]);

        $mappings = MK_CPMK_CPL_MapModel::where('id_mk', $rps->id_mk)->with('cpl', 'cpmk')->get();
        $relevantCpl = $mappings->pluck('cpl')->unique('id_cpl');
        $relevantCpmk = $mappings->pluck('cpmk')->unique('id_cpmk');
        $relevantsubCpmk = SubCPMKModel::whereIn('id_cpmk', $relevantCpmk->pluck('id_cpmk'))->with('cpmk')->get();

        $correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        // PERUBAHAN DIMULAI DISINI
        $bobotCplCpmkRaw = MKCPMKBobotModel::whereHas('mkcpmkbobot', function ($query) use ($rps) {
                                $query->where('id_mk', $rps->id_mk);
                            })
                            ->with(['mkcpmkbobot.cpl', 'mkcpmkbobot.cpmk'])
                            ->get();

        // Transform supaya struktur datanya sama seperti sebelumnya (agar view tidak perlu diubah)
        $bobotCplCpmk = $bobotCplCpmkRaw->map(function ($bobot) {
            return (object)[
                'id_cpl' => $bobot->mkcpmkbobot->id_cpl,
                'id_cpmk' => $bobot->mkcpmkbobot->id_cpmk,
                'id_mk' => $bobot->mkcpmkbobot->id_mk,
                'bobot' => $bobot->bobot,
                'cpl' => $bobot->mkcpmkbobot->cpl,
                'cpmk' => $bobot->mkcpmkbobot->cpmk,
            ];
        });
        // PERUBAHAN SELESAI

        $validCpmks = $bobotCplCpmk->pluck('cpmk')->unique('id_cpmk');

        // Ambil semua id_mk_cpmk_cpl yang relevan untuk mata kuliah ini
        $relevantMkCpmkCplIds = MK_CPMK_CPL_MapModel::where('id_mk', $rps->id_mk)
            ->whereIn('id_cpmk', $validCpmks->pluck('id_cpmk'))
            ->pluck('id_mk_cpmk_cpl');

        $allBobotPenilaianEntries = RencanaAsesmenCPMKBobotModel::whereIn('id_mk_cpmk_cpl', $relevantMkCpmkCplIds)
            ->whereHas('rencanaAsesmen', function ($q) use ($rps) {
                $q->where('id_mk', $rps->id_mk);
            })
            ->with(['rencanaAsesmen', 'mkCpmkMap'])
            ->get();

        foreach ($validCpmks as $cpmk) {
            // Filter berdasarkan id_cpmk dari relasi mkCpmkMap
            $entriesForThisCpmk = $allBobotPenilaianEntries->filter(function($entry) use ($cpmk) {
                return $entry->mkCpmkMap->id_cpmk == $cpmk->id_cpmk;
            });
            
            $totalTugas = $entriesForThisCpmk->filter(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'tugas')->sum('bobot');
            $bobotUts = $entriesForThisCpmk->first(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'uts')?->bobot ?? 0;
            $bobotUas = $entriesForThisCpmk->first(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'uas')?->bobot ?? 0;
            $bobotHasilProyek = $entriesForThisCpmk->first(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'Hasil Proyek')?->bobot ?? 0;
            $bobotKegiatanPartisipatif = $entriesForThisCpmk->first(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'Kegiatan Partisipatif')?->bobot ?? 0;

            $bobotPenilaian[$cpmk->id_cpmk] = [
                'tugas' => $totalTugas,
                'uts'   => $bobotUts,
                'uas'   => $bobotUas,
                'hasil_proyek' => $bobotHasilProyek,
                'kegiatan_partisipatif' => $bobotKegiatanPartisipatif,
            ];
        }

        $pdfTemplate = view('dosen.showrpsPDF', [
            'rps' => $rps, 
            'assocCpls' => $relevantCpl, 
            'assocCpmk' => $relevantCpmk, 
            'assocSubCpmk' => $relevantsubCpmk,
            'correlationCpmkCplMap' => $correlationCpmkCplMap,
            'bobotCplCpmk' => $bobotCplCpmk,
            'bobotPenilaian' => $bobotPenilaian ?? [],
        ])->render();

        Browsershot::html($pdfTemplate)
            ->setChromePath('/usr/bin/google-chrome')
            ->setNodeBinary('/home/obeft/.nvm/versions/node/v24.11.1/bin/node')
            ->noSandbox()   
            ->landscape()
            ->showBackground()
            ->margins(10, 10, 10, 10)
            ->emulateMedia('screen')
            ->format('A4')
            ->setDelay(500)
            ->save('RPS_'.$rps->mataKuliah->nama_matkul_id.'.pdf');
            
        return response()->download('RPS_'.$rps->mataKuliah->nama_matkul_id.'.pdf')->deleteFileAfterSend(true);
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