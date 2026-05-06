<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddProfilLulusanTest extends DuskTestCase
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

    public function test_kode_pl_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_pl_id', 'Nama Profil Lulusan Indonesia')
                ->type('nama_pl_en', 'Profil Lulusan Name English')
                ->type('desc_pl_id', 'Deskripsi Profil Lulusan dalam Bahasa Indonesia')
                ->type('desc_pl_en', 'Profil Lulusan Description in English')
                ->type('profesi', 'Profesi Test')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah PL')
                ->assertSee('Kode PL tidak boleh kosong.');
        });
    }

    public function test_nama_pl_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kode_pl', 'PL-001')
                ->type('nama_pl_en', 'Profil Lulusan Name English')
                ->type('desc_pl_id', 'Deskripsi Profil Lulusan dalam Bahasa Indonesia')
                ->type('desc_pl_en', 'Profil Lulusan Description in English')
                ->type('profesi', 'Profesi Test')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah PL')
                ->assertSee('Nama Profil Lulusan (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_nama_pl_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kode_pl', 'PL-001')
                ->type('nama_pl_id', 'Nama Profil Lulusan Indonesia')
                ->type('desc_pl_id', 'Deskripsi Profil Lulusan dalam Bahasa Indonesia')
                ->type('desc_pl_en', 'Profil Lulusan Description in English')
                ->type('profesi', 'Profesi Test')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah PL')
                ->assertSee('Nama Profil Lulusan (English) tidak boleh kosong.');
        });
    }

    public function test_desc_pl_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kode_pl', 'PL-001')
                ->type('nama_pl_id', 'Nama Profil Lulusan Indonesia')
                ->type('nama_pl_en', 'Profil Lulusan Name English')
                ->type('desc_pl_en', 'Profil Lulusan Description in English')
                ->type('profesi', 'Profesi Test')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah PL')
                ->assertSee('Deskripsi Profil Lulusan (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_desc_pl_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kode_pl', 'PL-001')
                ->type('nama_pl_id', 'Nama Profil Lulusan Indonesia')
                ->type('nama_pl_en', 'Profil Lulusan Name English')
                ->type('desc_pl_id', 'Deskripsi Profil Lulusan dalam Bahasa Indonesia')
                ->type('profesi', 'Profesi Test')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah PL')
                ->assertSee('Deskripsi Profil Lulusan (English) tidak boleh kosong.');
        });
    }

    public function test_profesi_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kode_pl', 'PL-001')
                ->type('nama_pl_id', 'Nama Profil Lulusan Indonesia')
                ->type('nama_pl_en', 'Profil Lulusan Name English')
                ->type('desc_pl_id', 'Deskripsi Profil Lulusan dalam Bahasa Indonesia')
                ->type('desc_pl_en', 'Profil Lulusan Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah PL')
                ->assertSee('Profesi tidak boleh kosong.');
        });
    }

    public function test_add_valid_profil_lulusan()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kode_pl', 'PL-Test-001')
                ->type('nama_pl_id', 'Profil Lulusan Test Indonesia')
                ->type('nama_pl_en', 'Test Profil Lulusan English')
                ->type('desc_pl_id', 'Deskripsi Profil Lulusan dalam Bahasa Indonesia untuk Testing')
                ->type('desc_pl_en', 'Profil Lulusan Description in English for Testing')
                ->type('profesi', 'Software Engineer')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah PL')
                ->waitForLocation('/kaprodi/profil-lulusan')
                ->assertSee('Profil Lulusan berhasil ditambahkan!');
        });

        $this->assertDatabaseHas('profil_lulusan', [
            'kode_pl' => 'PL-Test-001',
            'nama_pl_id' => 'Profil Lulusan Test Indonesia',
            'nama_pl_en' => 'Test Profil Lulusan English',
            'desc_pl_id' => 'Deskripsi Profil Lulusan dalam Bahasa Indonesia untuk Testing',
            'desc_pl_en' => 'Profil Lulusan Description in English for Testing',
            'profesi' => 'Software Engineer',
        ]);
    }
}
