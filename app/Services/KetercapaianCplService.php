<?php

namespace App\Services;

use App\Models\KetercapaianCpl;
use Illuminate\Support\Facades\DB;

class KetercapaianCplService
{
    protected array $cache = [];

    public function recalculateMahasiswa($nim, $idProdi, $idKurikulum)
    {
        $this->hydrateStaticCache($idProdi, $idKurikulum);
        $this->hydrateMahasiswaCache($nim);

        $tahunList = $this->getTahunAkademikMahasiswa($nim);

        foreach ($tahunList as $ta) {
            $tahunAkademikIdsAkumulasi = $tahunList
                ->where('id_tahun_akademik', '<=', $ta->id_tahun_akademik)
                ->pluck('id_tahun_akademik')
                ->toArray();

            $cplRows = $this->hitungKetercapaianCPL($nim, $tahunAkademikIdsAkumulasi);

            foreach ($cplRows as $row) {
                KetercapaianCpl::updateOrCreate(
                    [
                        'nim' => $nim,
                        'id_cpl' => $row['id_cpl'],
                        'id_tahun_akademik' => $ta->id_tahun_akademik,
                    ],
                    [
                        'id_kurikulum' => $idKurikulum,
                        'nilai_cpl' => $row['nilai_akhir_cpl'],
                    ]
                );
            }
        }
    }
    protected function hydrateStaticCache($idProdi, $idKurikulum)
    {
        $this->cache['cpl_list'] = collect(DB::select(
            "SELECT id_cpl, nama_kode_cpl AS kode_cpl, desc_cpl_id AS deskripsi
            FROM cpl
            WHERE id_ps = ?
            AND id_kurikulum = ?",
            [$idProdi, $idKurikulum]
        ));

        $this->cache['mapping'] = collect(DB::select(
            "SELECT
                mccm.id_cpl,
                mccm.id_mk,
                mccm.id_cpmk,
                mccm.id_mk_cpmk_cpl,
                COALESCE(mcb.bobot,0) AS bobot_cpmk
            FROM mk_cpmk_cpl_map mccm
            JOIN mata_kuliah mk ON mccm.id_mk = mk.id_mk
            LEFT JOIN mk_cpmk_bobot mcb
                ON mccm.id_mk_cpmk_cpl = mcb.id_mk_cpmk_cpl
            WHERE mk.id_ps = ?
            AND mk.id_kurikulum = ?",
            [$idProdi, $idKurikulum]
        ));

        $this->cache['mapping_by_cpl'] = $this->cache['mapping']
            ->groupBy('id_cpl');

        $this->cache['asesmen_rows'] = collect(DB::select(
            "SELECT
                ra.id_rencana_asesmen,
                ra.id_mk,
                racb.id_mk_cpmk_cpl,
                racb.bobot
            FROM rencana_asesmen ra
            JOIN rencana_asesmen_cpmk_bobot racb
                ON ra.id_rencana_asesmen = racb.id_rencana_asesmen"
        ));
    }

    protected function hydrateMahasiswaCache($nim)
    {
        $nilaiRows = collect(DB::select(
            "SELECT
                pm.nim,
                pm.id_kelas,
                pm.id_rencana_asesmen,
                pm.id_cpmk,
                pm.nilai,
                kls.id_tahun_akademik
            FROM penilaian_mahasiswa pm
            LEFT JOIN kelas kls
                ON pm.id_kelas = kls.id_kelas
            WHERE pm.nim = ?",
            [$nim]
        ));

        $this->cache['nilai_index'][$nim] = [];

        foreach ($nilaiRows as $row) {

            $key =
                $row->id_tahun_akademik . '-' .
                $row->id_rencana_asesmen . '-' .
                $row->id_cpmk;

            if (
                !isset($this->cache['nilai_index'][$nim][$key]) ||
                $row->nilai > $this->cache['nilai_index'][$nim][$key]
            ) {
                $this->cache['nilai_index'][$nim][$key] = $row->nilai;
            }
        }
    }

    protected function getTahunAkademikMahasiswa($nim)
    {
        return collect(DB::select(
            "SELECT DISTINCT
                ta.id_tahun_akademik,
                ta.tahun_akademik
            FROM penilaian_mahasiswa pm
            JOIN kelas kls
                ON pm.id_kelas = kls.id_kelas
            JOIN tahun_akademik ta
                ON kls.id_tahun_akademik = ta.id_tahun_akademik
            WHERE pm.nim = ?
            ORDER BY ta.id_tahun_akademik",
            [$nim]
        ));
    }

    protected function hitungNilaiCpmkMahasiswa($nim, $mapping, $tahunAkademikIds = [])
    {
        $asesmenRows = $this->cache['asesmen_rows']
            ->where('id_mk', $mapping->id_mk)
            ->groupBy('id_rencana_asesmen');

        $bobotTercapaiAsesmen = 0;
        $totalBobotAsesmen = 0;

        foreach ($asesmenRows as $asesmenId => $rows) {
            $totalBobotAsesmenRow = $rows->sum('bobot');

            $bobotCpmk = $rows
                ->where('id_mk_cpmk_cpl', $mapping->id_mk_cpmk_cpl)
                ->sum('bobot');

            if ($totalBobotAsesmenRow <= 0 || $bobotCpmk <= 0) {
                continue;
            }

            $nilai = null;

            foreach ($tahunAkademikIds as $tahunId) {
                $key = $tahunId . '-' . $asesmenId . '-' . $mapping->id_cpmk;

                if (isset($this->cache['nilai_index'][$nim][$key])) {
                    $currentNilai = $this->cache['nilai_index'][$nim][$key];

                    if ($nilai === null || $currentNilai > $nilai) {
                        $nilai = $currentNilai;
                    }
                }
            }

            $maxNilai = ($bobotCpmk / $totalBobotAsesmenRow) * 100;

            if ($nilai !== null && $maxNilai > 0) {
                $bobotTercapaiAsesmen += ((float) $nilai / $maxNilai) * (float) $bobotCpmk;
            }

            $totalBobotAsesmen += (float) $bobotCpmk;
        }

        if ($totalBobotAsesmen <= 0 || $mapping->bobot_cpmk <= 0) {
            return 0;
        }

        return ($bobotTercapaiAsesmen / $totalBobotAsesmen) * (float) $mapping->bobot_cpmk;
    }

    protected function hitungKetercapaianCPL($nim, $tahunAkademikIds = [])
    {
        return $this->cache['cpl_list']->map(function ($cpl) use ($nim, $tahunAkademikIds) {

            $mappingList = $this->cache['mapping_by_cpl'][$cpl->id_cpl] ?? collect();

            $totalBobotMaksimal = 0;
            $totalBobotTercapai = 0;

            foreach ($mappingList as $mapping) {

                if ($mapping->bobot_cpmk <= 0) {
                    continue;
                }

                $nilaiCpmk = $this->hitungNilaiCpmkMahasiswa(
                    $nim,
                    $mapping,
                    $tahunAkademikIds
                );

                $totalBobotTercapai += $nilaiCpmk;
                $totalBobotMaksimal += $mapping->bobot_cpmk;
            }

            return [
                'id_cpl' => $cpl->id_cpl,
                'kode_cpl' => $cpl->kode_cpl,
                'deskripsi' => $cpl->deskripsi,

                'nilai_akhir_cpl' => $totalBobotMaksimal > 0
                    ? round(
                        ($totalBobotTercapai / $totalBobotMaksimal) * 100,
                        2
                    )
                    : 0,
            ];
        })->values()->toArray();
    }
}