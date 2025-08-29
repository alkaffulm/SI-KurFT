<?php

namespace App\Http\Controllers\kaprodi;

use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreCPMKRequest;
use App\Http\Requests\UpdateAll\UpdateAllCPMKRequest;
use App\Models\CPMKModel;
use App\Models\CPLModel;
use App\Models\MataKuliahCPMKMapModel;
use App\Models\MataKuliahModel;
use App\Models\MKCPMKSubCPMKMapModel;
use App\Models\SubCPMKModel;
use App\Models\CPMKCPLMapModel;
use App\Models\BahanKajianModel;
use App\Models\BKMKMapModel;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $cpmk = CPMKModel::orderBy('nama_kode_cpmk')->paginate(5);
        $mata_kuliah = MataKuliahModel::with('cpmks')->orderBy('kode_mk')->get();

        $subCpmk = SubCPMKModel::with('cpmk')->orderBy('nama_kode_sub_cpmk')->paginate(5);

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

        $bahan_kajian = BahanKajianModel::all();
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

        $bk_mk_raw = BKMKMapModel::all();
        $bk_mk_map = [];
        foreach ($bk_mk_raw as $relasi) {
            $id_mk = (int) $relasi->id_mk;
            $id_bk = (int) $relasi->id_bk;

            if (!isset($bk_mk_map[$id_mk])) {
                $bk_mk_map[$id_mk] = [];
            }
            if (!in_array($id_bk, $bk_mk_map[$id_mk])) { // Mencegah duplikasi id_bk
                $bk_mk_map[$id_mk][] = $id_bk;
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


        return view('admin', [
            'mata_kuliah' => $mata_kuliah,
            'cpmk' => $cpmk, 
            'bahan_kajian'=>$bahan_kajian,
            'sub_cpmk' => $subCpmk,
            'mk_cpmk_sub_cpmk_map'=>$mk_cpmk_sub_cpmk_map,
            'cpmk_cpl_map' => $cpmk_cpl_map,
            'cpl'=>$cpl,
            'bk_mk_map'=>$bk_mk_map,
            'mk_cpmk_only_map' => $mk_cpmk_only_map,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_kuliah = MataKuliahModel::all();
        return view('form.CPMK.cpmkFormAdd', ['mata_kuliah' => $mata_kuliah]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCPMKRequest $request)
    {
        // dd($request->validated());
        CPMKModel::create($request->validated());

        return to_route('cpmk.index')->with('success', 'Berhasil menambahkan CPMK!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_mk)
    {
        $mata_kuliah = MataKuliahModel::with('cpmk.subCpmk')->findOrFail($id_mk);

        return view('cpmk', ['mata_kuliah' => $mata_kuliah]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editAll()
    {
        $mata_kuliah = MataKuliahModel::all();
        $cpmk = CPMKModel::orderBy('nama_kode_cpmk')->get();

        return view('form.CPMK.cpmkFormEdit', ['cpmk' => $cpmk, 'mata_kuliah' => $mata_kuliah]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CPMKModel $cpmk) 
    {
        $cpmk->delete();

        return to_route('cpmk.index')->with('success', 'Berhasil menghapus CPMK!');
    }
}
