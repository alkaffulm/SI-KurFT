<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\VisiKeilmuanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateVisiKeilmuanRequest;
use App\Models\BahanKajianModel;

// use App\Http\Requests\StoreVisiKeilmuanRequest; // <-- Anda perlu membuat ini nanti

class VisiKeilmuanController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
    }

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

        // Gunakan validatedData untuk keamanan
        VisiKeilmuanModel::create($request->validated());

        return redirect()->route('dashboard')->with('success', 'Visi Keilmuan berhasil ditambahkan!');
    }

    public function edit(VisiKeilmuanModel $visi_keilmuan) // <-- DIUBAH
    {
        // Baris ::findOrFail($id) tidak diperlukan lagi

        return view('form.VisiKeilmuan.visiKeilmuanFormEdit', ['visi' => $visi_keilmuan]);
    }

    public function update(UpdateVisiKeilmuanRequest $request, VisiKeilmuanModel $visi_keilmuan)
    {
        $visi_keilmuan->update($request->validated());

        return redirect()->route('dashboard')
            ->with('success', 'Visi Keilmuan berhasil diperbarui!');
    }

    public function destroy(VisiKeilmuanModel $visi_keilmuan) // <-- DIUBAH
    {
        // Baris ::findOrFail($id) tidak diperlukan lagi
        $visi_keilmuan->delete();

        return redirect()->route('visikeilmuan.index')
            ->with('success', 'Visi Keilmuan berhasil dihapus!');
    }
}
