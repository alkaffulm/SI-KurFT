<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RencanaAsesmenController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
    }

    public function index()
    {
        return view('dosen.rencanaasesmen');
    }

    public function create()
    {
        return view('dosen.form.rencana-assesment.RAForm');
    }
}

