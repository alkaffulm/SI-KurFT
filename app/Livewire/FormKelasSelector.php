<?php
// 1. PASTIKAN KONFIGURASI PHP.INI SUDAH BENAR
/*
Tambahkan di php.ini:
file_uploads = On
upload_max_filesize = 10M
post_max_size = 10M
max_file_uploads = 20
memory_limit = 256M
max_execution_time = 300
*/

// 2. TAMBAHKAN KONFIGURASI DI LIVEWIRE COMPONENT
namespace App\Livewire;

use Livewire\WithFileUploads;
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
use Livewire\Attributes\Validate;

class FormKelasSelector extends Component
{
    use WithFileUploads;
    
    // 3. UBAH VALIDASI UNTUK ARRAY FILES
    public $file_excel;
    public $id_kurikulum;
    public $id_tahun_akademik;
    public $kurikulums = [];
    public $tahunAkademiks = [];
    public $mataKuliahs = [];
    public $jumlah_paralel = 1;
    public $paralels = [];
    public $kelas = [];
    public $muncul = null;
    public $id_mk = null;
    public $dosens = [];
    
    // Tambahkan property khusus untuk file upload per paralel
    public $paralel_files = [];

    public function mount()
    {
        $this->kurikulums = KurikulumModel::all();
        $this->paralels = [];
        $this->loadDosens();
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
        $this->paralel_files = [];

        for ($i = 0; $i < $this->jumlah_paralel; $i++) {
            $this->paralels[$i] = [
                'id_user' => null,
                'jumlah_mhs' => null,
                'paralel_ke' => $i + 1,
            ];

            $this->paralel_files[$i] = null;
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

    // 5. TAMBAHKAN METHOD UNTUK HANDLE FILE UPLOAD
    public function updatedParalelFiles($value, $key)
    {
        // Debug: tampilkan info file
        if ($value) {
            logger()->info("Paralel file uploaded", [
                'key' => $key,
                'name' => $value->getClientOriginalName(),
                'size' => $value->getSize(),
                'mime' => $value->getMimeType(),
                'valid' => $value->isValid(),
            ]);
        } else {
            logger()->info("Paralel file is null", ['key' => $key]);
        }

        // Validasi file
        $this->validateOnly("paralel_files.{$key}", [
            "paralel_files.{$key}" => 'nullable|file|mimes:xlsx,xls|max:2048',
        ], [
            "paralel_files.{$key}.file" => "File paralel " . ($key + 1) . " harus berupa file.",
            "paralel_files.{$key}.mimes" => "File paralel " . ($key + 1) . " harus berformat Excel (.xlsx atau .xls).",
            "paralel_files.{$key}.max" => "File paralel " . ($key + 1) . " maksimal 2MB.",
        ]);
    }


    private function updateMataKuliahs()
    {
        if (!$this->id_kurikulum) {
            $this->mataKuliahs = collect();
            return;
        }

        $query = MataKuliahModel::withoutGlobalScopes([ProdiScope::class, KurikulumScope::class])
            ->where('id_kurikulum', $this->id_kurikulum);

        if ($this->muncul) {
            if ($this->muncul === 'semua') {
                $query->where('muncul', 'semua');
            } else {
                $query->whereIn('muncul', [$this->muncul, 'semua']);
            }
        }

        $this->mataKuliahs = $query->get();
    }

    public function save()
    {
        // 6. PERBAIKI VALIDASI
        $rules = [
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
            'id_tahun_akademik' => 'required|exists:tahun_akademik,id_tahun_akademik',
            'id_mk' => 'required|exists:mata_kuliah,id_mk',
            'paralels.*.id_user' => 'required|exists:user,id_user',
            'paralels.*.jumlah_mhs' => 'required|numeric|min:1',
        ];

        // Tambahkan validasi file hanya jika ada file yang diupload
        foreach ($this->paralel_files as $index => $file) {
            if ($file) {
                $rules["paralel_files.{$index}"] = 'file|mimes:xlsx,xls|max:2048';
            }
        }

        $messages = [
            'id_kurikulum.required' => 'Kurikulum harus dipilih',
            'id_tahun_akademik.required' => 'Tahun akademik harus dipilih',
            'id_mk.required' => 'Mata kuliah harus dipilih',
            'paralels.*.id_user.required' => 'Dosen harus dipilih untuk setiap paralel',
            'paralels.*.jumlah_mhs.required' => 'Jumlah mahasiswa harus diisi',
            'paralels.*.jumlah_mhs.numeric' => 'Jumlah mahasiswa harus berupa angka',
        ];

        // Tambahkan pesan error untuk file
        foreach ($this->paralel_files as $index => $file) {
            if ($file) {
                $paralelNum = $index + 1;
                $messages["paralel_files.{$index}.file"] = "File paralel {$paralelNum} harus berupa file yang valid";
                $messages["paralel_files.{$index}.mimes"] = "File paralel {$paralelNum} harus berformat Excel (.xlsx atau .xls)";
                $messages["paralel_files.{$index}.max"] = "File paralel {$paralelNum} maksimal 2MB";
            }
        }

        $this->validate($rules, $messages);

        try {
            DB::transaction(function () {
                foreach ($this->paralels as $index => $p) {
                    $excelPath = null;

                    // 7. PERBAIKI PENGECEKAN DAN PENYIMPANAN FILE
                    if (isset($this->paralel_files[$index]) && $this->paralel_files[$index] !== null) {
                        try {
                            $file = $this->paralel_files[$index];

                            // Debug info file sebelum disimpan
                            logger()->info("Saving paralel file", [
                                'index' => $index,
                                'name' => $file->getClientOriginalName(),
                                'size' => $file->getSize(),
                                'valid' => $file->isValid(),
                            ]);

                            if ($file && $file->isValid()) {
                                $fileName = time() . "_{$index}_" . $file->getClientOriginalName();
                                $filePath = $file->storeAs('excel_mhs', $fileName, 'public');
                                $excelPath = $filePath;
                            }
                        } catch (\Exception $e) {
                            logger()->error("Error uploading file for paralel {$index}", [
                                'message' => $e->getMessage()
                            ]);
                            throw new \Exception("Gagal mengupload file untuk paralel " . ($index + 1) . ": " . $e->getMessage());
                        }
                    }


                    Kelas::create([
                        'id_kurikulum' => $this->id_kurikulum,
                        'id_tahun_akademik' => $this->id_tahun_akademik,
                        'id_mk' => $this->id_mk,
                        'id_user' => $p['id_user'],
                        'jumlah_mhs' => $p['jumlah_mhs'],
                        'paralel_ke' => $p['paralel_ke'],
                        'excel_daftar_mahasiswa' => $excelPath,
                    ]);
                }
            });

            // Flash success message
            session()->flash('message', 'Kelas berhasil ditambahkan!');

            // Reset form
            $this->reset([
                'id_kurikulum',
                'id_tahun_akademik',
                'id_mk',
                'muncul',
                'jumlah_paralel',
            ]);

            $this->paralel_files = [];
            $this->initializeParalels();
            $this->mount();

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menyimpan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.form-kelas-selector');
    }
}