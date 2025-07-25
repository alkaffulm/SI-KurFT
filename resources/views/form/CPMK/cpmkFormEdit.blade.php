<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="ml-72 mx-8 mt-24"> 
        <h2 class="text-2xl font-bold">Form Edit CPMK</h2>

        <form action="{{ route('cpmk.updateAll') }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id_ps" value="{{session()->get('userRoleId')}}">

            @foreach ( $cpmk as $cp )
                <div>
                    <label for="nama_kode_cpmk">Nama CPMK:</label><br>
                    @error('nama_kode_cpmk')
                        {{$message}}
                    @enderror
                    <input type="text" id="nama_kode_cpmk" name="cpmk[{{ $cp->id_cpmk }}][nama_kode_cpmk]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{ old('cpmk.'.$cp->id_cpmk.'.nama_kode_cpmk', $cp->nama_kode_cpmk)}}" required>
                </div>
                <br>
                <div>
                    <label for="kode_cpmk">Kode CPMK:</label><br>
                    @error('kode_cpmk')
                        {{$message}}
                    @enderror
                    <input type="text" id="kode_cpmk" name="cpmk[{{$cp->id_cpmk}}][kode_cpmk]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{ old('cpmk.'.$cp->id_cpmk.'.kode_cpmk', $cp->kode_cpmk)}}" required>
                </div>
                <br>
                <div>
                    <label for="id_mk">ID Matkul:</label><br>
                    @error('id_mk')
                        {{$message}}
                    @enderror
                    <select name="cpmk[{{$cp->id_cpmk}}][id_mk]" id="id_mk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2">
                        @foreach ( $mata_kuliah as $mk )
                            <option value="{{$mk->id_mk}}" {{ old('cpmk.'.$cp->id_cpmk.'.id_mk', $cp->id_mk) == $mk->id_mk ? 'selected' : '' }}>{{$mk->nama_matkul_id}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div>
                    <label for="desc_cpmk_id">Deskripsi CPMK (Indonesia):</label><br>
                    @error('desc_cpmk_id')
                        {{$message}}
                    @enderror
                    <textarea id="desc_cpmk_id" name="cpmk[{{$cp->id_cpmk}}][desc_cpmk_id]" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>{{ old('cpmk.'.$cp->id_cpmk.'.desc_cpmk_id', $cp->desc_cpmk_id)}}</textarea>
                </div>
                <br>
                <div>
                    <label for="desc_cpmk_en">Deskripsi CPMK (English):</label><br>
                    @error('desc_cpmk_en')
                        {{$message}}
                    @enderror
                    <textarea id="desc_cpmk_en" name="cpmk[{{$cp->id_cpmk}}][desc_cpmk_en]" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>{{ old('cpmk.'.$cp->id_cpmk.'.desc_cpmk_en', $cp->desc_cpmk_en)}}</textarea>
                </div> 

                <input type="checkbox" name="delete_ids[]" value="{{ $cp->id_cpmk }}"> Hapus

                <br><br><br>
            @endforeach


            <div>
                <button type="submit"class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">update</button>
            </div>
        </form>
    </div>
</body>
</html>