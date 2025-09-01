<?php
namespace App\Livewire;

use App\Models\MataKuliahModel;
use App\Models\UserModel;
use Livewire\Component;
use App\Models\KurikulumModel;
use App\Models\TahunAkademik;
use App\Models\Kurikulum_TahunAkademik;
use App\Models\Kelas;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Support\Facades\DB;

class FormKelasSelector extends Component
{
    public $id_kurikulum;
    public $id_tahun_akademik;
    public $kurikulums = [];
    public $tahunAkademiks = [];
    public $mataKuliahs = [];
    public $jumlah_paralel = 1;
    public $paralels = [];
    public $kelas = [];
    public $muncul = null; // ganjil, genap, semua
    public $id_mk = null;
    public $dosens = []; // Tambahkan property ini

    public function mount()
    {
        $this->kurikulums = KurikulumModel::all();
        $this->paralels = [];
        // Inisialisasi dosens
        $this->loadDosens();
        // Inisialisasi paralel pertama
        $this->initializeParalels();
    }

    private function loadDosens()
    {
        $this->dosens = UserModel::whereHas('userRoleMap', function($q){
            $q->where('id_role', 2);
        })->get();
    }

    private function initializeParalels()
    {
        $this->paralels = [];
        for ($i = 0; $i < $this->jumlah_paralel; $i++) {
            $this->paralels[$i] = [
                'id_user' => null, // Konsisten dengan nama property
                'hari' => null,
                'ruangan' => null,
                'jumlah_mhs' => null,
                'jam' => null,
                'paralel_ke' => $i + 1
            ];
        }
    }

    public function updatedIdKurikulum($value)
    {
        $this->id_tahun_akademik = null;
        $this->id_mk = null;
        $this->muncul = null;
        
        if ($value) {
            $this->tahunAkademiks = TahunAkademik::whereIn('id_tahun_akademik', function($q) use ($value) {
                $q->select('id_tahun_akademik')
                  ->from((new Kurikulum_TahunAkademik)->getTable())
                  ->where('id_kurikulum', $value);
            })->get();
            
            // Update dosens berdasarkan prodi dari kurikulum
            $kurikulum = KurikulumModel::find($value);
            if ($kurikulum) {
                $this->dosens = UserModel::whereHas('userRoleMap', function($q){
                    $q->where('id_role', 2);
                })->where('id_ps', $kurikulum->id_ps)->get();
            }
        } else {
            $this->tahunAkademiks = collect();
        }
        
        $this->updateMataKuliahs();
    }

    public function updatedIdTahunAkademik($value)
    {
        $this->id_mk = null;
        $this->updateMataKuliahs();
    }

    public function updatedMuncul($value)
    {
        $this->id_mk = null;
        $this->updateMataKuliahs();
    }

    public function updatedJumlahParalel($value)
    {
        $this->initializeParalels();
    }

    private function updateMataKuliahs()
    {
        if (!$this->id_kurikulum) {
            $this->mataKuliahs = collect();
            return;
        }

        $query = MataKuliahModel::withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
            ->where('id_kurikulum', $this->id_kurikulum);

        // Filter semester / muncul
        if ($this->muncul) {
            if ($this->muncul === 'semua') {
                // Hanya matkul yang kolom muncul = 'semua'
                $query->where('muncul', 'semua');
            } else {
                // Hanya matkul yang kolom muncul = 'ganjil' atau 'genap' atau 'semua'
                $query->whereIn('muncul', [$this->muncul, 'semua']);
            }
        }

        $this->mataKuliahs = $query->get();
    }

    public function save()
    {
        // Perbaiki validasi
        $this->validate([
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
            'id_tahun_akademik' => 'required|exists:tahun_akademik,id_tahun_akademik',
            'id_mk' => 'required|exists:mata_kuliah,id_mk',
            'paralels.*.id_user' => 'required|exists:user,id_user', // Gunakan id_user sesuai struktur tabel
            'paralels.*.hari' => 'required|string',
            'paralels.*.ruangan' => 'required|string',
            'paralels.*.jumlah_mhs' => 'required|numeric|min:1', // Ubah ke numeric
            'paralels.*.jam' => 'required|string',
        ], [
            // Pesan error kustom
            'id_kurikulum.required' => 'Kurikulum harus dipilih',
            'id_tahun_akademik.required' => 'Tahun akademik harus dipilih',
            'id_mk.required' => 'Mata kuliah harus dipilih',
            'paralels.*.id_user.required' => 'Dosen harus dipilih untuk setiap paralel',
            'paralels.*.hari.required' => 'Hari harus dipilih untuk setiap paralel',
            'paralels.*.ruangan.required' => 'Ruangan harus diisi untuk setiap paralel',
            'paralels.*.jumlah_mhs.required' => 'Jumlah mahasiswa harus diisi',
            'paralels.*.jumlah_mhs.numeric' => 'Jumlah mahasiswa harus berupa angka',
            'paralels.*.jam.required' => 'Jam harus diisi untuk setiap paralel',
        ]);

        try {
            DB::transaction(function() {
                foreach ($this->paralels as $p) {
                    Kelas::create([
                        'id_kurikulum' => $this->id_kurikulum,
                        'id_tahun_akademik' => $this->id_tahun_akademik,
                        'id_mk' => $this->id_mk,
                        'id_user' => $p['id_user'],
                        'hari' => $p['hari'],
                        'ruangan' => $p['ruangan'],
                        'jumlah_mhs' => $p['jumlah_mhs'],
                        'jam' => $p['jam'],
                        'paralel_ke' => $p['paralel_ke']
                    ]);
                }
            });

            session()->flash('message', 'Kelas berhasil ditambahkan!');
            $this->reset(['id_kurikulum','id_tahun_akademik','id_mk','muncul','jumlah_paralel']);
            $this->initializeParalels(); // Reset paralels
            $this->mount(); // Reload data

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menyimpan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.form-kelas-selector');
    }
}