<?php

namespace Tests\Browser\CPMK;

use Database\Seeders\CpmkSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditCPMKTest extends DuskTestCase
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

    public function test_edit_kode_cpmk_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpmk/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_kode_cpmk_31')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Kode CPMK tidak boleh kosong.')
                ->assertSee('Kode CPMK tidak boleh kosong.');
        });
    }

    public function test_edit_desc_cpmk_id_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpmk/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_cpmk_id_31')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi CPMK (Indoneia) tidak boleh kosong.')
                ->assertSee('Deskripsi CPMK (Indoneia) tidak boleh kosong.');
        });
    }

    public function test_edit_desc_cpmk_en_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpmk/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_cpmk_en_31')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi CPMK (English) tidak boleh kosong.')
                ->assertSee('Deskripsi CPMK (English) tidak boleh kosong.');
        });
    }

    public function test_edit_cpmk_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/cpmk/edit-all')
                ->waitFor('#form-update');

            // Ubah kode CPMK-31
            $browser->clear('#nama_kode_cpmk_31')
                    ->type('#nama_kode_cpmk_31', 'CPMK-31-UPDATED');

            // Ubah deskripsi Indonesia
            $browser->clear('#desc_cpmk_id_31')
                    ->type('#desc_cpmk_id_31', 'Deskripsi CPMK 31 yang sudah diperbarui');

            // Ubah deskripsi English
            $browser->clear('#desc_cpmk_en_31')
                    ->type('#desc_cpmk_en_31', 'Updated CPMK 31 Description in English');

            // Submit form
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('CPMK berhasil diperbarui!')
                    ->assertSee('CPMK berhasil diperbarui!');
        });

        // Verify di database
        $this->assertDatabaseHas('cpmk', [
            'id_cpmk' => 31,
            'nama_kode_cpmk' => 'CPMK-31-UPDATED',
            'desc_cpmk_id' => 'Deskripsi CPMK 31 yang sudah diperbarui',
            'desc_cpmk_en' => 'Updated CPMK 31 Description in English',
        ]);
    }

    public function test_edit_cpmk_1_and_cpmk_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/cpmk/edit-all')
                ->waitFor('#form-update');

            // ===== EDIT CPMK-1 =====
            $browser->clear('#nama_kode_cpmk_31')
                    ->type('#nama_kode_cpmk_31', 'CPMK-31-EDITED');

            $browser->clear('#desc_cpmk_id_31')
                    ->type('#desc_cpmk_id_31', 'Deskripsi CPMK 31 - Versi Baru');

            $browser->clear('#desc_cpmk_en_31')
                    ->type('#desc_cpmk_en_31', 'CPMK 31 Description - New Version');

            // ===== EDIT CPMK-2 =====
            $browser->clear('#nama_kode_cpmk_32')
                    ->type('#nama_kode_cpmk_32', 'CPMK-32-EDITED');

            $browser->clear('#desc_cpmk_id_32')
                    ->type('#desc_cpmk_id_32', 'Deskripsi CPMK 32 - Versi Terbaru');

            $browser->clear('#desc_cpmk_en_32')
                    ->type('#desc_cpmk_en_32', 'CPMK 32 Description - Latest Version');

            // Submit form sekali untuk kedua CPMK
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('CPMK berhasil diperbarui!')
                    ->assertSee('CPMK berhasil diperbarui!');
        });

        // Verify kedua data berubah di database
        $this->assertDatabaseHas('cpmk', [
            'id_cpmk' => 31,
            'nama_kode_cpmk' => 'CPMK-31-EDITED',
            'desc_cpmk_id' => 'Deskripsi CPMK 31 - Versi Baru',
            'desc_cpmk_en' => 'CPMK 31 Description - New Version',
        ]);

        $this->assertDatabaseHas('cpmk', [
            'id_cpmk' => 32,
            'nama_kode_cpmk' => 'CPMK-32-EDITED',
            'desc_cpmk_id' => 'Deskripsi CPMK 32 - Versi Terbaru',
            'desc_cpmk_en' => 'CPMK 32 Description - Latest Version',
        ]);
    }
}
