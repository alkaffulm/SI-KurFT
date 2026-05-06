<?php

namespace App\Http\Controllers\Kaprodi;

use App\Models\CPMKModel;
use App\Models\SubCPMKModel;
use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreSubCPMKRequest;
use App\Http\Requests\UpdateAll\UpdateAllSubCPMKRequest;

class SubCpmkController extends Controller
{
    public function index()
    {
        $sub_cpmk = SubCPMKModel::all();
        return view('subCpmk', ['sub_cpmk' => $sub_cpmk] );
    }

    public function create()
    {
        $cpmk = CPMKModel::all();
        return view('form.subCPMK.subCpmkFormAdd', ['cpmk' => $cpmk]);
    }

    public function store(StoreSubCPMKRequest $request)
    {
        SubCPMKModel::create($request->validated());
        return to_route('cpmk.index')->with('success', 'Berhasil menambahkan Sub CPMK!');
    }

    public function editAll()
    {
        $cpmk = CPMKModel::all();
        $sub_cpmk = SubCPMKModel::orderBy('nama_kode_sub_cpmk')->get();
        return view('form.subCPMK.subCpmkFormEdit', ['cpmk' => $cpmk, 'sub_cpmk' => $sub_cpmk]);
    }

    public function updateAll(UpdateAllSubCPMKRequest $request)
    {
        if( $request->has('delete_ids')) {
            SubCPMKModel::destroy($request->delete_ids);
        }

        if(!$request->has('subCpmk')) {
            return to_route('cpmk.index')->with('Sub CPMK berhasil disimpan');
        }

        $validatedData = $request->validated()['subCpmk'];

        foreach ($validatedData as $id_sub_cpmk => $data) {
            $subCpmk = SubCPMKModel::find($id_sub_cpmk);
            if($subCpmk) {
                $subCpmk->update($data);
            }
        }

        return to_route('cpmk.index')->with('success', 'Sub CPMK berhasil diperbarui!');
    }
}
