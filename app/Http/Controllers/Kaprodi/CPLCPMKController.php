<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\CPMKModel;
use App\Models\MataKuliahModel;
use App\Models\CPLModel;
use App\Models\MK_CPMK_CPL_MapModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CPLCPMKController extends Controller
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
    public function editCPLCPMK()
    {
        $mata_kuliah = MataKuliahModel::with('cpmks')->orderBy('kode_mk')->get();
        $cpmk = CPMKModel::orderBy('nama_kode_cpmk')->get();
        $cpl = CPLModel::all();
        $cpmk =CPMKModel::all();
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

        return view('mapping.cpl-cpmk', [
            'mata_kuliah' => $mata_kuliah, 
            'cpl' => $cpl,
            'mk_cpmk_only_map' => $mk_cpmk_only_map,
            'mk_cpmk_cpl_map'=>$mk_cpmk_cpl_map,
            'cpmk'=>$cpmk
        
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCPLCPMK(Request $request)
    {
        $cpmkMaps = $request->input('cpmk_map', []);

        foreach ($cpmkMaps as $id_mk => $cplMaps) {
            foreach ($cplMaps as $id_cpl => $cpmk_ids) {
                
                // Kalau masih ada CPMK yang dipilih
                if (is_array($cpmk_ids) && count($cpmk_ids) > 0) {
                    // Hapus semua relasi lama MK + CPL
                    MK_CPMK_CPL_MapModel::where('id_mk', $id_mk)
                        ->where('id_cpl', $id_cpl)
                        ->delete();

                    // Insert ulang relasi sesuai CPMK yang dipilih
                    foreach ($cpmk_ids as $id_cpmk) {
                        MK_CPMK_CPL_MapModel::create([
                            'id_mk'   => $id_mk,
                            'id_cpl'  => $id_cpl,
                            'id_cpmk' => $id_cpmk,
                        ]);
                    }
                }

                // Kalau kosong → biarkan mapping MK–CPL tetap ada,
                // jadi tidak dilakukan delete.
            }
        }

        return to_route('cpmk.index')->with('success', 'Pemetaan CPL–CPMK berhasil diperbarui!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
