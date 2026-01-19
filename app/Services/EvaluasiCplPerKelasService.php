<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class EvaluasiCplPerKelasService
{
    public function evaluasiKelas(int $idKelas, float $threshold = 60.0): array
    {
        $kelas = DB::table('kelas as kls')
            ->join('mata_kuliah as mk', 'kls.id_mk', '=', 'mk.id_mk')
            ->select('kls.id_kelas', 'kls.id_mk', 'kls.id_tahun_akademik', 'mk.id_ps', 'mk.id_kurikulum')
            ->where('kls.id_kelas', $idKelas)
            ->first();

        if (!$kelas) {
            return [
                'cplList' => [],
                'rows' => [],
                'lulus' => [],
                'tidak_lulus' => [],
            ];
        }

        $mhsList = DB::table('kelas_mahasiswa as km')
            ->join('mahasiswa as m', 'km.nim', '=', 'm.nim')
            ->where('km.id_kelas', $idKelas)
            ->select('m.nim', 'm.nama_lengkap')
            ->orderBy('m.nama_lengkap')
            ->get();

        if ($mhsList->isEmpty()) {
            return [
                'cplList' => [],
                'rows' => [],
                'lulus' => [],
                'tidak_lulus' => [],
            ];
        }

        $mapRows = DB::table('mk_cpmk_cpl_map as map')
            ->leftJoin('mk_cpmk_bobot as bob', 'map.id_mk_cpmk_cpl', '=', 'bob.id_mk_cpmk_cpl')
            ->join('cpl as cpl', 'map.id_cpl', '=', 'cpl.id_cpl')
            ->where('map.id_mk', $kelas->id_mk)
            ->where('cpl.id_ps', $kelas->id_ps)
            ->where('cpl.id_kurikulum', $kelas->id_kurikulum)
            ->select(
                'map.id_mk',
                'map.id_cpmk',
                'map.id_cpl',
                'cpl.nama_kode_cpl as kode_cpl',
                'cpl.desc_cpl_id as deskripsi',
                DB::raw('COALESCE(SUM(bob.bobot), 0) as bobot_mapping')
            )
            ->groupBy('map.id_mk', 'map.id_cpmk', 'map.id_cpl', 'cpl.nama_kode_cpl', 'cpl.desc_cpl_id')
            ->get();

        $cplList = $mapRows
            ->map(fn ($r) => ['id_cpl' => (int) $r->id_cpl, 'kode_cpl' => $r->kode_cpl, 'deskripsi' => $r->deskripsi])
            ->unique('id_cpl')
            ->values()
            ->toArray();

        if (empty($cplList)) {
            return [
                'cplList' => [],
                'rows' => [],
                'lulus' => [],
                'tidak_lulus' => [],
            ];
        }

        $sumBobotByCpmk = [];
        $maxByCpl = [];
        foreach ($mapRows as $r) {
            $keyCpmk = (int) $r->id_cpmk;
            $sumBobotByCpmk[$keyCpmk] = ($sumBobotByCpmk[$keyCpmk] ?? 0.0) + (float) $r->bobot_mapping;

            $idCpl = (int) $r->id_cpl;
            $maxByCpl[$idCpl] = ($maxByCpl[$idCpl] ?? 0.0) + (float) $r->bobot_mapping;
        }

        $pmRows = DB::table('penilaian_mahasiswa as pm')
            ->where('pm.id_kelas', $idKelas)
            ->select('pm.nim', 'pm.id_rencana_asesmen', 'pm.id_cpmk', 'pm.nilai')
            ->get();

        $raIds = $pmRows->pluck('id_rencana_asesmen')->unique()->values()->all();

        $totalBobotKomponen = [];
        if (!empty($raIds)) {
            $totalBobotKomponen = DB::table('rencana_asesmen_cpmk_bobot')
                ->whereIn('id_rencana_asesmen', $raIds)
                ->select('id_rencana_asesmen', DB::raw('SUM(bobot) as total_bobot'))
                ->groupBy('id_rencana_asesmen')
                ->get()
                ->pluck('total_bobot', 'id_rencana_asesmen')
                ->toArray();
        }

        $achievedByNimCpmk = [];
        foreach ($pmRows as $pm) {
            $nim = (string) $pm->nim;
            $idCpmk = (int) $pm->id_cpmk;
            $nilai = (float) ($pm->nilai ?? 0);

            $idRa = (int) $pm->id_rencana_asesmen;
            $tb = (float) ($totalBobotKomponen[$idRa] ?? 0);

            if ($tb <= 0) {
                continue;
            }

            $key = $nim . ':' . $idCpmk;
            $achievedByNimCpmk[$key] = ($achievedByNimCpmk[$key] ?? 0.0) + ($nilai * $tb / 100.0);
        }

        $nilaiCplByNim = [];
        foreach ($mhsList as $m) {
            $nilaiCplByNim[(string) $m->nim] = [];
            foreach ($cplList as $c) {
                $nilaiCplByNim[(string) $m->nim][(int) $c['id_cpl']] = 0.0;
            }
        }

        foreach ($mapRows as $r) {
            $idCpmk = (int) $r->id_cpmk;
            $idCpl = (int) $r->id_cpl;
            $bobot = (float) $r->bobot_mapping;

            if ($bobot <= 0) {
                continue;
            }

            $den = (float) ($sumBobotByCpmk[$idCpmk] ?? 0.0);
            if ($den <= 0) {
                continue;
            }

            foreach ($mhsList as $m) {
                $nim = (string) $m->nim;
                $achCpmk = (float) ($achievedByNimCpmk[$nim . ':' . $idCpmk] ?? 0.0);

                $share = $achCpmk * ($bobot / $den);
                $nilaiCplByNim[$nim][$idCpl] = ($nilaiCplByNim[$nim][$idCpl] ?? 0.0) + $share;
            }
        }

        $rows = [];
        $lulus = [];
        $tidak = [];

        foreach ($mhsList as $m) {
            $nim = (string) $m->nim;

            $persenCpl = [];
            $statusPerCpl = [];

            $minPersen = null;

            foreach ($cplList as $c) {
                $idCpl = (int) $c['id_cpl'];
                $max = (float) ($maxByCpl[$idCpl] ?? 0.0);
                $ach = (float) ($nilaiCplByNim[$nim][$idCpl] ?? 0.0);

                $p = $max > 0 ? round(($ach / $max) * 100.0, 2) : null;
                $persenCpl[$idCpl] = $p;

                $st = ($p !== null && $p >= $threshold) ? 'lulus' : 'tidak';
                $statusPerCpl[$idCpl] = $st;

                if ($p !== null) {
                    $minPersen = $minPersen === null ? $p : min($minPersen, $p);
                }
            }

            $overallLulus = $minPersen !== null && $minPersen >= $threshold;

            $row = [
                'nim' => $nim,
                'nama_lengkap' => $m->nama_lengkap,
                'persen_cpl' => $persenCpl,
                'status_cpl' => $statusPerCpl,
                'min_persen' => $minPersen,
                'overall' => $overallLulus ? 'lulus' : 'tidak',
            ];

            $rows[] = $row;

            if ($overallLulus) {
                $lulus[] = $row;
            } else {
                $tidak[] = $row;
            }
        }

        return [
            'cplList' => $cplList,
            'rows' => $rows,
            'lulus' => $lulus,
            'tidak_lulus' => $tidak,
        ];
    }
}
