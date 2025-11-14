<?php
namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanCplMahasiswa extends Component
{
    // public $angkatan = '';
    // public $nim;
    // public $id_mhs = null;
    // public $daftarMahasiswa = [];
    // public $angkatanList = [];
    
    // public function mount()
    // {
    //     $this->angkatanList = DB::table('mahasiswa')
    //         ->select('angkatan')
    //         ->distinct()
    //         ->orderBy('angkatan', 'desc')
    //         ->pluck('angkatan')
    //         ->toArray();
    // }

    // public function updatedAngkatan($value)
    // {
    //     $this->id_mhs = null;
    //     $this->daftarMahasiswa = DB::table('mahasiswa')
    //         ->select('id_mhs', 'nama_lengkap', 'nim')
    //         ->where('angkatan', (int)$value)
    //         ->orderBy('nama_lengkap')
    //         ->get()
    //         ->toArray(); 
        

    //     $this->dispatch('mahasiswaChanged', idMhs: $this->id_mhs);
    // }
    
    // public function updatedIdMhs($value)
    // {
    //     $this->dispatch('mahasiswaChanged', idMhs: $value);
    // }
    
    // public function render()
    // {
    //     return view('livewire.laporan-cpl-mahasiswa', [
    //         'angkatanList' => $this->angkatanList,
    //         'daftarMahasiswa' => $this->daftarMahasiswa,
    //     ]);
    // }

    public $angkatan;
    public $nim; 
    public $angkatanList = [];
    public $daftarMahasiswa = [];
    public $id_prodi_user;
    // public function mount()
    // {
    //     $user = Auth::user();
    //     $this->id_prodi_user = $user->id_ps ?? null;
    //     $this->angkatanList = DB::table('mahasiswa')
    //         ->select('angkatan')
    //         ->distinct()
    //         ->orderBy('angkatan', 'desc')
    //         ->pluck('angkatan');
    // }

    public function mount()
    {
        $user = Auth::user();
        $this->id_prodi_user = $user->id_ps ?? null; 

        if (!$this->id_prodi_user) {
        }

        $queryAngkatan = DB::table('mahasiswa')
            ->select('angkatan')
            ->distinct();

        if ($this->id_prodi_user) {
            $queryAngkatan->where('id_ps', $this->id_prodi_user); 
        }

        $this->angkatanList = $queryAngkatan
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan');
    }

    // public function updatedAngkatan($value)
    // {
    //     $this->daftarMahasiswa = DB::table('mahasiswa')
    //         ->where('angkatan', $value)
    //         ->orderBy('nama_lengkap')
    //         ->get();

    //     $this->nim = '';
    // }

    // public function render()
    // {
    //     return view('livewire.laporan-cpl-mahasiswa', [
    //         'angkatanList' => $this->angkatanList,
    //         'daftarMahasiswa' => $this->daftarMahasiswa,
    //         'nim' => $this->nim, 
    //     ]);
    // }

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
    }

    public function render()
    {
        return view('livewire.laporan-cpl-mahasiswa', [
            'angkatanList' => $this->angkatanList,
            'daftarMahasiswa' => $this->daftarMahasiswa,
            'nim' => $this->nim, 
        ]);
    }
}