<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCPMKRequest;
use App\Models\CPMKModel;
use App\Models\SubCPMKModel;
use Illuminate\Http\Request;

class SubCpmkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_cpmk = SubCPMKModel::all();
        return view('subCpmk', ['sub_cpmk' => $sub_cpmk] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cpmk = CPMKModel::all();
        return view('form.subCPMK.subCpmkFormAdd', ['cpmk' => $cpmk]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCPMKRequest $request)
    {
        SubCPMKModel::create($request->validated());

        return redirect('cpmk')->with('success', 'Sub CPMK berhasil ditambahkan!');
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
    public function edit(SubCPMKModel $sub_cpmk)
    {
        $cpmk = CPMKModel::all();
        return view('form.subCPMK.subCpmkFormEdit', ['cpmk' => $cpmk, 'sub_cpmk' => $sub_cpmk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSubCPMKRequest $request, SubCPMKModel $sub_cpmk)
    {
        $sub_cpmk->update($request->validated());

        return redirect('cpmk')->with('success', 'Su CPMK berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCPMKModel $sub_cpmk)
    {
        $sub_cpmk->delete();

        return redirect('cpmk')->with('success', 'Sub CPMK berhasil dihapus!');
    }
}
