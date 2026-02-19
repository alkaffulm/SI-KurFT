<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use App\Models\EvaluasiUpmModel;
use App\Models\VisiKeilmuanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EvaluasiUpmController extends Controller
{
    public function index()
    {
        $userRole = session()->get('userRole', 'dosen');
        $userRoleId = session()->get('userRoleId', 0);

        $evaluasiUpm = EvaluasiUpmModel::where('id_ps', $userRoleId)->paginate(10);
        
        if($userRole == 'upm')
            return view('pimpinanUpm.EvaluasiUpmAll', ['userRole' => $userRole]);
        else
            return view('evaluasiupm', ['userRole' => $userRole, 'evaluasiUpm' => $evaluasiUpm]);
    }
}