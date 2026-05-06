<?php

namespace Tests\Browser;

use Database\Seeders\ProfilLulusanSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditProfilLulusanTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(ProfilLulusanSeeder::class);
    }

    public function test_edit_kode_pl_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#kode_pl_13')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Kode PL tidak boleh kosong.')
                ->assertSee('Kode PL tidak boleh kosong.');
        });
    }

    public function test_edit_nama_pl_id_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_pl_id_13')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Nama Profil Lulusan (Indonesia) tidak boleh kosong.')
                ->assertSee('Nama Profil Lulusan (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_edit_nama_pl_en_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_pl_en_13')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Nama Profil Lulusan (English) tidak boleh kosong.')
                ->assertSee('Nama Profil Lulusan (English) tidak boleh kosong.');
        });
    }

    public function test_edit_desc_pl_id_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_pl_id_13')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi Profil Lulusan (Indonesia) tidak boleh kosong.')
                ->assertSee('Deskripsi Profil Lulusan (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_edit_desc_pl_en_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_pl_en_13')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi Profil Lulusan (English) tidak boleh kosong.')
                ->assertSee('Deskripsi Profil Lulusan (English) tidak boleh kosong.');
        });
    }

    public function test_edit_profesi_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/profil-lulusan/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#profesi_pl_13')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Profesi tidak boleh kosong.')
                ->assertSee('Profesi tidak boleh kosong.');
        });
    }

    public function test_edit_profil_lulusan_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/profil-lulusan/edit-all')
                ->waitFor('#form-update');

            // Ubah kode PL
            $browser->clear('#kode_pl_13')
                    ->type('#kode_pl_13', 'PL-1-UPDATED');

            // Ubah nama Indonesia
            $browser->clear('#nama_pl_id_13')
                    ->type('#nama_pl_id_13', 'Profil Lulusan 1 yang sudah diperbarui');

            // Ubah nama English
            $browser->clear('#nama_pl_en_13')
                    ->type('#nama_pl_en_13', 'Updated Profil Lulusan 1 in English');

            // Ubah deskripsi Indonesia
            $browser->clear('#desc_pl_id_13')
                    ->type('#desc_pl_id_13', 'Deskripsi PL 1 yang sudah diperbarui');

            // Ubah deskripsi English
            $browser->clear('#desc_pl_en_13')
                    ->type('#desc_pl_en_13', 'Updated PL 1 Description in English');
            
            // Ubah profesi
            $browser->clear('#profesi_pl_13')
                    ->type('#profesi_pl_13', 'Updated Professional Title');
            
            // Submit form
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan Profil Lulusan berhasil disimpan!')
                    ->assertSee('Perubahan Profil Lulusan berhasil disimpan!');
        });

        // Verify di database
        $this->assertDatabaseHas('profil_lulusan', [
            'kode_pl' => 'PL-1-UPDATED',
            'nama_pl_id' => 'Profil Lulusan 1 yang sudah diperbarui',
            'nama_pl_en' => 'Updated Profil Lulusan 1 in English',
            'desc_pl_id' => 'Deskripsi PL 1 yang sudah diperbarui',
            'desc_pl_en' => 'Updated PL 1 Description in English',
            'profesi' => 'Updated Professional Title',
        ]);
    }

        public function test_edit_multiple_profil_lulusan_simultaneously()
        {
        $this->browse(function (Browser $browser) {
                $this->loginAsKaprodi($browser);

                $browser
                ->visit('/kaprodi/profil-lulusan/edit-all')
                ->waitFor('#form-update');

                // ===== EDIT PL-1 =====
                $browser->clear('#kode_pl_13')
                        ->type('#kode_pl_13', 'PL-1-EDITED')

                        ->clear('#nama_pl_id_13')
                        ->type('#nama_pl_id_13', 'Profil Lulusan 1 - Versi Baru')

                        ->clear('#nama_pl_en_13')
                        ->type('#nama_pl_en_13', 'Profil Lulusan 1 - New Version')

                        ->clear('#desc_pl_id_13')
                        ->type('#desc_pl_id_13', 'Deskripsi PL 1 - Versi Terbaru')

                        ->clear('#desc_pl_en_13')
                        ->type('#desc_pl_en_13', 'PL 1 Description - Latest Version')

                        ->clear('#profesi_pl_13')
                        ->type('#profesi_pl_13', 'Professional 1 - Updated');

                // ===== EDIT PL-2 =====
                $browser->clear('#kode_pl_14')
                        ->type('#kode_pl_14', 'PL-2-EDITED')

                        ->clear('#nama_pl_id_14')
                        ->type('#nama_pl_id_14', 'Profil Lulusan 2 - Versi Terbaru')

                        ->clear('#nama_pl_en_14')
                        ->type('#nama_pl_en_14', 'Profil Lulusan 2 - Latest Version')

                        ->clear('#desc_pl_id_14')
                        ->type('#desc_pl_id_14', 'Deskripsi PL 2 - Versi Terbaru')

                        ->clear('#desc_pl_en_14')
                        ->type('#desc_pl_en_14', 'PL 2 Description - Latest Version')

                        ->clear('#profesi_pl_14')
                        ->type('#profesi_pl_14', 'Professional 2 - Updated');

                // Submit form sekali untuk kedua PL
                $browser->scrollIntoView('button[type="submit"]')
                        ->press('Simpan Perubahan')
                        ->waitFor('.swal2-confirm')
                        ->press('Ya, Simpan!')
                        ->waitForText('Perubahan Profil Lulusan berhasil disimpan!')
                        ->assertSee('Perubahan Profil Lulusan berhasil disimpan!');
        });

        // Verify PL-1 berubah di database
        $this->assertDatabaseHas('profil_lulusan', [
                'kode_pl' => 'PL-1-EDITED',
                'nama_pl_id' => 'Profil Lulusan 1 - Versi Baru',
                'nama_pl_en' => 'Profil Lulusan 1 - New Version',
                'desc_pl_id' => 'Deskripsi PL 1 - Versi Terbaru',
                'desc_pl_en' => 'PL 1 Description - Latest Version',
                'profesi' => 'Professional 1 - Updated',
        ]);

        // Verify PL-2 berubah di database
        $this->assertDatabaseHas('profil_lulusan', [
                'kode_pl' => 'PL-2-EDITED',
                'nama_pl_id' => 'Profil Lulusan 2 - Versi Terbaru',
                'nama_pl_en' => 'Profil Lulusan 2 - Latest Version',
                'desc_pl_id' => 'Deskripsi PL 2 - Versi Terbaru',
                'desc_pl_en' => 'PL 2 Description - Latest Version',
                'profesi' => 'Professional 2 - Updated',
        ]);
        }
}
