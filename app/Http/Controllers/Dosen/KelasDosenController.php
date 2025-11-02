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
    public function nilaiKelas($id)
    {
        $kelas = Kelas::with('mahasiswa')->findOrFail($id);
        $penilaianMahasiswa = PenilaianMahasiswa::all();
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
            'penilaianMahasiswa' => $penilaianMahasiswa,            
        ]);
    }

    public function simpanNilai(Request $request, $idKelas)
    {
        foreach ($request->nilai as $idMhs => $asesmenCpmkData) {
            foreach ($asesmenCpmkData as $idRencana => $cpmkData) {
                foreach ($cpmkData as $idCpmk => $nilai) {
                    PenilaianMahasiswa::updateOrCreate(
                        [
                            'id_kelas' => $idKelas,
                            'id_mhs' => $idMhs,
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

        foreach ($request->nilai as $idMhs => $asesmenCpmkData) {
            foreach ($bobotList->groupBy('id_cpmk') as $idCpmk => $list) {
                $totalBobot = $list->sum('bobot');
                $totalNilai = 0;

                foreach ($list as $b) {
                    $nilai = PenilaianMahasiswa::where([
                        'id_kelas' => $idKelas,
                        'id_mhs' => $idMhs,
                        'id_rencana_asesmen' => $b->id_rencana_asesmen,
                        'id_cpmk' => $idCpmk,
                    ])->value('nilai') ?? 0;

                    $totalNilai += $nilai * $b->bobot;
                }

                $rata = $totalBobot ? $totalNilai / $totalBobot : null;

                PenilaianMahasiswaCPMK::updateOrCreate(
                    [
                        'id_kelas' => $idKelas,
                        'id_mhs' => $idMhs,
                        'id_cpmk' => $idCpmk,
                    ],
                    ['nilai_rata' => $rata]
                );
            }
        }

        return back()->with('success', 'Nilai berhasil disimpan dan dihitung!');
    }


}

