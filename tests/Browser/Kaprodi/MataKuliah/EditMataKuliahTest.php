<?php

namespace Tests\Browser\MataKuliah;

use Database\Seeders\MataKuliahSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditMataKuliahTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(MataKuliahSeeder::class);
    }

    public function test_edit_kode_mk_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/mata-kuliah/edit-all')
                ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#kode_mk_31')
                ->scrollIntoView('button[type="submit"]');

            $browser->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->assertSee('Kode Mata Kuliah tidak boleh kosong.');
        });
    }

    public function test_edit_semester_max_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/mata-kuliah/edit-all')
                ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);
    
            $browser->clear('#semester_31');
            $browser->pause(300);
            $browser->type('#semester_31', 10);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->assertSee('Semester tidak bisa diatas 8');
        });
    }

    public function test_edit_semester_integer_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/mata-kuliah/edit-all')
                ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);
    
            $browser->clear('#semester_31');
            $browser->pause(300);
            $browser->type('#semester_31', 'invalid');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->assertSee('Semester harus berupa integer');
        });
    }

    public function test_edit_sks_teori_integer_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/mata-kuliah/edit-all')
                ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);
    
            $browser->clear('#sks_teori_31');
            $browser->pause(300);
            $browser->type('#sks_teori_31', 'invalid');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->assertSee('Jumlah SKS Teori harus berupa integer');
        });
    }

    public function test_edit_sks_praktikum_integer_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/mata-kuliah/edit-all')
                ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);
    
            $browser->clear('#sks_praktikum_31');
            $browser->pause(300);
            $browser->type('#sks_praktikum_31', 'invalid');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->assertSee('Jumlah SKS Praktikum harus berupa integer');
        });
    }

    public function test_edit_mata_kuliah_1_successfully()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/mata-kuliah/edit-all')
                ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            
            $browser->clear('#kode_mk_31')
                    ->type('#kode_mk_31', 'IF-UPDATED');

            $browser->clear('#nama_matkul_id_31')
                    ->type('#nama_matkul_id_31', 'Pemrograman Web Lanjut');

            $browser->clear('#nama_matkul_en_31')
                    ->type('#nama_matkul_en_31', 'Advanced Web Programming');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Mata Kuliah berhasil diperbarui!')
                    ->assertSee('Mata Kuliah berhasil diperbarui!');
        });

        $this->assertDatabaseHas('mata_kuliah', [
            'kode_mk' => 'IF-UPDATED',
            'id_mk' => 31,
        ]);
    }

    public function test_edit_mata_kuliah_1_and_mata_kuliah_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/mata-kuliah/edit-all')
                ->waitFor('#form-update');

                $this->removeRequiredValidation($browser);

            
            $browser->clear('#kode_mk_31')
                ->type('#kode_mk_31', 'MK-1-UPDATED');

            $browser->clear('#nama_matkul_id_31')
                    ->type('#nama_matkul_id_31', 'Pemrograman Web Lanjut');

            $browser->clear('#nama_matkul_en_31')
                    ->type('#nama_matkul_en_31', 'Advanced Web Programming');

            
            $browser->clear('#kode_mk_33')
                    ->type('#kode_mk_33', 'MK-2-UPDATED');

            $browser->clear('#nama_matkul_id_33')
                    ->type('#nama_matkul_id_33', 'Pemrograman Web Lanjut');

            $browser->clear('#nama_matkul_en_33')
                    ->type('#nama_matkul_en_33', 'Advanced Web Programming');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Mata Kuliah berhasil diperbarui!')
                    ->assertSee('Mata Kuliah berhasil diperbarui!');
        });

        $this->assertDatabaseHas('mata_kuliah', [
            'kode_mk' => 'MK-1-UPDATED',
            'id_mk' => 31,
        ]);
        $this->assertDatabaseHas('mata_kuliah', [
            'kode_mk' => 'MK-2-UPDATED',
            'id_mk' => 33,
        ]);
    }
}