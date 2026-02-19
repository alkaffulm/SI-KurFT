<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\TahunAkademik;

class LaporanCplMahasiswa extends Component
{
    public $mode = 'mahasiswa';

    public $angkatan;
    public $nim;

    public $angkatanList = [];
    public $daftarMahasiswa = [];

    public $id_prodi_user;
    public $id_kurikulum;

    public $laporanPerTahun = [];

    public $tahunAkademikId;
    public $tahunAkademikList = [];
    public $cplReportsAngkatan = [];

    public function mount()
    {
        $this->id_prodi_user = session('userRoleId'); // ambil dari session login kaprodi
        $this->id_kurikulum  = session('id_kurikulum_aktif');

        if (!$this->id_prodi_user) {
            return;
        }

        $this->angkatanList = DB::table('mahasiswa')
            ->select('angkatan')
            ->distinct()
            ->where('id_ps', $this->id_prodi_user)
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan')
            ->toArray();

        $this->tahunAkademikList = TahunAkademik::orderBy('id_tahun_akademik')->get();
    }



    public function updatedMode($value)
    {
        $this->angkatan = null;
        $this->nim = null;
        $this->daftarMahasiswa = [];
        $this->laporanPerTahun = [];
        $this->tahunAkademikId = null;
        $this->cplReportsAngkatan = [];

        if ($value === 'mahasiswa') {
            $this->angkatanList = DB::table('mahasiswa')
                ->select('angkatan')
                ->distinct()
                ->where('id_ps', $this->id_prodi_user)
                ->orderBy('angkatan', 'desc')
                ->pluck('angkatan')
                ->toArray();
        }

        if ($value === 'angkatan') {
            if (empty($this->tahunAkademikList)) {
                $this->tahunAkademikList = TahunAkademik::orderBy('id_tahun_akademik')->get();
            }
        }
    }


    public function updatedAngkatan($value)
    {
        if ($this->mode === 'mahasiswa') {
            $this->daftarMahasiswa = DB::table('mahasiswa')
                ->where('angkatan', $value)
                ->where('id_ps', $this->id_prodi_user)
                ->select('nim', 'nama_lengkap')
                ->orderBy('nama_lengkap')
                ->get();

            $this->nim = null;
            $this->laporanPerTahun = [];
            return;
        }

        $this->loadCplAngkatan();
    }

    public function updatedNim($nim)
    {
        if ($this->mode !== 'mahasiswa' || !$nim) {
            $this->laporanPerTahun = [];
            return;
        }


        $this->laporanPerTahun = [];

        $tahunMasuk = (int) $this->angkatan;

        $tahunAkademikList = TahunAkademik::whereIn(
            'tahun_akademik',
            collect(range(0, 3))
                ->map(fn ($i) => ($tahunMasuk + $i) . '/' . ($tahunMasuk + $i + 1))
                ->toArray()
        )->orderBy('id_tahun_akademik')->get();
        $tahunAkademikIdsAkumulasi = [];
        foreach ($tahunAkademikList as $ta) {

            $tahunAkademikIdsAkumulasi[] = $ta->id_tahun_akademik;
            $kelas = DB::table('kelas_mahasiswa as km')
                ->join('kelas as kls', 'km.id_kelas', '=', 'kls.id_kelas')
                ->join('mata_kuliah as mk', 'kls.id_mk', '=', 'mk.id_mk')
                ->where('km.nim', $nim)
                ->where('kls.id_tahun_akademik', $ta->id_tahun_akademik)
                ->select(
                    'kls.id_kelas',
                    'mk.id_mk',
                    'mk.kode_mk',
                    'mk.nama_matkul_id as nama_mk',
                    DB::raw("CONCAT('Kelas ', kls.paralel_ke) as nama_kelas")
                )
                ->get()
                ->map(function ($k) use ($nim) {
                    $k->rata_rata_bobot = $this->hitungRataRataBobotMK(
                        $k->id_mk,
                        $k->id_kelas,
                        $nim
                    );
                    return $k;
                });

            $cpl = $this->hitungKetercapaianCPL(
                $nim,
                $tahunAkademikIdsAkumulasi
            );
            $this->laporanPerTahun[] = [
                'id_tahun_akademik' => $ta->id_tahun_akademik,
                'tahun_akademik' => $ta->tahun_akademik,
                'kelas' => $kelas,
                'cpl' => $cpl,
                'chart' => [
                    'labels' => array_column($cpl, 'kode_cpl'),
                    'data' => array_map(
                        fn ($r) => $r['nilai_akhir_cpl'] ?? 0,
                        $cpl
                    ),
                ],
            ];
        }
    }
    public function updatedTahunAkademikId()
    {
        if ($this->mode === 'angkatan') {
            $this->loadCplAngkatan();
        }
    }


