<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBahanKajianRequest;
use App\Models\BahanKajianModel;
use Illuminate\Http\Request;

class BahanKajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bk = BahanKajianModel::all();
        return view('bk(test)', ['bahan_kajian' => $bk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.bk.bkFormAdd(test)');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBahanKajianRequest $request)
    {
        BahanKajianModel::create($request->validated());

        return redirect('bahan-kajian')->with('success', 'Bahan Kajian baru berhasil ditammbahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BahanKajianModel $bahanKajian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BahanKajianModel $bahanKajian)
    {
        return view('form.bk.bkFormEdit(test)', ['bk' => $bahanKajian]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBahanKajianRequest $request, BahanKajianModel $bahanKajian)
    {
        $bahanKajian->update($request->validated());

        return redirect('bahan-kajian')->with('success', 'Bahan Kajian berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BahanKajianModel $bahanKajian)
    {
        $bahanKajian->delete();

        return redirect('bahan-kajian')->with('success', 'Bahan Kajian dihapus!');

    }
}
