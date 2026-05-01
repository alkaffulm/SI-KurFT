<?php

namespace Tests\Browser;

/**
 * REFERENCE FILE: Best Practices & Tips untuk Browser Testing dengan Laravel Dusk
 * 
 * File ini berisi dokumentasi dan contoh best practices saat menulis test browser.
 * Untuk test PEO yang aktual, lihat: AddPEOTest.php
 */

class DuskTestingBestPractices
{
    /**
     * === SELEKTOR TIPS ===
     * 
     * 1. Gunakan CSS Selectors:
     *    - $browser->click('button.submit')
     *    - $browser->type('input#email', 'user@example.com')
     *    - $browser->select('select[name="role"]', 'admin')
     * 
     * 2. Gunakan text untuk button:
     *    - $browser->press('Tambah PEO')  // case-sensitive
     *    - $browser->press('Cancel')
     * 
     * 3. Gunakan containsText untuk elemen dengan konten dinamis:
     *    - $browser->assertSee('PEO berhasil ditambahkan!')
     *    - $browser->waitForText('Loading complete')
     * 
     * 4. Hindari hardcoded xpaths, gunakan data attributes:
     *    <button data-test="submit">Simpan</button>
     *    $browser->click('[data-test="submit"]')
     */

    /**
     * === WAIT & TIMING ===
     * 
     * 1. Tunggu hingga element terlihat:
     *    $browser->waitFor('.modal')
     *    $browser->waitFor('#loader', 5) // 5 detik
     * 
     * 2. Tunggu hingga text muncul:
     *    $browser->waitForText('Success')
     *    $browser->waitForText('Processing...', 10)
     * 
     * 3. Tunggu hingga location berubah:
     *    $browser->waitForLocation('/peo')
     *    $browser->waitForLocation(route('peo.index'))
     * 
     * 4. Tunggu hingga callback selesai:
     *    $browser->waitUsing(10, 500, function () use ($browser) {
     *        return $browser->resolver->find('element') !== null;
     *    })
     */

    /**
     * === FORM FILLING PATTERNS ===
     * 
     * Text Input:
     *    $browser->type('input#name', 'John Doe')
     * 
     * Textarea:
     *    $browser->type('textarea#description', 'Long text here...')
     * 
     * Select Dropdown:
     *    $browser->select('select#role', 'admin')
     *    $browser->select('select[name="category"]', '2')
     * 
     * Radio Button:
     *    $browser->radio('input[name="status"]', 'active')
     * 
     * Checkbox:
     *    $browser->check('input#agree_terms')
     *    $browser->uncheck('input#newsletter')
     * 
     * File Upload:
     *    $browser->attach('input[type="file"]', __DIR__.'/fixtures/peo.pdf')
     * 
     * Multiple Select:
     *    $browser->selectList('select[name="permissions"]', ['read', 'write'])
     */

    /**
     * === ASSERTION PATTERNS ===
     * 
     * Visibility:
     *    $browser->assertVisible('button.submit')
     *    $browser->assertMissing('div.error')
     *    $browser->assertNotVisible('.modal')
     * 
     * Text:
     *    $browser->assertSee('PEO berhasil ditambahkan!')
     *    $browser->assertDontSee('Error occurred')
     *    $browser->assertSeeTextIn('.title', 'Tambah PEO Baru')
     * 
     * Attributes:
     *    $browser->assertAttribute('button', 'type', 'submit')
     *    $browser->assertAttribute('input', 'placeholder', 'Contoh: PEO-1')
     * 
     * Input Values:
     *    $browser->assertInputValue('input#name', 'John')
     *    $browser->assertTextContains('textarea#desc', 'text')
     * 
     * Presence:
     *    $browser->assertPresent('form')
     *    $browser->assertNotPresent('[name="optional_field"]')
     * 
     * Count:
     *    $browser->assertNumberOf('table tr', 5)
     * 
     * URL:
     *    $browser->assertUrlIs('https://example.com/peo')
     *    $browser->assertRouteIs('peo.index')
     */

