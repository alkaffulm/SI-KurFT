<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahun_akademik')->insert([
            ['tahun_akademik' => '2022/2023'],
            ['tahun_akademik' => '2023/2024'],
            ['tahun_akademik' => '2024/2025'],
            ['tahun_akademik' => '2025/2026'],
            ['tahun_akademik' => '2026/2027'],
        ]);
    }
}
