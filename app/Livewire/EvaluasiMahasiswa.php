<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Kelas;
use App\Models\MataKuliahModel;
use App\Models\PenilaianMahasiswa;
use App\Models\RiwayatPenilaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvaluasiMahasiswa extends Component
{
    use WithPagination;

    public $selectedKelasId = null;
    public $kelas = null;

    public $daftarKelas = [];
    public $targetCpls = [];
    public $targetCpmks = []; // <-- Tambahan State baru untuk CPMK
    public $allMahasiswaEvaluasi = [];

    // Konfigurasi
    public $threshold = 60; // batas kelulusan dalam persen

    // state untuk modal edit nilai
    public $isEditModalOpen = false;
    public $editingNim = null;
    public $editingNama = null;
    public $editingNilai = [];
    public $structureAsesmen = [];

    // state untuk modal history penilaian
    public $isHistoryModalOpen = false;
    public $historyData = [];
    public $namesMap = [];

    public function mount()
    {
        $idDosen = Auth::id();
        $this->daftarKelas = Kelas::with(['mataKuliahModel', 'tahunAkademik'])
            ->where('id_user', $idDosen)
            ->orderBy('id_tahun_akademik', 'desc')
            ->get();
    }

    public function updatedSelectedKelasId($value)
    {
        // Tambahkan 'targetCpmks' untuk di-reset
        $this->reset(['kelas', 'targetCpls', 'targetCpmks', 'allMahasiswaEvaluasi', 'isEditModalOpen', 'isHistoryModalOpen']);

        if ($value) {
            $this->kelas = Kelas::with(['mataKuliahModel.mkcpmkcpl.cpl', 'mataKuliahModel.mkcpmkcpl.cpmk', 'mahasiswa'])
                ->find($value);

            if ($this->kelas) {
                $this->hitungEvaluasi();
                $this->prepareStructureAsesmen();
            }
        }
    }

    public function prepareStructureAsesmen()
    {
        $idMk = $this->kelas->id_mk;
        $bobotData = DB::table('rencana_asesmen_cpmk_bobot as racb')
            ->join('mk_cpmk_cpl_map as mccm', 'racb.id_mk_cpmk_cpl', '=', 'mccm.id_mk_cpmk_cpl')
            ->join('rencana_asesmen as ra', 'racb.id_rencana_asesmen', '=', 'ra.id_rencana_asesmen')
            ->join('cpmk', 'mccm.id_cpmk', '=', 'cpmk.id_cpmk')
            ->where('ra.id_mk', $idMk)
            ->select(
                'ra.id_rencana_asesmen',
                'ra.tipe_komponen',
                'ra.nomor_komponen',
                'cpmk.id_cpmk',
                'cpmk.nama_kode_cpmk',
                'racb.bobot'
            )
            ->get();

        $this->namesMap = [];
        $grouped = [];

        foreach ($bobotData as $row) {
            $idRa = $row->id_rencana_asesmen;

            $namaKomponen = strtoupper($row->tipe_komponen);
            if (!in_array($row->tipe_komponen, ['uts', 'uas', 'Kegiatan Partisipatif', 'Hasil Proyek'])) {
                $namaKomponen .= " " . $row->nomor_komponen;
            }

            $mapKey = "{$idRa}-{$row->id_cpmk}";
            $this->namesMap[$mapKey] = "{$namaKomponen} ({$row->nama_kode_cpmk})";

            if (!isset($grouped[$idRa])) {
                $namaKomponen = strtoupper($row->tipe_komponen);
                if (!in_array($row->tipe_komponen, ['uts', 'uas', 'Kegiatan Partisipatif', 'Hasil Proyek'])) {
                    $namaKomponen .= " " . $row->nomor_komponen;
                }
                $grouped[$idRa] = [
                    'id_rencana_asesmen' => $idRa,
                    'nama_komponen' => $namaKomponen,
                    'cpmks' => []
                ];
            }
            if (!isset($grouped[$idRa]['cpmks'][$row->id_cpmk])) {
                $grouped[$idRa]['cpmks'][$row->id_cpmk] = [
                    'id_cpmk' => $row->id_cpmk,
                    'kode_cpmk' => $row->nama_kode_cpmk,
                    'bobot_total' => 0
                ];
            }
            $grouped[$idRa]['cpmks'][$row->id_cpmk]['bobot_total'] += $row->bobot;
        }
        $this->structureAsesmen = $grouped;
    }

    public function editNilai($nim, $nama)
    {
        $this->editingNim = $nim;
        $this->editingNama = $nama;
        $this->editingNilai = [];

        $existing = PenilaianMahasiswa::where('id_kelas', $this->kelas->id_kelas)
            ->where('nim', $nim)
            ->get();

        foreach ($existing as $data) {
            $this->editingNilai[$data->id_rencana_asesmen][$data->id_cpmk] = $data->nilai;
        }
        $this->isEditModalOpen = true;
    }

    public function simpanNilai()
    {
        try {
            $oldData = PenilaianMahasiswa::where('id_kelas', $this->kelas->id_kelas)
                ->where('nim', $this->editingNim)
                ->get()
                ->mapWithKeys(function ($item) {
                    return ["{$item->id_rencana_asesmen}-{$item->id_cpmk}" => $item->nilai];
                })->toArray();

            $newDataForHistory = [];
            $hasChanges = false;

            foreach ($this->structureAsesmen as $asesmen) {
                foreach ($asesmen['cpmks'] as $cpmk) {
                    $idRa = $asesmen['id_rencana_asesmen'];
                    $idCpmk = $cpmk['id_cpmk'];
                    $nilaiBaru = $this->editingNilai[$idRa][$idCpmk] ?? null;

                    if ($nilaiBaru === null || $nilaiBaru === '') continue;
                    $nilaiBaru = (float) $nilaiBaru;

                    $maxBobot = $cpmk['bobot_total'];
                    if ($nilaiBaru > $maxBobot) $nilaiBaru = $maxBobot;
                    if ($nilaiBaru < 0) $nilaiBaru = 0;

                    PenilaianMahasiswa::updateOrCreate(
                        ['id_kelas' => $this->kelas->id_kelas, 'nim' => $this->editingNim, 'id_rencana_asesmen' => $idRa, 'id_cpmk' => $idCpmk],
                        ['nilai' => $nilaiBaru]
                    );

                    $key = "{$idRa}-{$idCpmk}";
                    $nilaiLama = $oldData[$key] ?? 0;
                    if (abs($nilaiBaru - $nilaiLama) > 0.01) {
                        $hasChanges = true;
                    }
                    $newDataForHistory[$key] = $nilaiBaru;
                }
            }

            if ($hasChanges) {
                RiwayatPenilaian::create([
                    'id_kelas' => $this->kelas->id_kelas,
                    'nim' => $this->editingNim,
                    'id_dosen_pengubah' => Auth::id(),
                    'keterangan' => 'Update Nilai via Evaluasi Mahasiswa',
                    'data_lama' => $oldData,
                    'data_baru' => $newDataForHistory,
                ]);
                session()->flash('message', 'Nilai berhasil diperbarui.');
            }

            $this->isEditModalOpen = false;
            $this->hitungEvaluasi();
        } catch (\Exception $e) {
            // Jika error (seperti database mati), sistem tidak crash tapi masuk ke sini
            // Log error aslinya agar kamu (developer) tetap bisa melihatnya di laravel.log
            \Illuminate\Support\Facades\Log::error('Error Livewire simpanNilai: ' . $e->getMessage());

            // Tutup modal dan kirim pesan error yang ramah ke tampilan pengguna
            $this->isEditModalOpen = false;
            session()->flash('error', 'Mohon maaf, terjadi gangguan koneksi database. Gagal menyimpan nilai.');
        }
    }

    public function lihatRiwayat($nim, $nama)
    {
        $this->editingNim = $nim;
        $this->editingNama = $nama;
        $this->historyData = RiwayatPenilaian::with('dosen')
            ->where('id_kelas', $this->kelas->id_kelas)
            ->where('nim', $nim)
            ->orderBy('created_at', 'desc')
            ->get();
        $this->isHistoryModalOpen = true;
    }

    public function closeModal()
    {
        $this->isEditModalOpen = false;
        $this->isHistoryModalOpen = false;
    }

    public function hitungEvaluasi()
    {
        if (!$this->kelas) return;

        $idMk = $this->kelas->id_mk;
        $idKelas = $this->kelas->id_kelas;

        // 1. Ambil list unik CPL (Ini tetap pakai cara lama yang sudah jalan)
        $this->targetCpls = $this->kelas->mataKuliahModel->mkcpmkcpl
            ->pluck('cpl')
            ->unique('id_cpl')
            ->sortBy('nama_kode_cpl')
            ->values();

        // 2. PERBAIKAN: Ambil data Bobot sekalian JOIN ke tabel cpmk untuk mendapatkan nama CPMK-nya
        $bobotMapping = DB::table('rencana_asesmen_cpmk_bobot as racb')
            ->join('mk_cpmk_cpl_map as mccm', 'racb.id_mk_cpmk_cpl', '=', 'mccm.id_mk_cpmk_cpl')
            ->join('rencana_asesmen as ra', 'racb.id_rencana_asesmen', '=', 'ra.id_rencana_asesmen')
            ->join('cpmk', 'mccm.id_cpmk', '=', 'cpmk.id_cpmk') // <-- Join tabel cpmk
            ->where('ra.id_mk', $idMk)
            ->select(
                'ra.id_rencana_asesmen',
                'mccm.id_cpmk',
                'mccm.id_cpl',
                'racb.bobot',
                'cpmk.nama_kode_cpmk' // <-- Ambil nama CPMK
            )
            ->get();

        // 3. PERBAIKAN: Buat targetCpmks dari data bobotMapping di atas (Pasti Aman & Muncul)
        $this->targetCpmks = $bobotMapping->unique('id_cpmk')->map(function ($item) {
            return (object) [
                'id_cpmk' => $item->id_cpmk,
                'nama_kode_cpmk' => $item->nama_kode_cpmk,
            ];
        })->sortBy('nama_kode_cpmk')->values();


        $nilaiMahasiswa = PenilaianMahasiswa::where('id_kelas', $idKelas)->get();

        $semuaData = [];

        foreach ($this->kelas->mahasiswa as $mhs) {
            $nilaiPerCpl = [];
            $nilaiPerCpmk = [];
            $statusLulus = true;

            // --- HITUNG NILAI PER CPMK ---
            foreach ($this->targetCpmks as $cpmk) {
                $idCpmk = $cpmk->id_cpmk;

                // Cari semua komponen asesmen yang menilai CPMK ini
                $komponenTerkaitCpmk = $bobotMapping->where('id_cpmk', $idCpmk);

                $totalSkorCpmk = 0;
                $totalBobotCpmkTertilai = 0;

                foreach ($komponenTerkaitCpmk as $komp) {
                    $nilai = $nilaiMahasiswa->where('nim', $mhs->nim)
                        ->where('id_rencana_asesmen', $komp->id_rencana_asesmen)
                        ->where('id_cpmk', $komp->id_cpmk)
                        ->first();

                    if ($nilai) {
                        $maxBobotKomponenIni = $bobotMapping
                            ->where('id_rencana_asesmen', $komp->id_rencana_asesmen)
                            ->where('id_cpmk', $komp->id_cpmk)
                            ->sum('bobot');

                        $ratio = ($maxBobotKomponenIni > 0) ? ($nilai->nilai / $maxBobotKomponenIni) : 0;
                        $totalSkorCpmk += ($ratio * $komp->bobot);
                        $totalBobotCpmkTertilai += $komp->bobot;
                    }
                }

                // Hitung persen ketercapaian CPMK ini
                if ($totalBobotCpmkTertilai > 0) {
                    $persenCpmk = ($totalSkorCpmk / $totalBobotCpmkTertilai) * 100;
                } else {
                    $persenCpmk = 0;
                }

                if ($persenCpmk > 100) $persenCpmk = 100;
                $nilaiPerCpmk[$idCpmk] = round($persenCpmk, 2);
            }

            // --- HITUNG NILAI PER CPL ---
            foreach ($this->targetCpls as $cpl) {
                $idCpl = $cpl->id_cpl;
                $komponenTerkait = $bobotMapping->where('id_cpl', $idCpl);

                $totalScoreCpl = 0;
                $totalBobotTerilai = 0;

                foreach ($komponenTerkait as $komponen) {
                    $nilai = $nilaiMahasiswa->where('nim', $mhs->nim)
                        ->where('id_rencana_asesmen', $komponen->id_rencana_asesmen)
                        ->where('id_cpmk', $komponen->id_cpmk)
                        ->first();

                    if ($nilai) {
                        $totalBobotCPMK = $bobotMapping
                            ->where('id_rencana_asesmen', $komponen->id_rencana_asesmen)
                            ->where('id_cpmk', $komponen->id_cpmk)
                            ->sum('bobot');

                        $nilaiInput = $nilai->nilai;
                        $ratio = ($totalBobotCPMK > 0) ? ($nilaiInput / $totalBobotCPMK) : 0;
                        $nilaiKontribusi = $ratio * $komponen->bobot;

                        $totalScoreCpl += $nilaiKontribusi;
                        $totalBobotTerilai += $komponen->bobot;
                    }
                }

                if ($totalBobotTerilai > 0) {
                    $finalCplScore = ($totalScoreCpl / $totalBobotTerilai) * 100;
                } else {
                    $finalCplScore = 0;
                }

                if ($finalCplScore > 100) $finalCplScore = 100;

                $nilaiPerCpl[$idCpl] = round($finalCplScore, 2);

                if ($finalCplScore < $this->threshold) {
                    $statusLulus = false;
                }
            }

            $semuaData[] = [
                'nim' => $mhs->nim,
                'nama' => $mhs->nama_lengkap ?? $mhs->nama,
                'nilai_per_cpmk' => $nilaiPerCpmk, // Data array nilai CPMK
                'nilai_per_cpl' => $nilaiPerCpl,
                'status' => $statusLulus,
                'status_label' => $statusLulus ? 'Lulus' : 'Belum Lulus',
                'status_class' => $statusLulus
                    ? 'bg-green-100 text-green-800 border-green-400'
                    : 'bg-red-100 text-red-800 border-red-400',
            ];
        }
        $this->allMahasiswaEvaluasi = $semuaData;
    }

    public function render()
    {
        $page = Paginator::resolveCurrentPage() ?: 1;
        $perPage = 20;

        $data = collect($this->allMahasiswaEvaluasi);

        $items = $data->slice(($page - 1) * $perPage, $perPage)->values();

        $paginatedData = new LengthAwarePaginator($items, $data->count(), $perPage, $page, [
            ['path' => Paginator::resolveCurrentPath()]
        ]);

        return view('livewire.evaluasi-mahasiswa', [
            'paginatedData' => $paginatedData,
        ]);
    }
}
