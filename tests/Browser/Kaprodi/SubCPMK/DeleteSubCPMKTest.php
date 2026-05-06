<?php

namespace Tests\Browser\SubCPMK;

use Database\Seeders\CpmkSeeder;
use Database\Seeders\SubCpmkSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteSubCPMKTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(CpmkSeeder::class);
        $this->seed(SubCpmkSeeder::class);
    }

    public function test_delete_single_sub_cpmk()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/sub-cpmk/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_1"]');  
            $browser->pause(500);  

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Sub CPMK berhasil diperbarui!')
                    ->assertSee('Sub CPMK berhasil diperbarui!');
        });

        $this->assertDatabaseMissing('sub_cpmk', [
            'id_sub_cpmk' => 1,
        ]);
    }

    public function test_delete_sub_cpmk_1_and_sub_cpmk_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/sub-cpmk/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_1"]');
            $browser->pause(300);

            $browser->click('label[for="delete_2"]');
            $browser->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 2 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Sub CPMK berhasil diperbarui!')
                    ->assertSee('Sub CPMK berhasil diperbarui!');
        });

        $this->assertDatabaseMissing('sub_cpmk', ['id_sub_cpmk' => 1]);
        $this->assertDatabaseMissing('sub_cpmk', ['id_sub_cpmk' => 2]);
    }
}
