<?php

namespace Tests\Browser\UPM\EvaluasiUPM;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddEvaluasiUPMTest extends DuskTestCase
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
    }

    private function seedTahunAkademikData()
    {
        DB::table('tahun_akademik')->insert([
            ['id_tahun_akademik' => 1, 'tahun_akademik' => '2023/2024'],
            ['id_tahun_akademik' => 2, 'tahun_akademik' => '2023/2024'],
        ]);
    }

    public function test_id_ps_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->pause(500);

            $browser->assertSee('Tambah Catatan')
                    ->click('button.bg-biru-custom')
                    ->waitFor('#modalEvaluasi', 5);

            $this->removeRequiredValidation($browser);

            $browser
                ->select('select[wire\\:model="id_tahun_akademik"]', '1')
                ->pause(300)
                ->type('textarea[wire\\:model="catatan"]', 'Test Catatan')
                ->type('input[wire\\:model="created_at"]', date('d-m-Y'))
                ->pause(300)
                ->press('Simpan Catatan')
                ->waitForText('The id ps field is required', 5)
                ->assertSee('The id ps field is required');
        });
    }

    public function test_id_tahun_akademik_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->pause(500);

            $browser->assertSee('Tambah Catatan')
                    ->click('button.bg-biru-custom')
                    ->waitFor('#modalEvaluasi', 5);

            $this->removeRequiredValidation($browser);

            $browser
                ->select('select[wire\\:model="id_ps"]', '1')
                ->pause(300)
                ->type('textarea[wire\\:model="catatan"]', 'Test Catatan')
                ->type('input[wire\\:model="created_at"]', date('d-m-Y'))
                ->pause(300)
                ->press('Simpan Catatan')
                ->waitForText('The id tahun akademik field is required', 5)
                ->assertSee('The id tahun akademik field is required');
        });
    }

    public function test_catatan_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->pause(500);

            $browser->assertSee('Tambah Catatan')
                    ->click('button.bg-biru-custom')
                    ->waitFor('#modalEvaluasi', 5);

            $this->removeRequiredValidation($browser);

            $browser
                ->select('select[wire\\:model="id_ps"]', '1')
                ->pause(300)
                ->select('select[wire\\:model="id_tahun_akademik"]', '1')
                ->pause(300)
                ->type('input[wire\\:model="created_at"]', date('d-m-Y'))
                ->pause(300)
                ->press('Simpan Catatan')
                ->waitForText('The catatan field is required', 5)
                ->assertSee('The catatan field is required');
        });
    }

    public function test_created_at_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->pause(500);

            $browser->assertSee('Tambah Catatan')
                    ->click('button.bg-biru-custom')
                    ->waitFor('#modalEvaluasi', 5);

            $this->removeRequiredValidation($browser);

            $browser
                ->select('select[wire\\:model="id_ps"]', '1')
                ->pause(300)
                ->select('select[wire\\:model="id_tahun_akademik"]', '1')
                ->pause(300)
                ->type('textarea[wire\\:model="catatan"]', 'Test Catatan')
                ->pause(300)
                ->press('Simpan Catatan')
                ->waitForText('The created at field is required', 5)
                ->assertSee('The created at field is required');
        });
    }

    public function test_add_valid_evaluasi_upm()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsUPM($browser);

            $browser->visit('/upm/evaluasi-upm-all')
                    ->pause(500);

            $browser->assertSee('Tambah Catatan')
                    ->click('button.bg-biru-custom')
                    ->waitFor('#modalEvaluasi', 5);

            $browser
                ->select('select[wire\\:model="id_ps"]', '1')
                ->pause(300)
                ->select('select[wire\\:model="id_tahun_akademik"]', 1)
                ->pause(300)
                ->type('textarea[wire\\:model="catatan"]', 'Evaluasi Test Catatan')
                ->type('input[wire\\:model="created_at"]', date('d-m-Y'))
                ->pause(300)
                ->press('Simpan Catatan')
                ->waitForText('Catatan berhasil ditambahkan.', 5)
                ->assertSee('Catatan berhasil ditambahkan.');
        });

        $this->assertDatabaseHas('evaluasi_upm', [
            'id_ps' => 1,
            'catatan' => 'Evaluasi Test Catatan',
        ]);
    }
}
