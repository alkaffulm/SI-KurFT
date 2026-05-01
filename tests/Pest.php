<?php

pest()->extend(Tests\DuskTestCase::class)
//  ->use(Illuminate\Foundation\Testing\DatabaseMigrations::class)
    ->in('Browser');

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->extend(TestCase::class)
    ->use(RefreshDatabase::class)
    ->in('Feature');