<?php

namespace Database\Seeders;

use App\Models\CPLCPMKBobotModel;
use App\Models\ProgramStudi;
use App\Models\TahunAkademik;
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
            BahanKajianSeeder::class,             // 4 dimatikan saat deploy
            RubrikAnalitikSeeder::class,          // 5
            TeknikPenilaianSeeder::class,         // 6
            // PEOSeeder::class,                     // 28 dimatikan saat deploy
            KriteriaPenilaianSeeder::class,
            ModelPembelajaranSeeder::class,
            MetodePembelajaranSeeder::class,
            BentukPenugasanSeeder::class,
            
            //  B. Level 1 Dependency
            UserSeeder::class,                    // 7
            MataKuliahSeeder::class,              // 8 dimatikan saat deploy
            MahasiswaSeeder::class,               // 9
            CplSeeder::class,                     // 10 dimatikan saat deploy
            ProfilLulusanSeeder::class,           // 11 dimatikan saat deploy
            
            // C. Level 2 Dependency
            UserRoleMapSeeder::class,             // 12
            // UserPersonalisasiSeeder::class,       // 13 sementara dimatikan

            // ModelPembelajaranSeeder::class,
            CpmkSeeder::class,                    // 14 dimatikan saat deploy
            // RpsSeeder::class,                     // 15 dimatilkan saat deploy

            //  D. Level 3+ Dependency
            // SubCpmkSeeder::class,                 // 16 dimatikan saat deploy
            // PenilaianSeeder::class,               // 17

            // E. Tabel Mapping
            // CpmkCplMapSeeder::class,              // 18
            // MataKuliahCmpkMapSeeder::class,       // 19
            // UserMataKuliahMapSeeder::class,       // 20
            // PlCplMapSeeder::class,                // 21
            // MahasiswaMataKuliahMapSeeder::class,  // 22
            // MahasiswaCplMapSeeder::class,         // 23
            BkMkMapSeeder::class,                 // 24 dimatikan saat deploy
            // BkCplMapSeeder::class,                // 25
            // MkCplMapSeeder::class,                // 26
            // TpCpmkMapSeeder::class,               // 27
            // PLPEOSeeder::class,                   // 29 dimatikan saat deploy
            CPLPLMapSeeder::class,                // 30 dimatikan saat deploy
            // MKCPMKSubCPMKMapSeeder::class,        // 31
            MKCPMKCPLMapSeeder::class,            // 32 dimatikan saat deploy
            // TahunAkademikSeeder::class,           // 33
            // KurikulumTahunAkademikSeeder::class,  // 34
            // KelasSeeder::class,                    // 35

            // RencanaAsesmenSeeder::class, // dimatikan saat deploy
            // RencanaAsesmenCPMKBobotSeeder::class, // dimatikan saat deploy
            WeekSeeder::class, // dimatikan saat deploy
            // RpsTopicSeeder::class, // dimatikan saat deploy

            // MKCPMKBobotSeeder::class,             //  dimatikan saat deploy
            MediaPembelajaranSeeder::class,
            // AktivitasPembelajaranSeeder::class, // dimatikan saat deploy
            // AktivitasMetodePembelajaranSeeder::class, // dimatikan saat deploy
            // AktivitasBentukPenugasanSeeder::class, // dimatikan saat deploy
            // RpsMediaPembelajaranSeeder::class, // dimatikan saat deploy
            // RpsTopicWeekSeeder::class, // dimatikan saat deploy
            // RpsTopicKriteriaPenilaianSeeder::class, // dimatikan saat deploy
            // RpsTopicTeknikPenilaianSeeder::class, // dimatikan saat deploy

            VisiKeilmuanSeeder::class,
            // KelasMahasiswaSeeder::class,
            // CPLCPMKBobotSeeder::class,

            // PenilaianMahasiswaSeeder::class,
            // PenilaianMahasiswaPerCPMKSeeder::class,

            // BobotMKUntukCPLSeeder::class,
        ]);
    }
}