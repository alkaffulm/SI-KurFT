<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilLulusanRequest;
use App\Models\ProfilLulusanModel;
use App\Models\ProgramStudiModel;
use App\Models\KurikulumModel;
use App\Models\PEOModel;
use App\Models\PLPEOMapModel;
use Illuminate\Http\Request;

class ProfilLulusanController extends Controller
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
        $profil_lulusan = ProfilLulusanModel::all();
        $kurikulum = KurikulumModel::all();
        $programStudi = ProgramStudiModel::all();
        $peo = PEOModel::all();
        $pl_peo_raw = PLPEOMapModel::all();
        $pl_peo_map = [];
        $userRole = session()->get('userRole');

        foreach ($pl_peo_raw as $relasi) {
            $pl_peo_map[$relasi->id_pl][] = $relasi->id_peo;
        }
        
        return view('profilLulusan', [            
            'kurikulum' => $kurikulum,
            'programStudi' => $programStudi, 
            'userRole' => $userRole, 
            'peo' => $peo, 
            'pl_peo_map'=>$pl_peo_map,
            'profil_lulusan' => $profil_lulusan] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program_studi = ProgramStudiModel::all();

        return view('form.PL.profilLulusanFormAdd', ['program_studi' => $program_studi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfilLulusanRequest $request)
    {
        ProfilLulusanModel::create($request->validated());

        return redirect('profil-lulusan')->with('success', 'Profil Lulusan berhasil ditambahkan!');
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
    public function edit(ProfilLulusanModel $profil_lulusan)
    {
        $program_studi = ProgramStudiModel::all();

        return view('form.PL.profilLulusanFormEdit', ['profil_lulusan' => $profil_lulusan, 'program_studi' => $program_studi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProfilLulusanRequest $request, ProfilLulusanModel $profil_lulusan)
    {
        $profil_lulusan->update($request->validated());

        return redirect('profil-lulusan')->with('success', 'Profil Lulusan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilLulusanModel $profil_lulusan)
    {
        $profil_lulusan->delete();

        return redirect('profil-lulusan')->with('success', 'Profil Lulusn berhasil dihapus!');
    }
}
