<?php

namespace Tests\Browser\Admin\MetodePembelajaran;

use Database\Seeders\MetodePembelajaranSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteMetodePembelajaranTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(MetodePembelajaranSeeder::class);
    }

    public function test_delete_single_metode_pembelajaran()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/metode-pembelajaran/edit')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_85"]');

            $browser->pause(500);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 1 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan Metode Pembelajaran berhasil disimpan!')
                    ->assertSee('Perubahan Metode Pembelajaran berhasil disimpan!');
        });

        $this->assertDatabaseMissing('metode_pembelajaran', [
            'nama_metode_pembelajaran' => 'Seminar',
        ]);
    }

    public function test_delete_metode_pembelajaran_1_and_2_simultaneously()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsAdmin($browser);

            $browser
                ->visit('/admin/metode-pembelajaran/edit')
                ->waitFor('#form-update');

            $browser->click('label[for="delete_85"]');

            $browser->pause(300);

            $browser->click('label[for="delete_86"]');

            $browser->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->pause(500);

            $browser->assertSee('PERINGATAN!')
                    ->assertSee('Anda menandai 2 data untuk DIHAPUS permanen');

            $browser->press('Ya, Hapus & Simpan')
                    ->waitForText('Perubahan Metode Pembelajaran berhasil disimpan!')
                    ->assertSee('Perubahan Metode Pembelajaran berhasil disimpan!');
        });

        $this->assertDatabaseMissing('metode_pembelajaran', [
            'nama_metode_pembelajaran' => 'Seminar',
        ]);

        $this->assertDatabaseMissing('metode_pembelajaran', [
            'nama_metode_pembelajaran' => 'Webinar',
        ]);
    }
}