    private function loadCplAngkatan()
    {
        $this->cplReportsAngkatan = [];

        if (!$this->tahunAkademikId || !$this->angkatan || !$this->id_prodi_user) {
            return;
        }

        $nimList = DB::table('kelas_mahasiswa as km')
            ->join('kelas as kls', 'km.id_kelas', '=', 'kls.id_kelas')
            ->join('mahasiswa as m', 'km.nim', '=', 'm.nim')
            ->where('m.id_ps', $this->id_prodi_user)
            ->where('m.angkatan', $this->angkatan)
            ->where('kls.id_tahun_akademik', $this->tahunAkademikId)
            ->distinct()
            ->pluck('km.nim');

        if ($nimList->isEmpty()) {
            return;
        }

        $aggregate = [];

        foreach ($nimList as $nim) {
            $rows = $this->hitungKetercapaianCPL($nim, $this->tahunAkademikId);

            foreach ($rows as $r) {
                $kode = $r['kode_cpl'];

                if (!isset($aggregate[$kode])) {
                    $aggregate[$kode] = [
                        'kode_cpl' => $kode,
                        'deskripsi' => $r['deskripsi'],
                        'sum' => 0,
                        'count' => 0,
                    ];
                }

                if ($r['nilai_akhir_cpl'] !== null) {
                    $aggregate[$kode]['sum'] += $r['nilai_akhir_cpl'];
                    $aggregate[$kode]['count'] += 1;
                }
            }
        }

        $this->cplReportsAngkatan = collect($aggregate)->map(function ($x) {
            return [
                'kode_cpl' => $x['kode_cpl'],
                'deskripsi' => $x['deskripsi'],
                'nilai_akhir_cpl' => $x['count'] > 0
                    ? round($x['sum'] / $x['count'], 2)
                    : null,
            ];
        })->values()->toArray();
    }

    private function hitungRataRataBobotMK($idMk, $idKelas, $nim)
    {
        $cpmkList = DB::table('mk_cpmk_cpl_map')
            ->where('id_mk', $idMk)
            ->distinct()
            ->pluck('id_cpmk');

        if ($cpmkList->isEmpty()) {
            return null;
        }

        $bobotMaksimalPerCpmk = [];
        foreach ($cpmkList as $idCpmk) {
            $totalBobotCpmk = DB::table('mk_cpmk_cpl_map as mccm')
                ->leftJoin('mk_cpmk_bobot as mcb', 'mccm.id_mk_cpmk_cpl', '=', 'mcb.id_mk_cpmk_cpl')
                ->where('mccm.id_mk', $idMk)
                ->where('mccm.id_cpmk', $idCpmk)
                ->sum(DB::raw('COALESCE(mcb.bobot, 0)'));

            $bobotMaksimalPerCpmk[$idCpmk] = $totalBobotCpmk;
        }

        $bobotTercapaiPerCpmk = [];

        foreach ($cpmkList as $idCpmk) {
            $bobotTercapaiPerCpmk[$idCpmk] = 0;

            $komponenEvaluasiList = DB::table('rencana_asesmen as ra')
                ->join('rencana_asesmen_cpmk_bobot as racb', 'ra.id_rencana_asesmen', '=', 'racb.id_rencana_asesmen')
                ->join('mk_cpmk_cpl_map as mccm', 'racb.id_mk_cpmk_cpl', '=', 'mccm.id_mk_cpmk_cpl')
                ->where('ra.id_mk', $idMk)
                ->where('mccm.id_cpmk', $idCpmk)
                ->select('ra.id_rencana_asesmen')
                ->distinct()
                ->get();

            foreach ($komponenEvaluasiList as $komponen) {
                $penilaian = DB::table('penilaian_mahasiswa as pm')
                    ->where('pm.nim', $nim)
                    ->where('pm.id_kelas', $idKelas)
                    ->where('pm.id_rencana_asesmen', $komponen->id_rencana_asesmen)
                    ->where('pm.id_cpmk', $idCpmk)
                    ->select('pm.nilai')
                    ->first();

                if ($penilaian) {
                    $totalBobotKomponen = DB::table('rencana_asesmen_cpmk_bobot')
                        ->where('id_rencana_asesmen', $komponen->id_rencana_asesmen)
                        ->sum('bobot');

                    $bobotTercapaiPerCpmk[$idCpmk] +=
                        ($penilaian->nilai * $totalBobotKomponen) / 100;
                }
            }
        }

        $totalBobotTercapai = array_sum($bobotTercapaiPerCpmk);
        $totalBobotMaksimal = array_sum($bobotMaksimalPerCpmk);

        if ($totalBobotMaksimal == 0) {
            return null;
        }

        return round(($totalBobotTercapai / $totalBobotMaksimal) * 100, 2);
    }

