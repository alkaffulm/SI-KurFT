<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Edit Profil Lulusan</h2>

    <form action="{{ route('profil-lulusan.update', $profil_lulusan) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="id_ps">Nama Program Studi:</label><br>
            @error('id_ps')
                {{$message}}
            @enderror
            <select name="id_ps" id="id_ps">
                @foreach ( $program_studi as $p )
                    <option value="{{$p->id_ps}}" {{old('id_ps', $p->id_ps) == $profil_lulusan->id_ps ? 'selected' : ''}}>{{$p->nama_prodi}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="profil_lulusan">Profil Lulusan:</label><br>
            @error('profil_lulusan')
                {{$message}}
            @enderror
            <input type="text" id="profil_lulusan" name="profil_lulusan" value="{{old('profil_lulusan', $profil_lulusan->profil_lulusan)}}" required>
        </div>
        <br>

        <div>
            <label for="desc">Deskripsi:</label><br>
            @error('desc')
                {{$message}}
            @enderror
            <textarea id="desc" name="desc" rows="4" cols="50" required>{{old('desc', $profil_lulusan->desc)}}</textarea>
        </div>
        <br>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>

</body>
</html>