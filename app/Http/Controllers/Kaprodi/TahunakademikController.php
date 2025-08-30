<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\CPMKModel;
use App\Models\MataKuliahModel;
use App\Models\CPLModel;
use App\Models\MK_CPMK_CPL_MapModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TahunakademikController extends Controller
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
        return view('admin');
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
public function tambahTA()
{
    $kurikulums = \App\Models\KurikulumModel::all();
    $tahunAkademiks = \App\Models\TahunAkademik::all();

    return view('mapping.tahun-akademik-kurikulum', [
        'kurikulums' => $kurikulums,
        'tahunAkademiks' => $tahunAkademiks
    ]);
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
