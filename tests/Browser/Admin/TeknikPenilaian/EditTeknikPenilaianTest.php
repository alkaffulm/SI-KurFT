<?php

namespace Tests\Browser\Admin\TeknikPenilaian;

use Database\Seeders\TeknikPenilaianSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditTeknikPenilaianTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(TeknikPenilaianSeeder::class);
    }

    public function test_edit_nama_teknik_penilaian_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/teknik-penilaian/edit')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_teknik_penilaian_32')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->pause(500)
                ->press('Ya, Simpan!')
                ->waitForText('Nama Teknik Penilaian tidak boleh kosong.')
                ->assertSee('Nama Teknik Penilaian tidak boleh kosong.');
        });
    }

    public function test_edit_kategori_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/teknik-penilaian/edit')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->select('#kategori_32', '')

                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->pause(500)
                ->press('Ya, Simpan!')
                ->waitForText('Kategori tidak boleh kosong.')
                ->assertSee('Kategori tidak boleh kosong.');
        });
    }

    public function test_edit_teknik_penilaian_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/teknik-penilaian/edit')
                ->waitFor('#form-update');

            // Ubah nama teknik penilaian 1
            $browser->clear('#nama_teknik_penilaian_32')
                    ->pause(300)
                    ->type('#nama_teknik_penilaian_32', 'Test 1 Updated');

            // Submit form
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500)
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan Teknik Penilaian berhasil disimpan!')
                    ->assertSee('Perubahan Teknik Penilaian berhasil disimpan!');
        });

        // Verify di database
        $this->assertDatabaseHas('teknik_penilaian', [
            'nama_teknik_penilaian' => 'Test 1 Updated',
        ]);
    }

    public function test_edit_teknik_penilaian_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/teknik-penilaian/edit')
                ->waitFor('#form-update');

            // ===== EDIT TEKNIK PENILAIAN 1 =====
            $browser->clear('#nama_teknik_penilaian_32')
                    ->pause(300)
                    ->type('#nama_teknik_penilaian_32', 'Test 1 Edited');

            // ===== EDIT TEKNIK PENILAIAN 2 =====
            $browser->clear('#nama_teknik_penilaian_33')
                    ->pause(300)
                    ->type('#nama_teknik_penilaian_33', 'Test 2 Edited');

            // Submit form sekali untuk kedua item
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500)
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan Teknik Penilaian berhasil disimpan!')
                    ->assertSee('Perubahan Teknik Penilaian berhasil disimpan!');
        });

        // Verify kedua data berubah di database
        $this->assertDatabaseHas('teknik_penilaian', [
            'nama_teknik_penilaian' => 'Test 1 Edited',
        ]);

        $this->assertDatabaseHas('teknik_penilaian', [
            'nama_teknik_penilaian' => 'Test 2 Edited',
        ]);
    }
}
