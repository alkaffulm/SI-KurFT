<?php

namespace App\Http\Controllers\Kaprodi;

use App\Models\CPLModel;
use App\Models\CPMKModel;
use App\Models\SubCPMKModel;
use App\Models\CPMKCPLMapModel;
use App\Models\MataKuliahModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Http\Controllers\Controller; 
use App\Models\MKCPMKSubCPMKMapModel;
use App\Http\Requests\StoreCPMKRequest;
use App\Http\Requests\UpdateAll\UpdateAllCPMKRequest;

class CpmkController extends Controller
{
    public function index()
    {
        $cpmk = CPMKModel::orderBy('nama_kode_cpmk')->paginate(5, ['*'], 'cpmk');
        $cpmkAll = CPMKModel::all();
        $mata_kuliah = MataKuliahModel::with('cpmks')->orderBy('semester')->paginate(10, ['*'], 'mata-kuliah');
        $subCpmk = SubCPMKModel::with('cpmk')->orderBy('nama_kode_sub_cpmk')->paginate(5, ['*'], 'sub-cpmk');
        $userRole = session()->get('userRole');

        $mk_cpmk_sub_cpmk_raw = MKCPMKSubCPMKMapModel::all();
        $mk_cpmk_sub_cpmk_map = [];
        foreach ($mk_cpmk_sub_cpmk_raw as $relasi) {
            $id_mk = (int) $relasi->id_mk;
            $id_cpmk = (int) $relasi->id_cpmk;
            $id_sub_cpmk = (int) $relasi->id_sub_cpmk;

            if (!isset($mk_cpmk_sub_cpmk_map[$id_mk])) {
                $mk_cpmk_sub_cpmk_map[$id_mk] = [];
            }

            if (!isset($mk_cpmk_sub_cpmk_map[$id_mk][$id_cpmk])) {
                $mk_cpmk_sub_cpmk_map[$id_mk][$id_cpmk] = [];
            }

            $mk_cpmk_sub_cpmk_map[$id_mk][$id_cpmk][] = $id_sub_cpmk;
        }

        $cpl = CPLModel::all();
        $cpmk_cpl_raw = CPMKCPLMapModel::all();
        $cpmk_cpl_map = [];

        foreach ($cpmk_cpl_raw as $relasi) {
            $id_cpl = $relasi->id_cpl;
            $id_cpmk = $relasi->id_cpmk;

            if (!isset($cpmk_cpl_map[$id_cpl]) || !in_array($id_cpmk, $cpmk_cpl_map[$id_cpl])) {
                $cpmk_cpl_map[$id_cpl][] = $id_cpmk;
            }
        }

        $mk_cpmk_only_map = [];   

        foreach ($mk_cpmk_sub_cpmk_raw as $relasi) {
            $id_mk = (int) $relasi->id_mk;
            $id_cpmk = (int) $relasi->id_cpmk;
            $id_sub_cpmk = (int) $relasi->id_sub_cpmk;

            if (!isset($mk_cpmk_sub_cpmk_map[$id_mk])) {
                $mk_cpmk_sub_cpmk_map[$id_mk] = [];
            }
            if (!isset($mk_cpmk_sub_cpmk_map[$id_mk][$id_cpmk])) {
                $mk_cpmk_sub_cpmk_map[$id_mk][$id_cpmk] = [];
            }
            $mk_cpmk_sub_cpmk_map[$id_mk][$id_cpmk][] = $id_sub_cpmk;

            if (!isset($mk_cpmk_only_map[$id_mk])) {
                $mk_cpmk_only_map[$id_mk] = [];
            }
            if (!in_array($id_cpmk, $mk_cpmk_only_map[$id_mk])) {
                $mk_cpmk_only_map[$id_mk][] = $id_cpmk;
            }
        }

        $mk_cpmk_cpl_raw = MK_CPMK_CPL_MapModel::all();
        $mk_cpmk_cpl_map = [];
        $mk_cpmk_only_map = [];

        foreach ($mk_cpmk_cpl_raw as $relasi) {
            $id_mk   = (int) $relasi->id_mk;
            $id_cpmk = (int) $relasi->id_cpmk;
            $id_cpl  = (int) $relasi->id_cpl;

            // Mapping: MK → CPL → [CPMK]
            if (!isset($mk_cpmk_cpl_map[$id_mk])) {
                $mk_cpmk_cpl_map[$id_mk] = [];
            }
            if (!isset($mk_cpmk_cpl_map[$id_mk][$id_cpl])) {
                $mk_cpmk_cpl_map[$id_mk][$id_cpl] = [];
            }
            if (!in_array($id_cpmk, $mk_cpmk_cpl_map[$id_mk][$id_cpl])) {
                $mk_cpmk_cpl_map[$id_mk][$id_cpl][] = $id_cpmk;
            }

            // Mapping tambahan: MK → [CPMK] (tanpa CPL)
            if (!isset($mk_cpmk_only_map[$id_mk])) {
                $mk_cpmk_only_map[$id_mk] = [];
            }
            if (!in_array($id_cpmk, $mk_cpmk_only_map[$id_mk])) {
                $mk_cpmk_only_map[$id_mk][] = $id_cpmk;
            }
        }

        if($userRole == 'pimpinan' || $userRole == 'upm'){
            return view('pimpinanUpm.cpmkAll');
        }
        else {
            return view('cpmk', [
                'mata_kuliah' => $mata_kuliah,
                'cpmk' => $cpmk, 
                'sub_cpmk' => $subCpmk,
                'mk_cpmk_sub_cpmk_map'=>$mk_cpmk_sub_cpmk_map,
                'cpmk_cpl_map' => $cpmk_cpl_map,
                'cpl'=>$cpl,
                'mk_cpmk_only_map' => $mk_cpmk_only_map,
                'mk_cpmk_cpl_map'=>$mk_cpmk_cpl_map,
                'cpmkAll'=>$cpmkAll,
            ]);
        }
    }

    public function create()
    {
        $mata_kuliah = MataKuliahModel::all();
        return view('form.CPMK.cpmkFormAdd', ['mata_kuliah' => $mata_kuliah]);
    }

    public function store(StoreCPMKRequest $request)
    {
        CPMKModel::create($request->validated());
        return to_route('cpmk.index')->with('success', 'Berhasil menambahkan CPMK!');
    }

    public function show($id_mk)
    {
        $mata_kuliah = MataKuliahModel::with('cpmk.subCpmk')->findOrFail($id_mk);
        return view('cpmk', ['mata_kuliah' => $mata_kuliah]);
    }

    public function editAll()
    {
        $mata_kuliah = MataKuliahModel::all();
        $cpmk = CPMKModel::orderBy('nama_kode_cpmk')->get();

        return view('form.CPMK.cpmkFormEdit', ['cpmk' => $cpmk, 'mata_kuliah' => $mata_kuliah]);
    }

    public function updateAll(UpdateAllCPMKRequest $request)
    {
        if ($request->has('delete_ids')) {
            CPMKModel::destroy($request->delete_ids);
        }

        if (!$request->has('cpmk')) {
            return to_route('cpmk.index')->with('success', 'CPMK berhasil disimpan!');
        }

        $validatedData = $request->validated()['cpmk'];

        foreach ($validatedData as $id_cpmk => $data) {
            $cpmk = CPMKModel::find($id_cpmk);
            if ($cpmk) {
                $cpmk->update($data);
            }
        }

        return to_route('cpmk.index')->with('success', 'CPMK berhasil diperbarui!');
    }
}
