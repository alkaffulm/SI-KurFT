<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKurikulumRequest;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index(Request $request)
    {
        $kurikulum = KurikulumModel::all();
        $userRole = $request->session()->get('userRole', 'dosen');
        $programStudi = ProgramStudiModel::all();

        return view('kurikulum', [
            'kurikulum' => $kurikulum,
            'userRole' => $userRole,
            'programStudi' => $programStudi
        ]);
    }

    public function create(Request $request)
    {
        $userRole = $request->session()->get('userRole', 'dosen');
        $programStudi = ProgramStudiModel::all();

        return view('form.Kurikulum.kurikulumAdd', [
            'userRole' => $userRole,
            'programStudi' => $programStudi
        ]);
    }

    public function store(StoreKurikulumRequest $request)
    {
        KurikulumModel::create($request->validated());

        return redirect('kurikulum')->with('success', "Kurikulum berhasil ditambahkan!");
    }

    public function edit(KurikulumModel $kurikulum, Request $request)
    {
        $programStudi = ProgramStudiModel::all();
        $userRole = $request->session()->get('userRole', 'dosen');

        return view('form.Kurikulum.kurikulumEdit', [
            'kurikulum' => $kurikulum,
            'programStudi' => $programStudi,
            'userRole' => $request->session()->get('userRole', 'dosen'),
        ]);
    }

    public function update(StoreKurikulumRequest $request, KurikulumModel $kurikulum)
    {
        $kurikulum->update($request->validated());

        return redirect('kurikulum')->with('success', "Kurikulum berhasil diperbarui!");
    }

    public function destroy(KurikulumModel $kurikulum)
    {
        $kurikulum->delete();

        return redirect('kurikulum')->with("success", 'Kurikulum berhasil dihapus!');
    }
}
