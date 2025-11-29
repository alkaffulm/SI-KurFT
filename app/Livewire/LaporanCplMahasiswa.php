<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanCplMahasiswa extends Component
{
    public $angkatan;
    public $nim; 
    public $angkatanList = [];
    public $daftarMahasiswa = [];
    public $id_prodi_user;
    public $kelas = [];      
    public $cplReports = [];  
    public $id_kurikulum;

    public function mount()
    {
        $user = Auth::user();
        $this->id_prodi_user = $user->id_ps ?? null; 
        $this->id_kurikulum = session('id_kurikulum_aktif');

        if (!$this->id_prodi_user) {
            return;
        }

        $this->angkatanList = DB::table('mahasiswa')
            ->select('angkatan')
            ->distinct()
            ->where('id_ps', $this->id_prodi_user)
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan');
    }

    public function updatedAngkatan($value)
    {
        if (empty($this->id_prodi_user)) {
            $this->daftarMahasiswa = [];
            $this->nim = '';
            return;
        }

        $this->daftarMahasiswa = DB::table('mahasiswa')
            ->where('angkatan', $value)
            ->where('id_ps', $this->id_prodi_user) 
            ->select('nim', 'nama_lengkap')
            ->orderBy('nama_lengkap')
            ->get();

        $this->nim = ''; 
        $this->kelas = [];
        $this->cplReports = [];
    }

    public function updatedNim($nim)
    {
        if (!$nim) {
            $this->kelas = [];
            $this->cplReports = [];
            return;
        }

        $this->kelas = DB::table('kelas_mahasiswa')
            ->join('kelas', 'kelas_mahasiswa.id_kelas', '=', 'kelas.id_kelas')
            ->join('mata_kuliah', 'kelas.id_mk', '=', 'mata_kuliah.id_mk')
            ->where('kelas_mahasiswa.nim', $nim)
            ->select(
                'kelas.id_kelas',
                'mata_kuliah.id_mk',
                'mata_kuliah.kode_mk', 
                'mata_kuliah.nama_matkul_id as nama_mk',
                DB::raw("CONCAT('Kelas ', kelas.paralel_ke) as nama_kelas")
            )
            ->get()
            ->map(function($k) use ($nim) {
                $k->rata_rata_bobot = $this->hitungRataRataBobotMK($k->id_mk, $k->id_kelas, $nim);
                return $k;
            });

        $this->cplReports = $this->hitungKetercapaianCPL($nim);

        $labels = array_column($this->cplReports, 'kode_cpl');
        $data = array_map(fn($r) => $r['nilai_akhir_cpl'] ?? 0, $this->cplReports);

        $this->js("
            setTimeout(() => {
                window.dispatchEvent(new CustomEvent('laporanCplUpdated', {
                    detail: {
                        labels: " . json_encode($labels) . ",
                        data: " . json_encode($data) . "
                    }
                }));
            }, 500);
        ");
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

                    $nilaiMahasiswa = $penilaian->nilai ?? 0;
                    $bobotTercapai = ($nilaiMahasiswa * $totalBobotKomponen) / 100;
                    
                    $bobotTercapaiPerCpmk[$idCpmk] += $bobotTercapai;
                }
            }
        }

        $totalBobotTercapai = array_sum($bobotTercapaiPerCpmk);
        $totalBobotMaksimal = array_sum($bobotMaksimalPerCpmk);

        if ($totalBobotMaksimal == 0) {
            return null;
        }

        return round(($totalBobotTercapai / $totalBobotMaksimal) * 100, 2, PHP_ROUND_HALF_EVEN);
    }



    private function hitungKetercapaianCPL($nim)
    {
        $cplList = DB::table('cpl')
            ->where('id_ps', $this->id_prodi_user)
            ->where('id_kurikulum', $this->id_kurikulum)
            ->select('id_cpl', 'nama_kode_cpl as kode_cpl', 'desc_cpl_id as deskripsi')
            ->get();

        return $cplList->map(function($cpl) use ($nim) {
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
                    'mk.kode_mk',
                    DB::raw('COALESCE(mcb.bobot, 0) as bobot_cpmk_cpl')
                )
                ->get();

            if ($mappingList->isEmpty()) {
                return [
                    'kode_cpl' => $cpl->kode_cpl,
                    'deskripsi' => $cpl->deskripsi,
                    'nilai_akhir_cpl' => null,
                ];
            }

            $totalBobotTercapai = 0;
            $totalBobotMaksimal = 0;

            foreach ($mappingList as $mapping) {
                $bobotMaksimalMapping = $mapping->bobot_cpmk_cpl;
                
                if ($bobotMaksimalMapping == 0) {
                    continue;
                }

                $totalBobotMaksimal += $bobotMaksimalMapping;
                $bobotTercapaiMapping = 0;

                $komponenEvaluasiList = DB::table('rencana_asesmen as ra')
                    ->join('rencana_asesmen_cpmk_bobot as racb', 'ra.id_rencana_asesmen', '=', 'racb.id_rencana_asesmen')
                    ->where('ra.id_mk', $mapping->id_mk)
                    ->where('racb.id_mk_cpmk_cpl', $mapping->id_mk_cpmk_cpl)
                    ->select(
                        'ra.id_rencana_asesmen',
                        'racb.bobot as bobot_cpmk_di_komponen'
                    )
                    ->get();

                foreach ($komponenEvaluasiList as $komponen) {
                    $penilaian = DB::table('penilaian_mahasiswa as pm')
                        ->join('kelas_mahasiswa as km', function($join) use ($nim) {
                            $join->on('pm.id_kelas', '=', 'km.id_kelas')
                                ->where('km.nim', '=', $nim);
                        })
                        ->where('pm.nim', $nim)
                        ->where('pm.id_rencana_asesmen', $komponen->id_rencana_asesmen)
                        ->where('pm.id_cpmk', $mapping->id_cpmk)
                        ->select('pm.nilai')
                        ->first();

                    if ($penilaian) {
                        $totalBobotCpmkDiKomponen = DB::table('rencana_asesmen_cpmk_bobot as racb')
                            ->join('mk_cpmk_cpl_map as mccm', 'racb.id_mk_cpmk_cpl', '=', 'mccm.id_mk_cpmk_cpl')
                            ->where('racb.id_rencana_asesmen', $komponen->id_rencana_asesmen)
                            ->where('mccm.id_cpmk', $mapping->id_cpmk)
                            ->where('mccm.id_mk', $mapping->id_mk)
                            ->sum('racb.bobot');

                        $totalBobotKomponen = DB::table('rencana_asesmen_cpmk_bobot')
                            ->where('id_rencana_asesmen', $komponen->id_rencana_asesmen)
                            ->sum('bobot');

                        $proporsi = $totalBobotCpmkDiKomponen > 0 
                            ? $komponen->bobot_cpmk_di_komponen / $totalBobotCpmkDiKomponen 
                            : 1;

                        $nilaiMahasiswa = $penilaian->nilai ?? 0;
                        $bobotTercapai = $nilaiMahasiswa * $proporsi * $totalBobotKomponen / 100;
                        
                        $bobotTercapaiMapping += $bobotTercapai;
                    }
                }

                $totalBobotTercapai += $bobotTercapaiMapping;
            }

            $nilaiAkhirCpl = null;
            if ($totalBobotMaksimal > 0) {
                $nilaiAkhirCpl = round(($totalBobotTercapai / $totalBobotMaksimal) * 100, 2);
            }

            return [
                'kode_cpl' => $cpl->kode_cpl,
                'deskripsi' => $cpl->deskripsi,
                'nilai_akhir_cpl' => $nilaiAkhirCpl,
            ];
        })->toArray();
    }


    public function render()
    {
        return view('livewire.laporan-cpl-mahasiswa', [
            'angkatanList' => $this->angkatanList,
            'daftarMahasiswa' => $this->daftarMahasiswa,
            'nim' => $this->nim, 
            'kelas' => $this->kelas,
            'cplReports' => $this->cplReports,
            
        ]);
    }
}