<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Database\Seeders\CPLSeeder;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditCPLTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(CPLSeeder::class);
    }

    public function test_edit_nama_kode_cpl_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpl/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear("#nama_kode_cpl_19")
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Kode CPL tidak boleh kosong.')
                ->assertSee('Kode CPL tidak boleh kosong.');
        });
    }

    public function test_edit_desc_cpl_id_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpl/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear("#desc_cpl_id_19")

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi CPL (Indonesia) tidak boleh kosong.')
                ->assertSee('Deskripsi CPL (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_edit_desc_cpl_en_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/cpl/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear("#desc_cpl_en_19")

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi CPL (English)')
                ->assertSee('Deskripsi CPL (English)');
        });
    }

    public function test_edit_cpl_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/cpl/edit-all')
                ->waitFor('#form-update');

            // Ubah kode CPL
            $browser->clear("#nama_kode_cpl_19")
                    ->type("#nama_kode_cpl_19", 'CPL-1-UPDATED');

            // Ubah deskripsi Indonesia
            $browser->clear("#desc_cpl_id_19")
                    ->type("#desc_cpl_id_19", 'Deskripsi CPL 1 yang sudah diperbarui');

            // Ubah deskripsi English
            $browser->clear("#desc_cpl_en_19")
                    ->type("#desc_cpl_en_19", 'Updated CPL 1 Description in English');

            // Submit form
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan CPL berhasil disimpan!')
                    ->assertSee('Perubahan CPL berhasil disimpan!');
        });

        // Verify di database
        $this->assertDatabaseHas('cpl', [
            'nama_kode_cpl' => 'CPL-1-UPDATED',
            'desc_cpl_id' => 'Deskripsi CPL 1 yang sudah diperbarui',
            'desc_cpl_en' => 'Updated CPL 1 Description in English',
        ]);
    }

    public function test_edit_multiple_cpl_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/cpl/edit-all')
                ->waitFor('#form-update');

            // ===== EDIT CPL-1 =====
            $browser->clear("#nama_kode_cpl_19")
                    ->type("#nama_kode_cpl_19", 'CPL-1-EDITED');

            $browser->clear("#desc_cpl_id_19")
                    ->type("#desc_cpl_id_19", 'Deskripsi CPL 1 - Versi Baru');

            $browser->clear("#desc_cpl_en_19")
                    ->type("#desc_cpl_en_19", 'CPL 1 Description - New Version');

            // ===== EDIT CPL-2 =====
            $browser->clear("#nama_kode_cpl_20")
                    ->type("#nama_kode_cpl_20", 'CPL-2-EDITED');

            $browser->clear("#desc_cpl_id_20")
                    ->type("#desc_cpl_id_20", 'Deskripsi CPL 2 - Versi Terbaru');

            $browser->clear("#desc_cpl_en_20")
                    ->type("#desc_cpl_en_20", 'CPL 2 Description - Latest Version');

            // Submit form sekali untuk kedua CPL
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan CPL berhasil disimpan!')
                    ->assertSee('Perubahan CPL berhasil disimpan!');
        });

        // Verify kedua data berubah di database
        $this->assertDatabaseHas('cpl', [
            'nama_kode_cpl' => 'CPL-1-EDITED',
            'desc_cpl_id' => 'Deskripsi CPL 1 - Versi Baru',
            'desc_cpl_en' => 'CPL 1 Description - New Version',
        ]);

        $this->assertDatabaseHas('cpl', [
            'nama_kode_cpl' => 'CPL-2-EDITED',
            'desc_cpl_id' => 'Deskripsi CPL 2 - Versi Terbaru',
            'desc_cpl_en' => 'CPL 2 Description - Latest Version',
        ]);
    }
}
