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



class PLPEOMappingController extends Controller
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

        return view('kurikulum', [
            'kurikulum' => $kurikulum,
            'programStudi' => $programStudi, 
            'peo' => $peo, 
            'pl_peo_map'=>$pl_peo_map,
            'profil_lulusan' => $profil_lulusan
        ]);
    }

    public function edit_pl_peo()
    {
        $profil_lulusan = ProfilLulusanModel::all();
        $peo = PEOModel::all();
        $pl_peo_raw = PLPEOMapModel::all();
        $pl_peo_map = [];

        foreach ($pl_peo_raw as $relasi) {
            $pl_peo_map[$relasi->id_pl][] = $relasi->id_peo;
        }
        $userRole = session()->get('userRole');
        return view('mapping/pl-peo', ['profil_lulusan' => $profil_lulusan, 'userRole' => $userRole, 'peo' => $peo, 'pl_peo_map'=>$pl_peo_map]);
    }

    public function updatePLPEOMap(Request $request)
    {

        $request->validate([
            'peo_mappings' => 'array',
            'peo_mappings.*' => 'array', 
            'peo_mappings.*.*' => 'integer|exists:peo,id_peo', 
        ]);

        $peo_mappings = $request->input('peo_mappings', []); 

        foreach ($peo_mappings as $id_pl => $selected_peo_ids) {
            PLPEOMapModel::where('id_pl', $id_pl)->delete();

            if (!empty($selected_peo_ids)) {
                foreach ($selected_peo_ids as $id_peo) {
                    PLPEOMapModel::create([
                        'id_pl' => $id_pl,
                        'id_peo' => $id_peo,
                    ]);
                }
            }
        }

        return redirect()->route('profil-lulusan.index')->with('success', 'Pemetaan PL-PEO berhasil diperbarui!');
    }
    
}