<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCPLRequest;
use App\Http\Requests\UpdateAll\UpdateAllCPLRequest;
use App\Models\CPLModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\ProfilLulusanModel;
use App\Models\PEOModel;
use App\Models\CPLPLMapModel;
use App\Models\PLPEOMapModel;

class CplController extends Controller
{
    public function index()
    {
        $cpl = CPLModel::all();
        $profil_lulusan = ProfilLulusanModel::all();
        $kurikulum = KurikulumModel::all();
        $programStudi = ProgramStudiModel::all();
        $peo = PEOModel::orderBy('kode_peo', 'asc')->get();
        $cpl_pl_raw = CPLPLMapModel::all();
        $cpl_pl_map = [];
        $userRole = session()->get('userRole');

        foreach ($cpl_pl_raw as $relasi) {
            $cpl_pl_map[$relasi->id_cpl][] = $relasi->id_pl;
        }

        $cpl_peo_map = [];
        $cpl_pl = CPLPLMapModel::all();
        $pl_peo = PLPEOMapModel::all();

        foreach ($cpl_pl as $cp) {
            foreach ($pl_peo as $pp) {
                if ($cp->id_pl === $pp->id_pl) {
                    // Use array_unique to avoid duplicate PEO entries
                    $cpl_peo_map[$cp->id_cpl][] = $pp->id_peo;
                }
            }
        }

        if($userRole == 'pimpinan' || $userRole == 'upm') {
            return view('pimpinanUpm.cplAll');
        }
        else {
            return view('cpl',[
                'cpl' => $cpl,
                'kurikulum' => $kurikulum,
                'programStudi' => $programStudi,
                'peo' => $peo,
                'profil_lulusan' => $profil_lulusan,
                'cpl_pl_map' => $cpl_pl_map,
                'cpl_peo_map' => $cpl_peo_map
            ]);
        }
    }

    public function create()
    {
        $program_studi = ProgramStudiModel::all();
        $kurikulum = KurikulumModel::all();
        return view('form.CPL.cplFormAdd', ['program_studi' => $program_studi, 'kurikulum' => $kurikulum]);
    }

    public function store(StoreCPLRequest $request)
    {
        CPLModel::create($request->validated());
        return to_route('cpl.index')->with('success', "CPL berhasil ditambahkan!");
    }

    public function editAll()
    {
        $cpl_data = CPLModel::all();
        $kurikulum = KurikulumModel::all(); 

        return view('form.CPL.cplFormEdit', [
            'cpl_data' => $cpl_data,
            'kurikulum' => $kurikulum 
        ]);
    }

    public function updateAll(UpdateAllCPLRequest $request)
    {
        // 1. Process deletions
        if ($request->has('delete_cpl')) {
            CPLModel::destroy($request->delete_cpl);
        }

        if (!$request->has('cpl')) {
            return redirect()->route('cpl.index')->with('success', 'Perubahan CPL berhasil disimpan!');
        }

        $validatedData = $request->validated()['cpl'];

        // 3. Loop and update data
        foreach ($validatedData as $id => $data) {
            $cpl = CPLModel::find($id);
            if ($cpl) {
                $cpl->update($data);
            }
        }
        return redirect()->route('cpl.index')->with('success', 'Perubahan CPL berhasil disimpan!');
    }
}
