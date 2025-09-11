<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_role_map')->insert([
            // Pimpinan Fakultas (id_role = 4)
            ['id_user_role' => 1, 'id_role' => 4, 'id_user' => 1],
            ['id_user_role' => 2, 'id_role' => 4, 'id_user' => 2],
            ['id_user_role' => 3, 'id_role' => 4, 'id_user' => 3],

            // id_ps => 1 (Teknik Sipil)
            ['id_user_role' => 4, 'id_role' => 3, 'id_user' => 4],   // Kaprodi
            ['id_user_role' => 5, 'id_role' => 1, 'id_user' => 5],   // Admin
            ['id_user_role' => 6, 'id_role' => 1, 'id_user' => 6],   // Admin
            ['id_user_role' => 7, 'id_role' => 2, 'id_user' => 7],   // Dosen
            ['id_user_role' => 8, 'id_role' => 2, 'id_user' => 8],   // Dosen
            ['id_user_role' => 9, 'id_role' => 2, 'id_user' => 9],   // Dosen
            ['id_user_role' => 10, 'id_role' => 2, 'id_user' => 10],  // Dosen
            ['id_user_role' => 11, 'id_role' => 2, 'id_user' => 11],  // Dosen
            ['id_user_role' => 12, 'id_role' => 2, 'id_user' => 12],  // Dosen
            ['id_user_role' => 13, 'id_role' => 2, 'id_user' => 13], // Dosen
            ['id_user_role' => 14, 'id_role' => 2, 'id_user' => 14], // Dosen
            ['id_user_role' => 15, 'id_role' => 2, 'id_user' => 15], // Dosen
            ['id_user_role' => 16, 'id_role' => 2, 'id_user' => 16], // Dosen
            ['id_user_role' => 17, 'id_role' => 2, 'id_user' => 17], // Dosen
            ['id_user_role' => 18, 'id_role' => 2, 'id_user' => 18], // Dosen
            ['id_user_role' => 19, 'id_role' => 2, 'id_user' => 19], // Dosen
            ['id_user_role' => 20, 'id_role' => 2, 'id_user' => 20], // Dosen
            ['id_user_role' => 21, 'id_role' => 2, 'id_user' => 21], // Dosen
            ['id_user_role' => 22, 'id_role' => 2, 'id_user' => 22], // Dosen
            ['id_user_role' => 23, 'id_role' => 2, 'id_user' => 23], // Dosen
            ['id_user_role' => 24, 'id_role' => 2, 'id_user' => 24], // Dosen
            ['id_user_role' => 25, 'id_role' => 2, 'id_user' => 25], // Dosen
            ['id_user_role' => 26, 'id_role' => 2, 'id_user' => 26], // Dosen
            ['id_user_role' => 27, 'id_role' => 2, 'id_user' => 27], // Dosen
            ['id_user_role' => 28, 'id_role' => 2, 'id_user' => 28], // Dosen
            ['id_user_role' => 29, 'id_role' => 2, 'id_user' => 29], // Dosen
            ['id_user_role' => 30, 'id_role' => 2, 'id_user' => 30], // Dosen
            ['id_user_role' => 31, 'id_role' => 2, 'id_user' => 31], // Dosen
            ['id_user_role' => 32, 'id_role' => 2, 'id_user' => 32], // Dosen
            ['id_user_role' => 33, 'id_role' => 2, 'id_user' => 33], // Dosen
            ['id_user_role' => 34, 'id_role' => 2, 'id_user' => 34], // Dosen

            // id_ps => 2 (Teknik Lingkungan)
            ['id_user_role' => 35, 'id_role' => 3, 'id_user' => 35], // Kaprodi
            ['id_user_role' => 36, 'id_role' => 1, 'id_user' => 36], // Admin
            ['id_user_role' => 37, 'id_role' => 1, 'id_user' => 37], // Admin
            ['id_user_role' => 38, 'id_role' => 2, 'id_user' => 38], // Dosen
            ['id_user_role' => 39, 'id_role' => 2, 'id_user' => 39], // Dosen
            ['id_user_role' => 40, 'id_role' => 2, 'id_user' => 40], // Dosen
            ['id_user_role' => 41, 'id_role' => 2, 'id_user' => 41], // Dosen
            ['id_user_role' => 42, 'id_role' => 2, 'id_user' => 42], // Dosen
            ['id_user_role' => 43, 'id_role' => 2, 'id_user' => 43], // Dosen
            ['id_user_role' => 44, 'id_role' => 2, 'id_user' => 44], // Dosen
            ['id_user_role' => 45, 'id_role' => 2, 'id_user' => 45], // Dosen
            ['id_user_role' => 46, 'id_role' => 2, 'id_user' => 46], // Dosen
            ['id_user_role' => 47, 'id_role' => 2, 'id_user' => 47], // Dosen
            ['id_user_role' => 48, 'id_role' => 2, 'id_user' => 48], // Dosen
            ['id_user_role' => 49, 'id_role' => 2, 'id_user' => 49], // Dosen
            ['id_user_role' => 50, 'id_role' => 2, 'id_user' => 50], // Dosen
            ['id_user_role' => 51, 'id_role' => 2, 'id_user' => 51], // Dosen

            // id_ps => 3 (Arsitektur)
            ['id_user_role' => 52, 'id_role' => 3, 'id_user' => 52], // Kaprodi
            ['id_user_role' => 53, 'id_role' => 1, 'id_user' => 53], // Admin
            ['id_user_role' => 54, 'id_role' => 1, 'id_user' => 54], // Admin
            ['id_user_role' => 55, 'id_role' => 2, 'id_user' => 55], // Dosen
            ['id_user_role' => 56, 'id_role' => 2, 'id_user' => 56], // Dosen
            ['id_user_role' => 57, 'id_role' => 2, 'id_user' => 57], // Dosen
            ['id_user_role' => 58, 'id_role' => 2, 'id_user' => 58], // Dosen
            ['id_user_role' => 59, 'id_role' => 2, 'id_user' => 59], // Dosen
            ['id_user_role' => 60, 'id_role' => 2, 'id_user' => 60], // Dosen
            ['id_user_role' => 61, 'id_role' => 2, 'id_user' => 61], // Dosen
            ['id_user_role' => 62, 'id_role' => 2, 'id_user' => 62], // Dosen
            ['id_user_role' => 63, 'id_role' => 2, 'id_user' => 63], // Dosen
            ['id_user_role' => 64, 'id_role' => 2, 'id_user' => 64], // Dosen

            // id_ps => 4 (Teknik Kimia)
            ['id_user_role' => 65, 'id_role' => 3, 'id_user' => 65], // Kaprodi
            ['id_user_role' => 66, 'id_role' => 1, 'id_user' => 66], // Admin
            ['id_user_role' => 67, 'id_role' => 1, 'id_user' => 67], // Admin
            ['id_user_role' => 68, 'id_role' => 2, 'id_user' => 68], // Dosen
            ['id_user_role' => 69, 'id_role' => 2, 'id_user' => 69], // Dosen
            ['id_user_role' => 70, 'id_role' => 2, 'id_user' => 70], // Dosen
            ['id_user_role' => 71, 'id_role' => 2, 'id_user' => 71], // Dosen
            ['id_user_role' => 72, 'id_role' => 2, 'id_user' => 72], // Dosen
            ['id_user_role' => 73, 'id_role' => 2, 'id_user' => 73], // Dosen
            ['id_user_role' => 74, 'id_role' => 2, 'id_user' => 74], // Dosen
            ['id_user_role' => 75, 'id_role' => 2, 'id_user' => 75], // Dosen
            ['id_user_role' => 76, 'id_role' => 2, 'id_user' => 76], // Dosen
            ['id_user_role' => 77, 'id_role' => 2, 'id_user' => 77], // Dosen
            ['id_user_role' => 78, 'id_role' => 2, 'id_user' => 78], // Dosen
            ['id_user_role' => 79, 'id_role' => 2, 'id_user' => 79], // Dosen
            ['id_user_role' => 80, 'id_role' => 2, 'id_user' => 80], // Dosen
            ['id_user_role' => 81, 'id_role' => 2, 'id_user' => 81], // Dosen
            ['id_user_role' => 82, 'id_role' => 2, 'id_user' => 82], // Dosen
            ['id_user_role' => 83, 'id_role' => 2, 'id_user' => 83], // Dosen

            // id_ps => 5 (Perencanaan Wilayah & Kota)
            ['id_user_role' => 84, 'id_role' => 3, 'id_user' => 84], // Kaprodi
            ['id_user_role' => 85, 'id_role' => 1, 'id_user' => 85], // Admin
            ['id_user_role' => 86, 'id_role' => 1, 'id_user' => 86], // Admin
            ['id_user_role' => 87, 'id_role' => 2, 'id_user' => 87], // Dosen
            ['id_user_role' => 88, 'id_role' => 2, 'id_user' => 88], // Dosen
            ['id_user_role' => 89, 'id_role' => 2, 'id_user' => 89], // Dosen
            ['id_user_role' => 90, 'id_role' => 2, 'id_user' => 90], // Dosen
            ['id_user_role' => 91, 'id_role' => 2, 'id_user' => 91], // Dosen
            ['id_user_role' => 92, 'id_role' => 2, 'id_user' => 92], // Dosen
            ['id_user_role' => 93, 'id_role' => 2, 'id_user' => 93], // Dosen
            ['id_user_role' => 94, 'id_role' => 2, 'id_user' => 94], // Dosen
            ['id_user_role' => 95, 'id_role' => 2, 'id_user' => 95], // Dosen
            ['id_user_role' => 96, 'id_role' => 2, 'id_user' => 96], // Dosen
            ['id_user_role' => 97, 'id_role' => 2, 'id_user' => 97], // Dosen
            ['id_user_role' => 98, 'id_role' => 2, 'id_user' => 98], // Dosen
            ['id_user_role' => 99, 'id_role' => 2, 'id_user' => 99], // Dosen
            ['id_user_role' => 100, 'id_role' => 2, 'id_user' => 100], // Dosen
            ['id_user_role' => 101, 'id_role' => 2, 'id_user' => 101], // Dosen

            // id_ps => 6 (Teknik Pertambangan)
            ['id_user_role' => 102, 'id_role' => 3, 'id_user' => 102], // Kaprodi
            ['id_user_role' => 103, 'id_role' => 1, 'id_user' => 103], // Admin
            ['id_user_role' => 104, 'id_role' => 1, 'id_user' => 104], // Admin
            ['id_user_role' => 105, 'id_role' => 2, 'id_user' => 105], // Dosen
            ['id_user_role' => 106, 'id_role' => 2, 'id_user' => 106], // Dosen
            ['id_user_role' => 107, 'id_role' => 2, 'id_user' => 107], // Dosen
            ['id_user_role' => 108, 'id_role' => 2, 'id_user' => 108], // Dosen
            ['id_user_role' => 109, 'id_role' => 2, 'id_user' => 109], // Dosen
            ['id_user_role' => 110, 'id_role' => 2, 'id_user' => 110], // Dosen
            ['id_user_role' => 111, 'id_role' => 2, 'id_user' => 111], // Dosen
            ['id_user_role' => 112, 'id_role' => 2, 'id_user' => 112], // Dosen
            ['id_user_role' => 113, 'id_role' => 2, 'id_user' => 113], // Dosen
            ['id_user_role' => 114, 'id_role' => 2, 'id_user' => 114], // Dosen
            ['id_user_role' => 115, 'id_role' => 2, 'id_user' => 115], // Dosen
            ['id_user_role' => 116, 'id_role' => 2, 'id_user' => 116], // Dosen

            // id_ps => 7 (Teknologi Informasi)
            ['id_user_role' => 117, 'id_role' => 3, 'id_user' => 117], // Kaprodi
            ['id_user_role' => 118, 'id_role' => 1, 'id_user' => 118], // Admin
            ['id_user_role' => 119, 'id_role' => 1, 'id_user' => 119], // Admin
            ['id_user_role' => 120, 'id_role' => 2, 'id_user' => 120], // Dosen
            ['id_user_role' => 121, 'id_role' => 2, 'id_user' => 121], // Dosen
            ['id_user_role' => 122, 'id_role' => 2, 'id_user' => 122], // Dosen
            ['id_user_role' => 123, 'id_role' => 2, 'id_user' => 123], // Dosen
            ['id_user_role' => 124, 'id_role' => 2, 'id_user' => 124], // Dosen
            ['id_user_role' => 125, 'id_role' => 2, 'id_user' => 125], // Dosen
            ['id_user_role' => 126, 'id_role' => 2, 'id_user' => 126], // Dosen
            ['id_user_role' => 127, 'id_role' => 2, 'id_user' => 127], // Dosen
            ['id_user_role' => 128, 'id_role' => 2, 'id_user' => 128], // Dosen
            ['id_user_role' => 129, 'id_role' => 2, 'id_user' => 129], // Dosen
            ['id_user_role' => 130, 'id_role' => 2, 'id_user' => 130], // Dosen
            ['id_user_role' => 131, 'id_role' => 2, 'id_user' => 131], // Dosen
            ['id_user_role' => 132, 'id_role' => 2, 'id_user' => 132], // Dosen

            // id_ps => 8 (Teknik Mesin)
            ['id_user_role' => 133, 'id_role' => 3, 'id_user' => 133], // Kaprodi
            ['id_user_role' => 134, 'id_role' => 1, 'id_user' => 134], // Admin
            ['id_user_role' => 135, 'id_role' => 1, 'id_user' => 135], // Admin
            ['id_user_role' => 136, 'id_role' => 2, 'id_user' => 136], // Dosen
            ['id_user_role' => 137, 'id_role' => 2, 'id_user' => 137], // Dosen
            ['id_user_role' => 138, 'id_role' => 2, 'id_user' => 138], // Dosen
            ['id_user_role' => 139, 'id_role' => 2, 'id_user' => 139], // Dosen
            ['id_user_role' => 140, 'id_role' => 2, 'id_user' => 140], // Dosen
            ['id_user_role' => 141, 'id_role' => 2, 'id_user' => 141], // Dosen
            ['id_user_role' => 142, 'id_role' => 2, 'id_user' => 142], // Dosen
            ['id_user_role' => 143, 'id_role' => 2, 'id_user' => 143], // Dosen

            // id_ps => 9 (Teknik Geologi)
            ['id_user_role' => 144, 'id_role' => 3, 'id_user' => 144], // Kaprodi
            ['id_user_role' => 145, 'id_role' => 1, 'id_user' => 145], // Admin
            ['id_user_role' => 146, 'id_role' => 1, 'id_user' => 146], // Admin
            ['id_user_role' => 147, 'id_role' => 2, 'id_user' => 147], // Dosen
            ['id_user_role' => 148, 'id_role' => 2, 'id_user' => 148], // Dosen
            ['id_user_role' => 149, 'id_role' => 2, 'id_user' => 149], // Dosen
            ['id_user_role' => 150, 'id_role' => 2, 'id_user' => 150], // Dosen
            ['id_user_role' => 151, 'id_role' => 2, 'id_user' => 151], // Dosen
            ['id_user_role' => 152, 'id_role' => 2, 'id_user' => 152], // Dosen

            // Role Tambahan
            ['id_user_role' => 153, 'id_role' => 5, 'id_user' => 5],
            ['id_user_role' => 154, 'id_role' => 5, 'id_user' => 36],
            ['id_user_role' => 155, 'id_role' => 5, 'id_user' => 53],
            ['id_user_role' => 156, 'id_role' => 5, 'id_user' => 66],
            ['id_user_role' => 157, 'id_role' => 5, 'id_user' => 85],
            ['id_user_role' => 158, 'id_role' => 5, 'id_user' => 103],
            ['id_user_role' => 159, 'id_role' => 5, 'id_user' => 118],
            ['id_user_role' => 160, 'id_role' => 5, 'id_user' => 134],
            ['id_user_role' => 161, 'id_role' => 5, 'id_user' => 145],

            ['id_user_role' => 162, 'id_role' => 6, 'id_user' => 124],
            ['id_user_role' => 163, 'id_role' => 6, 'id_user' => 131],

        ]);
    }
}
