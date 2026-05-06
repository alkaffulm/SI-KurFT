<?php 
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanNilaiCpl extends Component
{
    public $nim;
    public $cplReports = [];  
    public $id_prodi_user;

    public function mount($nim = null)
    {
        $this->nim = $nim;

        $user = Auth::user();
        $this->id_prodi_user = $user->id_ps ?? null;

        $this->loadLaporanCPL();
    }

    public function updatedNim($value)
    {
        $this->nim = $value;
        $this->loadLaporanCPL();
    }

    protected function loadLaporanCPL()
    {
        if (!$this->nim || !$this->id_prodi_user) {
            $this->cplReports = [];
            $this->dispatch('laporanCplUpdated', labels: [], data: []);
            return;
        }

        $nilaiRataMk = DB::select(
            "SELECT map.id_mk, AVG(pmc.nilai_rata) as rata_mk
             FROM penilaian_mahasiswa_cpmk pmc
             JOIN mk_cpmk_cpl_map map ON pmc.id_cpmk = map.id_cpmk
             WHERE pmc.nim = ?
             GROUP BY map.id_mk",
            [$this->nim]
        );

        $nilaiMkMap = [];
        foreach ($nilaiRataMk as $row) {
            $nilaiMkMap[$row->id_mk] = $row->rata_mk;
        }

        $cplRows = DB::select(
            "SELECT 
                cpl.id_cpl,
                cpl.nama_kode_cpl as kode_cpl,
                cpl.desc_cpl_id as deskripsi,
                bmu.id_mk,
                mk.nama_matkul_id as nama_mk,
                bmu.bobot_persen
             FROM bobot_mk_untuk_cpl bmu
             JOIN cpl ON bmu.id_cpl = cpl.id_cpl
             JOIN mata_kuliah mk ON bmu.id_mk = mk.id_mk
             WHERE cpl.id_ps = ?",
            [$this->id_prodi_user]
        );

        $grouped = [];

        foreach ($cplRows as $row) {
            $rata_mk = $nilaiMkMap[$row->id_mk] ?? 0;
            $kontribusi = ($rata_mk * $row->bobot_persen) / 100;

            if (!isset($grouped[$row->id_cpl])) {
                $grouped[$row->id_cpl] = [
                    'kode_cpl' => $row->kode_cpl,
                    'deskripsi' => $row->deskripsi,
                    'total' => 0,
                    'details' => []
                ];
            }

            $grouped[$row->id_cpl]['total'] += $kontribusi;

            $grouped[$row->id_cpl]['details'][] = [
                'id_mk' => $row->id_mk,
                'nama_mk' => $row->nama_mk,
                'rata_mk' => round((float) $rata_mk, 2),
                'bobot_persen' => (float) $row->bobot_persen,
                'kontribusi_nilai' => round((float) $kontribusi, 2),
            ];
        }

        $result = [];

        foreach ($grouped as $item) {
            $result[] = [
                'kode_cpl' => $item['kode_cpl'],
                'deskripsi' => $item['deskripsi'],
                'nilai_akhir_cpl' => round($item['total'], 2),
                'details' => $item['details'],
            ];
        }

        $this->cplReports = $result;

        if (!empty($this->cplReports)) {
            $labels = array_map(fn ($r) => $r['kode_cpl'], $this->cplReports);
            $data   = array_map(fn ($r) => $r['nilai_akhir_cpl'], $this->cplReports);
            $this->dispatch('laporanCplUpdated', labels: $labels, data: $data);
        } else {
            $this->dispatch('laporanCplUpdated', labels: [], data: []);
        }
    }

    public function render()
    {
        return view('livewire.laporan-nilai-cpl', [
            'cplReports' => $this->cplReports,
        ]);
    }
}

?>