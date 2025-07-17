<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatkulRequest;
use App\Models\MataKuliahModel;
use App\Models\ProgramStudiModel;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_kuliah = MataKuliahModel::all();
        return view('matkul(test)', ['mata_kuliah' => $mata_kuliah]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mk = MataKuliahModel::all();
        $ps = ProgramStudiModel:: all();

        return view('form.Matkul.matkulFormAdd(test)',['mk' => $mk, 'ps' => $ps]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatkulRequest $request)
    {
        MataKuliahModel::create($request->validated());

        return redirect('mata-kuliah')->with('success', 'Mata Kuliah berhasil ditambahkan!');
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
    public function edit(MataKuliahModel $mata_kuliah)
    {
        $program_studi = ProgramStudiModel::all();
        
        return view('form.Matkul.matkulFormEdit(test)', ['mk' => $mata_kuliah, 'ps' => $program_studi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMatkulRequest $request, MataKuliahModel $mata_kuliah)
    {   
        $mata_kuliah->update($request->validated());

        return redirect('mata-kuliah')->with('success', 'Mata Kuliah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliahModel $mata_kuliah)
    {
        $mata_kuliah->delete();

        return redirect('mata-kuliah')->with('success', 'Mata Kuliah telah dihapus');
    }
}
