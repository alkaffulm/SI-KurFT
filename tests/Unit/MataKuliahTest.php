<?php

namespace Tests\Unit;

use App\Models\MataKuliahModel;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class MataKuliahTest extends TestCase
{
    #[Test]
    public function hitung_jumlah_sks_praktikum_dan_teori()
    {
        $mk = new MataKuliahModel();
        
        $mk->sks_teori = 2;
        $mk->sks_praktikum = 1;

        $hasil = $mk->jumlah_sks; // Laravel mengubah camelCase menjadi snake_case saat dipanggil

        $this->assertEquals(3, $hasil);
    }

    #[Test]
    public function hitung_jumlah_sks_jika_salah_satu_kosong()
    {
        $mk = new MataKuliahModel();

        $mk->sks_teori = 3;
        $mk->sks_praktikum = 0; 

        $hasil = $mk->jumlah_sks;

        $this->assertEquals(3, $hasil);
    }

    #[Test]
    public function menampilkan_cpl_yang_tidak_duplikat() 
    {
        $mk = new MataKuliahModel();

        $cplSatu = (object) ['id_cpl' => 1, 'nama_kode_cpl' => 'CPL-01'];
        $cplDua  = (object) ['id_cpl' => 2, 'nama_kode_cpl' => 'CPL-02'];

        $KorelasiPalsu = new Collection([
            (object) ['cpl' => $cplSatu], 
            (object) ['cpl' => $cplSatu], 
            (object) ['cpl' => $cplDua],             
            (object) ['cpl' => null],     
        ]);

        $mk->setRelation('mkcpmkcpl', $KorelasiPalsu);
        $hasil = $mk->unique_cpls;

        $this->assertEquals('CPL-01, CPL-02' , $hasil);
    }
}
