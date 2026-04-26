<?php
namespace App\Livewire;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class DaftarKelasMahasiswa extends Component
{
    public $nim;
    public $kelas = [];

    public function mount($nim = null)
    {
        $this->nim = $nim;
        $this->loadKelas();
    }

    protected function loadKelas()
    {
        if (!$this->nim) {
            $this->kelas = [];
            return;
        }

        $this->kelas = DB::table('kelas_mahasiswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'kelas_mahasiswa.id_kelas')
            ->join('mata_kuliah', 'kelas.id_mk', '=', 'mata_kuliah.id_mk')
            ->where('kelas_mahasiswa.nim', $this->nim)
            ->select([
                'kelas.id_kelas',
                'kelas.paralel_ke',
                'mata_kuliah.nama_matkul_id as nama_mk',
                'mata_kuliah.kode_mk',
                'kelas.id_mk',
            ])
            ->orderBy('mata_kuliah.nama_matkul_id')
            ->get()
            ->map(function ($item) {
                $item->nama_kelas = $item->nama_mk . ' - Kelas ' . $item->paralel_ke;
                return $item;
            });
    }

    public function render()
    {
        return view('livewire.daftar-kelas-mahasiswa', [
            'kelas' => $this->kelas,
        ]);
    }

}