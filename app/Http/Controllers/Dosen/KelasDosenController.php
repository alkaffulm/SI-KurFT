<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\MataKuliahModel;
use App\Models\KurikulumModel;
use App\Models\TahunAkademik;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasDosenController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
        view()->share('idUser', Auth::id());
    }

    public function index()
    {
        $idUser = Auth::id();

        $kelas = Kelas::where('kelas.id_user', $idUser)
            ->join('tahun_akademik', 'kelas.id_tahun_akademik', '=', 'tahun_akademik.id_tahun_akademik')
            ->join('kurikulum', 'kelas.id_kurikulum', '=', 'kurikulum.id_kurikulum')
            ->join('mata_kuliah', 'kelas.id_mk', '=', 'mata_kuliah.id_mk')
            ->select(
                'kelas.*',
                'tahun_akademik.tahun_akademik',
                'kurikulum.tahun as tahun_kurikulum',
                'mata_kuliah.kode_mk',
                'mata_kuliah.nama_matkul_id'
            )
            ->get();

        return view('dosen.kelas.kelas_matakuliah', compact('kelas'));
    }
    public function lihatKelas($id)
    {
        $kelas = Kelas::with('mahasiswa')->findOrFail($id);

        return view('dosen.kelas.daftar_mahasiswa', [
            'kelas' => $kelas
        ]);
    }
    public function nilaiKelas($id)
    {
        $kelas = Kelas::with('mahasiswa')->findOrFail($id);
        $idMk = $kelas->id_mk;
        $cpmks = \App\Models\CPMKModel::whereIn('id_cpmk', function($q) use ($idMk) {
            $q->select('id_cpmk')
            ->from('mk_cpmk_cpl_map')
            ->where('id_mk', $idMk);
        })->get();
        $asesmen = \App\Models\RencanaAsesmenModel::where('id_mk', $idMk)->get();
        $bobot = \App\Models\RencanaAsesmenCPMKBobotModel::whereIn('id_rencana_asesmen', $asesmen->pluck('id_rencana_asesmen'))
            ->get();

        return view('dosen.kelas.penilaian_mahasiswa_kelas', [
            'kelas' => $kelas,
            'cpmk' => $cpmks,
            'rencanaAsesmen' => $asesmen,
            'bobot' => $bobot,
        ]);
    }


}

