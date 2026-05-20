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

        $this->tahunAkademikList = DB::select(
            "SELECT * FROM tahun_akademik ORDER BY id_tahun_akademik"
        );

        $this->hydrateStaticCache();
    }

    public function hydrate()
    {
        if (!empty($this->cache['mapping'])) {
            return;
        }

        $this->hydrateStaticCache();

        if ($this->mode === 'mahasiswa' && $this->nim) {
            $this->hydrateMahasiswaCache([$this->nim]);

            if (!empty($this->tahunAkademikListFiltered)) {
                $tahunIds = array_column(
                    $this->tahunAkademikListFiltered,
                    'id_tahun_akademik'
                );

                $this->hydrateKelasMahasiswaCache(
                    $this->nim,
                    $tahunIds
                );
            }
        }

        if ($this->mode === 'angkatan' && $this->angkatan) {
            $nimList = $this->getNimListAngkatan($this->angkatan);

            $this->hydrateMahasiswaCache(
                $nimList->toArray()
            );
        }
    }

    protected function hydrateStaticCache()
    {
        $this->cache['cpl_list'] = collect(DB::select(
            "SELECT id_cpl, nama_kode_cpl AS kode_cpl, desc_cpl_id AS deskripsi
             FROM cpl
             WHERE id_ps = ? AND id_kurikulum = ?",
            [$this->id_prodi_user, $this->id_kurikulum]
        ));

        $mappingRaw = collect(DB::select(
            "SELECT
                mccm.id_cpl,
                mccm.id_mk,
                mccm.id_cpmk,
                mccm.id_mk_cpmk_cpl,
                COALESCE(mcb.bobot, 0) AS bobot_cpmk
             FROM mk_cpmk_cpl_map mccm
             JOIN mata_kuliah mk ON mccm.id_mk = mk.id_mk
             LEFT JOIN mk_cpmk_bobot mcb
                ON mccm.id_mk_cpmk_cpl = mcb.id_mk_cpmk_cpl
             WHERE mk.id_ps = ? AND mk.id_kurikulum = ?",
            [$this->id_prodi_user, $this->id_kurikulum]
        ));

        $this->cache['mapping']        = $mappingRaw;
        $this->cache['mapping_by_cpl'] = $mappingRaw->groupBy('id_cpl');
        $this->cache['mapping_by_mk']  = $mappingRaw->groupBy('id_mk');

        $asesmenRaw = collect(DB::select(
            "SELECT
                ra.id_rencana_asesmen,
                ra.id_mk,
                racb.id_mk_cpmk_cpl,
                racb.bobot
             FROM rencana_asesmen ra
             JOIN rencana_asesmen_cpmk_bobot racb
                ON ra.id_rencana_asesmen = racb.id_rencana_asesmen"
        ));

        $this->cache['asesmen_by_mapping'] = $asesmenRaw->groupBy('id_mk_cpmk_cpl');

        $totalBobotPerRa   = [];
        $bobotPerMappingRa = [];
        $raIdsByMk         = [];

        foreach ($asesmenRaw as $row) {
            $totalBobotPerRa[$row->id_rencana_asesmen] =
                ($totalBobotPerRa[$row->id_rencana_asesmen] ?? 0) + $row->bobot;

            $bobotPerMappingRa[$row->id_mk_cpmk_cpl . '-' . $row->id_rencana_asesmen] =
                ($bobotPerMappingRa[$row->id_mk_cpmk_cpl . '-' . $row->id_rencana_asesmen] ?? 0) + $row->bobot;

            $raIdsByMk[$row->id_mk][$row->id_rencana_asesmen] = true;
        }

        $this->cache['asesmen_total_bobot']  = $totalBobotPerRa;
        $this->cache['bobot_per_mapping_ra'] = $bobotPerMappingRa;
        $this->cache['ra_ids_by_mk']         = $raIdsByMk;
    }

    protected function hydrateMahasiswaCache(array $nimList)
    {
        $nimBelumAda = array_filter(
            $nimList,
            fn($nim) => !isset($this->cache['nilai_index'][$nim])
        );

        if (empty($nimBelumAda)) {
            return;
        }

        $placeholders = implode(',', array_fill(0, count($nimBelumAda), '?'));

        $nilaiRows = DB::select(
            "SELECT
                pm.nim,
                pm.id_kelas,
                pm.id_rencana_asesmen,
                pm.id_cpmk,
                pm.nilai,
                kls.id_tahun_akademik
             FROM penilaian_mahasiswa pm
             LEFT JOIN kelas kls ON pm.id_kelas = kls.id_kelas
             WHERE pm.nim IN ($placeholders)",
            array_values($nimBelumAda)
        );

        foreach ($nimBelumAda as $nim) {
            $this->cache['nilai_index'][$nim]    = [];
            $this->cache['nilai_by_key'][$nim]   = [];
            $this->cache['nilai_by_tahun'][$nim] = [];
        }

        foreach ($nilaiRows as $row) {
            $nim = $row->nim;

            $keyTahun = $row->id_tahun_akademik . '-' . $row->id_rencana_asesmen . '-' . $row->id_cpmk;

            if (
                !isset($this->cache['nilai_index'][$nim][$keyTahun]) ||
                $row->nilai > $this->cache['nilai_index'][$nim][$keyTahun]
            ) {
                $this->cache['nilai_index'][$nim][$keyTahun] = $row->nilai;
            }

            $keyKelas = $row->id_kelas . '-' . $row->id_rencana_asesmen . '-' . $row->id_cpmk;

            if (!isset($this->cache['nilai_by_key'][$nim][$keyKelas])) {
                $this->cache['nilai_by_key'][$nim][$keyKelas] = $row;
            }

            $this->cache['nilai_by_tahun'][$nim][$row->id_tahun_akademik][] = $row;
        }
    }

    protected function hydrateKelasMahasiswaCache($nim, array $tahunIds)
    {
        if (isset($this->cache['kelas_mhs'][$nim])) {
            return;
        }

        $placeholders = implode(',', array_fill(0, count($tahunIds), '?'));

        $rows = DB::select(
            "SELECT
                kls.id_kelas,
                kls.id_tahun_akademik,
                mk.id_mk,
                mk.kode_mk,
                mk.nama_matkul_id AS nama_mk,
                CONCAT('Kelas ', kls.paralel_ke) AS nama_kelas
             FROM kelas_mahasiswa km
             JOIN kelas kls ON km.id_kelas = kls.id_kelas
             JOIN mata_kuliah mk ON kls.id_mk = mk.id_mk
             WHERE km.nim = ?
               AND kls.id_tahun_akademik IN ($placeholders)",
            array_merge([$nim], $tahunIds)
        );

        $byTahun = [];

        foreach ($rows as $row) {
            $byTahun[$row->id_tahun_akademik][] = $row;
        }

        $this->cache['kelas_mhs'][$nim] = $byTahun;
    }

    public function updatedMode($value)
    {
        $this->angkatan                = null;
        $this->nim                     = null;
        $this->daftarMahasiswa         = [];
        $this->laporanPerTahun         = [];
        $this->laporanAngkatanPerTahun = [];
        $this->tahunAkademikId         = null;
        $this->cplReportsAngkatan      = [];

        if ($value === 'mahasiswa') {
            $this->loadAngkatanList();
        }

        if ($value === 'angkatan' && empty($this->tahunAkademikList)) {
            $this->tahunAkademikList = DB::select(
                "SELECT * FROM tahun_akademik ORDER BY id_tahun_akademik"
            );
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

            $this->nim                       = null;
            $this->laporanPerTahun           = [];
            $this->tahunAkademikListFiltered = [];
            $this->resetPage();
            return;
        }

        $this->laporanAngkatanPerTahun = [];
        $this->resetPage('pageAngkatan');
        $this->loadCplAngkatan();
    }

    public function updatedNim($nim)
    {
        if ($this->mode !== 'mahasiswa' || !$nim) {
            $this->laporanPerTahun           = [];
            $this->tahunAkademikListFiltered = [];
            return;
        }

        $this->hydrateMahasiswaCache([$nim]);

        $this->mahasiswa = DB::selectOne(
            "SELECT m.nama_lengkap, m.angkatan, ps.nama_prodi
             FROM mahasiswa m
             JOIN program_studi ps ON m.id_ps = ps.id_ps
             WHERE m.nim = ?",
            [$nim]
        );

        $tahunMasuk = (int) $this->angkatan;

        $tahunCollection = $this->getTahunAkademikByAngkatan($tahunMasuk);
        $this->tahunAkademikListFiltered = $tahunCollection->map(fn($t) => (array) $t)->toArray();

        $tahunIds = array_column($this->tahunAkademikListFiltered, 'id_tahun_akademik');
        $this->hydrateKelasMahasiswaCache($nim, $tahunIds);

        $this->laporanPerTahun = [];
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
        $data    = collect($this->laporanAngkatanPerTahun);
        $page    = $this->getPage('pageAngkatan');
        $perPage = $this->perPageAngkatan;

        return new LengthAwarePaginator(
            $data->forPage($page, $perPage)->values(),
            $data->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'pageName' => 'pageAngkatan']
        );
    }

    public function getLaporanPerTahunPaginatedProperty()
    {
        if (!$this->nim) {
            return new LengthAwarePaginator(
                [], 0, $this->perPage, 1, ['path' => request()->url()]
            );
        }

        $tahunList   = $this->tahunAkademikListFiltered;
        $totalTahun  = count($tahunList);
        $currentPage = $this->getPage();
        $perPage     = $this->perPage;

        $offset    = ($currentPage - 1) * $perPage;
        $tahunPage = array_slice($tahunList, $offset, $perPage);

        $result = [];

        foreach ($tahunPage as $index => $ta) {
            $posisiGlobal = $offset + $index + 1;

            $tahunAkademikIdsAkumulasi = array_column(
                array_slice($tahunList, 0, $posisiGlobal),
                'id_tahun_akademik'
            );

            $idTahunAkademik = $ta['id_tahun_akademik'];
            $tahunAkademik   = $ta['tahun_akademik'];

            $kelas = $this->getKelasMahasiswaPerTahunFromCache($this->nim, $idTahunAkademik);
            $cpl   = $this->hitungKetercapaianCPL($this->nim, $tahunAkademikIdsAkumulasi);

            $result[] = [
                'tahun_akademik' => $tahunAkademik,
                'kelas'          => $kelas,
                'cpl'            => $cpl,
                'chart'          => $this->buildChartData($cpl),
            ];
        }

        $this->dispatch('renderCharts');

        return new LengthAwarePaginator(
            $result,
            $totalTahun,
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

        $this->angkatanList = array_map(fn($r) => $r->angkatan, $rows);
    }

    private function getNimListAngkatan($angkatan)
    {
        return collect(DB::select(
            "SELECT nim FROM mahasiswa WHERE id_ps = ? AND angkatan = ?",
            [$this->id_prodi_user, $angkatan]
        ))->pluck('nim');
    }

    private function getTahunAkademikByAngkatan($tahunMasuk)
    {
        $tahunAkademik = collect(range(0, 3))
            ->map(fn($i) => ($tahunMasuk + $i) . '/' . ($tahunMasuk + $i + 1))
            ->toArray();

        if (empty($tahunAkademik)) {
            return collect();
        }

        $placeholders = implode(',', array_fill(0, count($tahunAkademik), '?'));

        $rows = collect(DB::select(
            "SELECT * FROM tahun_akademik
            WHERE tahun_akademik IN ($placeholders)",
            $tahunAkademik
        ));

        return collect($tahunAkademik)
            ->map(fn($tahun) => $rows->firstWhere('tahun_akademik', $tahun))
            ->filter()
            ->values();
    }

    private function getKelasMahasiswaPerTahunFromCache($nim, $idTahunAkademik)
    {
        $kelasList = collect($this->cache['kelas_mhs'][$nim][$idTahunAkademik] ?? []);

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

        $tahunMasuk        = (int) $this->angkatan;
        $tahunAkademikList = $this->getTahunAkademikByAngkatan($tahunMasuk);
        $nimList           = $this->getNimListAngkatan($this->angkatan);

        if ($nimList->isEmpty()) {
            return;
        }

        $this->hydrateMahasiswaCache($nimList->toArray());

        $tahunAkademikIdsAkumulasi = [];

        foreach ($tahunAkademikList as $ta) {
            $tahunAkademikIdsAkumulasi[] = $ta->id_tahun_akademik;

            $aggregate = [];

            foreach ($this->cache['cpl_list'] as $cpl) {
                $aggregate[$cpl->kode_cpl] = [
                    'kode_cpl'       => $cpl->kode_cpl,
                    'deskripsi'      => $cpl->deskripsi,
                    'bobot_tercapai' => 0.0,
                    'bobot_maks'     => 0.0,
                ];
            }

            foreach ($nimList as $nim) {
                $rawRows = $this->hitungRawCplMahasiswa($nim, $tahunAkademikIdsAkumulasi);

                foreach ($rawRows as $kode => $raw) {
                    if (!isset($aggregate[$kode])) {
                        $aggregate[$kode] = [
                            'kode_cpl'       => $raw['kode_cpl'],
                            'deskripsi'      => $raw['deskripsi'],
                            'bobot_tercapai' => 0.0,
                            'bobot_maks'     => 0.0,
                        ];
                    }

                    $aggregate[$kode]['bobot_tercapai'] += $raw['bobot_tercapai'];
                    $aggregate[$kode]['bobot_maks']     += $raw['bobot_maks'];
                }
            }

            $cplFinal = collect($aggregate)
                ->map(fn($item) => [
                    'kode_cpl'        => $item['kode_cpl'],
                    'deskripsi'       => $item['deskripsi'],
                    'nilai_akhir_cpl' => $item['bobot_maks'] > 0
                        ? round(($item['bobot_tercapai'] / $item['bobot_maks']) * 100, 2)
                        : null,
                ])
                ->values()
                ->toArray();

            $this->laporanAngkatanPerTahun[] = [
                'tahun_akademik' => $ta->tahun_akademik,
                'cpl'            => $cplFinal,
                'chart'          => $this->buildChartData($cplFinal),
            ];
        }

        $this->dispatch('renderCharts');
    }

    private function hitungRawCplMahasiswa($nim, $tahunAkademikIds = [])
    {
        $result = [];

        foreach ($this->cache['cpl_list'] as $cpl) {
            $mappingList = $this->cache['mapping_by_cpl'][$cpl->id_cpl] ?? collect();

            $totalBobotMaks     = 0.0;
            $totalBobotTercapai = 0.0;

            foreach ($mappingList as $mapping) {
                if ($mapping->bobot_cpmk == 0) {
                    continue;
                }

                $nilaiCpmk = $this->hitungNilaiCpmkMahasiswa($nim, $mapping, $tahunAkademikIds);

                $totalBobotTercapai += $nilaiCpmk;
                $totalBobotMaks     += $mapping->bobot_cpmk;
            }

            $result[$cpl->kode_cpl] = [
                'kode_cpl'       => $cpl->kode_cpl,
                'deskripsi'      => $cpl->deskripsi,
                'bobot_tercapai' => $totalBobotTercapai,
                'bobot_maks'     => $totalBobotMaks,
            ];
        }

        return $result;
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

                $nilaiCpmk           = $this->hitungNilaiCpmkMahasiswa($nim, $mapping, $tahunAkademikIds);
                $totalBobotTercapai += $nilaiCpmk;
                $totalBobotMaksimal += $mapping->bobot_cpmk;
            }

            return [
                'kode_cpl'        => $cpl->kode_cpl,
                'deskripsi'       => $cpl->deskripsi,
                'nilai_akhir_cpl' => $totalBobotMaksimal > 0
                    ? round(($totalBobotTercapai / $totalBobotMaksimal) * 100, 2)
                    : 0,
            ];
        })->values()->toArray();
    }

    private function hitungNilaiCpmkMahasiswa($nim, $mapping, $tahunAkademikIds = [])
    {
        $raIds = array_keys($this->cache['ra_ids_by_mk'][$mapping->id_mk] ?? []);

        if (empty($raIds)) {
            return 0;
        }

        $bobotTercapaiAsesmen = 0;
        $totalBobotAsesmen    = 0;

        foreach ($raIds as $asesmenId) {
            $totalBobotAsesmenRow = $this->cache['asesmen_total_bobot'][$asesmenId] ?? 0;

            if ($totalBobotAsesmenRow <= 0) {
                continue;
            }

            $bobotKey  = $mapping->id_mk_cpmk_cpl . '-' . $asesmenId;
            $bobotCpmk = $this->cache['bobot_per_mapping_ra'][$bobotKey] ?? 0;

            if ($bobotCpmk <= 0) {
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

    private function hitungRataRataBobotMK($idMk, $idKelas, $nim)
    {
        $mappingRows = ($this->cache['mapping_by_mk'][$idMk] ?? collect())
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
                $totalBobotAsesmen    = 0;

                foreach ($asesmenList as $asesmen) {
                    $totalBobotRA = $this->cache['asesmen_total_bobot'][$asesmen->id_rencana_asesmen] ?? 0;
                    $bobotCpmkRA  = $asesmen->bobot ?? 0;

                    if ($totalBobotRA <= 0 || $bobotCpmkRA <= 0) {
                        continue;
                    }

                    $nilaiKey = $idKelas . '-' . $asesmen->id_rencana_asesmen . '-' . $idCpmk;
                    $nilaiRow = $this->cache['nilai_by_key'][$nim][$nilaiKey] ?? null;
                    $nilai    = $nilaiRow->nilai ?? null;

                    if ($nilai === null) {
                        continue;
                    }

                    $maxNilai = ($bobotCpmkRA / $totalBobotRA) * 100;

                    if ($maxNilai <= 0) {
                        continue;
                    }

                    $bobotTercapaiAsesmen += ($nilai / $maxNilai) * $bobotCpmkRA;
                    $totalBobotAsesmen    += $bobotCpmkRA;
                }

                if ($totalBobotAsesmen > 0) {
                    $nilaiCpmk           = ($bobotTercapaiAsesmen / $totalBobotAsesmen) * $mapping->bobot_cpmk;
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

    private function buildChartData($cpl)
    {
        return [
            'labels' => array_column($cpl, 'kode_cpl'),
            'data'   => array_map(fn($row) => $row['nilai_akhir_cpl'] ?? 0, $cpl),
        ];
    }

    public function render()
    {
        return view('livewire.laporan-cpl-mahasiswa', [
            'mode'                    => $this->mode,
            'angkatanList'            => $this->angkatanList,
            'daftarMahasiswa'         => $this->daftarMahasiswa,
            'laporanPerTahun'         => $this->laporanPerTahun,
            'tahunAkademikId'         => $this->tahunAkademikId,
            'tahunAkademikList'       => $this->tahunAkademikList,
            'laporanAngkatanPerTahun' => $this->laporanAngkatanPerTahun,
        ]);
    }
}