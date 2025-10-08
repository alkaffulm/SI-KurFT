<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MahasiswaModel;
use Illuminate\Support\Facades\Auth;

class MasterMahasiswaTable extends Component
{
    public $angkatan;
    public $daftarAngkatan = [];

    public function mount()
    {
        $id_ps = Auth::user()->id_ps;

        // ambil daftar angkatan unik dari mahasiswa prodi ini
        $this->daftarAngkatan = MahasiswaModel::where('id_ps', $id_ps)
            ->select('angkatan')
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan')
            ->toArray();

        // default: tampilkan angkatan terbaru
        $this->angkatan = $this->daftarAngkatan[0] ?? null;
    }

    public function render()
    {
        $id_ps = Auth::user()->id_ps;

        // Ambil mahasiswa terbaru per NIM
        $mahasiswa = MahasiswaModel::where('id_ps', $id_ps)
            ->when($this->angkatan, function ($query) {
                $query->where('angkatan', $this->angkatan);
            })
            ->orderBy('created_at', 'desc') // urutkan data terbaru di atas
            ->get()
            ->unique('nim'); // ambil 1 row per NIM (yang terbaru)

        // Daftar angkatan
        $daftarAngkatan = MahasiswaModel::where('id_ps', $id_ps)
            ->select('angkatan')
            ->distinct()
            ->orderBy('angkatan', 'asc')
            ->pluck('angkatan');

        return view('livewire.master-mahasiswa-table', [
            'mahasiswa' => $mahasiswa,
            'daftarAngkatan' => $daftarAngkatan,
        ]);
    }


    public function hapus($id)
    {
        MahasiswaModel::findOrFail($id)->delete();
        session()->flash('success', 'Data mahasiswa berhasil dihapus!');
    }
}
