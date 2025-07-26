<div>
    <label for="matakuliah_select">Nama Mata Kuliah</label>
        <select wire:model.live="selectedMataKuliah" id="matakuliah_select" class="border" >
            <option value="">-- Pilih Mata Kuliah --</option>
            @foreach ($mata_kuliah as $mk )
                <option value="{{$mk->id_mk}}">{{$mk->nama_matkul_id}}</option>
            @endforeach
        </select>
    
    @if (!empty($cpmks))
    
    <div>
        <h1 class="Text-center font-bold ">{{$mataKuliah->nama_matkul_id}}</h1>
        <p>{{$mataKuliah->matkul_desc_id}}</p> 
    </div>
    @forelse ($cpmks as $cpmk )
            <p><strong>{{$cpmk->nama_kode_cpmk}}: </strong>{{$cpmk->desc_cpmk_id}}</p>
        @empty
            <p>Tidak ada CPMK dan Sub CPMK untuk Mata Kuliah ini</p>
        @endforelse

            <table  border="1" cellpadding="5" class="w-full mb-24 text-center" > 
                <tr >
                    <th class="border-2 ">Kode Sub CPMK</th>
                    <th class="border-2 ">Deskripsi Sub CPMK</th>
                </tr>
                @foreach ($cpmks as $cpmk )
                    @foreach ($cpmk->subCpmk as $scp )
                        <tr >
                            <td class="border-2">{{ $scp->nama_kode_sub_cpmk }}</td>
                            <td class="border-2">{{ $scp->desc_sub_cpmk_id }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </table>          
        {{-- <table  border="1" cellpadding="5" class="w-full mb-24 text-center" > 
            <tr >
                <th class="border-2 ">CPMK</th>
                <th class="border-2 ">Deskripsi CPMK</th>
            </tr>
            @foreach ($cpmks as $cpmk )
                <tr >
                    <td class="border-2">{{ $cpmk->nama_kode_cpmk }}</td>
                    <td class="border-2">{{ $cpmk->desc_cpmk_id }}</td>
                </tr>
            @endforeach
        </table>      --}}
        
    @endif
</div>
