<?php

namespace Tests\Browser\Admin\ModelPembelajaran;

use Database\Seeders\ModelPembelajaranSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditModelPembelajaranTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(ModelPembelajaranSeeder::class);
    }

    public function test_edit_nama_model_pembelajaran_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/model-pembelajaran/edit')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_model_pembelajaran_13')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Nama Model Pembelajaran tidak boleh kosong.')
                ->assertSee('Nama Model Pembelajaran tidak boleh kosong.');
        });
    }

    public function test_edit_model_pembelajaran_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/model-pembelajaran/edit')
                ->waitFor('#form-update');

            // Ubah nama model pembelajaran 1
            $browser->clear('#nama_model_pembelajaran_13')
                    ->type('#nama_model_pembelajaran_13', 'Model 1 Updated');

            // Submit form
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan Model Pembelajaran berhasil disimpan!')
                    ->assertSee('Perubahan Model Pembelajaran berhasil disimpan!');
        });

        // Verify di database
        $this->assertDatabaseHas('model_pembelajaran', [
            'nama_model_pembelajaran' => 'Model 1 Updated',
        ]);
    }

    public function test_edit_model_pembelajaran_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/model-pembelajaran/edit')
                ->waitFor('#form-update');

            // ===== EDIT MODEL PEMBELAJARAN 1 =====
            $browser->clear('#nama_model_pembelajaran_13')
                    ->type('#nama_model_pembelajaran_13', 'Model 1 Edited');

            // ===== EDIT MODEL PEMBELAJARAN 2 =====
            $browser->clear('#nama_model_pembelajaran_14')
                    ->type('#nama_model_pembelajaran_14', 'Model 2 Edited');

            // Submit form sekali untuk kedua item
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan Model Pembelajaran berhasil disimpan!')
                    ->assertSee('Perubahan Model Pembelajaran berhasil disimpan!');
        });

        // Verify kedua data berubah di database
        $this->assertDatabaseHas('model_pembelajaran', [
            'nama_model_pembelajaran' => 'Model 1 Edited',
        ]);

        $this->assertDatabaseHas('model_pembelajaran', [
            'nama_model_pembelajaran' => 'Model 2 Edited',
        ]);
    }
}
