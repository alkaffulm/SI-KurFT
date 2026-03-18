<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfilLulusanRequest;
use App\Http\Requests\UpdateAll\UpdateAllProfilLulusanRequest;
use App\Models\ProfilLulusanModel;
use App\Models\ProgramStudiModel;
use App\Models\KurikulumModel;
use App\Models\PEOModel;
use App\Models\PLPEOMapModel;

class ProfilLulusanController extends Controller
{
    public function index()
    {
        $profil_lulusan = ProfilLulusanModel::paginate(5);
        $kurikulum = KurikulumModel::all();
        $programStudi = ProgramStudiModel::all();
        $peo = PEOModel::all();
        $pl_peo_raw = PLPEOMapModel::all();
        $pl_peo_map = [];
        $userRole = session()->get('userRole');

        foreach ($pl_peo_raw as $relasi) {
            $pl_peo_map[$relasi->id_pl][] = $relasi->id_peo;
        }

        if($userRole == 'pimpinan' || $userRole == 'upm'){
            return view('pimpinanUpm.profilLulusanAll');
        }
        else {
            return view('profilLulusan', [
                'kurikulum' => $kurikulum,
                'programStudi' => $programStudi,
                'userRole' => $userRole,
                'peo' => $peo,
                'pl_peo_map' => $pl_peo_map,
                'profil_lulusan' => $profil_lulusan
            ]);
        }

    }

    public function create()
    {
        $program_studi = ProgramStudiModel::all();
        return view('form.PL.profilLulusanFormAdd', ['program_studi' => $program_studi]);
    }


    public function store(StoreProfilLulusanRequest $request)
    {
        ProfilLulusanModel::create($request->validated());
        return to_route('profil-lulusan.index')->with('success', 'Profil Lulusan berhasil ditambahkan!');
    }

    public function editAll()
    {
        $pl_data = ProfilLulusanModel::all();
        return view('form.PL.profilLulusanFormEdit', ['pl_data' => $pl_data]);
    }

    public function updateAll(UpdateAllProfilLulusanRequest $request)
    {
        if ($request->has('delete_pl')) {
            ProfilLulusanModel::destroy($request->delete_pl);
        }

        if (!$request->has('pl')) {
            return redirect()->route('profil-lulusan.index')->with('success', 'Perubahan berhasil disimpan!');
        }

        $validatedData = $request->validated()['pl'];

        foreach ($validatedData as $id => $data) {
            $pl = ProfilLulusanModel::find($id);
            if ($pl) {
                $pl->update($data);
            }
        }

        return redirect()->route('profil-lulusan.index')->with('success', 'Perubahan Profil Lulusan berhasil disimpan!');
    }
}
