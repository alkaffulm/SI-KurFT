<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\PenilaianMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvaluasiMahasiswaController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
        view()->share('idUser', Auth::id());
    }

    public function lihatEvaluasi($id, \App\Services\EvaluasiCplPerKelasService $svc)
    {
        $kelas = Kelas::with(['mataKuliahModel.programStudi', 'userModel', 'mahasiswa'])
            ->findOrFail($id);

        if ((int) $kelas->id_user !== (int) Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke kelas ini.');
        }

        $threshold = 60.0;
        $result = $svc->evaluasiKelas((int) $kelas->id_kelas, (float) $threshold);

        $biodata = (object) [
            'mataKuliahModel'  => $kelas->mataKuliahModel,
            'userModel'        => $kelas->userModel,
            'jumlah_mhs'       => $kelas->mahasiswa?->count() ?? 0,
            'paralel_ke'       => $kelas->paralel_ke ?? null,
        ];

        $tidakLulus = $result['tidak_lulus'] ?? [];
        $nimTidakLulus = collect($tidakLulus)->pluck('nim')->values();

        // ===== Mapping detail: CPL - CPMK - Komponen - Bobot =====
        $mappingDetail = DB::table('rencana_asesmen_cpmk_bobot as racb')
            ->join('rencana_asesmen as ra', 'racb.id_rencana_asesmen', '=', 'ra.id_rencana_asesmen')
            ->join('mk_cpmk_cpl_map as mccm', 'racb.id_mk_cpmk_cpl', '=', 'mccm.id_mk_cpmk_cpl')
            ->join('cpl as c', 'mccm.id_cpl', '=', 'c.id_cpl')
            ->join('cpmk as cp', 'mccm.id_cpmk', '=', 'cp.id_cpmk')
            ->where('ra.id_mk', $kelas->id_mk)
            ->select(
                'mccm.id_cpl',
                'c.nama_kode_cpl as kode_cpl',
                'mccm.id_cpmk',
                'cp.nama_kode_cpmk as kode_cpmk',
                'ra.id_rencana_asesmen',
                'ra.tipe_komponen',
                'ra.nomor_komponen',
                'racb.bobot as bobot_komponen_ke_cpmk'
            )
            ->orderBy('c.nama_kode_cpl')
            ->orderBy('cp.nama_kode_cpmk')
            ->orderBy('ra.tipe_komponen')
            ->orderBy('ra.nomor_komponen')
            ->get();

        // ===== Total bobot per komponen (id_rencana_asesmen) =====
        $totalBobotKomponenMap = DB::table('rencana_asesmen_cpmk_bobot as racb')
            ->join('rencana_asesmen as ra', 'racb.id_rencana_asesmen', '=', 'ra.id_rencana_asesmen')
            ->where('ra.id_mk', $kelas->id_mk)
            ->select('racb.id_rencana_asesmen', DB::raw('SUM(racb.bobot) as total_bobot'))
            ->groupBy('racb.id_rencana_asesmen')
            ->pluck('total_bobot', 'id_rencana_asesmen')
            ->toArray();

        // ===== Nilai existing untuk nim tidak lulus =====
        $nilaiExisting = collect();
        if ($nimTidakLulus->isNotEmpty()) {
            $nilaiExisting = DB::table('penilaian_mahasiswa as pm')
                ->where('pm.id_kelas', $kelas->id_kelas)
                ->whereIn('pm.nim', $nimTidakLulus)
                ->select('pm.nim', 'pm.id_rencana_asesmen', 'pm.id_cpmk', 'pm.nilai')
                ->get();
        }

        $nilaiIndex = $nilaiExisting->groupBy(fn ($x) => $x->nim.'|'.$x->id_rencana_asesmen.'|'.$x->id_cpmk);

        $mhsMap = $kelas->mahasiswa->keyBy('nim');

        // ===== Build rows untuk tabel update =====
        $updateRows = [];
        foreach ($nimTidakLulus as $nim) {
            $mhs = $mhsMap[$nim] ?? null;
            if (!$mhs) continue;

            foreach ($mappingDetail as $md) {
                $totalBobotKomponen = (float) ($totalBobotKomponenMap[$md->id_rencana_asesmen] ?? 0);

                $namaKomponen = in_array($md->tipe_komponen, ['tugas', 'kuis'])
                    ? ucfirst($md->tipe_komponen).' '.$md->nomor_komponen
                    : strtoupper($md->tipe_komponen);

                $maksNilaiInput = $totalBobotKomponen > 0
                    ? round(((float)$md->bobot_komponen_ke_cpmk / $totalBobotKomponen) * 100, 1)
                    : 0.0;

                $key = $nim.'|'.$md->id_rencana_asesmen.'|'.$md->id_cpmk;
                $nilaiLama = optional($nilaiIndex->get($key)?->first())->nilai;
                $nilaiLama = $nilaiLama === null ? 0.0 : (float) $nilaiLama;

                // bobot tercapai mahasiswa pada komponen ini (dalam skala bobot CPMK)
                $bobotKomponenKeCpmk = (float) $md->bobot_komponen_ke_cpmk;
                $bobotTercapai = ($maksNilaiInput > 0)
                    ? round(($nilaiLama / $maksNilaiInput) * $bobotKomponenKeCpmk, 2)
                    : 0.0;

                $updateRows[] = [
                    'nim' => $nim,
                    'nama_lengkap' => $mhs->nama_lengkap ?? '-',

                    'id_cpl' => $md->id_cpl,
                    'kode_cpl' => $md->kode_cpl,

                    'id_cpmk' => $md->id_cpmk,
                    'kode_cpmk' => $md->kode_cpmk,

                    'id_rencana_asesmen' => $md->id_rencana_asesmen,
                    'nama_komponen' => $namaKomponen,

                    'bobot_mhs' => $bobotTercapai,
                    'bobot_total' => round($bobotKomponenKeCpmk, 2),

                    'nilai_lama' => round($nilaiLama, 1),
                    'maks_nilai_input' => $maksNilaiInput,
                ];
            }
        }

        return view('dosen.kelas.evaluasi_perkelas', [
            'kelas' => $kelas,
            'biodata' => $biodata,
            'threshold' => $threshold,

            'cplList' => $result['cplList'] ?? [],
            'lulus' => $result['lulus'] ?? [],
            'tidakLulus' => $tidakLulus,

            'mappingDetail' => $mappingDetail,
            'totalBobotKomponenMap' => $totalBobotKomponenMap,

            'updateRows' => $updateRows,
        ]);

    }

    public function updateNilai(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        if ((int) $kelas->id_user !== (int) Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke kelas ini.');
        }

        $data = $request->validate([
            'nim' => ['required', 'string'],
            'id_rencana_asesmen' => ['required', 'integer'],
            'id_cpmk' => ['required', 'integer'],
            'nilai_baru' => ['required', 'numeric', 'min:0'],
            'maks_nilai_input' => ['required', 'numeric', 'min:0'],
        ]);

        if ((float) $data['nilai_baru'] > (float) $data['maks_nilai_input']) {
            return back()->with('error', 'Nilai melebihi maks nilai input.');
        }

        PenilaianMahasiswa::updateOrCreate(
            [
                'id_kelas' => $kelas->id_kelas,
                'nim' => $data['nim'],
                'id_rencana_asesmen' => $data['id_rencana_asesmen'],
                'id_cpmk' => $data['id_cpmk'],
            ],
            [
                'nilai' => (float) $data['nilai_baru'],
            ]
        );

        return back()->with('success', 'Nilai berhasil diupdate.');
    }
}