    /**
     * === DATABASE TESTING ===
     * 
     * Verify data exists:
     *    $this->assertDatabaseHas('peo', [
     *        'kode_peo' => 'PEO-001',
     *        'desc_peo_id' => 'Description...'
     *    ])
     * 
     * Verify data not exists:
     *    $this->assertDatabaseMissing('peo', [
     *        'kode_peo' => 'INVALID'
     *    ])
     * 
     * Count records:
     *    $this->assertDatabaseCount('peo', 5)
     * 
     * Query specific:
     *    $peo = PEOModel::where('kode_peo', 'PEO-001')->first();
     *    $this->assertNotNull($peo)
     */

    /**
     * === COMMON PATTERNS ===
     * 
     * 1. Login before test:
     *    public function test_authenticated_action()
     *    {
     *        $this->browse(function (Browser $browser) {
     *            $browser->loginAs($user, 'web')
     *                ->visit('/peo/create')
     *                // ... test code
     *        });
     *    }
     * 
     * 2. Setup data dengan factory:
     *    public function setUp(): void
     *    {
     *        parent::setUp();
     *        $this->peo = PEOModel::factory()->create([
     *            'kode_peo' => 'TEST-001'
     *        ]);
     *    }
     * 
     * 3. Multiple browsers:
     *    $this->browse(function (Browser $browser1, Browser $browser2) {
     *        $browser1->visit('/peo')
     *        $browser2->visit('/dashboard')
     *    })
     * 
     * 4. Execute JavaScript:
     *    $browser->execute('document.getElementById("test").click()')
     *    $value = $browser->script('return document.title')
     * 
     * 5. Screenshot:
     *    $browser->screenshot('peo-form-filled')
     * 
     * 6. Scroll:
     *    $browser->scroll('button.submit')
     *    $browser->scrollTo('#bottom')
     */

    /**
     * === DEBUGGING ===
     * 
     * 1. Dump page content:
     *    $browser->dump()
     * 
     * 2. Log message:
     *    $browser->log('message')
     * 
     * 3. Pause untuk manual inspection:
     *    $browser->pause(5000) // 5 detik
     * 
     * 4. Assert console errors:
     *    $browser->assertHasNoConsoleErrors()
     * 
     * 5. Get element text:
     *    $text = $browser->text('h1')
     * 
     * 6. Get attribute:
     *    $value = $browser->attribute('input#name', 'value')
     */

    /**
     * === PERFORMANCE TIPS ===
     * 
     * 1. Gunakan DatabaseMigrations trait untuk reset DB antar test
     * 2. Share setup dengan setUp() method
     * 3. Gunakan eager loading di queries
     * 4. Tambahkan realistic wait times, jangan terlalu singkat
     * 5. Gunakan data factory untuk generate test data
     * 6. Test hanya critical user flows, tidak semua edge case
     * 7. Parallelkan test jika memungkinkan dengan options
     */

    /**
     * === COMMON ERRORS & SOLUTIONS ===
     * 
     * 1. "Waiting for element that will never appear"
     *    Solution: Tambah wait, check selector, atau screenshot untuk debug
     * 
     * 2. "Element not interactable"
     *    Solution: Scroll ke element dulu, atau tunggu hingga terlihat
     * 
     * 3. "Session expired"
     *    Solution: Extend session timeout di testing
     * 
     * 4. "Chrome driver connection refused"
     *    Solution: Start chrome driver: php artisan dusk:chrome-driver
     * 
     * 5. "Database not found"
     *    Solution: Setup .env.dusk.local dengan DB configuration
     */

    /**
     * === STRUKTUR TEST YANG BAIK ===
     * 
     * public function test_descriptive_name()
     * {
     *     // 1. ARRANGE - Setup data
     *     $testData = [...]
     *     
     *     // 2. ACT - Perform action
     *     $this->browse(function (Browser $browser) {
     *         $browser->visit('/peo/create')
     *             ->type('field', 'value')
     *             ->press('Submit')
     *     })
     *     
     *     // 3. ASSERT - Verify result
     *     $this->assertDatabaseHas('peo', [...])
     * }
     */
}
