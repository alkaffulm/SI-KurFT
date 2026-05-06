<?php

namespace Tests\Browser\Admin\KriteriaPenilaian;

use Database\Seeders\KriteriaPenilaianSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteKriteriaPenilaianTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(KriteriaPenilaianSeeder::class);
    }

    public function test_delete_single_kriteria_penilaian()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/kriteria-penilaian/edit')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_27"]');  
            $browser->pause(500);  

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan kriteria Penilaian berhasil disimpan!')
                    ->assertSee('Perubahan kriteria Penilaian berhasil disimpan!');
        });

        $this->assertDatabaseMissing('kriteria_penilaian', [
            'nama_kriteria_penilaian' => 'Kriteria 1',
        ]);
    }

    public function test_delete_kriteria_penilaian_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/kriteria-penilaian/edit')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_27"]');
            $browser->pause(300);

            $browser->click('label[for="delete_28"]');
            $browser->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 2 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan kriteria Penilaian berhasil disimpan!')
                    ->assertSee('Perubahan kriteria Penilaian berhasil disimpan!');
        });

        $this->assertDatabaseMissing('kriteria_penilaian', ['nama_kriteria_penilaian' => 'Kriteria 1']);
        $this->assertDatabaseMissing('kriteria_penilaian', ['nama_kriteria_penilaian' => 'Kriteria 2']);
    }
}
