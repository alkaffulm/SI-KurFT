<?php

use Database\Seeders\BahanKajianSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\LoginHelper;
use Tests\Traits\TestingSeederHelper;
use Tests\Traits\ValidationHelper;

class EditBahanKajianTest extends DuskTestCase
{
    use DatabaseTruncation;
    use TestingSeederHelper;
    use LoginHelper;
    use ValidationHelper ;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedTestingData();
        $this->seed(BahanKajianSeeder::class);
    }

    public function test_edit_kode_bk_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_kode_bk_19')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Kode BK Tidak Boleh Kosong')
                ->assertSee('Kode BK Tidak Boleh Kosong');
        });
    }   

    public function test_edit_nama_bk_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_bk_id_19')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Nama Bahan Kajian (Indonesia) tidak boleh kosong.')
                ->assertSee('Nama Bahan Kajian (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_edit_nama_bk_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_bk_en_19')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Nama Bahan Kajian (English) tidak boleh kosong.')
                ->assertSee('Nama Bahan Kajian (English) tidak boleh kosong.');
        });
    }

    public function test_edit_kategori_bk_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#kategori_19')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Kategori tidak boleh kosong.')
                ->assertSee('Kategori tidak boleh kosong.');
        });
    }

    public function test_edit_desc_bk_id_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_bk_id_19')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi Bahan Kajian (Indonesia) tidak boleh kosong.')
                ->assertSee('Deskripsi Bahan Kajian (Indonesia) tidak boleh kosong.');
        });
    }

    public function test_edit_desc_bk_en_required_validation()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#desc_bk_en_19')
                ->scrollIntoView('button[type="submit"]')
                ->press('Simpan Perubahan')
                ->waitFor('.swal2-confirm')
                ->press('Ya, Simpan!')
                ->waitForText('Deskripsi Bahan Kajian (English) tidak boleh kosong.')
                ->assertSee('Deskripsi Bahan Kajian (English) tidak boleh kosong.');
        });
    }

    public function test_edit_bk_1_succesfully()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsKaprodi($browser);

            $browser->visit('/kaprodi/bahan-kajian/edit-all')
                    ->waitFor('#form-update');

            $this->removeRequiredValidation($browser);

            $browser->clear('#nama_kode_bk_19')
                    ->type('#nama_kode_bk_19', 'BK-1-UPDATED');
            
            $browser->clear('#kategori_19')
                    ->type('#kategori_19', 'Kategori Bahan Kajian');

            $browser->clear('#nama_bk_id_19')
                    ->type('#nama_bk_id_19', 'Nama Bahan Kajian Indonesia');

            $browser->clear('#nama_bk_en_19')
                    ->type('#nama_bk_en_19', 'Bahan Kajian Name English');

            $browser->clear('#desc_bk_id_19')
                    ->type('#desc_bk_id_19', 'Deskripsi Bahan Kajian dalam Bahasa Indonesia');

            $browser->clear('#desc_bk_en_19')
                    ->type('#desc_bk_en_19', 'Bahan Kajian Description in English');

            $browser->scrollIntoView('button[type="submit"]')
                    ->press('Simpan Perubahan')
                    ->waitFor('.swal2-confirm')
                    ->press('Ya, Simpan!')
                    ->waitForText('Perubahan Bahan Kajian berhasil disimpan!')
                    ->assertSee('Perubahan Bahan Kajian berhasil disimpan!');
        });

        $this->assertDatabaseHas('bahan_kajian', [
            'nama_kode_bk' => 'BK-1-UPDATED',
            'kategori' => 'Kategori Bahan Kajian',
            'nama_bk_id' => 'Nama Bahan Kajian Indonesia',
            'nama_bk_en' => 'Bahan Kajian Name English',
            'desc_bk_id' => 'Deskripsi Bahan Kajian dalam Bahasa Indonesia',
            'desc_bk_en' => 'Bahan Kajian Description in English',
        ]);
    }

    public function test_edit_peo_1_and_peo_2_simultaneously()
    {
         $this->browse(function (Browser $browser) {
             $this->loginAsKaprodi($browser);

             $browser->visit('/kaprodi/bahan-kajian/edit-all')
                     ->waitFor('#form-update');

             $this->removeRequiredValidation($browser);

             // Edit BK 1
             $browser->clear('#nama_kode_bk_19')
                     ->type('#nama_kode_bk_19', 'BK-1-UPDATED');
             
             $browser->clear('#kategori_19')
                     ->type('#kategori_19', 'Kategori Bahan Kajian');

             $browser->clear('#nama_bk_id_19')
                     ->type('#nama_bk_id_19', 'Nama Bahan Kajian Indonesia');

             $browser->clear('#nama_bk_en_19')
                     ->type('#nama_bk_en_19', 'Bahan Kajian Name English');

             $browser->clear('#desc_bk_id_19')
                     ->type('#desc_bk_id_19', 'Deskripsi Bahan Kajian dalam Bahasa Indonesia');

             $browser->clear('#desc_bk_en_19')
                     ->type('#desc_bk_en_19', 'Bahan Kajian Description in English');

             // Edit BK 2
             $browser->clear('#nama_kode_bk_20')
                     ->type('#nama_kode_bk_20', 'BK-2-UPDATED');
             
             $browser->clear('#kategori_20')
                     ->type('#kategori_20', 'Kategori Bahan Kajian 2');

             $browser->clear('#nama_bk_id_20')
                     ->type('#nama_bk_id_20', 'Nama Bahan Kajian Indonesia 2');

             $browser->clear('#nama_bk_en_20')
                     ->type('#nama_bk_en_20', 'Bahan Kajian Name English 2');

             $browser->clear('#desc_bk_id_20')
                     ->type('#desc_bk_id_20', 'Deskripsi Bahan Kajian dalam Bahasa Indonesia 2');

             $browser->clear('#desc_bk_en_20')
                     ->type('#desc_bk_en_20', 'Bahan Kajian Description in English 2');

             $browser->scrollIntoView('button[type="submit"]')
                     ->press('Simpan Perubahan')
                     ->waitFor('.swal2-confirm')
                     ->press('Ya, Simpan!')
                     ->waitForText('Perubahan Bahan Kajian berhasil disimpan!')
                     ->assertSee('Perubahan Bahan Kajian berhasil disimpan!');
         });
        
        $this->assertDatabaseHas('bahan_kajian', [
            'nama_kode_bk' => 'BK-1-UPDATED',
            'kategori' => 'Kategori Bahan Kajian',
            'nama_bk_id' => 'Nama Bahan Kajian Indonesia',
            'nama_bk_en' => 'Bahan Kajian Name English',
            'desc_bk_id' => 'Deskripsi Bahan Kajian dalam Bahasa Indonesia',
            'desc_bk_en' => 'Bahan Kajian Description in English',
        ]);

        $this->assertDatabaseHas('bahan_kajian', [
            'nama_kode_bk' => 'BK-2-UPDATED',
            'kategori' => 'Kategori Bahan Kajian 2',
            'nama_bk_id' => 'Nama Bahan Kajian Indonesia 2',
            'nama_bk_en' => 'Bahan Kajian Name English 2',
            'desc_bk_id' => 'Deskripsi Bahan Kajian dalam Bahasa Indonesia 2',
            'desc_bk_en' => 'Bahan Kajian Description in English 2',
        ]);
    }   
}
