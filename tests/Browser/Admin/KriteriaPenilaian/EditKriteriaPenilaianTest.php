<?php

namespace Tests\Browser\Admin\KriteriaPenilaian;

use Database\Seeders\KriteriaPenilaianSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditKriteriaPenilaianTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(KriteriaPenilaianSeeder::class);
    }

    public function test_edit_nama_kriteria_penilaian_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kriteria-penilaian/edit')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_kriteria_penilaian_27')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->pause(500)
                ->press('Ya, Simpan!')
                ->waitForText('Nama kriteria Penilaian tidak boleh kosong.')
                ->assertSee('Nama kriteria Penilaian tidak boleh kosong.');
        });
    }

    public function test_edit_kriteria_penilaian_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/kriteria-penilaian/edit')
                ->waitFor('#form-update');

            // Ubah nama kriteria penilaian 1
            $browser->clear('#nama_kriteria_penilaian_27')
                    ->type('#nama_kriteria_penilaian_27', 'Kriteria 1 Updated');

            // Submit form
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500)
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan kriteria Penilaian berhasil disimpan!')
                    ->assertSee('Perubahan kriteria Penilaian berhasil disimpan!');
        });

        // Verify di database
        $this->assertDatabaseHas('kriteria_penilaian', [
            'nama_kriteria_penilaian' => 'Kriteria 1 Updated',
        ]);
    }

    public function test_edit_kriteria_penilaian_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/kriteria-penilaian/edit')
                ->waitFor('#form-update');

            // ===== EDIT KRITERIA PENILAIAN 1 =====
            $browser->clear('#nama_kriteria_penilaian_27')
                    ->type('#nama_kriteria_penilaian_27', 'Kriteria 1 Edited');

            // ===== EDIT KRITERIA PENILAIAN 2 =====
            $browser->clear('#nama_kriteria_penilaian_28')
                    ->type('#nama_kriteria_penilaian_28', 'Kriteria 2 Edited');

            // Submit form sekali untuk kedua item
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500)
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan kriteria Penilaian berhasil disimpan!')
                    ->assertSee('Perubahan kriteria Penilaian berhasil disimpan!');
        });

        // Verify kedua data berubah di database
        $this->assertDatabaseHas('kriteria_penilaian', [
            'nama_kriteria_penilaian' => 'Kriteria 1 Edited',
        ]);

        $this->assertDatabaseHas('kriteria_penilaian', [
            'nama_kriteria_penilaian' => 'Kriteria 2 Edited',
        ]);
    }
}
