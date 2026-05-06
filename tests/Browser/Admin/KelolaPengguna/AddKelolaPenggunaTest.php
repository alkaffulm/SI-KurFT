<?php

namespace Tests\Browser\Admin\KelolaPengguna;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddKelolaPenggunaTest extends DuskTestCase
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

    public function test_nip_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna/create');

            $this->removeRequiredValidation($browser);

            $browser->type('#username', 'newuser123')
                    ->type('#email', 'test@test.com')
                    ->type('#password', 'password123');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The n i p field is required.')
                    ->assertSee('The n i p field is required.');
        });
    }

    public function test_username_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna/create');

            $this->removeRequiredValidation($browser);

            $browser->type('#email', 'test@test.com')
                    ->type('#password', 'password123');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The username field is required.')
                    ->assertSee('The username field is required.');
        });
    }

    public function test_email_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna/create');

            $this->removeRequiredValidation($browser);

            $browser->type('#username', 'newuser123')
                    ->type('#password', 'password123')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The email field is required.')
                    ->assertSee('The email field is required.');
        });
    }

    public function test_password_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna/create');

            $this->removeRequiredValidation($browser);

            $browser->type('#username', 'newuser456')
                    ->type('#email', 'newuser456@test.com')
                    ->scrollIntoView('#password')
                    ->clear('#password')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The password field is required.')
                    ->assertSee('The password field is required.');
        });
    }

    public function test_add_valid_pengguna()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/kelola-pengguna/create');

            $browser->type('#username', 'dosen001')
                    ->type('#email', 'dosen001@test.com')
                    ->type('#password', 'pass12345')
                    ->type('#NIP', '198501012010121001')
                    ->check('input[value="2"]')
                    ->pause(300);

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForRoute('admin.kelola-pengguna.index')
                    ->assertSee('User berhasil ditambahkan.');
        });

        $this->assertDatabaseHas('user', [
            'username' => 'dosen001',
            'email' => 'dosen001@test.com',
            'NIP' => '198501012010121001',
        ]);
    }
}
