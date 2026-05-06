<?php

namespace Tests\Browser\VisiKeilmuan;

use Database\Seeders\VisiKeilmuanSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;


class EditVisiKeilmuanTest extends DuskTestCase
{

    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper ;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(VisiKeilmuanSeeder::class);
    }


    public function test_edit_desc_visi_keilmuan_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/visi-keilmuan/1/edit');

            $this->removeRequiredValidation($browser);

            $browser
                ->clear('#desc_vk_id')
                ->type('#desc_vk_en', 'Visi Keilmuan Description in English');
                
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->assertSee('Visi Keilmuan (Indonesia) wajib diisi.');
        });
    }

    public function test_edit_desc_visi_keilmuan_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/visi-keilmuan/1/edit');

            $this->removeRequiredValidation($browser);

            $browser
                ->clear('#desc_vk_en')
                ->type('#desc_vk_id', 'Deskripsi Visi Keilmuan dalam Bahasa Indonesia');
                
            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->assertSee('Visi Keilmuan (English) wajib diisi.');
        });
    }

    public function test_edit_visi_keilmuan()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/visi-keilmuan/1/edit');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_vk_id')
                    ->type('#desc_vk_id', 'Deskripsi UPDATED');

            $browser->clear('#desc_vk_en')
                    ->type('#desc_vk_en', 'Description UPDATED');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('Visi Keilmuan berhasil diperbarui!')
                    ->assertSee('Visi Keilmuan berhasil diperbarui!');
        });

        $this->assertDatabaseHas('visi_keilmuan', [
            'desc_vk_id' => 'Deskripsi UPDATED',
            'desc_vk_en' => 'Description UPDATED',
        ]);
    }
}
