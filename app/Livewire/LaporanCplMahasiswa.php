<?php

namespace App\Livewire;

use App\Models\TahunAkademik;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class LaporanCplMahasiswa extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $perPage = 1;
    public $perPageAngkatan = 1;
    public $mode = 'mahasiswa';

    public $angkatan;
    public $nim;
    public $id_prodi_user;
    public $id_kurikulum;
    public $tahunAkademikId;

    public $angkatanList = [];
    public $daftarMahasiswa = [];
    public $tahunAkademikList = [];
    public $tahunAkademikListFiltered = [];
    public $laporanPerTahun = [];
    public $cplReportsAngkatan = [];
    public $laporanAngkatanPerTahun = [];

    public function mount()
    {
        $this->id_prodi_user = session('userRoleId');
        $this->id_kurikulum = session('id_kurikulum_aktif');

        if (!$this->id_prodi_user) {
            return;
        }

        $this->loadAngkatanList();
        $this->tahunAkademikList = TahunAkademik::orderBy('id_tahun_akademik')->get();
    }

    public function updatedMode($value)
    {
        $this->angkatan = null;
        $this->nim = null;
        $this->daftarMahasiswa = [];
        $this->laporanPerTahun = [];
        $this->laporanAngkatanPerTahun = [];
        $this->tahunAkademikId = null;
        $this->cplReportsAngkatan = [];

        if ($value === 'mahasiswa') {
            $this->loadAngkatanList();
        }

        if ($value === 'angkatan' && empty($this->tahunAkademikList)) {
            $this->tahunAkademikList = TahunAkademik::orderBy('id_tahun_akademik')->get();
        }

        $this->resetPage();
        $this->resetPage('pageAngkatan');
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
            $this->tahunAkademikListFiltered = [];
            $this->resetPage();
            return;
        }

        $this->resetPage('pageAngkatan');
        $this->loadCplAngkatan();
    }

    public function updatedNim($nim)
    {
        if ($this->mode !== 'mahasiswa' || !$nim) {
            $this->laporanPerTahun = [];
            $this->tahunAkademikListFiltered = [];
            return;
        }

        $tahunMasuk = (int) $this->angkatan;

        $this->laporanPerTahun = [];
        $this->tahunAkademikListFiltered = $this->getTahunAkademikByAngkatan($tahunMasuk);

        $this->resetPage();
        $this->dispatch('renderCharts');
    }

    public function updatedTahunAkademikId()
    {
        if ($this->mode === 'angkatan') {
            $this->loadCplAngkatan();
        }
    }

    public function updatedPageAngkatan()
    {
        $this->dispatch('renderCharts');
    }

    public function updatedPage()
    {
        $this->dispatch('renderCharts');
    }

    public function getLaporanAngkatanPaginatedProperty()
    {
        $data = collect($this->laporanAngkatanPerTahun);
        $page = $this->getPage('pageAngkatan');
        $perPage = $this->perPageAngkatan;

        return new LengthAwarePaginator(
            $data->forPage($page, $perPage)->values(),
            $data->count(),
            $perPage,
            $page,
            [
                'path' => request()->url(),
                'pageName' => 'pageAngkatan',
            ]
        );
    }

    public function getLaporanPerTahunPaginatedProperty()
    {
        if (!$this->nim) {
            return new LengthAwarePaginator([], 0, $this->perPage, 1, ['path' => request()->url()]);
        }

        $tahunList = collect($this->tahunAkademikListFiltered);
        $currentPage = $this->getPage();
        $perPage = $this->perPage;
        $tahunPage = $tahunList->forPage($currentPage, $perPage);
        $result = [];

        foreach ($tahunPage as $index => $ta) {
            $tahunAkademikIdsAkumulasi = $tahunList
                ->take(($currentPage - 1) * $perPage + $index + 1)
                ->pluck('id_tahun_akademik')
                ->toArray();

            $kelas = $this->getKelasMahasiswaPerTahun($this->nim, $ta->id_tahun_akademik);
            $cpl = $this->hitungKetercapaianCPL($this->nim, $tahunAkademikIdsAkumulasi);

            $result[] = [
                'tahun_akademik' => $ta->tahun_akademik,
                'kelas' => $kelas,
                'cpl' => $cpl,
                'chart' => $this->buildChartData($cpl),
            ];
        }

        $this->dispatch('renderCharts');

        return new LengthAwarePaginator(
            $result,
            $tahunList->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );
    }

    private function loadAngkatanList()
    {
        $this->angkatanList = DB::table('mahasiswa')
            ->select('angkatan')
            ->distinct()
            ->where('id_ps', $this->id_prodi_user)
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan')
            ->toArray();
    }

    private function getTahunAkademikByAngkatan($tahunMasuk)
    {
        return TahunAkademik::whereIn(
            'tahun_akademik',
            collect(range(0, 3))
                ->map(fn ($i) => ($tahunMasuk + $i) . '/' . ($tahunMasuk + $i + 1))
                ->toArray()
        )->orderBy('id_tahun_akademik')->get();
    }

    private function getKelasMahasiswaPerTahun($nim, $idTahunAkademik)
    {
        return DB::table('kelas_mahasiswa as km')
            ->join('kelas as kls', 'km.id_kelas', '=', 'kls.id_kelas')
            ->join('mata_kuliah as mk', 'kls.id_mk', '=', 'mk.id_mk')
            ->where('km.nim', $nim)
            ->where('kls.id_tahun_akademik', $idTahunAkademik)
            ->select(
                'kls.id_kelas',
                'mk.id_mk',
                'mk.kode_mk',
                'mk.nama_matkul_id as nama_mk',
                DB::raw("CONCAT('Kelas ', kls.paralel_ke) as nama_kelas")
            )
            ->get()
            ->map(function ($kelas) use ($nim) {
                $kelas->rata_rata_bobot = $this->hitungRataRataBobotMK(
                    $kelas->id_mk,
                    $kelas->id_kelas,
                    $nim
                );

                return $kelas;
            });
    }

    private function loadCplAngkatan()
    {
        $this->laporanAngkatanPerTahun = [];

        if (!$this->angkatan || !$this->id_prodi_user) {
            return;
        }

        $tahunMasuk = (int) $this->angkatan;
        $tahunAkademikList = $this->getTahunAkademikByAngkatan($tahunMasuk);

        $nimList = DB::table('mahasiswa')
            ->where('id_ps', $this->id_prodi_user)
            ->where('angkatan', $this->angkatan)
            ->pluck('nim');

        if ($nimList->isEmpty()) {
            return;
        }

        $tahunAkademikIdsAkumulasi = [];

        foreach ($tahunAkademikList as $ta) {
            $tahunAkademikIdsAkumulasi[] = $ta->id_tahun_akademik;
            $aggregate = [];

            foreach ($nimList as $nim) {
                $rows = $this->hitungKetercapaianCPL($nim, $tahunAkademikIdsAkumulasi);

                foreach ($rows as $row) {
                    $kode = $row['kode_cpl'];

                    if (!isset($aggregate[$kode])) {
                        $aggregate[$kode] = [
                            'kode_cpl' => $kode,
                            'deskripsi' => $row['deskripsi'],
                            'sum' => 0,
                            'count' => 0,
                        ];
                    }

                    if ($row['nilai_akhir_cpl'] !== null) {
                        $aggregate[$kode]['sum'] += $row['nilai_akhir_cpl'];
                        $aggregate[$kode]['count']++;
                    }
                }
            }

            $cplFinal = collect($aggregate)
                ->map(fn ($item) => [
                    'kode_cpl' => $item['kode_cpl'],
                    'deskripsi' => $item['deskripsi'],
                    'nilai_akhir_cpl' => $item['count'] > 0 ? round($item['sum'] / $item['count'], 2) : null,
                ])
                ->values()
                ->toArray();

            $this->laporanAngkatanPerTahun[] = [
                'tahun_akademik' => $ta->tahun_akademik,
                'cpl' => $cplFinal,
                'chart' => $this->buildChartData($cplFinal),
            ];
        }

        $this->dispatch('renderCharts');
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
        $bobotTercapaiPerCpmk = [];

        foreach ($cpmkList as $idCpmk) {
            $bobotMaksimalPerCpmk[$idCpmk] = DB::table('mk_cpmk_cpl_map as mccm')
                ->leftJoin('mk_cpmk_bobot as mcb', 'mccm.id_mk_cpmk_cpl', '=', 'mcb.id_mk_cpmk_cpl')
                ->where('mccm.id_mk', $idMk)
                ->where('mccm.id_cpmk', $idCpmk)
                ->sum(DB::raw('COALESCE(mcb.bobot, 0)'));

            $bobotTercapaiPerCpmk[$idCpmk] = 0;
        }

        foreach ($cpmkList as $idCpmk) {
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

                if (!$penilaian) {
                    continue;
                }

                $totalBobotKomponen = DB::table('rencana_asesmen_cpmk_bobot')
                    ->where('id_rencana_asesmen', $komponen->id_rencana_asesmen)
                    ->sum('bobot');

                $bobotTercapaiPerCpmk[$idCpmk] += ($penilaian->nilai * $totalBobotKomponen) / 100;
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
                    'mccm.id_mk',
                    'mccm.id_cpmk',
                    'mccm.id_mk_cpmk_cpl',
                    DB::raw('COALESCE(mcb.bobot, 0) as bobot_cpmk')
                )
                ->get();

            $totalBobotMaksimal = 0;
            $totalBobotTercapai = 0;

            foreach ($mappingList as $mapping) {
                if ($mapping->bobot_cpmk == 0) {
                    continue;
                }

                $nilaiCpmk = $this->hitungNilaiCpmkMahasiswa($nim, $mapping, $tahunAkademikIds);

                $totalBobotTercapai += $nilaiCpmk;
                $totalBobotMaksimal += $mapping->bobot_cpmk;
            }

            return [
                'kode_cpl' => $cpl->kode_cpl,
                'deskripsi' => $cpl->deskripsi,
                'nilai_akhir_cpl' => $totalBobotMaksimal > 0
                    ? round(($totalBobotTercapai / $totalBobotMaksimal) * 100, 2)
                    : 0,
            ];
        })->values()->toArray();
    }

    private function hitungNilaiCpmkMahasiswa($nim, $mapping, $tahunAkademikIds = [])
    {
        $asesmenList = DB::table('rencana_asesmen as ra')
            ->join('rencana_asesmen_cpmk_bobot as racb', 'ra.id_rencana_asesmen', '=', 'racb.id_rencana_asesmen')
            ->where('ra.id_mk', $mapping->id_mk)
            ->where('racb.id_mk_cpmk_cpl', $mapping->id_mk_cpmk_cpl)
            ->select('ra.id_rencana_asesmen', 'racb.bobot')
            ->get();

        $bobotTercapaiAsesmen = 0;
        $totalBobotAsesmen = 0;

        foreach ($asesmenList as $asesmen) {
            $totalBobotAsesmenPerRA = DB::table('rencana_asesmen_cpmk_bobot')
                ->where('id_rencana_asesmen', $asesmen->id_rencana_asesmen)
                ->sum('bobot');

            $bobotCpmkPerRA = DB::table('rencana_asesmen_cpmk_bobot')
                ->where('id_rencana_asesmen', $asesmen->id_rencana_asesmen)
                ->where('id_mk_cpmk_cpl', $mapping->id_mk_cpmk_cpl)
                ->sum('bobot');

            $maxNilai = $totalBobotAsesmenPerRA > 0
                ? ($bobotCpmkPerRA / $totalBobotAsesmenPerRA) * 100
                : 0;

            $penilaian = DB::table('penilaian_mahasiswa as pm')
                ->join('kelas as kls', 'pm.id_kelas', '=', 'kls.id_kelas')
                ->where('pm.nim', $nim)
                ->where('pm.id_rencana_asesmen', $asesmen->id_rencana_asesmen)
                ->where('pm.id_cpmk', $mapping->id_cpmk)
                ->when(!empty($tahunAkademikIds), fn ($query) =>
                    $query->whereIn('kls.id_tahun_akademik', $tahunAkademikIds)
                )
                ->value('pm.nilai');

            if ($penilaian !== null && $maxNilai > 0) {

                $bobotTercapaiAsesmen += 
                    ((float) $penilaian / $maxNilai) * (float) $asesmen->bobot;

                $totalBobotAsesmen += (float) $asesmen->bobot;
            }
        }

        if ($totalBobotAsesmen <= 0 || $mapping->bobot_cpmk <= 0) {
            return 0;
        }

        return ($bobotTercapaiAsesmen / $totalBobotAsesmen) * (float) $mapping->bobot_cpmk;
    }
    private function buildChartData($cpl)
    {
        return [
            'labels' => array_column($cpl, 'kode_cpl'),
            'data' => array_map(fn ($row) => $row['nilai_akhir_cpl'] ?? 0, $cpl),
        ];
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
            'laporanAngkatanPerTahun' => $this->laporanAngkatanPerTahun,
        ]);
    }
}
