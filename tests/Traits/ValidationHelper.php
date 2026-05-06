<?php

namespace Tests\Traits;

use Laravel\Dusk\Browser;

trait ValidationHelper
{
    protected function removeRequiredValidation(Browser $browser)
    {
        $browser->script("
            // Hapus attribute required
            document.querySelectorAll('[required]').forEach(el => {
                el.removeAttribute('required');
            });

            // Nonaktifkan validasi bawaan form HTML5
            document.querySelectorAll('form').forEach(form => {
                form.setAttribute('novalidate', true);
            });

            // Hapus custom validity message
            document.querySelectorAll('input, textarea, select').forEach(el => {
                el.setCustomValidity('');
            });

            // Override checkValidity agar selalu true
            HTMLInputElement.prototype.checkValidity = function() {
                return true;
            };

            HTMLTextAreaElement.prototype.checkValidity = function() {
                return true;
            };

            HTMLSelectElement.prototype.checkValidity = function() {
                return true;
            };

            HTMLFormElement.prototype.checkValidity = function() {
                return true;
            };

            // Override reportValidity agar tidak memunculkan popup browser
            HTMLInputElement.prototype.reportValidity = function() {
                return true;
            };

            HTMLTextAreaElement.prototype.reportValidity = function() {
                return true;
            };

            HTMLSelectElement.prototype.reportValidity = function() {
                return true;
            };

            HTMLFormElement.prototype.reportValidity = function() {
                return true;
            };
        ");
    }
}