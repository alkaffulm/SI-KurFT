<?php

namespace Tests\Traits;

use Laravel\Dusk\Browser;

trait ValidationHelper
{
    protected function removeRequiredValidation(Browser $browser)
    {
        $browser->script("
            document.querySelectorAll('[required]').forEach(el => {
                el.removeAttribute('required');
            });
        ");
    }
}