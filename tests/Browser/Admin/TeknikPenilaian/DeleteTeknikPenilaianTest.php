<?php

namespace Tests\Browser\Admin\TeknikPenilaian;

use Database\Seeders\TeknikPenilaianSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteTeknikPenilaianTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(TeknikPenilaianSeeder::class);
    }

    public function test_delete_single_teknik_penilaian()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/teknik-penilaian/edit')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_32"]');  
            $browser->pause(500);  

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan Teknik Penilaian berhasil disimpan!')
                    ->assertSee('Perubahan Teknik Penilaian berhasil disimpan!');
        });

        $this->assertDatabaseMissing('teknik_penilaian', [
            'nama_teknik_penilaian' => 'Test 1',
        ]);
    }

    public function test_delete_teknik_penilaian_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/teknik-penilaian/edit')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_32"]');
            $browser->pause(300);

            $browser->click('label[for="delete_33"]');
            $browser->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 2 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan Teknik Penilaian berhasil disimpan!')
                    ->assertSee('Perubahan Teknik Penilaian berhasil disimpan!');
        });

        $this->assertDatabaseMissing('teknik_penilaian', ['nama_teknik_penilaian' => 'Test 1']);
        $this->assertDatabaseMissing('teknik_penilaian', ['nama_teknik_penilaian' => 'Test 2']);
    }
}
