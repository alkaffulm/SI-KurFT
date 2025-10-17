<?php

namespace App\Http\Controllers\Dosen;

use App\Models\RPSModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use App\Models\CPLCPMKBobotModel;
use Illuminate\Support\Facades\DB;
use App\Livewire\PembobotanCpmkCpl;
use App\Models\RencanaAsesmenModel;
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

        // $cpl = CPLModel::all();
        // $dosen = UserModel::where('id_ps', session('userProfiId'))->get();
        // $bahan_kajian = BahanKajianModel::all();
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
            // 'id_dosen_penyusun' => Auth::id(),
            'id_kaprodi' => $kaprodi->id_user ,
            'id_model_pembelajaran' => $validated['id_model_pembelajaran'] ?? null,
            // 'deskripsi_singkat' => $validated['deskripsi_singkat'],
            // 'id_bk' => $validated['id_bk'],
            'id_kurikulum' => session('id_kurikulum_aktif'), // Ambil dari sesi
            // 'id_kurikulum' => 7, // sementara kita hardcode jadi kurikulum 2020
            'id_ps' => session('userRoleId'), // Ambil dari sesi
            'tanggal_disusun' => now(),
            'materi_pembelajaran' => $validated['materi_pembelajaran'] ?? null,
            'pustaka_utama' => $validated['pustaka_utama'] ?? null,
            'pustaka_pendukung' => $validated['pustaka_pendukung'] ?? null,
        ]);

        // $rps->cpls()->sync($validated['cpl_ids']);
        $rps->mataKuliahSyarat()->sync($validated['id_mk_syarat'] ?? []);
        $rps->mediaPembelajaran()->sync($validated['media_pembelajaran'] ?? []);
        

        // return to_route('matkul.index')->with('success', 'Berhasi membuat data induk RPS');
        return to_route('rps.edit', $rps)->with('success', 'Berhasi membuat data induk RPS');

    }

    /**
     * Display the specified resource.
     */
    public function show(RPSModel $rp)
    {
        $rp->load([
            'mataKuliah', 
            'mediaPembelajaran',
            'mataKuliah.bahanKajian.cpls', 
            'mataKuliah.cpmks.subCpmk',
            'mataKuliah.cpmks.cpls',
            'dosenPenyusun', 
            'dosenPenyusun.programStudiModel',
            'kurikulum',
            'programStudi',
            'bahanKajian.cpls',
            'topics.weeks',
            'topics.subCpmk',
        ]);

        
        $mappings = MK_CPMK_CPL_MapModel::where('id_mk', $rp->id_mk)->with('cpl', 'cpmk')->get();
        $relevantCpl = $mappings->pluck('cpl')->unique('id_cpl');
        $relevantCpmk = $mappings->pluck('cpmk')->unique('id_cpmk');
        // $relevantsubCpmk = $mappings->cpmk->subCpmk->pluck('nama_kode_sub_cpmk')->unique('id_sub_cpmk');

        $correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        $bobotCplCpmk = CPLCPMKBobotModel::where('id_mk', $rp->id_mk)
                        ->with(['cpl', 'cpmk'])
                        ->whereExists(function ($query) {
                            // ...terdapat baris di tabel 'mk_cpmk_cpl_map' yang cocok
                            $query->select(DB::raw(1))
                                ->from('mk_cpmk_cpl_map')
                                // Cocokkan berdasarkan id_mk, id_cpl, dan id_cpmk
                                ->whereColumn('mk_cpmk_cpl_map.id_mk', 'cpl_cpmk_bobot.id_mk')
                                ->whereColumn('mk_cpmk_cpl_map.id_cpl', 'cpl_cpmk_bobot.id_cpl')
                                ->whereColumn('mk_cpmk_cpl_map.id_cpmk', 'cpl_cpmk_bobot.id_cpmk');
                        })                
                        ->get();
        

        $validCpmks = $bobotCplCpmk->pluck('cpmk')->unique('id_cpmk');

        $allBobotPenilaianEntries = RencanaAsesmenCPMKBobotModel::whereIn('id_cpmk', $validCpmks->pluck('id_cpmk'))
            ->whereHas('rencanaAsesmen', function ($q) use ($rp) {
                $q->where('id_mk', $rp->id_mk);
            })
            ->with('rencanaAsesmen') // Eager load relasi ke parent-nya
            ->get();

        foreach ($validCpmks as $cpmk) {
            // Dari data yang sudah diambil, filter untuk CPMK saat ini
            $entriesForThisCpmk = $allBobotPenilaianEntries->where('id_cpmk', $cpmk->id_cpmk);
            
            // Akumulasi bobot TUGAS dari kolom 'bobot' di tabel pivot
            $totalTugas = $entriesForThisCpmk->filter(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'tugas')->sum('bobot');
            
            // Ambil bobot UTS dari kolom 'bobot' di tabel pivot
            $bobotUts = $entriesForThisCpmk->first(fn($entry) => $entry->rencanaAsesmen?->tipe_komponen === 'uts')?->bobot ?? 0;
            
            // Ambil bobot UAS dari kolom 'bobot' di tabel pivot
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

        $assocCpls = collect();

        if($rp->mataKuliah) {
            $assocCpls = $rp->mataKuliah->bahanKajian->flatMap(function ($bahanKajian) {
                return $bahanKajian->cpls;
            })->unique('id_cpl');
        }
        
        return view('dosen.showrps', [
            'rps' => $rp, 
            'assocCpls' => $relevantCpl, 
            'assocCpmk' => $relevantCpmk, 
            'correlationCpmkCplMap' => $correlationCpmkCplMap,
            'bobotCplCpmk' => $bobotCplCpmk,
            'bobotPenilaian' => $bobotPenilaian ?? 0,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RPSModel $rp)
    {
        return view('dosen.form.rps.rpsFormEdit', [ 'rps' => $rp]);
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
