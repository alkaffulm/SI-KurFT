<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\VisiKeilmuanModel;
use App\Http\Requests\UpdateVisiKeilmuanRequest;

class VisiKeilmuanController extends Controller
{

    public function index()
    {
        $visi = VisiKeilmuanModel::all();
        return view('visikeilmuan', ['visi' => $visi]);
    }

    public function create()
    {
        return view('form.VisiKeilmuan.visiKeilmuanFormAdd');
    }

    public function store(UpdateVisiKeilmuanRequest $request) // <-- Nanti ganti dengan StoreVisiKeilmuanRequest
    {
        VisiKeilmuanModel::create($request->validated());
        return redirect()->route('dashboard')->with('success', 'Visi Keilmuan berhasil ditambahkan!');
    }

    public function edit(VisiKeilmuanModel $visi_keilmuan) // <-- DIUBAH
    {
        return view('form.VisiKeilmuan.visiKeilmuanFormEdit', ['visi' => $visi_keilmuan]);
    }

    public function update(UpdateVisiKeilmuanRequest $request, VisiKeilmuanModel $visi_keilmuan)
    {
        $visi_keilmuan->update($request->validated());
        return redirect()->route('dashboard')->with('success', 'Visi Keilmuan berhasil diperbarui!');
    }

    public function destroy(VisiKeilmuanModel $visi_keilmuan) // <-- DIUBAH
    {
        $visi_keilmuan->delete();
        return redirect()->route('visikeilmuan.index')->with('success', 'Visi Keilmuan berhasil dihapus!');
    }
}
