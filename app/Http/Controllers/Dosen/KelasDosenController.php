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
use App\Models\UserModel;
use App\Models\Scopes\ProdiScope;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenilaianTemplateExport;
use App\Imports\PenilaianImport;


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

        $searchKelas = request('search_kelas');

        $kelas = Kelas::where('kelas.id_user', $idUser)
            ->join('tahun_akademik', 'kelas.id_tahun_akademik', '=', 'tahun_akademik.id_tahun_akademik')
            ->join('kurikulum', 'kelas.id_kurikulum', '=', 'kurikulum.id_kurikulum')
            ->join('mata_kuliah', 'kelas.id_mk', '=', 'mata_kuliah.id_mk')
            ->join('program_studi', 'kurikulum.id_ps', '=', 'program_studi.id_ps')
            ->select(
                'kelas.*',
                'tahun_akademik.tahun_akademik',
                'kurikulum.tahun as tahun_kurikulum',
                'mata_kuliah.kode_mk',
                'mata_kuliah.nama_matkul_id',
                'program_studi.nama_prodi'
            )
            ->when($searchKelas, function ($query, $searchKelas) {
                $query->where('mata_kuliah.nama_matkul_id', 'like', '%' . $searchKelas . '%');
            })
            ->paginate(5);

        return view('dosen.kelas.kelas_matakuliah', compact('kelas'));
    }
    public function downloadTemplateExcel($id)
    {
        return Excel::download(
            new PenilaianTemplateExport($id),
            'template_penilaian.xlsx'
        );
    }

    public function uploadTemplateExcel(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {

            Excel::import(
                new PenilaianImport($id),
                $request->file('file')
            );

            return back()->with(
                'success',
                'Import nilai Excel berhasil dilakukan.'
            );

        } catch (\Throwable $e) {

            return back()->with(
                'error',
                'Import Excel gagal: ' . $e->getMessage()
            );
        }
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
        session([
            'bypass_prodi_scope' => true,
            'bypass_kurikulum_scope' => true
        ]);

        $kelas = Kelas::with('mahasiswa','mataKuliahModel')->findOrFail($id);
        $mahasiswa = $kelas->mahasiswa()->paginate(10);
        
        session()->forget([
            'bypass_prodi_scope',
            'bypass_kurikulum_scope'
        ]);

        $idMk = $kelas->id_mk;

        $rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $idMk)
            ->orderByRaw("
                CASE 
                    WHEN tipe_komponen = 'tugas' THEN 1
                    WHEN tipe_komponen = 'uts'   THEN 2
                    WHEN tipe_komponen = 'uas'   THEN 3
                    ELSE 4
                END
            ")
            ->orderBy('nomor_komponen')
            ->get();

        $bobot = \App\Models\RencanaAsesmenCPMKBobotModel::with('mkCpmkMap')
            ->whereIn('id_rencana_asesmen', $rencanaAsesmen->pluck('id_rencana_asesmen'))
            ->get();

        $penilaianMahasiswa = PenilaianMahasiswa::where('id_kelas', $id)->get();

        return view('dosen.kelas.penilaian_mahasiswa_kelas', [
            'kelas' => $kelas,
            'mahasiswa' => $mahasiswa,
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
        $biodata = Kelas::with([
                'mataKuliahModel.programStudi',
                'userModel',
            ])
            ->where('kelas.id_kelas', $id)
            ->join('tahun_akademik', 'kelas.id_tahun_akademik', '=', 'tahun_akademik.id_tahun_akademik')
            ->join('kurikulum', 'kelas.id_kurikulum', '=', 'kurikulum.id_kurikulum')
            ->select(
                'kelas.*',
                'tahun_akademik.tahun_akademik as tahun_akademik',
                'kurikulum.tahun as tahun_kurikulum'
            )
            ->firstOrFail();

        $kelas = Kelas::with('mahasiswa')->findOrFail($id);
        $idMk = $kelas->id_mk;

        $rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $idMk)->get();
        $rencanaAsesmenGrouped = $rencanaAsesmen->groupBy('tipe_komponen');

        $rencanaAsesmenCPMK = RencanaAsesmenCPMKBobotModel::with('mkCpmkMap.cpmk')
            ->whereIn('id_rencana_asesmen', $rencanaAsesmen->pluck('id_rencana_asesmen'))
            ->get();

        $cpmkByAsesmen = $rencanaAsesmenCPMK->groupBy('id_rencana_asesmen');

        $totalBobotPerAsesmen = [];
        foreach ($cpmkByAsesmen as $idRA => $rows) {
            $totalBobotPerAsesmen[$idRA] = (float) $rows->sum('bobot');
        }

        $penilaianMahasiswa = PenilaianMahasiswa::where('id_kelas', $id)->get();

        $nilaiIndex = [];
        $nilaiBobotIndex = [];
        foreach ($penilaianMahasiswa as $p) {
            $nilaiIndex[$p->nim][$p->id_rencana_asesmen][$p->id_cpmk] = $p->nilai;

            $totalBobot = $totalBobotPerAsesmen[$p->id_rencana_asesmen] ?? 0;
            $factor = $totalBobot > 0 ? ($totalBobot / 100) : 0;

            $nilaiBobotIndex[$p->nim][$p->id_rencana_asesmen][$p->id_cpmk] =
                ($p->nilai === null || $p->nilai === '') ? null : round(((float) $p->nilai) * $factor, 2);
        }

        $daftarCpmk = \App\Models\MK_CPMK_CPL_MapModel::with('cpmk')
            ->where('id_mk', $idMk)
            ->get()
            ->pluck('cpmk')
            ->filter()
            ->unique('id_cpmk')
            ->sortBy('id_cpmk')
            ->values();

        $maxPerCpmk = [];
        foreach ($rencanaAsesmenCPMK as $row) {
            $idCpmk = $row->mkCpmkMap?->id_cpmk;
            if (!$idCpmk) continue;
            $maxPerCpmk[$idCpmk] = ($maxPerCpmk[$idCpmk] ?? 0) + (float) $row->bobot;
        }

        $nilaiBobotPerNimCpmk = [];
        foreach ($penilaianMahasiswa as $p) {
            $totalBobot = $totalBobotPerAsesmen[$p->id_rencana_asesmen] ?? 0;
            if ($totalBobot <= 0) continue;
            if ($p->nilai === null || $p->nilai === '') continue;

            $factor = $totalBobot / 100;
            $nilaiBobot = ((float) $p->nilai) * $factor;

            $nilaiBobotPerNimCpmk[$p->nim][$p->id_cpmk] =
                ($nilaiBobotPerNimCpmk[$p->nim][$p->id_cpmk] ?? 0) + $nilaiBobot;
        }

        $labels = [];
        $avgData = [];
        $maxData = [];

        foreach ($daftarCpmk as $cpmk) {
            $labels[] = $cpmk->nama_kode_cpmk ?? ('CPMK ' . $cpmk->id_cpmk);

            $sum = 0;
            $count = 0;

            foreach ($kelas->mahasiswa as $mhs) {
                $val = $nilaiBobotPerNimCpmk[$mhs->nim][$cpmk->id_cpmk] ?? null;
                if ($val === null) continue;
                $sum += (float) $val;
                $count++;
            }

            $avgData[] = $count ? round($sum / $count, 2) : 0;
            $maxData[] = $maxPerCpmk[$cpmk->id_cpmk] ?? 0;
        }

        return view('dosen.kelas.capaian_ratarata', [
            'kelas' => $kelas,
            'biodata' => $biodata,
            'rencanaAsesmen' => $rencanaAsesmen,
            'rencanaAsesmenCPMK' => $rencanaAsesmenCPMK,
            'cpmkByAsesmen' => $cpmkByAsesmen,
            'penilaianMahasiswa' => $penilaianMahasiswa,
            'nilaiIndex' => $nilaiIndex,
            'nilaiBobotIndex' => $nilaiBobotIndex,
            'labels' => $labels,
            'avgData' => $avgData,
            'maxData' => $maxData,
            'rencanaAsesmenGrouped' => $rencanaAsesmenGrouped,
        ]);

    }







}

