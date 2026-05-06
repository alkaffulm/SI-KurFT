<?php

namespace Tests\Browser\Admin\MetodePembelajaran;

use Database\Seeders\MetodePembelajaranSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditMetodePembelajaranTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(MetodePembelajaranSeeder::class);
    }

    public function test_edit_nama_metode_pembelajaran_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsAdmin($browser);

            $browser->visit('/admin/metode-pembelajaran/edit')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_metode_pembelajaran_85')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500)
                    ->press('Ya, Simpan!')
                    ->waitForText('Nama Metode Pembelajaran tidak boleh kosong.')
                    ->assertSee('Nama Metode Pembelajaran tidak boleh kosong.');
        });
    }

    public function test_edit_tipe_metode_pembelajaran_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsAdmin($browser);

            $browser->visit('/admin/metode-pembelajaran/edit')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->select('#tipe_metode_pembelajaran_85', '')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500)
                    ->press('Ya, Simpan!')
                    ->waitForText('Tipe Metode Pembelajaran tidak boleh kosong.')
                    ->assertSee('Tipe Metode Pembelajaran tidak boleh kosong.');
        });
    }

    public function test_edit_metode_pembelajaran_1_successfully()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsAdmin($browser);

            $browser->visit('/admin/metode-pembelajaran/edit')
                    ->waitFor('#form-update');

            $browser->clear('#nama_metode_pembelajaran_85')
                    ->type('#nama_metode_pembelajaran_85','Ceramah Interaktif Updated');

            $browser->select('#tipe_metode_pembelajaran_85', '')
                    ->select('#tipe_metode_pembelajaran_85', 'bm');

            $browser->pause(500);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500)
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan Metode Pembelajaran berhasil disimpan!')
                    ->assertSee('Perubahan Metode Pembelajaran berhasil disimpan!');
        });

        // Verify database
        $this->assertDatabaseHas('metode_pembelajaran', [
            'id_metode_pembelajaran' => 85,
            'nama_metode_pembelajaran' => 'Ceramah Interaktif Updated',
            'tipe_metode_pembelajaran' => 'bm',
        ]);
    }

    public function test_edit_metode_pembelajaran_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsAdmin($browser);

            $browser->visit('/admin/metode-pembelajaran/edit')
                    ->waitFor('#form-update');

            $browser->clear('#nama_metode_pembelajaran_85')
                    ->type('#nama_metode_pembelajaran_85','Ceramah Updated');

            $browser->clear('#nama_metode_pembelajaran_86')
                    ->type('#nama_metode_pembelajaran_86','Diskusi Updated');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500)
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan Metode Pembelajaran berhasil disimpan!')
                    ->assertSee('Perubahan Metode Pembelajaran berhasil disimpan!');
        });

        // Verify database
        $this->assertDatabaseHas('metode_pembelajaran', [
            'id_metode_pembelajaran' => 85,
            'nama_metode_pembelajaran' => 'Ceramah Updated',
        ]);

        $this->assertDatabaseHas('metode_pembelajaran', [
            'id_metode_pembelajaran' => 86,
            'nama_metode_pembelajaran' => 'Diskusi Updated',
        ]);
    }
}