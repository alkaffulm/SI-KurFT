<?php

namespace Tests\Browser\Admin\KelolaPengguna;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class DeleteKelolaPenggunaTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
    }

    public function test_delete_single_pengguna()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna');

            $browser->press('form[action*="kelola-pengguna/148"] button');

            $browser->waitFor('.swal2-confirm')
                    ->pause(500);

            // $browser->press('Ya')
            //         ->waitForRoute('admin.kelola-pengguna.index')
            //         ->assertSee('User berhasil dihapus');

           $browser->assertSee('Yakin hapus user ini?')
                    ->assertSee('Data yang dihapus tidak dapat dikembalikan!');

            $browser->press('Ya, Hapus!')
                    ->waitForText('User berhasil dihapus permanen')
                    ->assertSee('User berhasil dihapus permanen');
        });

        $this->assertDatabaseMissing('user', [
            'id_user' => 148,
        ]);
    }

}
