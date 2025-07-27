<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\CPMKModel;
use App\Models\MataKuliahModel;
use App\Models\SubCPMKModel;
use App\Models\MKCPMKSubCPMKMapModel;
use Illuminate\Http\Request;

class MKCPMKController extends Controller
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
    public function editMKCPMK()
    {
        $mata_kuliah = MataKuliahModel::with('cpmks')->orderBy('kode_mk')->get();
        $cpmk = CPMKModel::orderBy('nama_kode_cpmk')->get();
        $mk_cpmk_sub_cpmk_map = [];
        $mk_cpmk_sub_cpmk_raw = MKCPMKSubCPMKMapModel::all();
        $mk_cpmk_only_map = [];   

        foreach ($mk_cpmk_sub_cpmk_raw as $relasi) {
            $id_mk = (int) $relasi->id_mk;
            $id_cpmk = (int) $relasi->id_cpmk;
            $id_sub_cpmk = (int) $relasi->id_sub_cpmk;

            if (!isset($mk_cpmk_sub_cpmk_map[$id_mk])) {
                $mk_cpmk_sub_cpmk_map[$id_mk] = [];
            }
            if (!isset($mk_cpmk_sub_cpmk_map[$id_mk][$id_cpmk])) {
                $mk_cpmk_sub_cpmk_map[$id_mk][$id_cpmk] = [];
            }
            $mk_cpmk_sub_cpmk_map[$id_mk][$id_cpmk][] = $id_sub_cpmk;

            if (!isset($mk_cpmk_only_map[$id_mk])) {
                $mk_cpmk_only_map[$id_mk] = [];
            }
            if (!in_array($id_cpmk, $mk_cpmk_only_map[$id_mk])) {
                $mk_cpmk_only_map[$id_mk][] = $id_cpmk;
            }
        }

        return view('mapping.mk-cpmk', ['mata_kuliah' => $mata_kuliah, 'cpmk' => $cpmk,
                            'mk_cpmk_sub_cpmk_map' => $mk_cpmk_sub_cpmk_map, 
                            'mk_cpmk_only_map'=> $mk_cpmk_only_map
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMKCPMK(Request $request)
    {
        // Validasi input
        $request->validate([
            'cpmk_map' => 'array',
            'cpmk_map.*' => 'array', // Setiap elemen di cpmk_map (yaitu array cpmk_ids) harus berupa array
            'cpmk_map.*.*' => 'integer|exists:cpmk,id_cpmk', // Setiap ID CPMK harus integer dan ada di tabel cpmk
        ]);

        $cpmk_map_from_form = $request->input('cpmk_map', []);

        // Ambil semua SubCPMK yang ada di database. Kita akan membutuhkannya untuk setiap CPMK yang dipilih.
        $all_sub_cpmks = SubCPMKModel::all()->groupBy('id_cpmk');

        foreach ($cpmk_map_from_form as $id_mk => $selected_cpmk_ids_for_mk) {
            // Hapus semua relasi yang ada untuk id_mk ini di tabel mk_cpmk_sub_cpmk_map
            MKCPMKSubCPMKMapModel::where('id_mk', $id_mk)->delete();

            if (!empty($selected_cpmk_ids_for_mk)) {
                foreach ($selected_cpmk_ids_for_mk as $id_cpmk) {
                    // Dapatkan semua SubCPMK yang terkait dengan CPMK ini
                    $sub_cpmks_for_this_cpmk = $all_sub_cpmks->get($id_cpmk, collect());

                    if ($sub_cpmks_for_this_cpmk->isEmpty()) {
                        // Jika tidak ada SubCPMK untuk CPMK ini, Anda harus memutuskan:
                        // 1. Buat entri dengan id_sub_cpmk NULL (jika kolom diizinkan NULL).
                        // 2. Atau lewati (tidak ada entri yang dibuat jika tidak ada sub-CPMK).
                        // Untuk contoh ini, saya akan membuat satu entri dengan NULL jika diizinkan.
                        // Pastikan kolom id_sub_cpmk di tabel mk_cpmk_sub_cpmk_map bisa NULL!
                        MKCPMKSubCPMKMapModel::create([
                            'id_mk' => $id_mk,
                            'id_cpmk' => $id_cpmk,
                            'id_sub_cpmk' => null, // Atur ke NULL jika tidak ada sub-CPMK yang ditemukan
                        ]);
                    } else {
                        // Buat entri untuk setiap SubCPMK yang terkait dengan CPMK ini
                        foreach ($sub_cpmks_for_this_cpmk as $sub_cpmk_item) {
                            MKCPMKSubCPMKMapModel::create([
                                'id_mk' => $id_mk,
                                'id_cpmk' => $id_cpmk,
                                'id_sub_cpmk' => $sub_cpmk_item->id_sub_cpmk,
                            ]);
                        }
                    }
                }
            }
        }

        return to_route('cpmk.index')->with('success', 'Pemetaan Mata Kuliah-CPMK-SubCPMK berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
