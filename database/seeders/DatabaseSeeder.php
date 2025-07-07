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
            RoleTableSeeder::class,
            ProgramStudiSeeder::class,
            
            UserTableSeeder::class,        
            CPLTableSeeder::class,           
            MataKuliahTableSeeder::class,  
            
            UserRoleMapTableSeeder::class,    
            UserMataKuliahMapTableSeeder::class,
            RPSTableSeeder::class,             

            CPMKTableSeeder::class,        
            
            SubCPMKTableSeeder::class, 

            CPMKCPLMapTableSeeder::class,     
            MataKuliahCPMKMapTableSeeder::class, 
            
            RPSDetailTableSeeder::class,       
            
            PenilaianTableSeeder::class, 
        ]);
    }
}
