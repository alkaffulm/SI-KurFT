<?php
namespace Tests\Browser\VisiKeilmuan;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;


class AddVisiKeilmuanTest extends DuskTestCase
{

    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper ;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
    }


    public function test_desc_visi_keilmuan_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/visi-keilmuan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('desc_vk_en', 'Visi Keilmuan Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah Visi Keilmuan')
                ->assertSee('Visi Keilmuan (Indonesia) wajib diisi.');
        });
    }

    public function test_desc_visi_keilmuan_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/visi-keilmuan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('desc_vk_id', 'Deskripsi Visi Keilmuan dalam Bahasa Indonesia')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah Visi Keilmuan')
                ->assertSee('Visi Keilmuan (English) wajib diisi.');
        });
    }

    public function test_add_valid_visi_keilmuan()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/visi-keilmuan/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('desc_vk_id', 'Deskripsi Visi Keilmuan dalam Bahasa Indonesia');
                $browser->type('desc_vk_en', 'Visi Keilmuan Description in English');
                $browser->scrollIntoView('button[type="submit"]');
                $browser->press('Tambah Visi Keilmuan');
                $browser->waitFor('.swal2-confirm');
                $browser->waitForText('Visi Keilmuan berhasil ditambahkan!');
                $browser->assertSee('Visi Keilmuan berhasil ditambahkan!');
        });

        $this->assertDatabaseHas('visi_keilmuan', [
            'desc_vk_id' => 'Deskripsi Visi Keilmuan dalam Bahasa Indonesia',
            'desc_vk_en' => 'Visi Keilmuan Description in English',
        ]);
    }
}