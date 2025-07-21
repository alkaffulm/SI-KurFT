<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            $this->call([
            RoleSeeder::class,                    // 1
            ProgramStudiSeeder::class,            // 2
            KurikulumSeeder::class,               // 3
            BahanKajianSeeder::class,             // 4
            RubrikAnalitikSeeder::class,          // 5
            TeknikPenilaianSeeder::class,         // 6
            
            //  B. Level 1 Dependency
            UserSeeder::class,                    // 7
            MataKuliahSeeder::class,              // 8
            MahasiswaSeeder::class,               // 9
            CplSeeder::class,                     // 10
            ProfilLulusanSeeder::class,           // 11
            
            // C. Level 2 Dependency
            UserRoleMapSeeder::class,             // 12
            UserPersonalisasiSeeder::class,       // 13
            CpmkSeeder::class,                    // 14
            RpsSeeder::class,                     // 15
            
            //  D. Level 3+ Dependency
            SubCpmkSeeder::class,                 // 16
            PenilaianSeeder::class,               // 17
            
            // E. Tabel Mapping
            CpmkCplMapSeeder::class,              // 18
            MataKuliahCmpkMapSeeder::class,       // 19
            UserMataKuliahMapSeeder::class,       // 20
            PlCplMapSeeder::class,                // 21
            MahasiswaMataKuliahMapSeeder::class,  // 22
            MahasiswaCplMapSeeder::class,         // 23
            BkMkMapSeeder::class,                 // 24
            BkCplMapSeeder::class,                // 25
            MkCplMapSeeder::class,                // 26
            TpCpmkMapSeeder::class,               // 27 
        ]);
    }
}
