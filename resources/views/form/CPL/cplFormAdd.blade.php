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
        <h2>Form Input CPL</h2>
        
        <form action="{{ route('cpl.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id_ps" value="{{session()->get('userRoleId')}}">
            
            <div>
                <label for="nama_kode_cpl">Kode CPL:</label><br>
                @error('nama_kode_cpl')
                    {{$message}}
                @enderror

                <input type="text" id="nama_kode_cpl" name="nama_kode_cpl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            {{-- <br>
            <div>
                <label for="id_ps">ID Prodi:</label><br>
                @error('id_ps')
                    {{$message}}
                @enderror
                <select name="id_ps" id="id_ps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2">
                    @foreach ( $program_studi as $ps )
                        <option value="{{$ps->id_ps}}">{{$ps->nama_prodi}}</option>
                    @endforeach
                </select>
            </div> --}}

            <br>
            <div>
                <label for="id_kurikulum">ID Kurikulum:</label><br>
                @error('id_kurikulum')
                    {{$message}}
                @enderror
                <select name="id_kurikulum" id="id_kurikulum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2">
                    @foreach ( $kurikulum as $krk )
                        <option value="{{$krk->id_kurikulum}}">{{$krk->tahun}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label for="bobot_maksimum">Bobot Maksium:</label><br>
                @error('bobot_maksimum')
                    {{$message}}
                @enderror
                <input type="text" id="bobot_maksimum" name="bobot_maksimum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            <br>
            <div>
                <label for="desc">Deskripsi:</label><br>
                @error('desc')
                    {{$message}}
                @enderror
                <textarea id="desc" name="desc" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required></textarea>
            </div>
            <br>
            <div>
                <button type="submit" class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">Kirim</button>
            </div>
        </form>   
    </div>



</body>
</html>