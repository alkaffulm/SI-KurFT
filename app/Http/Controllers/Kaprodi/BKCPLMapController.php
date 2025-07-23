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

class BKCPLMapController extends Controller
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

    public function edit_bk_cpl()
    {
        $bahan_kajian = BahanKajianModel::all();
        $cpl = CPLModel::all();
        $jumlah_bk = BahanKajianModel::count();
        $bk_cpl_raw = BKCPLMapModel::all();
        $bk_cpl_map = [];

        foreach ($bk_cpl_raw as $relasi) {
            $id_cpl = $relasi->id_cpl;
            $id_bk = $relasi->id_bk;

            if (!isset($bk_cpl_map[$id_cpl]) || !in_array($id_bk, $bk_cpl_map[$id_cpl])) {
                $bk_cpl_map[$id_cpl][] = $id_bk;
            }
        }

        return view('mapping/bk-cpl', 
        [
            'bahan_kajian' => $bahan_kajian,
            'cpl'=>$cpl,
            'bk_cpl_map'=>$bk_cpl_map,
            'jumlah_bk' => $jumlah_bk
            ]
        );
    }

    public function updateBKCPLMap(Request $request)
    {
        $request->validate([
            'bk_mappings' => 'array',
            'bk_mappings.*' => 'array',
            'bk_mappings.*.*' => 'integer|exists:bahan_kajian,id_bk',
        ]);

        $bk_mappings = $request->input('bk_mappings', []);

        foreach ($bk_mappings as $id_cpl => $selected_bk_ids) {
            BKCPLMapModel::where('id_cpl', $id_cpl)->delete();

            if (!empty($selected_bk_ids)) {
                foreach ($selected_bk_ids as $id_bk) {
                    BKCPLMapModel::create([
                        'id_cpl' => $id_cpl,
                        'id_bk' => $id_bk,
                    ]);
                }
            }
        }

        return redirect()->route('bk-cpl-mapping.edit')->with('success', 'Pemetaan BK-CPL berhasil diperbarui!');
    }

    
}