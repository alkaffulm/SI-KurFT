<?php

namespace Tests\Browser;

use Database\Seeders\PEOSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditPEOTest extends DuskTestCase
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

    public function test_edit_kode_peo_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/peo/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#kode_peo_1')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Kode PEO tidak boleh kosong.')
                ->assertSee('Kode PEO tidak boleh kosong.');
        });
    } 

    public function test_edit_desc_peo_id_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/peo/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_peo_id_1')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi PEO (Indonesia) tidak boleh kosong.')
                ->assertSee('Deskripsi PEO (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_edit_desc_peo_en_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/peo/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_peo_en_1')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi PEO (English) tidak boleh kosong.')
                ->assertSee('Deskripsi PEO (English) tidak boleh kosong.');
        });
    }

    public function test_edit_peo_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/peo/edit-all')
                ->waitFor('#form-update');

            // Ubah kode PEO-1
            $browser->clear('#kode_peo_1')
                    ->type('#kode_peo_1', 'PEO-1-UPDATED');

            // Ubah deskripsi Indonesia
            $browser->clear('#desc_peo_id_1')
                    ->type('#desc_peo_id_1', 'Deskripsi PEO 1 yang sudah diperbarui');

            // Ubah deskripsi English
            $browser->clear('#desc_peo_en_1')
                    ->type('#desc_peo_en_1', 'Updated PEO 1 Description in English');

            // Submit form
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan PEO berhasil disimpan!')
                    ->assertSee('Perubahan PEO berhasil disimpan!');
        });

        // Verify di database
        $this->assertDatabaseHas('peo', [
            'kode_peo' => 'PEO-1-UPDATED',
            'desc_peo_id' => 'Deskripsi PEO 1 yang sudah diperbarui',
            'desc_peo_en' => 'Updated PEO 1 Description in English',
        ]);
    }

    public function test_edit_peo_1_and_peo_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/peo/edit-all')
                ->waitFor('#form-update');

            // ===== EDIT PEO-1 =====
            $browser->clear('#kode_peo_1')
                    ->type('#kode_peo_1', 'PEO-1-EDITED');

            $browser->clear('#desc_peo_id_1')
                    ->type('#desc_peo_id_1', 'Deskripsi PEO 1 - Versi Baru');

            $browser->clear('#desc_peo_en_1')
                    ->type('#desc_peo_en_1', 'PEO 1 Description - New Version');

            // ===== EDIT PEO-2 =====
            $browser->clear('#kode_peo_2')
                    ->type('#kode_peo_2', 'PEO-2-EDITED');

            $browser->clear('#desc_peo_id_2')
                    ->type('#desc_peo_id_2', 'Deskripsi PEO 2 - Versi Terbaru');

            $browser->clear('#desc_peo_en_2')
                    ->type('#desc_peo_en_2', 'PEO 2 Description - Latest Version');

            // Submit form sekali untuk kedua PEO
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan PEO berhasil disimpan!')
                    ->assertSee('Perubahan PEO berhasil disimpan!');
        });

        // Verify kedua data berubah di database
        $this->assertDatabaseHas('peo', [
            'kode_peo' => 'PEO-1-EDITED',
            'desc_peo_id' => 'Deskripsi PEO 1 - Versi Baru',
            'desc_peo_en' => 'PEO 1 Description - New Version',
        ]);

        $this->assertDatabaseHas('peo', [
            'kode_peo' => 'PEO-2-EDITED',
            'desc_peo_id' => 'Deskripsi PEO 2 - Versi Terbaru',
            'desc_peo_en' => 'PEO 2 Description - Latest Version',
        ]);
    }


}
