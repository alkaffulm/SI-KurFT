<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MataKuliahModel;
use App\Models\VisiKeilmuanModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $tanggungJawabDosen = MataKuliahModel::tanggungJawabDosen(Auth::id())->get();
        $visi = VisiKeilmuanModel::all();
        $userRoleId = session('userRoleId');
        $Kelas = Kelas::withoutGlobalScopes()
            ->join('mata_kuliah', 'kelas.id_mk', '=', 'mata_kuliah.id_mk')
            ->with(['mataKuliahModel' => function ($query) {
                $query->withoutGlobalScopes()->orderBy('semester', 'asc');
            }])
            ->where('kelas.id_user', Auth::id())
            ->select('kelas.*') 
            ->whereHas('mataKuliahModel', function ($query) use ($userRoleId) {
                $query->withoutGlobalScopes()->where('id_ps', '!=', $userRoleId);
            })
            ->orderBy('mata_kuliah.semester', 'asc')            
            ->get();

        return view('dashboard', [
            'visi' => $visi, 
            'tanggungJawabDosen' => $tanggungJawabDosen,
            'kelas' => $Kelas   
        ]);
    }
}