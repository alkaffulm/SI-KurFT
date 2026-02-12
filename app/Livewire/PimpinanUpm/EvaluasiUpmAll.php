<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EvaluasiUpmModel;
use App\Models\ProgramStudiModel;
use App\Models\TahunAkademikModel;

class EvaluasiUpmAll extends Component
{
    use WithPagination;

    // Properti Form (Sesuai kolom database)
    public $id_evaluasi_upm; // Primary Key untuk edit
    public $id_ps;
    public $id_tahun_akademik;
    public $catatan;

    // State Modal
    public $isEditMode = false;

    // Reset Input Fields
    private function resetInputFields()
    {
        $this->id_evaluasi_upm = null;
        $this->id_ps = '';
        $this->id_tahun_akademik = '';
        $this->catatan = '';
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
        
        // Isi properti dengan data yang ada
        $this->id_evaluasi_upm = $evaluasi->id_evaluasi_upm;
        $this->id_ps = $evaluasi->id_ps;
        $this->id_tahun_akademik = $evaluasi->id_tahun_akademik;
        $this->catatan = $evaluasi->catatan;

        $this->dispatch('open-modal');
    }

    // Simpan Data (Create / Update)
    public function store()
    {
        // Validasi input
        $this->validate([
            'id_ps' => 'required|exists:program_studi,id_ps',
            'id_tahun_akademik' => 'required|exists:tahun_akademik,id_tahun_akademik',
            'catatan' => 'nullable|string', // Nullable sesuai skema, tapi bisa diubah required jika wajib
        ]);

        if ($this->isEditMode) {
            // --- LOGIKA EDIT (Cek Perubahan) ---
            $evaluasi = EvaluasiUpmModel::find($this->id_evaluasi_upm);
            
            // Isi data baru ke model tanpa simpan dulu
            $evaluasi->fill([
                'id_ps' => $this->id_ps,
                'id_tahun_akademik' => $this->id_tahun_akademik,
                'catatan' => $this->catatan
            ]);

            if ($evaluasi->isDirty()) {
                $evaluasi->save();
                // Flash Message Sukses (Hijau)
                session()->flash('message', 'Catatan berhasil diperbarui.');
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
                'catatan' => $this->catatan
            ]);
            session()->flash('message', 'Catatan berhasil ditambahkan.');
        }
        
        $this->dispatch('close-modal');
        $this->resetInputFields();
    }

    // Hapus Data
    public function delete($id)
    {
        EvaluasiUpmModel::find($id)->delete();
        session()->flash('message', 'Catatan berhasil dihapus.');
    }

    public function render()
    {
        // Ambil data dengan eager loading relasi agar hemat query
        $dataEvaluasi = EvaluasiUpmModel::with(['programstudi', 'tahunakademik'])
                        ->latest()
                        ->paginate(10);
        return view('livewire.pimpinan-upm.evaluasi-upm-all', [
            'evaluasi' => $dataEvaluasi,
            'list_prodi' => ProgramStudiModel::all(),
            'list_tahun' => TahunAkademikModel::all(), // Sesuaikan nama kolom sortingnya
        ]);
    }
}
