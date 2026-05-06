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

class EditSubCPMKTest extends DuskTestCase
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

    public function test_edit_kode_sub_cpmk_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_kode_sub_cpmk_1')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Nama Kode Sub CPMK enak boleh kosong.')
                ->assertSee('Nama Kode Sub CPMK enak boleh kosong.');
        });
    }

    public function test_edit_desc_sub_cpmk_id_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_sub_cpmk_id_1')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi Sub CPMK (Indoneia) tidak boleh kosong.')
                ->assertSee('Deskripsi Sub CPMK (Indoneia) tidak boleh kosong.');
        });
    }

    public function test_edit_desc_sub_cpmk_en_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_sub_cpmk_en_1')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi Sub CPMK (English) tidak boleh kosong.')
                ->assertSee('Deskripsi Sub CPMK (English) tidak boleh kosong.');
        });
    }

    public function test_edit_sub_cpmk_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/edit-all')
                    ->waitFor('#form-update');

            // Ubah kode Sub CPMK-1
            $browser->clear('#nama_kode_sub_cpmk_1')
                    ->type('#nama_kode_sub_cpmk_1', 'Sub CPMK-1-UPDATED');

            // Ubah deskripsi Indonesia
            $browser->clear('#desc_sub_cpmk_id_1')
                    ->type('#desc_sub_cpmk_id_1', 'Deskripsi Sub CPMK 1 yang sudah diperbarui');

            // Ubah deskripsi English
            $browser->clear('#desc_sub_cpmk_en_1')
                    ->type('#desc_sub_cpmk_en_1', 'Updated Sub CPMK 1 Description in English');

            // Submit form
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Sub CPMK berhasil diperbarui!')
                    ->assertSee('Sub CPMK berhasil diperbarui!');
        });

        // Verify di database
        $this->assertDatabaseHas('sub_cpmk', [
            'nama_kode_sub_cpmk' => 'Sub CPMK-1-UPDATED',
            'desc_sub_cpmk_id' => 'Deskripsi Sub CPMK 1 yang sudah diperbarui',
            'desc_sub_cpmk_en' => 'Updated Sub CPMK 1 Description in English',
        ]);
    }

    public function test_edit_sub_cpmk_1_and_sub_cpmk_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/sub-cpmk/edit-all')
                ->waitFor('#form-update');

            // ===== EDIT SUB CPMK-1 =====
            $browser->clear('#nama_kode_sub_cpmk_1')
                    ->type('#nama_kode_sub_cpmk_1', 'Sub CPMK-1-EDITED');

            $browser->clear('#desc_sub_cpmk_id_1')
                    ->type('#desc_sub_cpmk_id_1', 'Deskripsi Sub CPMK 1 - Versi Baru');

            $browser->clear('#desc_sub_cpmk_en_1')
                    ->type('#desc_sub_cpmk_en_1', 'Sub CPMK 1 Description - New Version');

            // ===== EDIT SUB CPMK-2 =====
            $browser->clear('#nama_kode_sub_cpmk_2')
                    ->type('#nama_kode_sub_cpmk_2', 'Sub CPMK-2-EDITED');

            $browser->clear('#desc_sub_cpmk_id_2')
                    ->type('#desc_sub_cpmk_id_2', 'Deskripsi Sub CPMK 2 - Versi Terbaru');

            $browser->clear('#desc_sub_cpmk_en_2')
                    ->type('#desc_sub_cpmk_en_2', 'Sub CPMK 2 Description - Latest Version');

            // Submit form sekali untuk kedua Sub CPMK
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Sub CPMK berhasil diperbarui!')
                    ->assertSee('Sub CPMK berhasil diperbarui!');
        });

        // Verify kedua data berubah di database
        $this->assertDatabaseHas('sub_cpmk', [
            'nama_kode_sub_cpmk' => 'Sub CPMK-1-EDITED',
            'desc_sub_cpmk_id' => 'Deskripsi Sub CPMK 1 - Versi Baru',
            'desc_sub_cpmk_en' => 'Sub CPMK 1 Description - New Version',
        ]);

        $this->assertDatabaseHas('sub_cpmk', [
            'nama_kode_sub_cpmk' => 'Sub CPMK-2-EDITED',
            'desc_sub_cpmk_id' => 'Deskripsi Sub CPMK 2 - Versi Terbaru',
            'desc_sub_cpmk_en' => 'Sub CPMK 2 Description - Latest Version',
        ]);
    }
}
