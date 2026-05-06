<?php

namespace Tests\Traits;

use Laravel\Dusk\Browser;

trait LoginHelper
{
    protected function loginAsKaprodi(Browser $browser)
    {
        $browser->visit('/login')
            ->waitFor('input[name="nip"]')
            ->type('nip', '199307032019031011')
            ->type('password', 'pass123')
            ->select('login_as', 'Koordinator Program Studi')
            ->press('Login');
    }

    protected function loginAsAdmin(Browser $browser)
    {
        $browser->visit('/login')
            ->waitFor('input[name="nip"]')
            ->type('nip', 'ADMPSTI1')
            ->type('password', 'pass123')
            ->select('login_as', 'Admin')
            ->press('Login');
    }

    protected function loginAsUPM(Browser $browser)
    {
        $browser->visit('/login')
            ->waitFor('input[name="nip"]')
            ->type('nip', '197511242005012005')
            ->type('password', 'pass123')
            ->select('login_as', 'UPM')
            ->press('Login');
    }
}