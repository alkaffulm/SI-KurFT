<?php

use Database\Seeders\BahanKajianSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteBahanKajianTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(BahanKajianSeeder::class);

    }

    public function test_delete_single_bahan_kajian()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/bahan-kajian/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_19"]');  
            $browser->pause(500);  

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan Bahan Kajian berhasil disimpan!')
                    ->assertSee('Perubahan Bahan Kajian berhasil disimpan!');
        });

        // Verify data sudah dihapus di database
        $this->assertDatabaseMissing('bahan_kajian', [
            'id_bk' => 19,
        ]);
    }

    public function test_delete_bahan_kajian_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/bahan-kajian/edit-all')
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
                    ->waitForText('Perubahan Bahan Kajian berhasil disimpan!')
                    ->assertSee('Perubahan Bahan Kajian berhasil disimpan!');
        });

        $this->assertDatabaseMissing('bahan_kajian', ['id_bk' => 19]);
        $this->assertDatabaseMissing('bahan_kajian', ['id_bk' => 20]);
    }
}
