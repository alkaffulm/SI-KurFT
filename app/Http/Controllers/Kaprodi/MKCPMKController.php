<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\CPMKModel;
use App\Models\MataKuliahModel;
use Illuminate\Http\Request;

class MKCPMKController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editMKCPMK()
    {
        $mata_kuliah = MataKuliahModel::with('cpmks')->orderBy('kode_mk')->get();
        $cpmk = CPMKModel::orderBy('nama_kode_cpmk')->get();

        return view('mapping.mk-cpmk', ['mata_kuliah' => $mata_kuliah, 'cpmk' => $cpmk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMKCPMK(Request $request)
    {
        dd($request);
        foreach ($request->cpmk_map as $id_mk => $cpmk_ids) {
            $matKul = MataKuliahModel::find($id_mk);
            if ($matKul) {
                $matKul->cpmks()->sync($cpmk_ids ?? []);
            }
        }

        return to_route('cpmk.index')->with('success', 'Pemetaan CPMK-MK berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
