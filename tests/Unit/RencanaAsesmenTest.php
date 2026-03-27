<?php

namespace Tests\Unit;

use App\Models\RencanaAsesmenModel;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RencanaAsesmenTest extends TestCase
{
    #[Test]
    public function format_komponen_evaluasi_dengan_nomor_komponen() 
    {
        $rencanaAsesmen = new RencanaAsesmenModel();
        
        $rencanaAsesmen->tipe_komponen = 'tugas';
        $rencanaAsesmen->nomor_komponen = 1;
        $formatted = $rencanaAsesmen->komponenEvaluasiFormatted;

        $this->assertEquals('Tugas 1', $formatted);

        $rencanaAsesmen->tipe_komponen = 'kuis';
        $rencanaAsesmen->nomor_komponen = 1;
        $formatted = $rencanaAsesmen->komponenEvaluasiFormatted;

        $this->assertEquals('Kuis 1', $formatted);
    }

    #[Test]
    public function format_komponen_evaluasi_tanpa_nomor_komponen() 
    {
        $rencanaAsesmen = new RencanaAsesmenModel();
        
        $rencanaAsesmen->tipe_komponen = 'uts';
        $rencanaAsesmen->nomor_komponen = 1;
        $formatted = $rencanaAsesmen->komponenEvaluasiFormatted;

        $this->assertEquals('UTS', $formatted);

        $rencanaAsesmen->tipe_komponen = 'Kegiatan Partisipatif';
        $formatted = $rencanaAsesmen->komponenEvaluasiFormatted;

        $this->assertEquals('KEGIATAN PARTISIPATIF', $formatted);
    }

    #[Test]
    public function hitung_total_bobot_komponen_evaluasi_dari_pivot()
    {
        $asesmen = new RencanaAsesmenModel();

        $bobotPalsu = new Collection([
            (object) ['pivot' => (object) ['bobot' => 30]],
            (object) ['pivot' => (object) ['bobot' => 45.5]],
        ]);

        $asesmen->setRelation('bobotCpmk', $bobotPalsu);
        $hasil = $asesmen->total_bobot_komponen_evaluasi;

        $this->assertEquals(75.5, $hasil);
    }
}
