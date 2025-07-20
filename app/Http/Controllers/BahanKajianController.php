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
        $bahan_kajian = BahanKajianModel::all();
        return view('bk', ['bahan_kajian' => $bahan_kajian]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.bk.bkFormAdd');
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
    public function edit(BahanKajianModel $bahan_kajian)
    {
        return view('form.bk.bkFormEdit', ['bahan_kajian' => $bahan_kajian]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBahanKajianRequest $request, BahanKajianModel $bahan_kajian)
    {
        $bahan_kajian->update($request->validated());

        return redirect('bahan-kajian')->with('success', 'Bahan Kajian berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BahanKajianModel $bahan_kajian)
    {
        $bahan_kajian->delete();

        return redirect('bahan-kajian')->with('success', 'Bahan Kajian dihapus!');

    }
}
