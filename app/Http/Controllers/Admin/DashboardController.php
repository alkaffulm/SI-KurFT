<?php

namespace App\Http\Controllers;

use App\Models\MataKuliahModel;
use App\Models\VisiKeilmuanModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $tanggungJawabDosen = MataKuliahModel::tanggungJawabDosen(Auth::id())->get();
        $visi = VisiKeilmuanModel::all();
        
        return view('dashboard', ['visi' => $visi, 'tanggungJawabDosen' => $tanggungJawabDosen]);
    }
}