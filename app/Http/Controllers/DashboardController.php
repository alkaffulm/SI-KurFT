<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userRole = $request->session()->get('userRole', 'dosen');
        return view('dashboard', ['userRole' => $userRole]);
    }
}