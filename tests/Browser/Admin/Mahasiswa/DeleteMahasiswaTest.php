<?php

namespace Tests\Browser\Admin\Mahasiswa;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;
use Illuminate\Support\Facades\DB;

class DeleteMahasiswaTest extends DuskTestCase
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

    public function test_delete_single_mahasiswa()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/admin/master-mahasiswa');

            // Tunggu Livewire selesai loading data
            $browser->waitForTextIn('table', '2101010001', 10);

            // Scroll ke button Hapus dan klik
            $browser->scrollIntoView('button[onclick="confirmDelete(1)"]')
                    ->pause(300)
                    ->click('button[onclick="confirmDelete(1)"]')
                    ->waitFor('.swal2-confirm', 5);

            $browser->assertSee('Hapus Data Mahasiswa?')
                    ->assertSee('Data yang dihapus tidak dapat dikembalikan!');

            $browser->press('Ya, Hapus!')
                    ->waitForText('Data mahasiswa berhasil dihapus')
                    ->assertSee('Data mahasiswa berhasil dihapus');
        });

        $this->assertDatabaseMissing('mahasiswa', [
            'id_mhs' => 1,
        ]);
    }

    // public function test_delete_mahasiswa_2_data_separately()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $this->loginAsAdmin($browser);

    //         // Delete Mahasiswa 1
    //         $browser->visit('/admin/master-mahasiswa');

    //         $browser->waitForTextIn('table', '2101010001', 10);

    //         $browser->scrollIntoView('button[onclick="confirmDelete(1)"]')
    //                 ->pause(300)
    //                 ->click('button[onclick="confirmDelete(1)"]')
    //                 ->waitFor('.swal2-confirm', 5);

    //         $browser->assertSee('Hapus Data Mahasiswa?')
    //                 ->assertSee('Data yang dihapus tidak dapat dikembalikan!');

    //         $browser->press('Ya, Hapus!')
    //                 ->waitForText('Data mahasiswa berhasil dihapus')
    //                 ->assertSee('Data mahasiswa berhasil dihapus');

    //         // Delete Mahasiswa 2
    //         $browser->visit('/admin/master-mahasiswa');

    //         $browser->waitForTextIn('table', '2101010002', 10);

    //         $browser->scrollIntoView('button[onclick="confirmDelete(2)"]')
    //                 ->pause(300)
    //                 ->click('button[onclick="confirmDelete(2)"]')
    //                 ->waitFor('.swal2-confirm', 5);

    //         $browser->assertSee('Hapus Data Mahasiswa?')
    //                 ->assertSee('Data yang dihapus tidak dapat dikembalikan!');

    //         $browser->press('Ya, Hapus!')
    //                 ->waitForText('Data mahasiswa berhasil dihapus')
    //                 ->assertSee('Data mahasiswa berhasil dihapus');
    //     });

    //     $this->assertDatabaseMissing('mahasiswa', [
    //         'id_mhs' => 1,
    //     ]);

    //     $this->assertDatabaseMissing('mahasiswa', [
    //         'id_mhs' => 2,
    //     ]);
    // }

}
