<?php

namespace Tests\Browser\Admin\KelolaPengguna;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditKelolaPenggunaTest extends DuskTestCase
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

    public function test_edit_nip_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna/148/edit');

            $this->removeRequiredValidation($browser);

            $browser->clear('input[name="NIP"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The n i p field is required.')
                    ->assertSee('The n i p field is required.');
        });
    }

    public function test_edit_username_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna/148/edit');

            $this->removeRequiredValidation($browser);

            $browser->clear('input[name="username"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The username field is required.')
                    ->assertSee('The username field is required.');
        });
    }

    public function test_edit_email_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna/148/edit');

            $this->removeRequiredValidation($browser);

            $browser->clear('input[name="email"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The email field is required.')
                    ->assertSee('The email field is required.');
        });
    }

    public function test_edit_pengguna_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna/148/edit');

            // Update user data
            $browser->clear('input[name="username"]')
                    ->pause(300)
                    ->type('input[name="username"]', 'user1_updated');

            $browser->clear('input[name="email"]')
                    ->pause(300)
                    ->type('input[name="email"]', 'user1_updated@test.com');

            $browser->clear('input[name="NIP"]')
                    ->pause(300)
                    ->type('input[name="NIP"]', '198501011995121999');
                
            $browser->type('input[name="password"]', 'newpassword123');

            // Select role and submit
            $browser->check('input[value="3"]')
                    ->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForLocation('/admin/kelola-pengguna')
                    ->assertSee('User berhasil diupdate.');
        });

        $this->assertDatabaseHas('user', [
            'id_user' => 148,
            'username' => 'user1_updated',
            'email' => 'user1_updated@test.com',
        ]);
    }

    // public function test_edit_pengguna_1_and_2_simultaneously()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $this->loginAsAdmin($browser);

    //         // Edit User 1
    //         $browser->visit('/admin/kelola-pengguna/148/edit');

    //         $browser->clear('input[name="username"]')
    //                 ->pause(300)
    //                 ->type('input[name="username"]', 'user1_changed');

    //         $browser->clear('input[name="email"]')
    //                 ->pause(300)
    //                 ->type('input[name="email"]', 'user1_changed@test.com');

    //         // Edit User 2
    //         $browser->visit('/admin/kelola-pengguna/2/edit');

    //         $browser->clear('input[name="username"]')
    //                 ->pause(300)
    //                 ->type('input[name="username"]', 'user2_changed');

    //         $browser->clear('input[name="email"]')
    //                 ->pause(300)
    //                 ->type('input[name="email"]', 'user2_changed@test.com');

    //         $browser->scrollIntoView('button[type="submit"]')
    //                 ->press('Simpan Perubahan')
    //                 ->waitForText('User berhasil diupdate.')
    //                 ->assertSee('User berhasil diupdate.');
    //     });

    //     $this->assertDatabaseHas('user', [
    //         'id_user' => 1,
    //         'username' => 'user1_changed',
    //         'email' => 'user1_changed@test.com',
    //     ]);

    //     $this->assertDatabaseHas('user', [
    //         'id_user' => 2,
    //         'username' => 'user2_changed',
    //         'email' => 'user2_changed@test.com',
    //     ]);
    // }
}
