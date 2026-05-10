<?php
namespace App\Livewire;

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
    public $mahasiswa;
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

    protected $cache = [];

    public function mount()
    {
        $this->id_prodi_user = session('userRoleId');
        $this->id_kurikulum = session('id_kurikulum_aktif');

        if (!$this->id_prodi_user) {
            return;
        }

        $this->loadAngkatanList();
        $this->tahunAkademikList = DB::select("SELECT * FROM tahun_akademik ORDER BY id_tahun_akademik");

        $this->hydrateStaticCache();
    }

    public function hydrate()
    {
        if (!empty($this->cache['mapping'])) {
            return;
        }

        $this->hydrateStaticCache();

        if ($this->mode === 'mahasiswa' && $this->nim) {
            $this->hydrateMahasiswaCache($this->nim);
        }

        if ($this->mode === 'angkatan' && $this->angkatan) {

            $nimList = collect(DB::select(
                "SELECT nim
                FROM mahasiswa
                WHERE id_ps = ?
                AND angkatan = ?",
                [$this->id_prodi_user, $this->angkatan]
            ))->pluck('nim');

            foreach ($nimList as $nim) {
                $this->hydrateMahasiswaCache($nim);
            }
        }
    }

    protected function hydrateStaticCache()
    {
        $this->cache['cpl_list'] = collect(DB::select(
            "SELECT id_cpl, nama_kode_cpl AS kode_cpl, desc_cpl_id AS deskripsi
             FROM cpl
             WHERE id_ps = ?
             AND id_kurikulum = ?",
            [$this->id_prodi_user, $this->id_kurikulum]
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
            [$this->id_prodi_user, $this->id_kurikulum]
        ));

        $this->cache['mapping_by_cpl'] = $this->cache['mapping']
            ->groupBy('id_cpl');

        $this->cache['mapping_by_mk_cpmk'] = $this->cache['mapping']
            ->groupBy(fn ($row) => $row->id_mk . '-' . $row->id_cpmk);

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

        $this->cache['asesmen_by_mapping'] = $this->cache['asesmen_rows']
            ->groupBy('id_mk_cpmk_cpl');

        $this->cache['asesmen_total_bobot'] = $this->cache['asesmen_rows']
            ->groupBy('id_rencana_asesmen')
            ->map(fn ($rows) => $rows->sum('bobot'));
    }

    // protected function hydrateMahasiswaCache($nim)
    // {
    //     $nilaiRows = collect(DB::select(
    //         "SELECT
    //             pm.nim,
    //             pm.id_kelas,
    //             pm.id_rencana_asesmen,
    //             pm.id_cpmk,
    //             pm.nilai,
    //             kls.id_tahun_akademik
    //          FROM penilaian_mahasiswa pm
    //          LEFT JOIN kelas kls ON pm.id_kelas = kls.id_kelas
    //          WHERE pm.nim = ?",
    //         [$nim]
    //     ));

    //     $this->cache['nilai_by_key'][$nim] = $nilaiRows
    //         ->keyBy(fn ($row) =>
    //             $row->id_kelas . '-' .
    //             $row->id_rencana_asesmen . '-' .
    //             $row->id_cpmk
    //         );

    //     $this->cache['nilai_by_tahun'][$nim] = $nilaiRows
    //         ->groupBy('id_tahun_akademik');
    // }

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
            LEFT JOIN kelas kls ON pm.id_kelas = kls.id_kelas
            WHERE pm.nim = ?",
            [$nim]
        ));

        $this->cache['nilai_flat'][$nim] = $nilaiRows;
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

        $this->cache['nilai_by_key'][$nim] = $nilaiRows
            ->keyBy(fn ($row) =>
                $row->id_kelas . '-' .
                $row->id_rencana_asesmen . '-' .
                $row->id_cpmk
            );

        $this->cache['nilai_by_tahun'][$nim] = $nilaiRows
            ->groupBy('id_tahun_akademik');
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
            $this->tahunAkademikList = DB::select("SELECT * FROM tahun_akademik ORDER BY id_tahun_akademik");
        }

        $this->resetPage();
        $this->resetPage('pageAngkatan');
    }

    public function updatedAngkatan($value)
    {
        if ($this->mode === 'mahasiswa') {
            $this->daftarMahasiswa = DB::select(
                "SELECT nim, nama_lengkap
                 FROM mahasiswa
                 WHERE angkatan = ? AND id_ps = ?
                 ORDER BY nama_lengkap",
                [$value, $this->id_prodi_user]
            );

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

        $this->hydrateMahasiswaCache($nim);

        $this->mahasiswa = DB::selectOne(
            "SELECT m.nama_lengkap, m.angkatan, ps.nama_prodi
            FROM mahasiswa m
            JOIN program_studi ps ON m.id_ps = ps.id_ps
            WHERE m.nim = ?",
            [$nim]
        );

        $tahunMasuk = (int) $this->angkatan;

        $this->laporanPerTahun = [];
        $this->tahunAkademikListFiltered = $this->getTahunAkademikByAngkatan($tahunMasuk);

        $this->resetPage();
        $this->dispatch('renderCharts');
    }

    //     }
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
        $rows = DB::select(
            "SELECT DISTINCT angkatan
             FROM mahasiswa
             WHERE id_ps = ?
             ORDER BY angkatan DESC",
            [$this->id_prodi_user]
        );

        $this->angkatanList = array_map(fn ($row) => $row->angkatan, $rows);
    }

    private function getTahunAkademikByAngkatan($tahunMasuk)
    {
        $tahunAkademik = collect(range(0, 3))
            ->map(fn ($i) => ($tahunMasuk + $i) . '/' . ($tahunMasuk + $i + 1))
            ->toArray();

        if (empty($tahunAkademik)) {
            return collect();
        }

        $placeholders = implode(',', array_fill(0, count($tahunAkademik), '?'));

        return collect(DB::select(
            "SELECT *
             FROM tahun_akademik
             WHERE tahun_akademik IN ($placeholders)
             ORDER BY id_tahun_akademik",
            $tahunAkademik
        ));
    }

    private function getKelasMahasiswaPerTahun($nim, $idTahunAkademik)
    {
        $kelasList = collect(DB::select(
            "SELECT
                kls.id_kelas,
                mk.id_mk,
                mk.kode_mk,
                mk.nama_matkul_id AS nama_mk,
                CONCAT('Kelas ', kls.paralel_ke) AS nama_kelas
             FROM kelas_mahasiswa km
             JOIN kelas kls ON km.id_kelas = kls.id_kelas
             JOIN mata_kuliah mk ON kls.id_mk = mk.id_mk
             WHERE km.nim = ?
               AND kls.id_tahun_akademik = ?",
            [$nim, $idTahunAkademik]
        ));

        return $kelasList->map(function ($kelas) use ($nim) {
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

        $nimList = collect(DB::select(
            "SELECT nim
             FROM mahasiswa
             WHERE id_ps = ?
               AND angkatan = ?",
            [$this->id_prodi_user, $this->angkatan]
        ))->pluck('nim');

        foreach ($nimList as $nim) {
            $this->hydrateMahasiswaCache($nim);
        }

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
        $mappingRows = $this->cache['mapping']
            ->where('id_mk', $idMk)
            ->groupBy('id_cpmk');

        if ($mappingRows->isEmpty()) {
            return null;
        }

        $totalBobotTercapai = 0;
        $totalBobotMaksimal = 0;

        foreach ($mappingRows as $idCpmk => $mappingList) {
            foreach ($mappingList as $mapping) {
                if ($mapping->bobot_cpmk <= 0) {
                    continue;
                }

                $asesmenList = $this->cache['asesmen_by_mapping'][$mapping->id_mk_cpmk_cpl] ?? collect();

                $bobotTercapaiAsesmen = 0;
                $totalBobotAsesmen = 0;

                foreach ($asesmenList as $asesmen) {
                    $totalBobotRA = $this->cache['asesmen_total_bobot'][$asesmen->id_rencana_asesmen] ?? 0;

                    $bobotCpmkRA = $asesmen->bobot ?? 0;

                    if ($totalBobotRA <= 0 || $bobotCpmkRA <= 0) {
                        continue;
                    }

                    $nilaiKey =
                        $idKelas . '-' .
                        $asesmen->id_rencana_asesmen . '-' .
                        $idCpmk;

                    $nilaiRow = $this->cache['nilai_by_key'][$nim][$nilaiKey] ?? null;
                    $nilai = $nilaiRow?->nilai;

                    if ($nilai === null) {
                        continue;
                    }

                    $maxNilai = ($bobotCpmkRA / $totalBobotRA) * 100;

                    if ($maxNilai <= 0) {
                        continue;
                    }

                    $bobotTercapaiAsesmen += ($nilai / $maxNilai) * $bobotCpmkRA;
                    $totalBobotAsesmen += $bobotCpmkRA;
                }

                if ($totalBobotAsesmen > 0) {
                    $nilaiCpmk = ($bobotTercapaiAsesmen / $totalBobotAsesmen) * $mapping->bobot_cpmk;

                    $totalBobotTercapai += $nilaiCpmk;
                    $totalBobotMaksimal += $mapping->bobot_cpmk;
                }
            }
        }

        if ($totalBobotMaksimal <= 0) {
            return null;
        }

        return round(($totalBobotTercapai / $totalBobotMaksimal) * 100, 2);
    }

    private function hitungKetercapaianCPL($nim, $tahunAkademikIds = [])
    {
        return $this->cache['cpl_list']->map(function ($cpl) use ($nim, $tahunAkademikIds) {
            $mappingList = $this->cache['mapping_by_cpl'][$cpl->id_cpl] ?? collect();

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

            if ($totalBobotAsesmenRow <= 0) {
                continue;
            }

            $nilai = null;

            foreach ($tahunAkademikIds as $tahunId) {

                $key =
                    $tahunId . '-' .
                    $asesmenId . '-' .
                    $mapping->id_cpmk;

                if (isset($this->cache['nilai_index'][$nim][$key])) {

                    $currentNilai = $this->cache['nilai_index'][$nim][$key];

                    if ($nilai === null || $currentNilai > $nilai) {
                        $nilai = $currentNilai;
                    }
                }
            }
            $maxNilai = ($bobotCpmk / $totalBobotAsesmenRow) * 100;

            if ($nilai !== null && $maxNilai > 0) {
                $bobotTercapaiAsesmen +=
                    ((float) $nilai / $maxNilai) * (float) $bobotCpmk;
            }

            $totalBobotAsesmen += (float) $bobotCpmk;
        }

        if ($totalBobotAsesmen <= 0 || $mapping->bobot_cpmk <= 0) {
            return 0;
        }

        return ($bobotTercapaiAsesmen / $totalBobotAsesmen)
            * (float) $mapping->bobot_cpmk;
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
?>
