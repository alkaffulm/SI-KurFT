<?php

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class AddBahanKajianTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper ;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
    }

    public function test_kode_bk_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('kategori', 'Kategori Bahan Kajian')
                ->type('nama_bk_id', 'Nama Bahan Kajian Indonesia')
                ->type('nama_bk_en', 'Bahan Kajian Name English')
                ->type('desc_bk_id', 'Deskripsi Bahan Kajian dalam Bahasa Indonesia')
                ->type('desc_bk_en', 'Bahan Kajian Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah BK')
                ->assertSee('Kode BK Tidak Boleh Kosong');
        });
    }   

    public function test_nama_bk_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_bk', 'BK-001')
                ->type('kategori', 'Kategori Bahan Kajian')
                ->type('nama_bk_en', 'Bahan Kajian Name English')
                ->type('desc_bk_id', 'Deskripsi Bahan Kajian dalam Bahasa Indonesia')
                ->type('desc_bk_en', 'Bahan Kajian Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah BK')
                ->assertSee('Nama Bahan Kajian (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_nama_bk_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_bk', 'BK-001')
                ->type('kategori', 'Kategori Bahan Kajian')
                ->type('nama_bk_id', 'Nama Bahan Kajian Indonesia')
                ->type('desc_bk_id', 'Deskripsi Bahan Kajian dalam Bahasa Indonesia')
                ->type('desc_bk_en', 'Bahan Kajian Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah BK')
                ->assertSee('Nama Bahan Kajian (English) tidak boleh kosong.');
        });
    }

    public function test_kategori_bk_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_bk', 'BK-001')
                ->type('nama_bk_id', 'Nama Bahan Kajian Indonesia')
                ->type('nama_bk_en', 'Bahan Kajian Name English')
                ->type('desc_bk_id', 'Deskripsi Bahan Kajian dalam Bahasa Indonesia')
                ->type('desc_bk_en', 'Bahan Kajian Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah BK')
                ->assertSee('Kategori tidak boleh kosong.');
        });
    }

    public function test_desc_bk_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_bk', 'BK-001')
                ->type('kategori', 'Kategori Bahan Kajian')
                ->type('nama_bk_id', 'Nama Bahan Kajian Indonesia')
                ->type('nama_bk_en', 'Bahan Kajian Name English')
                ->type('desc_bk_en', 'Bahan Kajian Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah BK')
                ->assertSee('Deskripsi Bahan Kajian (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_desc_bk_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_bk', 'BK-001')
                ->type('kategori', 'Kategori Bahan Kajian')
                ->type('nama_bk_id', 'Nama Bahan Kajian Indonesia')
                ->type('nama_bk_en', 'Bahan Kajian Name English')
                ->type('desc_bk_id', 'Deskripsi Bahan Kajian dalam Bahasa Indonesia')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah BK')
                ->assertSee('Deskripsi Bahan Kajian (English) tidak boleh kosong.');
        });
    }


    public function test_add_valid_bahan_kajian()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/create');

            $this->removeRequiredValidation($browser);

            $browser
                ->type('nama_kode_bk', 'BK-001')
                ->type('kategori', 'Kategori Bahan Kajian')
                ->type('nama_bk_id', 'Nama Bahan Kajian Indonesia')
                ->type('nama_bk_en', 'Bahan Kajian Name English')
                ->type('desc_bk_id', 'Deskripsi Bahan Kajian dalam Bahasa Indonesia')
                ->type('desc_bk_en', 'Bahan Kajian Description in English')
                ->scrollIntoView('button[type="submit"]')
                ->press('Tambah BK')
                ->waitForLocation('/kaprodi/bahan-kajian')
                ->assertSee('Bahan Kajian baru berhasil ditambahkan!');
        });

        $this->assertDatabaseHas('bahan_kajian', [
            'nama_kode_bk' => 'BK-001',
            'kategori' => 'Kategori Bahan Kajian',
            'nama_bk_id' => 'Nama Bahan Kajian Indonesia',
            'nama_bk_en' => 'Bahan Kajian Name English',
            'desc_bk_id' => 'Deskripsi Bahan Kajian dalam Bahasa Indonesia',
            'desc_bk_en' => 'Bahan Kajian Description in English',
        ]);
    }
}
