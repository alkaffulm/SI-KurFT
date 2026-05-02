<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MahasiswaModel;
use Illuminate\Pagination\LengthAwarePaginator;

class MasterMahasiswaTable extends Component
{
    use WithPagination;

    public $angkatan;
    public $daftarAngkatan = [];
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $id_ps = session('userRoleId');

        // ambil daftar angkatan unik dari mahasiswa prodi ini
        $this->daftarAngkatan = MahasiswaModel::where('id_ps', $id_ps)
            ->where('angkatan', '>=', 2021)
            ->select('angkatan')
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan')
            ->toArray();

        // default: tampilkan angkatan terbaru
        $this->angkatan = $this->daftarAngkatan[0] ?? null;
    }

    // reset pagination saat filter angkatan berubah
    public function updatingAngkatan()
    {
        $this->resetPage();
    }

    public function render()
    {
        $id_ps = session('userRoleId');

        // Ambil mahasiswa terbaru per NIM
        $mahasiswaCollection = MahasiswaModel::where('id_ps', $id_ps)->where('angkatan', '>=', 2021)

            ->when($this->angkatan, function ($query) {
                $query->where('angkatan', $this->angkatan);
            })

            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nim', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_lengkap', 'like', '%' . $this->search . '%');
                });
            })

            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('nim')
            ->values();

        // Pagination manual
        $perPage = 20;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentItems = $mahasiswaCollection->slice(
            ($currentPage - 1) * $perPage,
            $perPage
        )->values();

        $mahasiswa = new LengthAwarePaginator(
            $currentItems,
            $mahasiswaCollection->count(),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );

        // Daftar angkatan
        // $daftarAngkatan = MahasiswaModel::where('id_ps', $id_ps)
        //     ->select('angkatan')
        //     ->distinct()
        //     ->orderBy('angkatan', 'asc')
        //     ->pluck('angkatan');

        return view('livewire.master-mahasiswa-table', [
            'mahasiswa' => $mahasiswa,
            // 'daftarAngkatan' => $daftarAngkatan,
        ]);
    }

    public function hapus($id)
    {
        MahasiswaModel::findOrFail($id)->delete();

        return redirect()
            ->route('master-mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}