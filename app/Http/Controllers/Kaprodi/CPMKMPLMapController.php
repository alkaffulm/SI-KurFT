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
use App\Models\CPMKCPLMapModel;
use App\Models\BKMKMapModel;
use App\Models\CPMKModel;

class CPMKMPLMapController extends Controller
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

    public function edit_cpmk_cpl()
    {
        $cpmk = CPMKModel::all();
        $cpl = CPLModel::all();
        $cpmk_cpl_raw = CPMKCPLMapModel::all();

        $cpmk_cpl_map = [];

        foreach ($cpmk_cpl_raw as $relasi) {
            if (!isset($cpmk_cpl_map[$relasi->id_cpmk])) {
                $cpmk_cpl_map[$relasi->id_cpmk] = [];
            }
            $cpmk_cpl_map[$relasi->id_cpmk][] = $relasi->id_cpl;
        }

        return view('/mapping/cpmk-cpl', 
        [
            'cpmk'=>$cpmk,
            'cpl'=>$cpl,
            'cpmk_cpl_map'=> $cpmk_cpl_map,
            ]
        );
    }

    public function updateCPMKCPLMap(Request $request)
    {
        $request->validate([
            'cpl_mappings' => 'array',
            'cpl_mappings.*' => 'array',
            'cpl_mappings.*.*' => 'integer|exists:cpl,id_cpl', 
        ]);

        $cpl_mappings = $request->input('cpl_mappings', []);
        foreach ($cpl_mappings as $id_cpmk => $selected_cpl_ids) {
            CPMKCPLMapModel::where('id_cpmk', $id_cpmk)->delete();
            if (!empty($selected_cpl_ids)) {
                foreach ($selected_cpl_ids as $id_cpl) {
                    CPMKCPLMapModel::create([
                        'id_cpl' => $id_cpl,
                        'id_cpmk' => $id_cpmk,
                    ]);
                }
            }
        }

        return redirect()->route('cpmk-cpl-mapping.edit')->with('success', 'Pemetaan CPMK-CPL berhasil diperbarui!');
    }

    
}