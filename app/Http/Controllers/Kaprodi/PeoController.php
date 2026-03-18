<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePEORequest;
use App\Http\Requests\UpdateAll\UpdateAllPEORequest;
use App\Models\PEOModel;

class PeoController extends Controller
{
  public function index()
  {
    $peo = PEOModel::paginate(5);
    $userRole = session()->get('userRole');

    if($userRole == 'pimpinan' || $userRole == 'upm'){
        return view('pimpinanUpm.peoAll');
    }
    else {
      return view('peo', ['peo' => $peo]);
    }
  }

  public function create()
  {
    return view('form.PEO.peoFormAdd');
  }

  public function store(StorePEORequest $request)
  {
    PEOModel::create($request->validated());
    return redirect()->route('peo.index')->with('success', 'PEO berhasil ditambahkan!');
  }

  public function editAll()
  {
    $peo_data = PEOModel::all();
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
