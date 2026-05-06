<?php

namespace Tests\Browser\UPM\EvaluasiUPM;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;
use Illuminate\Support\Facades\DB;

class EditEvaluasiUPMTest extends DuskTestCase
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

    public function test_edit_id_ps_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->waitFor('table', 10)
                    ->pause(300);

            // Klik tombol Edit pada evaluasi 1
            $browser->click('button[wire\\:click="edit(1)"]')
                    ->waitFor('#modalEvaluasi', 5);

            $this->removeRequiredValidation($browser);

            // Clear id_ps field
            $browser->select('select[wire\\:model="id_ps"]', '')
                    ->pause(300)
                    ->press('Simpan Perubahan')
                    ->waitForText('The id ps field is required', 5)
                    ->assertSee('The id ps field is required');
        });
    }

    public function test_edit_id_tahun_akademik_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->pause(300);

            // Klik tombol Edit pada evaluasi 1
            $browser->click('button[wire\\:click="edit(1)"]')
                    ->waitFor('#modalEvaluasi', 5);

            $this->removeRequiredValidation($browser);

            // Clear id_tahun_akademik field
            $browser->select('select[wire\\:model="id_tahun_akademik"]', '')
                    ->pause(300)
                    ->press('Simpan Perubahan')
                    ->waitForText('The id tahun akademik field is required', 5)
                    ->assertSee('The id tahun akademik field is required');
        });
    }

    public function test_edit_catatan_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->pause(300);

            // Klik tombol Edit pada evaluasi 1
            $browser->click('button[wire\\:click="edit(1)"]')
                    ->waitFor('#modalEvaluasi', 5);

            $this->removeRequiredValidation($browser);

            $browser->script("
                let textarea = document.querySelector(
                    'textarea[wire\\\\:model=\"catatan\"]'
                );

                textarea.value = '';

                textarea.dispatchEvent(new Event('input'));
            ");

            $browser->pause(300)
                    ->press('Simpan Perubahan')
                    ->waitForText('The catatan field is required.', 5)
                    ->assertSee('The catatan field is required.');
        });
    }

    public function test_edit_evaluasi_upm_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->waitFor('table', 10)
                    ->pause(300);

            // Klik tombol Edit pada evaluasi 1
            $browser->click('button[wire\\:click="edit(1)"]')
                    ->waitFor('#modalEvaluasi', 5);

            // Edit data
            $browser->clear('textarea[wire\\:model="catatan"]')
                    ->pause(300)
                    ->type('textarea[wire\\:model="catatan"]', 'Evaluasi 1 Updated')
                    ->pause(300)
                    ->press('Simpan Perubahan')
                    ->waitForText('Catatan berhasil diperbarui', 5)
                    ->assertSee('Catatan berhasil diperbarui');
        });

        // Verify di database
        $this->assertDatabaseHas('evaluasi_upm', [
            'id_evaluasi_upm' => 1,
            'catatan' => 'Evaluasi 1 Updated',
        ]);
    }
}
