<?php

namespace Tests\Browser\Admin\ModelPembelajaran;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddModelPembelajaranTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
    }

    public function test_nama_model_pembelajaran_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/model-pembelajaran/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->press('Simpan Perubahan')
                ->assertSee('Nama Model Pembelajaran tidak boleh kosong.');
        });
    }

    public function test_add_valid_model_pembelajaran()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/model-pembelajaran/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_model_pembelajaran', 'Model Pembelajaran Test')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitForLocation('/admin/model-pembelajaran')
                ->assertSee('Model Pembelajaran berhasil ditambahkan!');
        });

        $this->assertDatabaseHas('model_pembelajaran', [
            'nama_model_pembelajaran' => 'Model Pembelajaran Test',
        ]);
    }
}
