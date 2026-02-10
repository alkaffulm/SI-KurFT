<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePEORequest;
use App\Http\Requests\UpdateAll\UpdateAllPEORequest;
use App\Models\PEOModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PeoController extends Controller
{
  public function __construct()
  {
    view()->share('userRole', session()->get('userRole'));
  }

  /**
   * Menampilkan daftar semua PEO. (Logika Asli)
   */
  public function index()
  {
    $peo = PEOModel::orderBy('kode_peo', 'asc')->paginate(5);
    $userRole = session()->get('userRole');

    if($userRole == 'pimpinan' || $userRole == 'upm'){
        return view('pimpinanUpm.peoAll', ['userRole' => $userRole,]);
    }
    else {
      return view('peo', ['peo' => $peo]);
    }
  }

  /**
   * Menampilkan form untuk menambah PEO baru. (Logika Asli)
   */
  public function create()
  {
    return view('form.PEO.peoFormAdd');
  }

  /**
   * Menyimpan PEO baru ke database. (Logika Asli)
   */
  public function store(StorePEORequest $request)
  {
    PEOModel::create($request->validated());
    return redirect()->route('peo.index')->with('success', 'PEO berhasil ditambahkan!');
  }

  /**
   * Menghapus satu PEO. (Logika Asli)
   */
  public function destroy(PEOModel $peo)
  {
    $peo->delete();
    return redirect()->route('peo.index')->with('success', 'PEO berhasil dihapus!');
  }

  // ================================================================
  // == BAGIAN BARU UNTUK FUNGSI EDIT & UPDATE SEMUA DATA SECARA MASSAL ==
  // ================================================================

  /**
   * Method BARU: Menampilkan form untuk mengedit semua PEO.
   */
  public function editAll()
  {
    $peo_data = PEOModel::orderBy('kode_peo', 'asc')->get();
    return view('form.PEO.peoFormEdit', ['peo_data' => $peo_data]);
  }

  public function updateAll(UpdateAllPEORequest $request)
  {
    // Proses penghapusan data
    if ($request->has('delete_peo')) {
      PEOModel::destroy($request->delete_peo);
    }

    if (!$request->has('peo')) {
      return redirect()->route('peo.index')->with('success', 'Perubahan berhasil disimpan!');
    }

    // $rules = [
    //   'peo.*.kode_peo' => 'required|string|max:255',
    //   'peo.*.desc_peo' => 'required|string',
    // ];
    // $messages = [
    //   'peo.*.kode_peo.required' => 'Setiap kolom Kode PEO wajib diisi.',
    //   'peo.*.desc_peo.required' => 'Setiap kolom Deskripsi wajib diisi.',
    // ];
    // $validator = Validator::make($request->all(), $rules, $messages);

    // if ($validator->fails()) {
    //   return redirect()->route('peo.editAll')->withErrors($validator)->withInput();
    // }

    $validatedData = $request->validated()['peo'];

    foreach ($validatedData as $id => $data) {
      $peo = PEOModel::find($id);
      if ($peo) {
        $peo->update($data);
      }
    }

    return redirect()->route('peo.index')->with('success', 'Perubahan PEO berhasil disimpan!');
  }
}
