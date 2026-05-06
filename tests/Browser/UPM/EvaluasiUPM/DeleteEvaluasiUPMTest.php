<?php

namespace Tests\Browser\UPM\EvaluasiUPM;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;
use Illuminate\Support\Facades\DB;

class DeleteEvaluasiUPMTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seedTahunAkademikData();
        $this->seedEvaluasiUpmData();
    }

    private function seedTahunAkademikData()
    {
        DB::table('tahun_akademik')->insert([
            ['id_tahun_akademik' => 1, 'tahun_akademik' => '2023/2024'],
            ['id_tahun_akademik' => 2, 'tahun_akademik' => '2023/2024'],
        ]);
    }

    private function seedEvaluasiUpmData()
    {
        DB::table('evaluasi_upm')->insert([
            ['id_evaluasi_upm' => 1, 'id_ps' => 7, 'id_tahun_akademik' => 1, 'catatan' => 'Evaluasi 1', 'created_at' => now()],
            ['id_evaluasi_upm' => 2, 'id_ps' => 7, 'id_tahun_akademik' => 2, 'catatan' => 'Evaluasi 2', 'created_at' => now()],
        ]);
    }

    public function test_delete_single_evaluasi_upm()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->waitFor('table', 10);

            // Klik tombol Hapus pada evaluasi 1
            $browser->click('button[wire\\:click="delete(1)"]')
                ->acceptDialog()
                ->pause(500)
                ->waitForText('Catatan berhasil dihapus.')
                ->assertSee('Catatan berhasil dihapus.');
        });

        $this->assertDatabaseMissing('evaluasi_upm', [
            'id_evaluasi_upm' => 1,
        ]);
    }
}
