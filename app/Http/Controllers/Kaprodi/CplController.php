<?php

namespace App\Http\Controllers\kaprodi;

use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreCPLRequest;
use App\Models\CPLModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\ProfilLulusanModel;
use App\Models\PEOModel;
use App\Models\CPLPLMapModel;
use App\Models\PLPEOMapModel;
use Illuminate\Http\Request;

class CplController extends Controller
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
        $cpl = CPLModel::all();
        $profil_lulusan = ProfilLulusanModel::all();
        $kurikulum = KurikulumModel::all();
        $programStudi = ProgramStudiModel::all();
        $peo = PEOModel::all();
        $cpl_pl_raw = CPLPLMapModel::all();
        $cpl_pl_map = [];

        foreach ($cpl_pl_raw as $relasi) {
            $cpl_pl_map[$relasi->id_cpl][] = $relasi->id_pl;
        }

        $pl_peo_raw = PLPEOMapModel::all();
        $pl_peo_map = [];

        foreach ($pl_peo_raw as $relasi) {
            $pl_peo_map[$relasi->id_pl][] = $relasi->id_peo;
        }
        
        $cpl_peo_map = [];
        $cpl_pl = CPLPLMapModel::all(); 
        $pl_peo = PLPEOMapModel::all(); 

        foreach ($cpl_pl as $cp) {
            foreach ($pl_peo as $pp) {
                if ($cp->id_pl === $pp->id_pl) {
                    $cpl_peo_map[$cp->id_cpl][] = $pp->id_peo;
                }
            }
        }
        
        return view('cpl', 
        [
            'cpl' => $cpl,
            'kurikulum' => $kurikulum,
            'programStudi' => $programStudi, 
            'peo' => $peo, 
            'profil_lulusan' => $profil_lulusan,
            'cpl_pl_map' => $cpl_pl_map,
            'pl_peo_map'=>$pl_peo_map,
            'cpl_peo_map'=>$cpl_peo_map
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program_studi = ProgramStudiModel::all();
        $kurikulum =KurikulumModel::all();
        return view('form.cpl.cplFormAdd', ['program_studi' => $program_studi, 'kurikulum' => $kurikulum]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCPLRequest $request)
    {
        CPLModel::create($request->validated());

        return to_route('cpl.index')->with('success', "CPL berhasil ditambahkan!");
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
    public function edit(CPLModel $cpl)
    {
        $program_studi = ProgramStudiModel::all();
        $kurikulum =KurikulumModel::all();
        return view('form.cpl.cplFormEdit', ['cpl' => $cpl ,'program_studi' => $program_studi, 'kurikulum' => $kurikulum]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCPLRequest $request, CPLModel $cpl)
    {
        $cpl->update($request->validated());

        return to_route('cpl.index')->with('success', "CPL telah diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CPLModel $cpl)
    {
        $cpl->delete();

        return to_route('cpl.index')->with("success", 'CPL telah dihapus!');
    }
}
