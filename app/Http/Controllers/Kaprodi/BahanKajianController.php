<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBahanKajianRequest;
use App\Http\Requests\UpdateAll\UpdateAllBahanKajianRequest;
use App\Models\BahanKajianModel;
use App\Models\CPLModel;
use App\Models\BKMKMapModel;
use App\Models\MataKuliahModel;

class BahanKajianController extends Controller
{
    public function index()
    {
        $bahan_kajianpg = BahanKajianModel::paginate(5, ['*'], 'bk');
        $bahan_kajian = BahanKajianModel::all();
        $cpl = CPLModel::all();
        $jumlah_bk = BahanKajianModel::count();
        $userRole = session()->get('userRole');

        $mata_kuliah = MataKuliahModel::paginate(10, ['*'], 'mata-kuliah');
        $bk_mk_raw = BKMKMapModel::all();
        $bk_mk_map = [];

        foreach ($bk_mk_raw as $relasi) {
            $id_bk = $relasi->id_bk;
            $id_mk = $relasi->id_mk;

            if (!isset($bk_mk_map[$id_bk]) || !in_array($id_mk, $bk_mk_map[$id_bk])) {
                $bk_mk_map[$id_bk][] = $id_mk;
            }
        }

        if($userRole == 'pimpinan' || $userRole == 'upm'){
            return view('pimpinanUpm.bahanKajianAll');
        }
        else {
            return view('bk', [
                'bahan_kajian' => $bahan_kajian,
                'bahan_kajianpg' => $bahan_kajianpg,
                'cpl' => $cpl,
                'jumlah_bk' => $jumlah_bk,
                'bk_mk_map' => $bk_mk_map,
                'mata_kuliah' => $mata_kuliah
            ]);
        }

    }

    public function create()
    {
        return view('form.BK.bkFormAdd');
    }

    public function store(StoreBahanKajianRequest $request)
    {
        BahanKajianModel::create($request->validated());
        return to_route('bahan-kajian.index')->with('success', 'Bahan Kajian baru berhasil ditambahkan!');
    }

    public function editAll()
    {
        $bk_data = BahanKajianModel::all();
        return view('form.BK.bkFormEdit', ['bk_data' => $bk_data]);
    }

    public function updateAll(UpdateAllBahanKajianRequest $request)
    {
        // 1. Process deletions
        if ($request->has('delete_bk')) {
            BahanKajianModel::destroy($request->delete_bk);
        }

        if (!$request->has('bk')) {
            return redirect()->route('bahan-kajian.index')->with('success', 'Perubahan Bahan Kajian berhasil disimpan!');
        }

        $validatedData = $request->validated()['bk'];

        // 3. Loop and update data
        foreach ($validatedData as $id => $data) {
            $bk = BahanKajianModel::find($id);
            if ($bk) {
                $bk->update($data);
            }
        }
        return redirect()->route('bahan-kajian.index')->with('success', 'Perubahan Bahan Kajian berhasil disimpan!');
    }
}
