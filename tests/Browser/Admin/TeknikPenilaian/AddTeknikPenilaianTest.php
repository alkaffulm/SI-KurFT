<?php

namespace Tests\Browser\Admin\TeknikPenilaian;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddTeknikPenilaianTest extends DuskTestCase
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

    public function test_nama_teknik_penilaian_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/teknik-penilaian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->select('#kategori', 'test')
                ->pause(300)
                ->press('Simpan')
                ->assertSee('Nama Teknik Penilaian tidak boleh kosong.');
        });
    }

    public function test_kategori_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/teknik-penilaian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('#nama_teknik_penilaian', 'Teknik Penilaian Test')
                ->press('Simpan')
                ->assertSee('Kategori tidak boleh kosong.');
        });
    }

    public function test_add_valid_teknik_penilaian()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/teknik-penilaian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('#nama_teknik_penilaian', 'Teknik Penilaian Test')
                ->select('#kategori', 'test')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan')
                ->waitForLocation('/admin/teknik-penilaian')
                ->assertSee('Teknik Penilaian berhasil ditambahkan!');
        });

        $this->assertDatabaseHas('teknik_penilaian', [
            'nama_teknik_penilaian' => 'Teknik Penilaian Test',
        ]);
    }
}
