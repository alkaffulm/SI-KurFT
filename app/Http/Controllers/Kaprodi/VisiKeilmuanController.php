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
        return view('form.VisiKeilmuan.vkFormAdd');
    }

    public function store(Request $request) // <-- Nanti ganti dengan StoreVisiKeilmuanRequest
    {
        // Validasi sementara di sini
        $validatedData = $request->validate([
            'id_ps' => 'required|integer',
            'id_kurikulum' => 'required|integer',
            'desc_vk_id' => 'required|string|min:20',
            'desc_vk_en' => 'nullable|string|min:20',
        ]);

        // Gunakan validatedData untuk keamanan
        VisiKeilmuanModel::create($validatedData);

        return redirect()->route('visikeilmuan.index')
            ->with('success', 'Visi Keilmuan berhasil ditambahkan!');
    }

    public function edit(VisiKeilmuanModel $visi) // <-- DIUBAH
    {
        // Baris ::findOrFail($id) tidak diperlukan lagi

        return view('form.VisiKeilmuan.visiKeilmuanFormEdit', [
            'visi' => $visi
        ]);
    }

    public function update(UpdateVisiKeilmuanRequest $request, VisiKeilmuanModel $visi)
    {
        $visi->update($request->validated());

        return redirect()->route('visikeilmuan.index')
            ->with('success', 'Visi Keilmuan berhasil diperbarui!');
    }

    public function destroy(VisiKeilmuanModel $visi) // <-- DIUBAH
    {
        // Baris ::findOrFail($id) tidak diperlukan lagi
        $visi->delete();

        return redirect()->route('visikeilmuan.index')
            ->with('success', 'Visi Keilmuan berhasil dihapus!');
    }
}
