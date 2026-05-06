<?php

namespace Tests\Browser\Admin\ModelPembelajaran;

use Database\Seeders\ModelPembelajaranSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteModelPembelajaranTest extends DuskTestCase
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

    public function test_delete_single_model_pembelajaran()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/model-pembelajaran/edit')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_13"]');  
            $browser->pause(500);  

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan Model Pembelajaran berhasil disimpan!')
                    ->assertSee('Perubahan Model Pembelajaran berhasil disimpan!');
        });

        $this->assertDatabaseMissing('model_pembelajaran', [
            'nama_model_pembelajaran' => 'Model 1',
        ]);
    }

    public function test_delete_model_pembelajaran_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/model-pembelajaran/edit')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_13"]');  
            $browser->pause(300);

            $browser->click('label[for="delete_14"]');
            $browser->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 2 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan Model Pembelajaran berhasil disimpan!')
                    ->assertSee('Perubahan Model Pembelajaran berhasil disimpan!');
        });

        $this->assertDatabaseMissing('model_pembelajaran', ['nama_model_pembelajaran' => 'Model 1']);
        $this->assertDatabaseMissing('model_pembelajaran', ['nama_model_pembelajaran' => 'Model 2']);
    }
}
