<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use App\Models\VisiKeilmuanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userRole = $request->session()->get('userRole', 'dosen');
        $tanggungJawabDosen = MataKuliahModel::tanggungJawabDosen(Auth::id())->get();
        $visi = VisiKeilmuanModel::all();
        
        return view('dashboard', ['userRole' => $userRole, 'visi' => $visi, 'tanggungJawabDosen' => $tanggungJawabDosen]);
    }
}