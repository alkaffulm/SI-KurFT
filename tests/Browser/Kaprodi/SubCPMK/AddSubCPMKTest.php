<?php

namespace Tests\Browser\SubCPMK;

use Database\Seeders\CpmkSeeder;
use Database\Seeders\SubCpmkSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddSubCPMKTest extends DuskTestCase
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
        $this->seed(SubCpmkSeeder::class);
    }

    public function test_kode_sub_cpmk_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->click('#id_cpmk')
                ->pause(300)
                ->keys('#id_cpmk', '{down}', '{enter}')
                ->type('desc_sub_cpmk_id', 'Deskripsi Sub CPMK dalam Bahasa Indonesia')
                ->type('desc_sub_cpmk_en', 'Sub CPMK Description in English')
                ->press('Tambah Sub CPMK')
                ->assertSee('Nama Kode Sub CPMK tidak boleh kosong.');
        });
    }

    public function test_id_cpmk_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_sub_cpmk', 'Sub CPMK-001')
                ->type('desc_sub_cpmk_id', 'Deskripsi Sub CPMK dalam Bahasa Indonesia')
                ->type('desc_sub_cpmk_en', 'Sub CPMK Description in English')
                ->press('Tambah Sub CPMK')
                ->assertSee('CPMK harus dipilih.');
        });
    }

    public function test_desc_sub_cpmk_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_sub_cpmk', 'Sub CPMK-001')
                ->click('#id_cpmk')
                ->pause(300)
                ->keys('#id_cpmk', '{down}', '{enter}')
                ->type('desc_sub_cpmk_en', 'Sub CPMK Description in English')
                ->press('Tambah Sub CPMK')
                ->assertSee('Deskripsi Sub CPMK (Indoneia) tidak boleh kosong.');
        });
    }

    public function test_desc_sub_cpmk_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_sub_cpmk', 'Sub CPMK-001')
                ->click('#id_cpmk')
                ->pause(300)
                ->keys('#id_cpmk', '{down}', '{enter}')
                ->type('desc_sub_cpmk_id', 'Deskripsi Sub CPMK dalam Bahasa Indonesia')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah Sub CPMK')
                ->assertSee('Deskripsi Sub CPMK (English) tidak boleh kosong.');
        });
    }

    public function test_add_valid_sub_cpmk()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_sub_cpmk', 'Sub CPMK-Test')
                ->click('#id_cpmk')
                ->pause(300)
                ->keys('#id_cpmk', '{down}', '{enter}')
                ->type('desc_sub_cpmk_id', 'Deskripsi Sub CPMK dalam Bahasa Indonesia')
                ->type('desc_sub_cpmk_en', 'Sub CPMK Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah Sub CPMK')
                ->waitForLocation('/kaprodi/cpmk')
                ->assertSee('Berhasil menambahkan Sub CPMK!');
        });

        $this->assertDatabaseHas('sub_cpmk', [
            'nama_kode_sub_cpmk' => 'Sub CPMK-Test',
            'desc_sub_cpmk_id' => 'Deskripsi Sub CPMK dalam Bahasa Indonesia',
            'desc_sub_cpmk_en' => 'Sub CPMK Description in English',
        ]);
    }
}
