<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilLulusanRequest;
use App\Models\ProfilLulusanModel;
use App\Models\ProgramStudiModel;
use Illuminate\Http\Request;

class ProfilLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil_lulusan = ProfilLulusanModel::all();
        
        return view('profilLulusan(test)', ['profil_lulusan' => $profil_lulusan] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program_studi = ProgramStudiModel::all();

        return view('form.PL.profilLulusanFormAdd(test)', ['program_studi' => $program_studi]);
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

        return view('form.PL.profilLulusanFormEdit(test)', ['profil_lulusan' => $profil_lulusan, 'program_studi' => $program_studi]);
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
