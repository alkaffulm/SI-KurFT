<?php

namespace App\Http\Controllers\Dosen;

use App\Models\CPLModel;
use App\Models\RPSModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use App\Http\Controllers\Controller;
use App\Models\BahanKajianModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\RPSDetailModel;
use Illuminate\Support\Facades\Auth;

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
        $allMatkul =MataKuliahModel::where('id_mk','!=', $id_mk)->get();

        return view('dosen.form.rps.rpsFormAdd', ['mata_kuliah' => $mata_kuliah, 'allMatkul' => $allMatkul, 'assocCpls' => $relevantCpl, 'assocCpmk' => $relevantCpmk]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $programStudi = UserModel::find(Auth::id())->programStudiModel;
        if($programStudi) {
            $kaprodi = $programStudi->userModel()->whereHas('roles', function ($query) {
                $query->where('role.id_role', 3);
            })->first();
        }

        $validated = $request->validate([
            'id_mk' => 'required|exists:mata_kuliah,id_mk',
            // 'id_dosen_penyusun' => 'required|exists:users,id_user',
            // 'deskripsi_singkat' => 'nullable|string',
            // 'id_bk' => 'required|exists:bahan_kajian,id_bk',
            'id_mk_syarat' => 'nullable|exists:mata_kuliah,id_mk',
            // 'cpl_ids' => 'required|array',
            // 'cpl_ids.*' => 'exists:cpl,id_cpl', // Pastikan setiap ID CPL valid
            'materi_pembelajaran' => 'nullable|string',
            'pustaka_utama' => 'nullable|string',
            'pustaka_pendukung' => 'nullable|string',
        ]);

        $rps = RPSModel::create([
            'id_mk' => $validated['id_mk'],
            'id_dosen_penyusun' => Auth::id(),
            'id_kaprodi' => $kaprodi->id_user ,
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
        $relevantCpl = $mappings->pluck('cpl')->unique('id_cpl')->sortBy('nama_kode_cpl');
        $relevantCpmk = $mappings->pluck('cpmk')->unique('id_cpmk')->sortBy('nama_kode_cpmk');

        $correlationCpmkCplMap = [];
        foreach($mappings as $mapping) {
            $correlationCpmkCplMap[$mapping->id_cpmk][] = $mapping->id_cpl;
        }

        $assocCpls = collect();

        if($rp->mataKuliah) {
            $assocCpls = $rp->mataKuliah->bahanKajian->flatMap(function ($bahanKajian) {
                return $bahanKajian->cpls;
            })->unique('id_cpl');
        }

        // $assocCpls = $rp->mataKuliah->bahanKajian->flatMap(function ($bahanKajian) {
        //     return $bahanKajian->cpls;
        // })->unique('id_cpl');



        // $cplsForCorrelationTable = $rp->mataKuliah->cpmks->flatMap(function ($cpmk) {
        //     return $cpmk->cpls;
        // })->unique('id_cpl');
        
        return view('dosen.showrps', ['rps' => $rp, 'assocCpls' => $relevantCpl, 'assocCpmk' => $relevantCpmk, 'correlationCpmkCplMap' => $correlationCpmkCplMap]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RPSModel $rp)
    {
        // $rp->load(['cpls', 'mataKuliahSyarat']);

        // $cpl = CPLModel::all();
        // // $dosen = UserModel::where('id_ps', session('userProfiId'))->get();
        // $bahan_kajian = BahanKajianModel::all();
        // $allMatkul =MataKuliahModel::where('id_mk','!=', $rp->id_mk)->get();

        return view('dosen.form.rps.rpsFormEdit', [ 'rps' => $rp]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, RPSModel $rp)
    // {
    //     $validated = $request->validate([
    //         'id_bk' => 'required|exists:bahan_kajian,id_bk',
    //         'id_mk_syarat' => 'nullable|exists:mata_kuliah,id_mk',
    //         'cpl_ids' => 'required|array',
    //         'cpl_ids.*' => 'exists:cpl,id_cpl', // Pastikan setiap ID CPL valid
    //         'materi_pembelajaran' => 'nullable|string',
    //         'pustaka_utama' => 'nullable|string',
    //         'pustaka_pendukung' => 'nullable|string',
    //     ]);

    //     $rp->update([
    //         'id_bk' => $validated['id_bk'],
    //         'materi_pembelajaran' => $validated['materi_pembelajaran'] ?? null,
    //         'pustaka_utama' => $validated['pustaka_utama'] ?? null,
    //         'pustaka_pendukung' => $validated['pustaka_pendukung'] ?? null,
    //     ]);

    //     $rp->cpls()->sync($validated['cpl_ids']);
    //     $rp->mataKuliahSyarat()->sync($validated['id_mk_syarat'] ?? []);

    //     return to_route('rps.show', $rp)->with('success', 'Berhasil memperbarui RPS!');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RPSModel $rp)
    {
        $rp->delete();

        return to_route('matkul.index')->with('success', 'Berhasil Menghapus RPS!');
    }
}
