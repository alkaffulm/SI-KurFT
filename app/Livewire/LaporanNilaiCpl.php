<?php
namespace App\Livewire;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class LaporanNilaiCpl extends Component
{
    public $id_mhs;
    public $hasilCpl = [];
    
    #[On('mahasiswaChanged')]
    public function onMahasiswaChanged($idMhs)
    {
        $this->id_mhs = $idMhs;
        $this->hitungNilaiCpl();
    }
    
    public function mount($id_mhs = null)
    {
        $this->id_mhs = $id_mhs;
        $this->hitungNilaiCpl();
    }
    
    public function hitungNilaiCpl()
    {
        $this->hasilCpl = [];
        if (!$this->id_mhs) return;
        
        // Ambil id_ps dari mahasiswa
        $mahasiswa = DB::table('mahasiswa')
            ->where('id_mhs', $this->id_mhs)
            ->first();
        
        if (!$mahasiswa || !isset($mahasiswa->id_ps)) {
            return; // Jika mahasiswa tidak punya id_ps, hentikan
        }
        
        // Ambil CPL sesuai id_ps mahasiswa
        $cplList = DB::table('cpl')
            ->select('id_cpl', 'nama_kode_cpl', 'desc_cpl_id')
            ->where('id_ps', $mahasiswa->id_ps)  // FILTER BERDASARKAN id_ps
            ->orderBy('id_cpl')
            ->get();
        
        foreach ($cplList as $cpl) {
            $q = DB::table('penilaian_mahasiswa_cpmk as pmc')
                ->join('kelas', 'pmc.id_kelas', '=', 'kelas.id_kelas')
                ->join('cpl_cpmk_bobot as ccb', function($join) use ($cpl, $mahasiswa) {
                    $join->on('pmc.id_cpmk', '=', 'ccb.id_cpmk')
                         ->on('kelas.id_mk', '=', 'ccb.id_mk')
                         ->where('ccb.id_cpl', '=', $cpl->id_cpl)
                         ->where('ccb.id_ps', '=', $mahasiswa->id_ps);  // TAMBAHAN: Filter bobot juga
                })
                ->where('pmc.id_mhs', $this->id_mhs)
                ->whereNotNull('pmc.nilai_rata')
                ->selectRaw('
                    SUM(pmc.nilai_rata * ccb.bobot) as numerator, 
                    SUM(ccb.bobot) as denom
                ')
                ->first();
            
            $rata = null;
            if ($q && $q->denom > 0) {
                $rata = ($q->numerator / $q->denom);
            }
            
            $this->hasilCpl[] = [
                'id_cpl' => $cpl->id_cpl,
                'kode' => $cpl->nama_kode_cpl,
                'deskripsi' => $cpl->desc_cpl_id,
                'rata' => $rata !== null ? round($rata, 2) : null,
            ];
        }
        
        $labels = array_map(fn($r) => $r['kode'], $this->hasilCpl);
        $data = array_map(fn($r) => $r['rata'] ?? 0, $this->hasilCpl);
        
        $this->dispatch('laporanCplUpdated', 
            labels: $labels, 
            data: $data
        );
    }
    
    public function render()
    {
        return view('livewire.laporan-nilai-cpl', [
            'hasilCpl' => $this->hasilCpl,
        ]);
    }
}