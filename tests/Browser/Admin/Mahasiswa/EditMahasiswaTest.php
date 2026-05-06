<?php

namespace Tests\Browser\Admin\Mahasiswa;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;
use Illuminate\Support\Facades\DB;

class EditMahasiswaTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seedMahasiswaData();
    }

    private function seedMahasiswaData()
    {
        DB::table('mahasiswa')->insert([
            ['id_mhs' => 1, 'nim' => '2101010001', 'nama_lengkap' => 'Mahasiswa Satu', 'jenis_kelamin' => 'LAKI-LAKI', 'angkatan' => 2025, 'id_ps' => 7, 'id_kurikulum' => 7],
            ['id_mhs' => 2, 'nim' => '2101010002', 'nama_lengkap' => 'Mahasiswa Dua', 'jenis_kelamin' => 'PEREMPUAN', 'angkatan' => 2025, 'id_ps' => 7, 'id_kurikulum' => 7],
            ['id_mhs' => 3, 'nim' => '2201010003', 'nama_lengkap' => 'Mahasiswa Tiga', 'jenis_kelamin' => 'LAKI-LAKI', 'angkatan' => 2025, 'id_ps' => 7, 'id_kurikulum' => 7],
        ]);
    }

    public function test_nim_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/master-mahasiswa/edit/1');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nim')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The nim field is required')
                    ->assertSee('The nim field is required');
        });
    }

    public function test_nama_lengkap_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/master-mahasiswa/edit/1');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_lengkap')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The nama lengkap field is required')
                    ->assertSee('The nama lengkap field is required');
        });
    }

    public function test_jenis_kelamin_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/master-mahasiswa/edit/1');

            $this->removeRequiredValidation($browser);

            $browser->select('#jenis_kelamin', '')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The jenis kelamin field is required')
                    ->assertSee('The jenis kelamin field is required');
        });
    }

    public function test_angkatan_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/master-mahasiswa/edit/1');

            $this->removeRequiredValidation($browser);

            $browser->clear('#angkatan')
                    ->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForText('The angkatan field is required')
                    ->assertSee('The angkatan field is required');
        });
    }

    public function test_edit_mahasiswa_1_successfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/master-mahasiswa/edit/1');

            // Update NIM
            $browser->clear('#nim')
                    ->pause(300)
                    ->type('#nim', '2101010999');

            // Update Nama
            $browser->clear('#nama_lengkap')
                    ->pause(300)
                    ->type('#nama_lengkap', 'Mahasiswa Satu Updated');

            // Update Jenis Kelamin
            $browser->select('#jenis_kelamin', 'PEREMPUAN')
                    ->pause(300);

            // Update Angkatan
            $browser->clear('#angkatan')
                    ->pause(300)
                    ->type('#angkatan', '2020');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitForRoute('master-mahasiswa.index')
                    ->assertSee('Data mahasiswa berhasil diperbarui!');
        });

        $this->assertDatabaseHas('mahasiswa', [
            'id_mhs' => 1,
            'nim' => '2101010999',
            'nama_lengkap' => 'Mahasiswa Satu Updated',
            'jenis_kelamin' => 'PEREMPUAN',
            'angkatan' => 2020,
        ]);
    }
}
