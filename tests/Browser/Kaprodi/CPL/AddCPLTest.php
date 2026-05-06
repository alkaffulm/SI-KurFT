<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddCPLTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
    }

    public function test_nama_kode_cpl_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpl/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('desc_cpl_id', 'Deskripsi CPL dalam Bahasa Indonesia')
                ->type('desc_cpl_en', 'CPL Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah CPL')
                ->assertSee('Kode CPL tidak boleh kosong.');
        });
    }

    public function test_desc_cpl_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpl/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_cpl', 'CPL-001')
                ->type('desc_cpl_en', 'CPL Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah CPL')
                ->assertSee('Deskripsi CPL (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_desc_cpl_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpl/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_cpl', 'CPL-001')
                ->type('desc_cpl_id', 'Deskripsi CPL dalam Bahasa Indonesia')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah CPL')
                ->assertSee('Deskripsi CPL (English)');
        });
    }

    public function test_add_valid_cpl()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpl/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_cpl', 'CPL-Test-001')
                ->type('desc_cpl_id', 'Deskripsi CPL dalam Bahasa Indonesia untuk Testing')
                ->type('desc_cpl_en', 'CPL Description in English for Testing')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah CPL')
                ->waitForLocation('/kaprodi/cpl')
                ->assertSee('CPL berhasil ditambahkan!');
        });

        $this->assertDatabaseHas('cpl', [
            'nama_kode_cpl' => 'CPL-Test-001',
            'desc_cpl_id' => 'Deskripsi CPL dalam Bahasa Indonesia untuk Testing',
            'desc_cpl_en' => 'CPL Description in English for Testing',
        ]);
    }
}
