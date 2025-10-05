<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembobotan CPMK CPL</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
            <div class="container mx-auto px-4">
                {{-- Menampilkan pesan sukses --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('pembobotan.update', $mataKuliah) }}" method="POST">
            
                    <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">
                    <input type="hidden" name="id_kurikulum" value="{{ session('id_kurikulum_aktif') }}">

                    @csrf
                    @method('PUT')

                    <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                        <h1 class="text-2xl font-bold mb-2">Pembobotan CPMK terhadap CPL</h1>
                        <h2 class="text-lg font-semibold text-gray-700 mb-4">
                            Mata Kuliah: {{ $mataKuliah->kode_mk }} - {{ $mataKuliah->nama_matkul_id }}
                        </h2>

                            <div class="overflow-x-auto rounded-lg border border-gray-400">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                    <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 w-16 text-center">
                                                Kode CPMK
                                            </th>
                                            @foreach ($assocCpls as $cpl)
                                                <th scope="col"  class="px-6 py-3 w-24 text-center">
                                                    {{ $cpl->nama_kode_cpl }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($assocCpmks as $cpmk)
                                            <tr class="bg-white border-t border-gray-400">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">{{$cpmk->nama_kode_cpmk}}</th>
                                                @foreach ($assocCpls as $cpl )
                                                    <td class="px-6 py-4 text-center font-semibold text-gray-900 border-r border-gray-400">
                                                        @if (isset($correlationMap[$cpl->id_cpl]) && in_array($cpmk->id_cpmk, $correlationMap[$cpl->id_cpl]))
                                                            <input type="number" name="bobot[{{ $cpl->id_cpl }}][{{ $cpmk->id_cpmk }}]" value="{{ $existingBobot->get($cpl->id_cpl . '-' . $cpmk->id_cpmk)->bobot ?? '' }}" class="p-2 border rounded-lg border-gray-300 bg-gray-100 mt-2" min="0" max="100">  
                                                            <br>  
                                                            @error('bobot.' . $cpl->id_cpl . '.' . $cpmk->id_cpmk) <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror                                                        
                                                        @else
                                                            <span class="text-gray-300 font-light">-</span>
                                                        @endif
                                                    </td>
                                                @endforeach
                                                
                                            </tr> 
                                        @empty
                                            <tr >
                                                <td colspan="{{count($assocCpls) + 1}}"  class="px-6 py-3 text-base  border-r border-gray-400 text-center">CPMK Belum Ditambahkan!</td>
                                            </tr>    
                                        @endforelse
                                    </tbody>            
                                </table>
                            </div>
                            <div class="flex justify-between mt-6">
                                <a href="{{ route('cpmk.index') }}" class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">Batal</a>
                                <button type="submit" class="text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">Simpan Rencana Asesmen</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </main>
    </div>

</body>

</html>
