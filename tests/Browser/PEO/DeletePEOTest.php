<?php

use Database\Seeders\PEOSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeletePEOTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(PEOSeeder::class);
    }

    public function test_delete_single_peo()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/peo/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_1"]');  
            $browser->pause(500);  

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan PEO berhasil disimpan!')
                    ->assertSee('Perubahan PEO berhasil disimpan!');
        });

        $this->assertDatabaseMissing('peo', [
            'kode_peo' => 'PEO-1',
        ]);
    }

    public function test_delete_peo_1_and_peo_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/peo/edit-all')
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
                    ->waitForText('Perubahan PEO berhasil disimpan!')
                    ->assertSee('Perubahan PEO berhasil disimpan!');
        });

        $this->assertDatabaseMissing('peo', ['kode_peo' => 'PEO-1']);
        $this->assertDatabaseMissing('peo', ['kode_peo' => 'PEO-2']);
    }

    public function test_cancel_delete_should_not_remove_peo()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/peo/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_1"]');
            $browser->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->press('Batal');  

            $browser->pause(500);
            $browser->waitFor('#form-update');
        });

        $this->assertDatabaseHas('peo', [
            'kode_peo' => 'PEO-1',
        ]);
    }

    public function test_edit_and_delete_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/peo/edit-all')
                ->waitFor('#form-update');

            $browser->clear('#kode_peo_1')
                    ->type('#kode_peo_1', 'PEO-1-EDITED');

            $browser->click('label[for="delete_2"]');
            $browser->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan PEO berhasil disimpan!')
                    ->assertSee('Perubahan PEO berhasil disimpan!');
        });

        $this->assertDatabaseHas('peo', [
            'kode_peo' => 'PEO-1-EDITED',
        ]);

        $this->assertDatabaseMissing('peo', [
            'kode_peo' => 'PEO-2',
        ]);
    }
}