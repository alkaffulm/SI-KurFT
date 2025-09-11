<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluasiMahasiswaController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
    }

    public function index()
    {
        return view('dosen.evaluasimahasiswa');
    }
}
