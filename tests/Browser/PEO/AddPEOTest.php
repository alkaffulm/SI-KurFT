<?php

namespace Tests\Browser;

use Database\Seeders\PEOSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddPEOTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper ;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(PEOSeeder::class);
    }

    public function test_kode_peo_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/peo/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('desc_peo_id', 'Deskripsi PEO dalam Bahasa Indonesia')
                ->type('desc_peo_en', 'PEO Description in English')
                ->press('Tambah PEO')
                ->assertSee('Kode PEO tidak boleh kosong.');
        });
    }   

    public function test_desc_peo_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/peo/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kode_peo', 'PEO-001')
                ->type('desc_peo_en', 'PEO Description in English')
                ->press('Tambah PEO')
                ->assertSee('Deskripsi PEO (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_desc_peo_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/peo/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kode_peo', 'PEO-001')
                ->type('desc_peo_id', 'Deskripsi PEO dalam Bahasa Indonesia')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah PEO')
                ->assertSee('Deskripsi PEO (English) tidak boleh kosong.');
        });
    }

    public function test_add_valid_peo()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/peo/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kode_peo', 'PEO-Test')
                ->type('desc_peo_id', 'Deskripsi PEO dalam Bahasa Indonesia')
                ->type('desc_peo_en', 'PEO Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah PEO')
                ->waitForLocation('/kaprodi/peo')
                ->assertSee('PEO berhasil ditambahkan!');
        });

        $this->assertDatabaseHas('peo', [
            'kode_peo' => 'PEO-Test',
            'desc_peo_id' => 'Deskripsi PEO dalam Bahasa Indonesia',
            'desc_peo_en' => 'PEO Description in English',
        ]);
    }
}