    private function hitungKetercapaianCPL($nim, $tahunAkademikIds = [])
    {
        $cplList = DB::table('cpl')
            ->where('id_ps', $this->id_prodi_user)
            ->where('id_kurikulum', $this->id_kurikulum)
            ->select('id_cpl', 'nama_kode_cpl as kode_cpl', 'desc_cpl_id as deskripsi')
            ->get();

        return $cplList->map(function ($cpl) use ($nim, $tahunAkademikIds) {
            $mappingList = DB::table('mk_cpmk_cpl_map as mccm')
                ->join('mata_kuliah as mk', 'mccm.id_mk', '=', 'mk.id_mk')
                ->leftJoin('mk_cpmk_bobot as mcb', 'mccm.id_mk_cpmk_cpl', '=', 'mcb.id_mk_cpmk_cpl')
                ->where('mccm.id_cpl', $cpl->id_cpl)
                ->where('mk.id_ps', $this->id_prodi_user)
                ->where('mk.id_kurikulum', $this->id_kurikulum)
                ->select(
                    'mccm.id_mk_cpmk_cpl',
                    'mccm.id_mk',
                    'mccm.id_cpmk',
                    DB::raw('COALESCE(mcb.bobot, 0) as bobot_cpmk_cpl')
                )
                ->get();

            $totalBobotTercapai = 0;
            $totalBobotMaksimal = 0;

            foreach ($mappingList as $mapping) {
                if ($mapping->bobot_cpmk_cpl == 0) continue;

                $totalBobotMaksimal += $mapping->bobot_cpmk_cpl;
                $bobotTercapaiMapping = 0;

                $komponenList = DB::table('rencana_asesmen as ra')
                    ->join('rencana_asesmen_cpmk_bobot as racb', 'ra.id_rencana_asesmen', '=', 'racb.id_rencana_asesmen')
                    ->where('ra.id_mk', $mapping->id_mk)
                    ->where('racb.id_mk_cpmk_cpl', $mapping->id_mk_cpmk_cpl)
                    ->select('ra.id_rencana_asesmen', 'racb.bobot')
                    ->get();

                foreach ($komponenList as $komponen) {
                    $penilaian = DB::table('penilaian_mahasiswa as pm')
                        ->join('kelas as kls', 'pm.id_kelas', '=', 'kls.id_kelas')
                        ->where('pm.nim', $nim)
                        ->where('pm.id_rencana_asesmen', $komponen->id_rencana_asesmen)
                        ->where('pm.id_cpmk', $mapping->id_cpmk)
                        ->when(!empty($tahunAkademikIds), fn ($q) =>
                            $q->whereIn('kls.id_tahun_akademik', $tahunAkademikIds)
                        )
                        ->select('pm.nilai')
                        ->first();

                    if ($penilaian) {
                        $bobotTercapaiMapping +=
                            ($penilaian->nilai * $komponen->bobot) / 100;
                    }
                }

                $totalBobotTercapai += $bobotTercapaiMapping;
            }

            return [
                'kode_cpl' => $cpl->kode_cpl,
                'deskripsi' => $cpl->deskripsi,
                'nilai_akhir_cpl' => $totalBobotMaksimal > 0
                    ? round(($totalBobotTercapai / $totalBobotMaksimal) * 100, 2)
                    : null,
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.laporan-cpl-mahasiswa', [
            'mode' => $this->mode,
            'angkatanList' => $this->angkatanList,
            'daftarMahasiswa' => $this->daftarMahasiswa,
            'laporanPerTahun' => $this->laporanPerTahun,
            'tahunAkademikId' => $this->tahunAkademikId,
            'tahunAkademikList' => $this->tahunAkademikList,
            'cplReportsAngkatan' => $this->cplReportsAngkatan,
        ]);
    }
}
