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
        <h2 class="text-2xl font-bold">Form Edit Mata Kuliah</h2>
        
        <form action="{{ route('mata-kuliah.updateAll') }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id_ps" value="{{session()->get('userRoleId')}}">

            @foreach ($mata_kuliah as $mk)
                
                <label for="kode_mk">Kode Mata Kuliah:</label><br>
                <input type="text" id="kode_mk" name="matkul[{{ $mk->id_mk }}][kode_mk]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('matkul.'.$mk->id_mk.'.kode_mk', $mk->kode_mk)}}" required>                
            
                <label for="nama_matkul_id">Nama Mata Kuliah (Indonesia):</label><br>
                <input type="text" id="nama_matkul_id" name="matkul[{{ $mk->id_mk }}][nama_matkul_id]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('matkul.'.$mk->id_mk.'.nama_matkul_id', $mk->nama_matkul_id)}}" required>    
                
                <label for="nama_matkul_en">Nama Mata Kuliah (English):</label><br>
                <input type="text" id="nama_matkul_en" name="matkul[{{ $mk->id_mk }}][nama_matkul_en]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('matkul.'.$mk->id_mk.'.nama_matkul_en', $mk->nama_matkul_en)}}" required> 
                
                <label for="matkul_desc_id">Deskripsi (Indonesia):</label><br>
                <input type="text" id="matkul_desc_id" name="matkul[{{ $mk->id_mk }}][matkul_desc_id]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('matkul.'.$mk->id_mk.'.matkul_desc_id', $mk->matkul_desc_id)}}" required>      
                
                <label for="matkul_desc_en">Deskripsi (English):</label><br>
                <input type="text" id="matkul_desc_en" name="matkul[{{ $mk->id_mk }}][matkul_desc_en]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('matkul.'.$mk->id_mk.'.matkul_desc_en', $mk->matkul_desc_en)}}" required>     
                
                <label for="jumlah_sks">Jumlah SKS:</label><br>
                <input type="text" id="jumlah_sks" name="matkul[{{ $mk->id_mk }}][jumlah_sks]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('matkul.'.$mk->id_mk.'.jumlah_sks', $mk->jumlah_sks)}}" required>           

                <label for="semester">Semester:</label><br>
                <input type="text" id="semester" name="matkul[{{ $mk->id_mk }}][semester]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('matkul.'.$mk->id_mk.'.semester', $mk->semester)}}" required>      

                <input type="checkbox" name="delete_ids[]" value="{{ $mk->id_mk }}">Hapus

                <br><br><br><br>

            @endforeach
            <div>
                <button type="submit">update</button>
            </div>
        </form>   
    </div>


</body>
</html>