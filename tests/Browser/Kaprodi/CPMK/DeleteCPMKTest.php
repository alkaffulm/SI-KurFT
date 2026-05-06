<?php

namespace Tests\Browser\CPMK;

use Database\Seeders\CpmkSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteCPMKTest extends DuskTestCase
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
    }

    public function test_delete_single_cpmk()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/cpmk/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_31"]');  
            $browser->pause(500);  

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('CPMK berhasil diperbarui!')
                    ->assertSee('CPMK berhasil diperbarui!');
        });

        $this->assertDatabaseMissing('cpmk', [
            'id_cpmk' => 31,
        ]);
    }

    public function test_delete_cpmk_1_and_cpmk_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/cpmk/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_31"]');
            $browser->pause(300);

            $browser->click('label[for="delete_32"]');
            $browser->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 2 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('CPMK berhasil diperbarui!')
                    ->assertSee('CPMK berhasil diperbarui!');
        });

        $this->assertDatabaseMissing('cpmk', ['id_cpmk' => 31]);
        $this->assertDatabaseMissing('cpmk', ['id_cpmk' => 32]);
    }

    // public function test_cancel_delete_should_not_remove_cpmk()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $this->loginAsKaprodi($browser);

    //         $browser
    //             ->visit('/kaprodi/cpmk/edit-all')
    //             ->waitFor('#form-update');

    //         $browser->click('label[for="delete_1"]');
    //         $browser->pause(300);

    //         $browser->scrollIntoView('button[type="submit"]')
    //                 ->press('Simpan Perubahan')
    //                 ->waitFor('.swal2-confirm', 5);

    //         $browser->assertSee('PERINGATAN!')
    //                 ->press('Batal');  

    //         $browser->pause(500);
    //         $browser->waitFor('#form-update');
    //     });

    //     $this->assertDatabaseHas('cpmk', [
    //         'id_cpmk' => 1,
    //     ]);
    // }

    // public function test_edit_and_delete_simultaneously()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $this->loginAsKaprodi($browser);

    //         $browser
    //             ->visit('/kaprodi/cpmk/edit-all')
    //             ->waitFor('#form-update');

    //         $browser->clear('#nama_kode_cpmk_1')
    //                 ->type('#nama_kode_cpmk_1', 'CPMK-1-EDITED');

    //         $browser->click('label[for="delete_2"]');
    //         $browser->pause(300);

    //         $browser->scrollIntoView('button[type="submit"]')
    //                 ->press('Simpan Perubahan')
    //                 ->waitFor('.swal2-confirm', 5);

    //         $browser->assertSee('PERINGATAN!')
    //                 ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

    //         $browser->press('Ya, Hapus & Simpan')
    //                 ->waitForText('CPMK berhasil diperbarui!')
    //                 ->assertSee('CPMK berhasil diperbarui!');
    //     });

    //     $this->assertDatabaseHas('cpmk', [
    //         'id_cpmk' => 1,
    //         'nama_kode_cpmk' => 'CPMK-1-EDITED',
    //     ]);

    //     $this->assertDatabaseMissing('cpmk', [
    //         'id_cpmk' => 2,
    //     ]);
    // }
}
