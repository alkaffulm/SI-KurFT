<?php

namespace App\Http\Controllers\Dosen;

use App\Models\CPLModel;
use App\Models\RPSModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use App\Http\Controllers\Controller;
use App\Models\BahanKajianModel;
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
        $mata_kuliah = MataKuliahModel::findOrFail($id_mk);

        $cpl = CPLModel::all();
        // $dosen = UserModel::where('id_ps', session('userProfiId'))->get();
        $bahan_kajian = BahanKajianModel::all();
        $allMatkul =MataKuliahModel::where('id_mk','!=', $id_mk)->get();

        return view('dosen.form.rps.rpsFormAdd', ['mata_kuliah' => $mata_kuliah, 'allMatkul' => $allMatkul, 'allCpl' => $cpl,  'bahan_kajian' => $bahan_kajian]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_mk' => 'required|exists:mata_kuliah,id_mk',
            // 'id_dosen_penyusun' => 'required|exists:users,id_user',
            // 'deskripsi_singkat' => 'nullable|string',
            'id_bk' => 'required|exists:bahan_kajian,id_bk',
            'id_mk_syarat' => 'nullable|exists:mata_kuliah,id_mk',
            'cpl_ids' => 'required|array',
            'cpl_ids.*' => 'exists:cpl,id_cpl', // Pastikan setiap ID CPL valid
            'materi_pembelajaran' => 'nullable|string',
            'pustaka_utama' => 'nullable|string',
            'pustaka_pendukung' => 'nullable|string',
        ]);

        $rps = RPSModel::create([
            'id_mk' => $validated['id_mk'],
            'id_dosen_penyusun' => Auth::id(),
            // 'deskripsi_singkat' => $validated['deskripsi_singkat'],
            'id_bk' => $validated['id_bk'],
            'id_kurikulum' => session('id_kurikulum_aktif'), // Ambil dari sesi
            // 'id_kurikulum' => 7, // sementara kita hardcode jadi kurikulum 2020
            'id_ps' => session('userRoleId'), // Ambil dari sesi
            'tanggal_disusun' => now(),
            'materi_pembelajaran' => $validated['materi_pembelajaran'] ?? null,
            'pustaka_utama' => $validated['pustaka_utama'] ?? null,
            'pustaka_pendukung' => $validated['pustaka_pendukung'] ?? null,
        ]);

        $rps->cpls()->sync($validated['cpl_ids']);
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
            'dosenPenyusun', 
            'kurikulum',
            'programStudi',
            'cpls',
            'mataKuliah.cpmks' => function($query) {
                $query->with(['cpl', 'subCpmk']);
            } 
            // 'details' => function ($query) {
            //     // Urutkan detail mingguan berdasarkan nomor minggu
            //     $query->orderBy('minggu_ke', 'asc');
            // },
            // 'details.subCpmk' // Muat juga relasi Sub-CPMK dari setiap detail
        ]);

        return view('dosen.showrps', ['rps' => $rp]);
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

        return view('livewire.rps-edit-page', [ 'rps' => $rp]);
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
