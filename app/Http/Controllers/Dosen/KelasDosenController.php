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
use App\Models\RencanaAsesmenModel;

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

        $rencanaAsesmen = \App\Models\RencanaAsesmenModel::where('id_mk', $idMk)->get();

        $bobot = \App\Models\RencanaAsesmenCPMKBobotModel::with('mkCpmkMap')
            ->whereIn('id_rencana_asesmen', $rencanaAsesmen->pluck('id_rencana_asesmen'))
            ->get();

        $penilaianMahasiswa = PenilaianMahasiswa::where('id_kelas', $id)->get();

        return view('dosen.kelas.penilaian_mahasiswa_kelas', [
            'kelas' => $kelas,
            'rencanaAsesmen' => $rencanaAsesmen,
            'bobot' => $bobot,
            'penilaianMahasiswa' => $penilaianMahasiswa,
        ]);
    }


    public function simpanNilai(Request $request, $idKelas)
    {
        $kelas = Kelas::findOrFail($idKelas);
        $rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $kelas->id_mk)->get();

        $mkCpmkMap = RencanaAsesmenCPMKBobotModel::with('mkCpmkMap')
            ->whereIn('id_rencana_asesmen', $rencanaAsesmen->pluck('id_rencana_asesmen'))
            ->get()
            ->groupBy('id_rencana_asesmen');

            foreach ($request->nilai as $nim => $asesmenData) {
                foreach ($asesmenData as $idRencana => $nilaiArray) {
                    foreach ($nilaiArray as $idCpmk => $nilai) {
                        PenilaianMahasiswa::updateOrCreate(
                            [
                                'id_kelas' => $idKelas,
                                'nim' => $nim,
                                'id_rencana_asesmen' => $idRencana,
                                'id_cpmk' => $idCpmk,
                            ],
                            ['nilai' => $nilai]
                        );
                    }
                }
            }



        return back()->with('success', 'Nilai berhasil disimpan!');
    }


    public function capaian_ratarata($id)
    {
        $nilaiTarget = 100;

        $kelas = Kelas::with('mahasiswa')->findOrFail($id);
        $idMk = $kelas->id_mk;

        $rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $idMk)->get();

        $rencanaAsesmenCPMK = RencanaAsesmenCPMKBobotModel::with('mkCpmkMap.cpmk')
            ->whereIn('id_rencana_asesmen', $rencanaAsesmen->pluck('id_rencana_asesmen'))
            ->get();

        $penilaianMahasiswa = PenilaianMahasiswa::where('id_kelas', $id)->get();

        $nilaiIndex = [];
        foreach ($penilaianMahasiswa as $p) {
            $nilaiIndex[$p->nim][$p->id_rencana_asesmen][$p->id_cpmk] = $p->nilai;
        }

        $cpmkByAsesmen = $rencanaAsesmenCPMK->groupBy('id_rencana_asesmen');

        $chartLabels = [];
        $chartData = [];

        $nilaiPerNim = $penilaianMahasiswa->groupBy('nim');

        foreach ($kelas->mahasiswa as $mhs) {
            $chartLabels[] = $mhs->nim;

            $nilaiList = ($nilaiPerNim[$mhs->nim] ?? collect())
                ->pluck('nilai')
                ->filter(fn($v) => $v !== null && $v !== '')
                ->map(fn($v) => (float) $v)
                ->values()
                ->all();

            $rataMahasiswa = count($nilaiList) ? array_sum($nilaiList) / count($nilaiList) : 0;
            $chartData[] = round($rataMahasiswa, 2);
        }

        $rataRataKelas = count($chartData) ? round(array_sum($chartData) / count($chartData), 2) : 0;
        $chartRataRataKelas = array_fill(0, count($chartData), $rataRataKelas);

        return view('dosen.kelas.capaian_ratarata', [
            'kelas' => $kelas,
            'rencanaAsesmen' => $rencanaAsesmen,
            'rencanaAsesmenCPMK' => $rencanaAsesmenCPMK,
            'cpmkByAsesmen' => $cpmkByAsesmen,
            'penilaianMahasiswa' => $penilaianMahasiswa,
            'nilaiIndex' => $nilaiIndex,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
            'chartRataRataKelas' => $chartRataRataKelas,
            'nilaiTarget' => $nilaiTarget,
        ]);
    }





}

