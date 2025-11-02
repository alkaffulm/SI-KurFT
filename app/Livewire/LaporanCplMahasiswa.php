<?php
namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LaporanCplMahasiswa extends Component
{
    public $angkatan = '';
    public $id_mhs = null;
    public $daftarMahasiswa = [];
    public $angkatanList = [];
    
    public function mount()
    {
        $this->angkatanList = DB::table('mahasiswa')
            ->select('angkatan')
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan')
            ->toArray();
    }
    
    public function updatedAngkatan($value)
    {
        $this->id_mhs = null;
        $this->daftarMahasiswa = DB::table('mahasiswa')
            ->select('id_mhs', 'nama_lengkap', 'nim')
            ->where('angkatan', (int)$value)
            ->orderBy('nama_lengkap')
            ->get()
            ->toArray(); // Tambahkan ini untuk memastikan array
        
        // Livewire v3 menggunakan dispatch, bukan emit
        $this->dispatch('mahasiswaChanged', idMhs: $this->id_mhs);
    }
    
    public function updatedIdMhs($value)
    {
        $this->dispatch('mahasiswaChanged', idMhs: $value);
    }
    
    public function render()
    {
        return view('livewire.laporan-cpl-mahasiswa', [
            'angkatanList' => $this->angkatanList,
            'daftarMahasiswa' => $this->daftarMahasiswa,
        ]);
    }
}