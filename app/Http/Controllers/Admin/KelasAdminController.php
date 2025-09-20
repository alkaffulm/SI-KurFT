<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CPMKModel;
use App\Models\MataKuliahModel;
use App\Models\CPLModel;
use App\Models\MK_CPMK_CPL_MapModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KelasAdminController extends Controller
{
    public function __construct()
    {
        $userRole = session()->get('userRole');

        return view()->share('userRole', $userRole);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kelas.admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function tambahKelas()
    {
        $kurikulums = \App\Models\KurikulumModel::all();
        $tahunAkademiks = \App\Models\TahunAkademik::all();

        return view('mapping.tambahKelas', [
            'kurikulums' => $kurikulums,
            'tahunAkademiks' => $tahunAkademiks
        ]);
    }

    public function editKelas($id)
    {
        $kelas = \App\Models\Kelas::findOrFail($id);

        $kurikulum = \App\Models\KurikulumModel::find($kelas->id_kurikulum);

        $dosens = UserModel::whereHas('userRoleMap', function($q) {
                $q->where('id_role', 2);
            })
            ->where('id_ps', $kurikulum->id_ps)
            ->get();

        $kurikulums = \App\Models\KurikulumModel::all();
        $tahunAkademiks = \App\Models\TahunAkademik::all();

        return view('form.Kelas.FormEditKelas', [
            'kurikulums'     => $kurikulums,
            'tahunAkademiks' => $tahunAkademiks,
            'kelas'          => $kelas,
            'dosens'         => $dosens,
        ]);
    }
    public function updateKelas(Request $request, $id)
    {
        $kelas = \App\Models\Kelas::findOrFail($id);

        $request->validate([
            'id_user' => 'required|exists:user,id_user',
            'jumlah_mhs' => 'required|integer|min:1',
            'excel_daftar_mahasiswa' => 'nullable|file|mimes:xlsx,xls',
        ]);

        $kelas->id_user = $request->id_user;
        $kelas->jumlah_mhs = $request->jumlah_mhs;

        if ($request->hasFile('excel_daftar_mahasiswa')) {
            $path = $request->file('excel_daftar_mahasiswa')->store('uploads/excel', 'public');
            $kelas->excel_daftar_mahasiswa = $path;
        }

        $kelas->save();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }


    public function hapusKelas($id)
    {
        try {
            $kelas = \App\Models\Kelas::findOrFail($id);
            $kelas->delete(); 

            return redirect()->route('kelas.index')->with('message', 'Kelas berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('kelas.index')->with('error', 'Gagal menghapus kelas: ' . $e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateTA(Request $request)
    {
        $validated = $request->validate([
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
            'tahun_akademik'        => 'required|string|max:20', // contoh format: 2022/2023
        ]);

        $tahunAkademik = \App\Models\TahunAkademik::firstOrCreate(
            ['tahun_akademik' => $validated['tahun_akademik']], 
            ['tahun_akademik' => $validated['tahun_akademik']]  
        );

        \App\Models\Kurikulum_TahunAkademik::firstOrCreate([
            'id_kurikulum'    => $validated['id_kurikulum'],
            'id_tahun_akademik' => $tahunAkademik->id_tahun_akademik, 
        ]);

        return redirect()
            ->route('ta.index')
            ->with('success', 'Tahun Akademik berhasil ditambahkan!');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
