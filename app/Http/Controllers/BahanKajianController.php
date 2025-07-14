<?php

namespace App\Http\Controllers;

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
        return view('form.bkFormCreate(test)');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_bk' => 'required|string',
            'kategori' => 'required|string',
            'desc' => 'required|string',
        ]);

        BahanKajianModel::create($validateData);

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
        return view('form.bkFormEdit(test)', ['bk' => $bahanKajian]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BahanKajianModel $bahanKajian)
    {
        $validateData = $request->validate([
            'nama_bk' => 'required|string',
            'kategori' => 'required|string',
            'desc' => 'required|string',
        ]);

        $bahanKajian->update($validateData);

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
