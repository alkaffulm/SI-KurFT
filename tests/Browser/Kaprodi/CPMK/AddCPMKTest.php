<?php

namespace Tests\Browser\CPMK;

use Database\Seeders\CpmkSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddCPMKTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(CpmkSeeder::class);
    }

    public function test_kode_cpmk_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpmk/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('desc_cpmk_id', 'Deskripsi CPMK dalam Bahasa Indonesia')
                ->type('desc_cpmk_en', 'CPMK Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah CPMK')
                ->assertSee('Kode CPMK tidak boleh kosong.');
        });
    }

    public function test_desc_cpmk_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpmk/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_cpmk', 'CPMK-001')
                ->type('desc_cpmk_en', 'CPMK Description in English')
                ->press('Tambah CPMK')
                ->assertSee('Deskripsi CPMK (Indoneia) tidak boleh kosong.');
        });
    }

    public function test_desc_cpmk_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpmk/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_cpmk', 'CPMK-001')
                ->type('desc_cpmk_id', 'Deskripsi CPMK dalam Bahasa Indonesia')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah CPMK')
                ->assertSee('Deskripsi CPMK (English) tidak boleh kosong.');
        });
    }

    public function test_add_valid_cpmk()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpmk/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_cpmk', 'CPMK-Test')
                ->type('desc_cpmk_id', 'Deskripsi CPMK dalam Bahasa Indonesia')
                ->type('desc_cpmk_en', 'CPMK Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah CPMK')
                ->waitForLocation('/kaprodi/cpmk')
                ->assertSee('Berhasil menambahkan CPMK!');
        });

        $this->assertDatabaseHas('cpmk', [
            'nama_kode_cpmk' => 'CPMK-Test',
            'desc_cpmk_id' => 'Deskripsi CPMK dalam Bahasa Indonesia',
            'desc_cpmk_en' => 'CPMK Description in English',
        ]);
    }
}
