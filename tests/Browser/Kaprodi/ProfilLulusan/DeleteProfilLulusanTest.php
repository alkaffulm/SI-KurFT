<?php

namespace Tests\Browser;

use Database\Seeders\ProfilLulusanSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteProfilLulusanTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(ProfilLulusanSeeder::class);

    }

    public function test_delete_single_profil_lulusan()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/profil-lulusan/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_13"]');  
            $browser->pause(500);  

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan Profil Lulusan berhasil disimpan!')
                    ->assertSee('Perubahan Profil Lulusan berhasil disimpan!');
        });

        // Verify data sudah dihapus di database
        $this->assertDatabaseMissing('profil_lulusan', [
            'id_pl' => 13,
        ]);
    }

    public function test_delete_profil_lulusan_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/profil-lulusan/edit-all')
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
                    ->waitForText('Perubahan Profil Lulusan berhasil disimpan!')
                    ->assertSee('Perubahan Profil Lulusan berhasil disimpan!');
        });

        $this->assertDatabaseMissing('profil_lulusan', ['id_pl' => 13]);
        $this->assertDatabaseMissing('profil_lulusan', ['id_pl' => 14]);
    }

    // public function test_cancel_delete_should_not_remove_profil_lulusan()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $this->loginAsKaprodi($browser);

    //         $browser
    //             ->visit('/kaprodi/profil-lulusan/edit-all')
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

    //     $this->assertDatabaseHas('profil_lulusan', [
    //         'id_pl' => 1,
    //     ]);
    // }

    // public function test_edit_and_delete_simultaneously()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $this->loginAsKaprodi($browser);

    //         $browser
    //             ->visit('/kaprodi/profil-lulusan/edit-all')
    //             ->waitFor('#form-update');

    //         $browser->clear('#kode_pl_1')
    //                 ->type('#kode_pl_1', 'PL-1-EDITED');

    //         $browser->click('label[for="delete_2"]');
    //         $browser->pause(300);

    //         $browser->scrollIntoView('button[type="submit"]')
    //                 ->press('Simpan Perubahan')
    //                 ->waitFor('.swal2-confirm', 5);

    //         $browser->assertSee('PERINGATAN!')
    //                 ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

    //         $browser->press('Ya, Hapus & Simpan')
    //                 ->waitForText('Perubahan Profil Lulusan berhasil disimpan!')
    //                 ->assertSee('Perubahan Profil Lulusan berhasil disimpan!');
    //     });

    //     $this->assertDatabaseHas('profil_lulusan', [
    //         'kode_pl' => 'PL-1-EDITED',
    //     ]);

    //     $this->assertDatabaseMissing('profil_lulusan', [
    //         'id_pl' => 2,
    //     ]);
    // }
}
