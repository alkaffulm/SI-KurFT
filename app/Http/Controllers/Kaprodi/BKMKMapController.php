<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Requests\StoreKurikulumRequest;
use App\Models\KurikulumModel;
use App\Models\PEOModel;
use App\Models\PLPEOMapModel;
use App\Models\ProfilLulusanModel;
use App\Models\ProgramStudiModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CPLModel;
use App\Models\CPLPLMapModel;
use App\Models\BahanKajianModel;
use App\Models\BKCPLMapModel;
use App\Models\MataKuliahModel;
use App\Models\BKMKMapModel;

class BKMKMapController extends Controller
{
    public function __construct()
    {
        $userRole = session()->get('userRole');
        view()->share('userRole', $userRole);
    }

    public function index(Request $request)
    {
        $profil_lulusan = ProfilLulusanModel::all();
        $kurikulum = KurikulumModel::all();
        $programStudi = ProgramStudiModel::all();
        $peo = PEOModel::all();
        $pl_peo_raw = PLPEOMapModel::all();
        $pl_peo_map = [];


        foreach ($pl_peo_raw as $relasi) {
            $pl_peo_map[$relasi->id_pl][] = $relasi->id_peo;
        }

        // dd($profil_lulusan->toArray()); // Pastikan ini dikomentari atau dihapus setelah debugging

        $cpl = CPLModel::all();

        return view('kurikulum', [
            'kurikulum' => $kurikulum,
            'programStudi' => $programStudi, 
            'peo' => $peo, 
            'pl_peo_map'=>$pl_peo_map,
            'profil_lulusan' => $profil_lulusan,
            'cpl' => $cpl
        ]);
    }

    public function edit_bk_mk()
    {
        $bahan_kajian = BahanKajianModel::all();
        $mata_kuliah = MataKuliahModel::all();
        $jumlah_bk = BahanKajianModel::count();
        $bk_mk_raw = BKMKMapModel::all();
        $bk_mk_map = [];

        foreach ($bk_mk_raw as $relasi) {
            $id_bk = $relasi->id_bk;
            $id_mk = $relasi->id_mk;

            if (!isset($bk_mk_map[$id_mk])) {
                $bk_mk_map[$id_mk] = [];
            }

            $bk_mk_map[$id_mk][] = $id_bk;
        }


        return view('/mapping/bk-mk', 
        [
            'bahan_kajian' => $bahan_kajian,
            'mata_kuliah'=> $mata_kuliah,
            'bk_mk_map'=>$bk_mk_map,
            'jumlah_bk' => $jumlah_bk
            ]
        );
    }

    public function updateBKMKMap(Request $request)
    {
        $request->validate([
            'mk_mappings' => 'array',
            'mk_mappings.*' => 'array',
            'mk_mappings.*.*' => 'integer|exists:bahan_kajian,id_bk',
        ]);

        $mk_mappings = $request->input('mk_mappings', []);
        foreach ($mk_mappings as $id_mk_from_form => $selected_bk_ids_from_form) {
            BKMKMapModel::where('id_mk', $id_mk_from_form)->delete();

            if (!empty($selected_bk_ids_from_form)) {
                foreach ($selected_bk_ids_from_form as $single_selected_bk_id) {
                    BKMKMapModel::create([
                        'id_bk' => $single_selected_bk_id,
                        'id_mk' => $id_mk_from_form,      
                    ]);
                }
            }
        }

        return redirect()->route('bahan-kajian.index')->with('success', 'Pemetaan BK-MK berhasil diperbarui!');
    }

    
}