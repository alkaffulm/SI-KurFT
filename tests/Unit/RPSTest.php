<?php

namespace Tests\Unit;

use App\Models\RPSModel;
use App\Models\RPSTopicModel;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RPSTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    #[Test]
    public function format_nama_media_perangkat_keras()
    {
        $rps = new RPSModel();

        $mediaPembelajaranPalsu = new Collection([
            (object) ['tipe' => 'perangkat_keras', 'nama_media_pembelajaran' => 'Laptop'],
            (object) ['tipe' => 'perangkat_keras', 'nama_media_pembelajaran' => 'Handphone'],
            (object) ['tipe' => 'perangkat_keras', 'nama_media_pembelajaran' => 'Tablet'],
        ]);
        
        $rps->setRelation('mediaPembelajaran', $mediaPembelajaranPalsu);

        $hasil = $rps->media_perangkat_keras; // Laravel mengubah camelCase menjadi snake_case saat dipanggil

        $this->assertEquals('Laptop, Handphone, Tablet', $hasil);
    }

    #[Test]
    public function format_nama_media_perangkat_lunak()
    {
        $rps = new RPSModel();

        $mediaPembelajaranPalsu = new Collection([
            (object) ['tipe' => 'perangkat_lunak', 'nama_media_pembelajaran' => 'E-Learning'],
            (object) ['tipe' => 'perangkat_lunak', 'nama_media_pembelajaran' => 'E-Book'],
            (object) ['tipe' => 'perangkat_lunak', 'nama_media_pembelajaran' => 'Jurnal'],
        ]);
        
        $rps->setRelation('mediaPembelajaran', $mediaPembelajaranPalsu);

        $hasil = $rps->media_perangkat_lunak; // Laravel mengubah camelCase menjadi snake_case saat dipanggil

        $this->assertEquals('E-Learning, E-Book, Jurnal', $hasil);
    }

    #[Test]
    public function format_kategori_teknik_penilaian_kosong()
    {
        $topic = new RPSTopicModel();
        
        $hasil = $topic->teknik_penilaian_kategori = null;
        
        $this->assertEquals('', $hasil);
    }

    #[Test]
    public function format_nama_teknik_penilaian_kosong()
    {
        $topic = new RPSTopicModel();
        
        $topic->teknik_penilaian_kategori = 'test'; 
        
        $topic->setRelation('teknikPenilaian', new Collection([]));
        
        $hasil = $topic->teknik_penilaian_formatted; // Laravel mengubah camelCase menjadi snake_case saat dipanggil
        
        $this->assertEquals('Test', $hasil);
    }

    #[Test]
    public function format_nama_teknik_penilaian_kategori_test()
    {
        $rpsTopic = new RPSTopicModel();

        $rpsTopic->teknik_penilaian_kategori = 'test';

        $teknikPenilaianPalsu = new Collection([
            (object) ['nama_teknik_penilaian' => 'Kuis'],
            (object) ['nama_teknik_penilaian' => 'Ujian'],
        ]);
        
        $rpsTopic->setRelation('teknikPenilaian', $teknikPenilaianPalsu);

        $hasil = $rpsTopic->teknik_penilaian_formatted; // Laravel mengubah camelCase menjadi snake_case saat dipanggil

        $this->assertEquals('Test (Kuis, Ujian)', $hasil);
    }

    #[Test]
    public function format_nama_teknik_penilaian_kategori_non_test()
    {
        $rpsTopic = new RPSTopicModel();

        $rpsTopic->teknik_penilaian_kategori = 'non-test';

        $teknikPenilaianPalsu = new Collection([
            (object) ['nama_teknik_penilaian' => 'Presentasi'],
            (object) ['nama_teknik_penilaian' => 'Tugas Kelompok'],
            (object) ['nama_teknik_penilaian' => 'Observasi'],
        ]);
        
        $rpsTopic->setRelation('teknikPenilaian', $teknikPenilaianPalsu);

        $hasil = $rpsTopic->teknik_penilaian_formatted; // Laravel mengubah camelCase menjadi snake_case saat dipanggil

        $this->assertEquals('Non test (Presentasi, Tugas Kelompok, Observasi)', $hasil);
    }
}
