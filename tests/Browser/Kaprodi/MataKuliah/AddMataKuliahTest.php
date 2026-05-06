<?php

namespace Tests\Browser\MataKuliah;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddMataKuliahTest extends DuskTestCase
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

    public function test_kode_mk_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/mata-kuliah/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('#nama_matkul_id', 'Pemrograman Web')
                ->type('#nama_matkul_en', 'Web Programming')
                ->type('#matkul_desc_id', 'Deskripsi Indonesia')
                ->type('#matkul_desc_en', 'English Description')
                ->type('#sks_teori', 3)
                ->type('#sks_praktikum', 1)
                ->type('#semester', 4)
                ->select('#muncul', 'ganjil')
                ->select('#id_pengembang_rps', 148)
                ->select('#id_koordinator_mk', 148)
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah MK')
                ->assertSee('Kode Mata Kuliah tidak boleh kosong.');
        });
    }

    public function test_nama_matkul_id_required_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/mata-kuliah/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('#kode_mk', 'IF101')
                ->type('#nama_matkul_en', 'Web Programming')
                ->type('#matkul_desc_id', 'Deskripsi Indonesia')
                ->type('#matkul_desc_en', 'English Description')
                ->type('#sks_teori', 3)
                ->type('#sks_praktikum', 1)
                ->type('#semester', 4)
                ->select('#muncul', 'ganjil')
                ->select('#id_pengembang_rps', 148)
                ->select('#id_koordinator_mk', 148)
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah MK')
                ->assertSee('Nama Mata Kuliah (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_semester_max_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/mata-kuliah/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('#kode_mk', 'IF101')
                ->type('#nama_matkul_id', 'Pemrograman Web')
                ->type('#nama_matkul_en', 'Web Programming')
                ->type('#matkul_desc_id', 'Deskripsi Indonesia')
                ->type('#matkul_desc_en', 'English Description')
                ->type('#sks_teori', 3)
                ->type('#sks_praktikum', 1)
                ->type('#semester', 9)
                ->select('#muncul', 'ganjil')
                ->select('#id_pengembang_rps', 148)
                ->select('#id_koordinator_mk', 148)
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah MK')
                ->assertSee('Semester tidak bisa diatas 8');
        });
    }

   public function test_semester_integer_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/mata-kuliah/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('#kode_mk', 'IF101')
                ->type('#nama_matkul_id', 'Pemrograman Web')
                ->type('#nama_matkul_en', 'Web Programming')
                ->type('#matkul_desc_id', 'Deskripsi Indonesia')
                ->type('#matkul_desc_en', 'English Description')
                ->type('#sks_teori', 3)
                ->type('#sks_praktikum', 1)
                ->type('#semester', 'empat')
                ->select('#muncul', 'ganjil')
                ->select('#id_pengembang_rps', 148)
                ->select('#id_koordinator_mk', 148)
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah MK')
                ->assertSee('Semester harus berupa integer');
        });
    }

    public function test_sks_praktikum_integer_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/mata-kuliah/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('#kode_mk', 'IF101')
                ->type('#nama_matkul_id', 'Pemrograman Web')
                ->type('#nama_matkul_en', 'Web Programming')
                ->type('#matkul_desc_id', 'Deskripsi Indonesia')
                ->type('#matkul_desc_en', 'English Description')
                ->type('#sks_teori', 3)
                ->type('#sks_praktikum', 'satu')
                ->type('#semester', 4)
                ->select('#muncul', 'ganjil')
                ->select('#id_pengembang_rps', 148)
                ->select('#id_koordinator_mk', 148)
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah MK')
                ->assertSee('Jumlah SKS Praktikum harus berupa integer');
        });
    }

    public function test_sks_teori_integer_validation()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/mata-kuliah/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('#kode_mk', 'IF101')
                ->type('#nama_matkul_id', 'Pemrograman Web')
                ->type('#nama_matkul_en', 'Web Programming')
                ->type('#matkul_desc_id', 'Deskripsi Indonesia')
                ->type('#matkul_desc_en', 'English Description')
                ->type('#sks_teori', 'tiga')
                ->type('#sks_praktikum', 1)
                ->type('#semester', 4)
                ->select('#muncul', 'ganjil')
                ->select('#id_pengembang_rps', 148)
                ->select('#id_koordinator_mk', 148)
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah MK')
                ->assertSee('Jumlah SKS Teori harus berupa integer');
        });
    }

    public function test_add_valid_mata_kuliah()
    {
        $this->browse(function (Browser $browser) {

            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/mata-kuliah/create');

            $browser
                ->type('#kode_mk', 'IF999')
                ->type('#nama_matkul_id', 'Pengujian Perangkat Lunak')
                ->type('#nama_matkul_en', 'Software Testing')
                ->type('#matkul_desc_id', 'Mata kuliah pengujian perangkat lunak')
                ->type('#matkul_desc_en', 'Software testing course')
                ->type('#sks_teori', 2)
                ->type('#sks_praktikum', 1)
                ->type('#semester', 6)
                ->select('#muncul', 'ganjil')
                ->select('#id_pengembang_rps', 148)
                ->select('#id_koordinator_mk', 148)
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah MK')
                ->waitForLocation('/kaprodi/mata-kuliah')
                ->assertSee('Mata Kuliah berhasil ditambahkan!');
        });

        $this->assertDatabaseHas('mata_kuliah', [
            'kode_mk' => 'IF999',
            'nama_matkul_id' => 'Pengujian Perangkat Lunak',
        ]);
    }
}