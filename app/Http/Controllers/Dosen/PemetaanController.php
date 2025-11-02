<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\MataKuliahModel;
use App\Models\KurikulumModel;
use App\Models\TahunAkademik;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\PenilaianMahasiswaCPMKModel;
use App\Models\PenilaianMahasiswaModel;
use App\Models\RencanaAsesmenCPMKBobotModel;
use App\Models\PenilaianMahasiswa;
use App\Models\PenilaianMahasiswaCPMK;

class PemetaanController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
        view()->share('idUser', Auth::id());
    }

    public function index()
    {
        return view('dosen.pemetaan.daftar_mahasiswa');
    }
    // public function lihatKelas($id)
    // {
    //     return view('dosen.kelas.kelas_matakuliah', compact('kelas'));
    // }
    // public function nilaiKelas($id)
    // {
    //     return view('dosen.kelas.kelas_matakuliah', compact('kelas'));
    // }

    // public function simpanNilai(Request $request, $idKelas)
    // {
    //     return view('dosen.kelas.kelas_matakuliah', compact('kelas'));
    // }
}

