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

class CPLPLMapController extends Controller
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

    public function edit_cpl_pl()
    {
        $cpl = CPLModel::all();
        $profil_lulusan = ProfilLulusanModel::all();
        $peo = PEOModel::all();
        $cpl_pl_raw = CPLPLMapModel::all();
        $cpl_pl_map = [];

        foreach ($cpl_pl_raw as $relasi) {
            $cpl_pl_map[$relasi->id_cpl][] = $relasi->id_pl;
        }
        $userRole = session()->get('userRole');
        return view('mapping/cpl-pl', ['cpl' => $cpl,'profil_lulusan' => $profil_lulusan, 'userRole' => $userRole, 'peo' => $peo, 'cpl_pl_map'=>$cpl_pl_map]);
    }

    public function updateCPLPLMap(Request $request)
    {

        $request->validate([
            'pl_mappings' => 'array',
            'pl_mappings.*' => 'array', 
            'pl_mappings.*.*' => 'integer|exists:profil_lulusan,id_pl', 
        ]);

        $pl_mappings = $request->input('pl_mappings', []); 

        foreach ($pl_mappings as $id_cpl => $selected_pl_ids) {
            CPLPLMapModel::where('id_cpl', $id_cpl)->delete();

            if (!empty($selected_pl_ids)) {
                foreach ($selected_pl_ids as $id_pl) {
                    CPLPLMapModel::create([
                        'id_cpl' => $id_cpl,
                        'id_pl' => $id_pl,
                    ]);
                }
            }
        }

        return redirect()->route('cpl.index')->with('success', 'Pemetaan CPL-PL berhasil diperbarui!');
    }
    
}