<?php

namespace App\Http\Controllers\kaprodi;

use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreBahanKajianRequest;
use App\Models\BahanKajianModel;
use App\Models\CPLModel;
use App\Models\BKCPLMapModel;
use App\Models\BKMKMapModel;
use App\Models\MataKuliahModel;

class BahanKajianController extends Controller
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
        $bahan_kajian = BahanKajianModel::all();
        $cpl = CPLModel::all();
        $jumlah_bk = BahanKajianModel::count();
        $bk_cpl_raw = BKCPLMapModel::all();
        $bk_cpl_map = [];

        foreach ($bk_cpl_raw as $relasi) {
            $id_cpl = $relasi->id_cpl;
            $id_bk = $relasi->id_bk;

            if (!isset($bk_cpl_map[$id_cpl]) || !in_array($id_bk, $bk_cpl_map[$id_cpl])) {
                $bk_cpl_map[$id_cpl][] = $id_bk;
            }
        }
        $mata_kuliah = MataKuliahModel::all();
        $bk_mk_raw = BKMKMapModel::all();
        $bk_mk_map = [];

        foreach ($bk_mk_raw as $relasi) {
            $id_bk = $relasi->id_bk;
            $id_mk = $relasi->id_mk;

            if (!isset($bk_mk_map[$id_bk]) || !in_array($id_mk, $bk_mk_map[$id_bk])) {
                $bk_mk_map[$id_bk][] = $id_mk;
            }
        }

        return view('bk', 
        [
            'bahan_kajian' => $bahan_kajian,
            'cpl'=>$cpl,
            'bk_cpl_map'=>$bk_cpl_map,
            'jumlah_bk' => $jumlah_bk,
            'bk_mk_map'=>$bk_mk_map,
            'mata_kuliah' => $mata_kuliah
            ]
    );
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

        return to_route('bahan-kajian.index')->with('success', 'Bahan Kajian baru berhasil ditammbahkan!');
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

        return to_route('bahan-kajian.index')->with('success', 'Bahan Kajian berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BahanKajianModel $bahan_kajian)
    {
        $bahan_kajian->delete();

        return to_route('bahan-kajian.index')->with('success', 'Bahan Kajian dihapus!');

    }
}
