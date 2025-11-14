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
    // public function nilaiKelas($id)
    // {
    //     $kelas = Kelas::with('mahasiswa')->findOrFail($id);
    //     $penilaianMahasiswa = PenilaianMahasiswa::where('id_kelas', $id)->get();
    //     $idMk = $kelas->id_mk;
    //     $cpmks = \App\Models\CPMKModel::whereIn('id_cpmk', function($q) use ($idMk) {
    //         $q->select('id_cpmk')
    //         ->from('mk_cpmk_cpl_map')
    //         ->where('id_mk', $idMk);
    //     })->get();

    //     $asesmen = \App\Models\RencanaAsesmenModel::where('id_mk', $idMk)->get();
    //     $bobot = \App\Models\RencanaAsesmenCPMKBobotModel::whereIn('id_rencana_asesmen', $asesmen->pluck('id_rencana_asesmen'))
    //         ->get();

    //     return view('dosen.kelas.penilaian_mahasiswa_kelas', [
    //         'kelas' => $kelas,
    //         'cpmk' => $cpmks,
    //         'rencanaAsesmen' => $asesmen,
    //         'bobot' => $bobot,
    //         'penilaianMahasiswa' => $penilaianMahasiswa,            
    //     ]);
    // }

    public function nilaiKelas($id)
    {
        $kelas = Kelas::with('mahasiswa')->findOrFail($id);
        $idMk = $kelas->id_mk;

        $rencanaAsesmen = \App\Models\RencanaAsesmenModel::where('id_mk', $idMk)->get();

        $bobot = \App\Models\RencanaAsesmenCPMKBobotModel::with('cpmk')
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
        foreach ($request->nilai as $nim => $asesmenCpmkData) {
            foreach ($asesmenCpmkData as $idRencana => $cpmkData) {
                foreach ($cpmkData as $idCpmk => $nilai) {
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

        // Opsional: Hitung nilai rata-rata CPMK per mahasiswa
        $bobotList = RencanaAsesmenCPMKBobotModel::all();

        foreach ($request->nilai as $nim => $asesmenCpmkData) {
            foreach ($bobotList->groupBy('id_cpmk') as $idCpmk => $list) {
                $totalBobot = $list->sum('bobot');
                $totalNilai = 0;

                foreach ($list as $b) {
                    $nilai = PenilaianMahasiswa::where([
                        'id_kelas' => $idKelas,
                        'nim' => $nim,
                        'id_rencana_asesmen' => $b->id_rencana_asesmen,
                        'id_cpmk' => $idCpmk,
                    ])->value('nilai') ?? 0;

                    $totalNilai += $nilai * $b->bobot;
                }

                $rata = $totalBobot ? $totalNilai / $totalBobot : null;

                PenilaianMahasiswaCPMK::updateOrCreate(
                    [
                        'id_kelas' => $idKelas,
                        'nim' => $nim,
                        'id_cpmk' => $idCpmk,
                    ],
                    ['nilai_rata' => $rata]
                );
            }
        }



        return back()->with('success', 'Nilai berhasil disimpan dan dihitung!');
    }

    public function capaian_ratarata($id)
    {
        $chartLabels = [];
        $chartData = [];
        $nilaiTarget = 100;
        $kelas = Kelas::with('mahasiswa')->findOrFail($id);
        $idMk = $kelas->id_mk;

        $rencanaAsesmen = \App\Models\RencanaAsesmenModel::where('id_mk', $idMk)->get();
        $rencanaAsesmenCPMK = \App\Models\RencanaAsesmenCPMKBobotModel::whereIn(
            'id_rencana_asesmen', $rencanaAsesmen->pluck('id_rencana_asesmen')
        )->get();

        $penilaian_mahasiswa = \App\Models\PenilaianMahasiswa::where('id_kelas', $id)->get();
        $penilaian_mahasiswa_cpmk = \App\Models\PenilaianMahasiswaCPMK::where('id_kelas', $id)->get();

        // hitung nilai rata-rata per mahasiswa
        foreach($kelas->mahasiswa as $mhs) {
            $chartLabels[] = $mhs->nim;

            $nilaiMahasiswa = $penilaian_mahasiswa_cpmk
                ->where('nim', $mhs->nim)
                ->pluck('nilai_rata')
                ->filter()
                ->all();

            $rataMahasiswa = count($nilaiMahasiswa) ? array_sum($nilaiMahasiswa) / count($nilaiMahasiswa) : 0;
            $chartData[] = round($rataMahasiswa, 2);
        }

        // hitung rata-rata kelas (sama untuk semua mahasiswa)
        $rataRataKelas = count($chartData) ? round(array_sum($chartData)/count($chartData), 2) : 0;
        $chartRataRataKelas = array_fill(0, count($chartData), $rataRataKelas);

        return view('dosen.kelas.capaian_ratarata', [
            'kelas' => $kelas,
            'rencanaAsesmen' => $rencanaAsesmen,
            'rencanaAsesmenCPMK' => $rencanaAsesmenCPMK,
            'penilaian_mahasiswa' => $penilaian_mahasiswa,
            'penilaian_mahasiswa_cpmk' => $penilaian_mahasiswa_cpmk,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
            'chartRataRataKelas' => $chartRataRataKelas,
            'nilaiTarget' => $nilaiTarget
        ]);
    }



}

