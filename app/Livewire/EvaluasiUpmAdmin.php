<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EvaluasiUpmModel;
use App\Models\ProgramStudiModel;
use App\Models\TahunAkademikModel;

class EvaluasiUpmAdmin extends Component
{
    use WithPagination;

    // Properti Form (Sesuai kolom database)
    public $id_evaluasi_upm; // Primary Key untuk edit
    public $id_ps;
    public $id_tahun_akademik;
    public $catatan;
    public $created_at;

    // State Modal
    public $isEditMode = false;

    // Reset Input Fields
    private function resetInputFields()
    {
        $this->id_evaluasi_upm = null;
        $this->id_ps = session('userRoleId'); // Set default ke prodi admin
        $this->id_tahun_akademik = '';
        $this->catatan = '';
        $this->created_at = '';
        $this->isEditMode = false;
        $this->resetErrorBag();
    }

    // Buka Modal Tambah
    public function create()
    {
        $this->resetInputFields();
        $this->dispatch('open-modal'); 
    }

    // Buka Modal Edit
    public function edit($id)
    {
        $this->resetInputFields();
        $this->isEditMode = true;

        $evaluasi = EvaluasiUpmModel::find($id);
        
        // Cek apakah evaluasi milik prodi admin ini
        if ($evaluasi->id_ps !== session('userRoleId')) {
            session()->flash('error', 'Anda tidak memiliki akses ke catatan ini.');
            return;
        }

        // Isi properti dengan data yang ada
        $this->id_evaluasi_upm = $evaluasi->id_evaluasi_upm;
        $this->id_ps = $evaluasi->id_ps;
        $this->id_tahun_akademik = $evaluasi->id_tahun_akademik;
        $this->catatan = $evaluasi->catatan;
        $this->created_at = $evaluasi->created_at->format('Y-m-d');

        $this->dispatch('open-modal');
    }

    // Simpan Data (Create / Update)
    public function store()
    {
        // Validasi input
        $this->validate([
            'id_tahun_akademik' => 'required|exists:tahun_akademik,id_tahun_akademik',
            'catatan' => 'nullable|string',
            'created_at' => 'required|date_format:Y-m-d',
        ]);

        // Set id_ps dari session
        $this->id_ps = session('userRoleId');

        if ($this->isEditMode) {
            // --- LOGIKA EDIT (Cek Perubahan) ---
            $evaluasi = EvaluasiUpmModel::find($this->id_evaluasi_upm);
            
            // Cek akses
            if ($evaluasi->id_ps !== session('userRoleId')) {
                session()->flash('error', 'Anda tidak memiliki akses untuk mengedit catatan ini.');
                return;
            }

            // Isi data baru ke model tanpa simpan dulu
            $evaluasi->fill([
                'id_ps' => $this->id_ps,
                'id_tahun_akademik' => $this->id_tahun_akademik,
                'catatan' => $this->catatan,
                'created_at' => $this->created_at
            ]);

            if ($evaluasi->isDirty()) {
                $evaluasi->save();
                // Flash Message Sukses (Hijau)
                session()->flash('success', 'Catatan berhasil diperbarui.');
            } 
            else {
                // Flash Message Info (Biru/Kuning) - Tidak ada perubahan
                session()->flash('info', 'Tidak ada data yang diubah.');
            }

        } 
        else {
            // --- LOGIKA TAMBAH BARU ---
            EvaluasiUpmModel::create([
                'id_ps' => $this->id_ps,
                'id_tahun_akademik' => $this->id_tahun_akademik,
                'catatan' => $this->catatan,
                'created_at' => $this->created_at
            ]);
            session()->flash('success', 'Catatan berhasil ditambahkan.');
        }
        
        $this->dispatch('close-modal');
        $this->resetInputFields();
    }

    // Hapus Data
    public function delete($id)
    {
        $evaluasi = EvaluasiUpmModel::find($id);
        
        // Cek akses
        if ($evaluasi->id_ps !== session('userRoleId')) {
            session()->flash('error', 'Anda tidak memiliki akses untuk menghapus catatan ini.');
            return;
        }

        $evaluasi->delete();
        session()->flash('success', 'Catatan berhasil dihapus.');
    }

    public function render()
    {
        // Ambil data dengan filter berdasarkan id_ps (prodi admin)
        // Eager loading relasi agar hemat query
        $dataEvaluasi = EvaluasiUpmModel::with(['programstudi', 'tahunakademik'])
                        ->where('id_ps', session('userRoleId'))
                        ->latest()
                        ->paginate(10);
        
        return view('livewire.evaluasi-upm-admin', [
            'evaluasi' => $dataEvaluasi,
            'list_tahun' => TahunAkademikModel::all(),
            'prodi' => ProgramStudiModel::find(session('userRoleId')),
        ]);
    }
}
