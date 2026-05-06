<?php

namespace Tests\Browser\Admin\MetodePembelajaran;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddMetodePembelajaranTest extends DuskTestCase
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


    public function test_nama_metode_pembelajaran_required_validation()
    {        
        $this->browse(function (Browser $browser) {

            $this->loginAsAdmin($browser);

            $browser->visit('/admin/metode-pembelajaran/create');

            $this->removeRequiredValidation($browser);

            $browser->select('#tipe_metode_pembelajaran', 'tm')
                ->pause(300)
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->assertSee('Nama Metode Pembelajaran tidak boleh kosong.');
        });
    }

    public function test_tipe_metode_pembelajaran_required_validation()
    {        
        $this->browse(function (Browser $browser) {

            $this->loginAsAdmin($browser);

            $browser->visit('/admin/metode-pembelajaran/create');

            $this->removeRequiredValidation($browser);

            $browser->type('#nama_metode_pembelajaran', 'Metode Pembelajaran Test')
                ->pause(300)
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->assertSee('Tipe Metode Pembelajaran tidak boleh kosong.');
        });
    }

    public function test_add_valid_metode_pembelajaran()
    {        
        $this->browse(function (Browser $browser) {

            $this->loginAsAdmin($browser);

            $browser->visit('/admin/metode-pembelajaran/create');

            $this->removeRequiredValidation($browser);

            $browser->type('#nama_metode_pembelajaran', 'Metode Pembelajaran Test')
                ->select('#tipe_metode_pembelajaran', 'tm')
                ->pause(300)
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitForLocation('/admin/metode-pembelajaran')
                ->assertSee('Metode Pembelajaran berhasil ditambahkan!');
        });
        $this->assertDatabaseHas('metode_pembelajaran', [
            'nama_metode_pembelajaran' => 'Metode Pembelajaran Test',
            'tipe_metode_pembelajaran' => 'tm',
        ]);
    }
}
