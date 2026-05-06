<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Seeders\CPLSeeder;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteCPLTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(CPLSeeder::class);
    }

    public function test_delete_single_cpl()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/cpl/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_19"]');  
            $browser->pause(500);  

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan CPL berhasil disimpan!')
                    ->assertSee('Perubahan CPL berhasil disimpan!');
        });

        // Verify data sudah dihapus di database
        $this->assertDatabaseMissing('cpl', [
            'id_cpl' => 19,
        ]);
    }

    public function test_delete_cpl_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/cpl/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_19"]');
            $browser->pause(300);

            $browser->click('label[for="delete_20"]');
            $browser->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 2 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan CPL berhasil disimpan!')
                    ->assertSee('Perubahan CPL berhasil disimpan!');
        });

        // Verify kedua data sudah dihapus di database
        $this->assertDatabaseMissing('cpl', ['id_cpl' => 19]);
        $this->assertDatabaseMissing('cpl', ['id_cpl' => 20]);
    }
}
