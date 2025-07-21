<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCPLRequest;
use App\Http\Requests\StoreCPMKRequest;
use App\Models\CPMKModel;
use App\Models\MataKuliahModel;
use App\Models\SubCPMKModel;
use Illuminate\Http\Request;

class CpmkController extends Controller
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
        $cpmk = CPMKModel::all();
        $subCpmk = SubCPMKModel::all();
        return view('cpmk', ['cpmk' => $cpmk, 'sub_cpmk' => $subCpmk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_kuliah = MataKuliahModel::all();
        return view('form.CPMK.cpmkFormAdd', ['mata_kuliah' => $mata_kuliah]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCPMKRequest $request)
    {
        // dd($request->validated());
        CPMKModel::create($request->validated());

        return redirect('cpmk')->with('success', 'Berhasil menambahkan CPMK!');
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
    public function edit(CPMKModel $cpmk)
    {
        $mata_kuliah = MataKuliahModel::all();
        return view('form.CPMK.cpmkFormEdit', ['cpmk' => $cpmk, 'mata_kuliah' => $mata_kuliah]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCPMKRequest $request, CPMKModel $cpmk)
    {
        $cpmk->update($request->validated());

        return redirect('cpmk')->with('success', 'CPMK berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CPMKModel $cpmk) 
    {
        $cpmk->delete();

        return redirect('cpmk')->with('success', 'Berhasil menghapus CPMK!');
    }
}
