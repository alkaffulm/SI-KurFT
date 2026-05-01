<?php

namespace Tests\Traits;

use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\KurikulumSeeder;
use Database\Seeders\ProgramStudiSeeder;
use Database\Seeders\UserRoleMapSeeder;

trait TestingSeederHelper
{
    protected function seedTestingData()
    {
        $this->seed(RoleSeeder::class);
        $this->seed(ProgramStudiSeeder::class);
        $this->seed(KurikulumSeeder::class);
        $this->seed(UserSeeder::class);
        $this->seed(UserRoleMapSeeder::class);
    }
}