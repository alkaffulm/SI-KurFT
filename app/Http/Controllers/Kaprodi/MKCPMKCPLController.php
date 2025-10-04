<?php

namespace App\Http\Controllers\Kaprodi;

use App\Models\CPLModel;
use App\Models\CPMKModel;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use App\Http\Controllers\Controller;
use App\Models\MK_CPMK_CPL_MapModel;

class MKCPMKCPLController extends Controller
{
    public function __construct()
    {
        $userRole = session()->get('userRole');

        return view()->share('userRole', $userRole);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editMKCPL()
    {
        $mata_kuliah = MataKuliahModel::with('cpmks')->orderBy('kode_mk')->get();
        $cpmk = CPMKModel::orderBy('nama_kode_cpmk')->get();
        $cpl = CPLModel::all();
        $mk_cpmk_cpl_raw = MK_CPMK_CPL_MapModel::all();
        $mk_cpmk_cpl_map = [];
        $mk_cpmk_only_map = [];

        foreach ($mk_cpmk_cpl_raw as $relasi) {
            $id_mk   = (int) $relasi->id_mk;
            $id_cpmk = (int) $relasi->id_cpmk;
            $id_cpl  = (int) $relasi->id_cpl;

            // Mapping: MK → CPL → [CPMK]
            if (!isset($mk_cpmk_cpl_map[$id_mk])) {
                $mk_cpmk_cpl_map[$id_mk] = [];
            }
            if (!isset($mk_cpmk_cpl_map[$id_mk][$id_cpl])) {
                $mk_cpmk_cpl_map[$id_mk][$id_cpl] = [];
            }
            if (!in_array($id_cpmk, $mk_cpmk_cpl_map[$id_mk][$id_cpl])) {
                $mk_cpmk_cpl_map[$id_mk][$id_cpl][] = $id_cpmk;
            }

            // Mapping tambahan: MK → [CPMK] (tanpa CPL)
            if (!isset($mk_cpmk_only_map[$id_mk])) {
                $mk_cpmk_only_map[$id_mk] = [];
            }
            if (!in_array($id_cpmk, $mk_cpmk_only_map[$id_mk])) {
                $mk_cpmk_only_map[$id_mk][] = $id_cpmk;
            }
        }

        return view('mapping.mk-cpl', [
            'mata_kuliah' => $mata_kuliah, 
            'cpl' => $cpl,
            'mk_cpmk_only_map' => $mk_cpmk_only_map,
            'mk_cpmk_cpl_map'=>$mk_cpmk_cpl_map,
        
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMKCPL(Request $request)
    {
        $cplMaps = $request->input('cpl_map', []);
        
        foreach ($cplMaps as $id_mk => $cpl_ids) {
            // Ambil data lama untuk MK ini
            $existing_entries = MK_CPMK_CPL_MapModel::where('id_mk', $id_mk)->get();
            $existing_cpl_ids = $existing_entries->pluck('id_cpl')->unique()->toArray();

            // Normalize input
            $cpl_ids = is_array($cpl_ids) ? $cpl_ids : [];

            // Cari CPL yang dihapus → hapus dari tabel pivot
            $cpl_to_delete = array_diff($existing_cpl_ids, $cpl_ids);
            if (!empty($cpl_to_delete)) {
                MK_CPMK_CPL_MapModel::where('id_mk', $id_mk)
                    ->whereIn('id_cpl', $cpl_to_delete)
                    ->delete();
            }

            // Cari CPL yang baru ditambahkan → tambahkan ke tabel pivot
            $cpl_to_add = array_diff($cpl_ids, $existing_cpl_ids);
            foreach ($cpl_to_add as $id_cpl) {
                MK_CPMK_CPL_MapModel::create([
                    'id_mk'   => $id_mk,
                    'id_cpl'  => $id_cpl,
                    'id_cpmk' => null, // default kosong, baru diisi di step pemetaan CPL–CPMK
                ]);
            }

        }

        return to_route('cpl-cpmk-mapping.edit')
            ->with('success', 'Pemetaan CPL–MK berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
