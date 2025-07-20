<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCPLRequest;
use App\Models\CPLModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use Illuminate\Http\Request;

class CplController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cpl = CPLModel::all();
        return view('cpl', ['cpl' => $cpl]);
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

        return redirect('cpl')->with('success', "CPL berhasil ditambahkan!");
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

        return redirect('cpl')->with('success', "CPL telah diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CPLModel $cpl)
    {
        $cpl->delete();

        return redirect('cpl')->with("success", 'CPL telah dihapus!');
    }
}
