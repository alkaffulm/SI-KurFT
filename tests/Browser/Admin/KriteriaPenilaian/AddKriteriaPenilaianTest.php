<?php

namespace Tests\Browser\Admin\KriteriaPenilaian;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddKriteriaPenilaianTest extends DuskTestCase
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

    public function test_nama_kriteria_penilaian_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kriteria-penilaian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->assertSee('Nama kriteria Penilaian tidak boleh kosong.');
        });
    }

    public function test_add_valid_kriteria_penilaian()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kriteria-penilaian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('#nama_kriteria_penilaian', 'Kriteria Penilaian Test')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitForLocation('/admin/kriteria-penilaian')
                ->assertSee('kriteria Penilaian berhasil ditambahkan!');
        });

        $this->assertDatabaseHas('kriteria_penilaian', [
            'nama_kriteria_penilaian' => 'Kriteria Penilaian Test',
        ]);
    }
}
