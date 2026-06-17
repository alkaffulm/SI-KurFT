<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KurikulumModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KurikulumControllerAdmin extends Controller
{
    public function index()
    {
        $kurikulum = KurikulumModel::paginate(10);

        $userRole = Auth::user()?->role;

        return view(
            'Admin.Kurikulum.master_kurikulum',
            compact('kurikulum', 'userRole')
        );
    }

    public function create()
    {
        return view('Admin.form.Kurikulum.formAdd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|digits:4|integer|min:2000|max:2100'
        ]);

        $idPs = session('userRoleId');

        $exists = KurikulumModel::where('id_ps', $idPs)
            ->where('tahun', $request->tahun)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'tahun' => 'Tahun kurikulum tersebut sudah terdaftar.'
                ]);
        }

        KurikulumModel::create([
            'id_ps' => $idPs,
            'tahun' => $request->tahun
        ]);

        return redirect()
            ->route('kurikulum.index')
            ->with('success', 'Kurikulum berhasil ditambahkan');
    }


    public function destroy($id)
    {
        $kurikulum = KurikulumModel::findOrFail($id);

        $kurikulum->delete();

        return redirect()
            ->route('kurikulum.index')
            ->with('success', 'Kurikulum berhasil dihapus');
    }

    public function editAll()
    {
        $kurikulum = KurikulumModel::all();

        // dd($kurikulum);

        return view(
            'Admin.form.Kurikulum.formEdit',
            compact('kurikulum')
        );
    }
    public function updateAll(Request $request)
    {
        if ($request->has('kurikulum')) {

            foreach ($request->kurikulum as $id => $data) {

                KurikulumModel::where('id_kurikulum', $id)
                    ->update([
                        'tahun' => $data['tahun']
                    ]);
            }
        }

        if ($request->has('delete_kurikulum')) {

            KurikulumModel::whereIn(
                'id_kurikulum',
                $request->delete_kurikulum
            )->delete();
        }

        return redirect()
            ->route('kurikulum.index')
            ->with('success', 'Data kurikulum berhasil diperbarui');
    }
}