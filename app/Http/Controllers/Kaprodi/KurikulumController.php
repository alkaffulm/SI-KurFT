<?php

namespace App\Http\Controllers\kaprodi;

use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreKurikulumRequest;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function __construct()
    {
        $userRole = session()->get('userRole');

        return view()->share('userRole', $userRole);
    }

    public function index(Request $request)
    {
        $kurikulum = KurikulumModel::all();
        $programStudi = ProgramStudiModel::all();

        return view('kurikulum', [
            'kurikulum' => $kurikulum,
            'programStudi' => $programStudi
        ]);
    }

    public function create(Request $request)
    {
        $programStudi = ProgramStudiModel::all();

        return view('form.Kurikulum.kurikulumAdd', [
            'programStudi' => $programStudi
        ]);
    }

    public function store(StoreKurikulumRequest $request)
    {
        KurikulumModel::create($request->validated());

        return to_route('kurikulum.index')->with('success', "Kurikulum berhasil ditambahkan!");
    }

    public function edit(KurikulumModel $kurikulum, Request $request)
    {
        $programStudi = ProgramStudiModel::all();

        return view('form.Kurikulum.kurikulumEdit', [
            'kurikulum' => $kurikulum,
            'programStudi' => $programStudi,
        ]);
    }

    public function update(StoreKurikulumRequest $request, KurikulumModel $kurikulum)
    {
        $kurikulum->update($request->validated());

        return to_route('kurikulum.index')->with('success', "Kurikulum berhasil diperbarui!");
    }

    public function destroy(KurikulumModel $kurikulum)
    {
        $kurikulum->delete();

        return to_route('kurikulum.index')->with("success", 'Kurikulum berhasil dihapus!');
    }
}
