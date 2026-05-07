<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\PenilaianMahasiswa;
use App\Models\RencanaAsesmenModel;
use App\Models\RencanaAsesmenCPMKBobotModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PenilaianImport implements ToCollection
{
    protected $idKelas;

    public function __construct($idKelas)
    {
        $this->idKelas = $idKelas;
    }

    public function collection(Collection $rows)
    {
        $kelas = Kelas::with('mahasiswa')->findOrFail($this->idKelas);

        $header1 = $rows[0];
        $header2 = $rows[1];

        $mapping = [];
        $currentAsesmenName = null;

        for ($col = 2; $col < count($header2); $col++) {

            $rawHeader1 = strtoupper(trim((string) ($header1[$col] ?? '')));

            if ($rawHeader1 !== '') {
                $currentAsesmenName = $rawHeader1;
            }

            if (!$currentAsesmenName) {
                continue;
            }

            if (str_contains($currentAsesmenName, 'HELPER')) {
                continue;
            }

            $headerCpmk = trim((string) ($header2[$col] ?? ''));

            if ($headerCpmk === '' || $headerCpmk === '%') {
                continue;
            }

            preg_match('/^(.*?)\s*\(/', $headerCpmk, $match);

            $namaCpmk = trim($match[1] ?? $headerCpmk);

            $rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $kelas->id_mk)
                ->get()
                ->first(function ($ra) use ($currentAsesmenName) {
                    return strtoupper(trim($ra->komponenEvaluasiFormatted))
                        === strtoupper(trim($currentAsesmenName));
                });

            if (!$rencanaAsesmen) {
                continue;
            }

            $bobot = RencanaAsesmenCPMKBobotModel::with('mkCpmkMap.cpmk')
                ->where('id_rencana_asesmen', $rencanaAsesmen->id_rencana_asesmen)
                ->get();

            $target = $bobot->first(function ($item) use ($namaCpmk) {
                return optional(optional($item->mkCpmkMap)->cpmk)->nama_kode_cpmk === $namaCpmk;
            });

            if (!$target) {
                continue;
            }

            $totalBobotAsesmen = $bobot->sum('bobot');

            $bobotCpmk = $bobot
                ->filter(function ($item) use ($namaCpmk) {
                    return optional(optional($item->mkCpmkMap)->cpmk)->nama_kode_cpmk === $namaCpmk;
                })
                ->sum('bobot');

            $maxNilai = $totalBobotAsesmen > 0
                ? round(($bobotCpmk / $totalBobotAsesmen) * 100, 1)
                : 0;

            $mapping[$col] = [
                'id_rencana_asesmen' => $rencanaAsesmen->id_rencana_asesmen,
                'id_cpmk' => $target->mkCpmkMap->id_cpmk,
                'max_nilai' => $maxNilai,
            ];
        }

        for ($row = 2; $row < count($rows); $row++) {

            $data = $rows[$row];

            $nim = trim(str_replace("'", '', (string) ($data[0] ?? '')));
            $nim = preg_replace('/[^0-9]/', '', $nim);

            if (!$nim) {
                continue;
            }

            $isMahasiswaKelas = $kelas->mahasiswa()
                ->where('mahasiswa.nim', $nim)
                ->exists();

            if (!$isMahasiswaKelas) {
                continue;
            }

            foreach ($mapping as $col => $map) {

                $nilai = $data[$col] ?? null;

                if ($nilai === null || $nilai === '') {
                    continue;
                }

                if (!is_numeric($nilai)) {
                    continue;
                }

                $nilai = (float) $nilai;

                if ($nilai < 0) {
                    $nilai = 0;
                }

                if ($nilai > $map['max_nilai']) {
                    $nilai = $map['max_nilai'];
                }

                PenilaianMahasiswa::updateOrCreate(
                    [
                        'id_kelas' => $this->idKelas,
                        'nim' => $nim,
                        'id_rencana_asesmen' => $map['id_rencana_asesmen'],
                        'id_cpmk' => $map['id_cpmk'],
                    ],
                    [
                        'nilai' => $nilai
                    ]
                );
            }
        }
    }
}