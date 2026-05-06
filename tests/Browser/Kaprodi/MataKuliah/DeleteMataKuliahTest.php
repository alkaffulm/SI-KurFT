<?php

namespace Tests\Browser\MataKuliah;

use Database\Seeders\MataKuliahSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;

class DeleteMataKuliahTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(MataKuliahSeeder::class);
    }

    public function test_delete_single_mata_kuliah()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser
                ->visit('/kaprodi/mata-kuliah/edit-all')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_31"]');

            $browser->pause(500);

            $browser
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm');

            $browser
                ->assertSee('PERINGATAN!')
                ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser
                ->press('Ya, Hapus & Simpan')
                ->waitForText('Mata Kuliah berhasil diperbarui!')
                ->assertSee('Mata Kuliah berhasil diperbarui!');
        });

        $this->assertDatabaseMissing('mata_kuliah', [
            'id_mk' => 31,
        ]);
    }
    
    // public function test_delete_mata_kuliah_1_and_mata_kuliah_2()
    // {
    //     $this->browse(function (Browser $browser) {

    //         $this->loginAsKaprodi($browser);

    //         $browser
    //             ->visit('/kaprodi/mata-kuliah/edit-all')
    //             ->waitFor('#form-update');

    //         $browser->click('label[for="delete_33"]');
    //         $browser->pause(500);

    //         $browser->scrollIntoView('label[for="delete_37"]');

    //         $browser->click('label[for="delete_37"]');
    //         $browser->pause(500);

    //         $browser
    //             ->scrollIntoView('button[type="submit"]')
    //             ->press('Simpan Perubahan')
    //             ->waitFor('.swal2-confirm',5);

    //         $browser
    //             ->assertSee('PERINGATAN!')
    //             ->assertSee('Anda menandai 2 data untuk DIHAPUS permanen');

    //         $browser
    //             ->press('Ya, Hapus & Simpan')
    //             ->waitForText('Mata Kuliah berhasil diperbarui!')
    //             ->assertSee('Mata Kuliah berhasil diperbarui!');
    //     });

    //     $this->assertDatabaseMissing('mata_kuliah', ['id_mk' => 33]);
    //     $this->assertDatabaseMissing('mata_kuliah', ['id_mk' => 37]);
    // }
    
}