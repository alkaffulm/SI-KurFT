<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPersonalisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_personalisasi')->insert([
            ['id_personlisasi' => 1, 'id_user' => 5, 'id_user_role' => 5, 'email' => 'admin1@example.com', 'userpicture_path' => 'images/profiles/admin1.jpg'],
            ['id_personlisasi' => 2, 'id_user' => 6, 'id_user_role' => 6, 'email' => 'admin2@example.com', 'userpicture_path' => 'images/profiles/admin2.jpg'],
            ['id_personlisasi' => 3, 'id_user' => 11, 'id_user_role' => 11, 'email' => 'admin3@example.com', 'userpicture_path' => 'images/profiles/admin3.jpg'],
            ['id_personlisasi' => 4, 'id_user' => 12, 'id_user_role' => 12, 'email' => 'admin4@example.com', 'userpicture_path' => 'images/profiles/admin4.jpg'],
            ['id_personlisasi' => 5, 'id_user' => 17, 'id_user_role' => 17, 'email' => 'admin5@example.com', 'userpicture_path' => 'images/profiles/admin5.jpg'],
            ['id_personlisasi' => 6, 'id_user' => 18, 'id_user_role' => 18, 'email' => 'admin6@example.com', 'userpicture_path' => 'images/profiles/admin6.jpg'],
            ['id_personlisasi' => 7, 'id_user' => 23, 'id_user_role' => 23, 'email' => 'admin7@example.com', 'userpicture_path' => 'images/profiles/admin7.jpg'],
            ['id_personlisasi' => 8, 'id_user' => 24, 'id_user_role' => 24, 'email' => 'admin8@example.com', 'userpicture_path' => 'images/profiles/admin8.jpg'],
            ['id_personlisasi' => 9, 'id_user' => 29, 'id_user_role' => 29, 'email' => 'admin9@example.com', 'userpicture_path' => 'images/profiles/admin9.jpg'],
            ['id_personlisasi' => 10, 'id_user' => 30, 'id_user_role' => 30, 'email' => 'admin10@example.com', 'userpicture_path' => 'images/profiles/admin10.jpg'],
            ['id_personlisasi' => 11, 'id_user' => 35, 'id_user_role' => 35, 'email' => 'admin11@example.com', 'userpicture_path' => 'images/profiles/admin11.jpg'],
            ['id_personlisasi' => 12, 'id_user' => 36, 'id_user_role' => 36, 'email' => 'admin12@example.com', 'userpicture_path' => 'images/profiles/admin12.jpg'],
            ['id_personlisasi' => 13, 'id_user' => 41, 'id_user_role' => 41, 'email' => 'admin13@example.com', 'userpicture_path' => 'images/profiles/admin13.jpg'],
            ['id_personlisasi' => 14, 'id_user' => 42, 'id_user_role' => 42, 'email' => 'admin14@example.com', 'userpicture_path' => 'images/profiles/admin14.jpg'],
            ['id_personlisasi' => 15, 'id_user' => 47, 'id_user_role' => 47, 'email' => 'admin15@example.com', 'userpicture_path' => 'images/profiles/admin15.jpg'],
            ['id_personlisasi' => 16, 'id_user' => 48, 'id_user_role' => 48, 'email' => 'admin16@example.com', 'userpicture_path' => 'images/profiles/admin16.jpg'],
            ['id_personlisasi' => 17, 'id_user' => 53, 'id_user_role' => 53, 'email' => 'admin17@example.com', 'userpicture_path' => 'images/profiles/admin17.jpg'],
            ['id_personlisasi' => 18, 'id_user' => 54, 'id_user_role' => 54, 'email' => 'admin18@example.com', 'userpicture_path' => 'images/profiles/admin18.jpg'],

            ['id_personlisasi' => 19, 'id_user' => 7, 'id_user_role' => 7, 'email' => 'manager1@example.com', 'userpicture_path' => 'images/profiles/manager1.jpg'],
            ['id_personlisasi' => 20, 'id_user' => 8, 'id_user_role' => 8, 'email' => 'manager2@example.com', 'userpicture_path' => 'images/profiles/manager2.jpg'],
            ['id_personlisasi' => 21, 'id_user' => 9, 'id_user_role' => 9, 'email' => 'manager3@example.com', 'userpicture_path' => 'images/profiles/manager3.jpg'],
            ['id_personlisasi' => 22, 'id_user' => 13, 'id_user_role' => 13, 'email' => 'manager4@example.com', 'userpicture_path' => 'images/profiles/manager4.jpg'],
            ['id_personlisasi' => 23, 'id_user' => 14, 'id_user_role' => 14, 'email' => 'manager5@example.com', 'userpicture_path' => 'images/profiles/manager5.jpg'],
            ['id_personlisasi' => 24, 'id_user' => 15, 'id_user_role' => 15, 'email' => 'manager6@example.com', 'userpicture_path' => 'images/profiles/manager6.jpg'],
            ['id_personlisasi' => 25, 'id_user' => 19, 'id_user_role' => 19, 'email' => 'manager7@example.com', 'userpicture_path' => 'images/profiles/manager7.jpg'],
            ['id_personlisasi' => 26, 'id_user' => 20, 'id_user_role' => 20, 'email' => 'manager8@example.com', 'userpicture_path' => 'images/profiles/manager8.jpg'],
            ['id_personlisasi' => 27, 'id_user' => 21, 'id_user_role' => 21, 'email' => 'manager9@example.com', 'userpicture_path' => 'images/profiles/manager9.jpg'],
            ['id_personlisasi' => 28, 'id_user' => 25, 'id_user_role' => 25, 'email' => 'manager10@example.com', 'userpicture_path' => 'images/profiles/manager10.jpg'],
            ['id_personlisasi' => 29, 'id_user' => 26, 'id_user_role' => 26, 'email' => 'manager11@example.com', 'userpicture_path' => 'images/profiles/manager11.jpg'],
            ['id_personlisasi' => 30, 'id_user' => 27, 'id_user_role' => 27, 'email' => 'manager12@example.com', 'userpicture_path' => 'images/profiles/manager12.jpg'],
            ['id_personlisasi' => 31, 'id_user' => 31, 'id_user_role' => 31, 'email' => 'manager13@example.com', 'userpicture_path' => 'images/profiles/manager13.jpg'],
            ['id_personlisasi' => 32, 'id_user' => 32, 'id_user_role' => 32, 'email' => 'manager14@example.com', 'userpicture_path' => 'images/profiles/manager14.jpg'],
            ['id_personlisasi' => 33, 'id_user' => 33, 'id_user_role' => 33, 'email' => 'manager15@example.com', 'userpicture_path' => 'images/profiles/manager15.jpg'],
            ['id_personlisasi' => 34, 'id_user' => 37, 'id_user_role' => 37, 'email' => 'manager16@example.com', 'userpicture_path' => 'images/profiles/manager16.jpg'],
            ['id_personlisasi' => 35, 'id_user' => 38, 'id_user_role' => 38, 'email' => 'manager17@example.com', 'userpicture_path' => 'images/profiles/manager17.jpg'],
            ['id_personlisasi' => 36, 'id_user' => 39, 'id_user_role' => 39, 'email' => 'manager18@example.com', 'userpicture_path' => 'images/profiles/manager18.jpg'],
            ['id_personlisasi' => 37, 'id_user' => 43, 'id_user_role' => 43, 'email' => 'manager19@example.com', 'userpicture_path' => 'images/profiles/manager19.jpg'],
            ['id_personlisasi' => 38, 'id_user' => 44, 'id_user_role' => 44, 'email' => 'manager20@example.com', 'userpicture_path' => 'images/profiles/manager20.jpg'],
            ['id_personlisasi' => 39, 'id_user' => 45, 'id_user_role' => 45, 'email' => 'manager21@example.com', 'userpicture_path' => 'images/profiles/manager21.jpg'],
            ['id_personlisasi' => 40, 'id_user' => 49, 'id_user_role' => 49, 'email' => 'manager22@example.com', 'userpicture_path' => 'images/profiles/manager22.jpg'],
            ['id_personlisasi' => 41, 'id_user' => 50, 'id_user_role' => 50, 'email' => 'manager23@example.com', 'userpicture_path' => 'images/profiles/manager23.jpg'],
            ['id_personlisasi' => 42, 'id_user' => 51, 'id_user_role' => 51, 'email' => 'manager24@example.com', 'userpicture_path' => 'images/profiles/manager24.jpg'],
            ['id_personlisasi' => 43, 'id_user' => 55, 'id_user_role' => 55, 'email' => 'manager25@example.com', 'userpicture_path' => 'images/profiles/manager25.jpg'],
            ['id_personlisasi' => 44, 'id_user' => 56, 'id_user_role' => 56, 'email' => 'manager26@example.com', 'userpicture_path' => 'images/profiles/manager26.jpg'],
            ['id_personlisasi' => 45, 'id_user' => 57, 'id_user_role' => 57, 'email' => 'manager27@example.com', 'userpicture_path' => 'images/profiles/manager27.jpg'],

            ['id_personlisasi' => 46, 'id_user' => 1, 'id_user_role' => 1, 'email' => 'admin1@example.com', 'userpicture_path' => 'images/profiles/admin1.jpg'],
            ['id_personlisasi' => 47, 'id_user' => 2, 'id_user_role' => 2, 'email' => 'admin2@example.com', 'userpicture_path' => 'images/profiles/admin2.jpg'],
            ['id_personlisasi' => 48, 'id_user' => 3, 'id_user_role' => 3, 'email' => 'admin3@example.com', 'userpicture_path' => 'images/profiles/admin3.jpg'],
            ['id_personlisasi' => 49, 'id_user' => 4, 'id_user_role' => 4, 'email' => 'admin4@example.com', 'userpicture_path' => 'images/profiles/admin4.jpg'],
            ['id_personlisasi' => 50, 'id_user' => 10, 'id_user_role' => 10, 'email' => 'admin5@example.com', 'userpicture_path' => 'images/profiles/admin5.jpg'],
            ['id_personlisasi' => 51, 'id_user' => 16, 'id_user_role' => 16, 'email' => 'admin6@example.com', 'userpicture_path' => 'images/profiles/admin6.jpg'],
            ['id_personlisasi' => 52, 'id_user' => 22, 'id_user_role' => 22, 'email' => 'admin7@example.com', 'userpicture_path' => 'images/profiles/admin7.jpg'],
            ['id_personlisasi' => 53, 'id_user' => 28, 'id_user_role' => 28, 'email' => 'admin8@example.com', 'userpicture_path' => 'images/profiles/admin8.jpg'],
            ['id_personlisasi' => 54, 'id_user' => 34, 'id_user_role' => 34, 'email' => 'admin9@example.com', 'userpicture_path' => 'images/profiles/admin9.jpg'],
            ['id_personlisasi' => 55, 'id_user' => 40, 'id_user_role' => 40, 'email' => 'admin10@example.com', 'userpicture_path' => 'images/profiles/admin10.jpg'],
            ['id_personlisasi' => 56, 'id_user' => 46, 'id_user_role' => 46, 'email' => 'admin11@example.com', 'userpicture_path' => 'images/profiles/admin11.jpg'],
            ['id_personlisasi' => 57, 'id_user' => 52, 'id_user_role' => 52, 'email' => 'admin12@example.com', 'userpicture_path' => 'images/profiles/admin12.jpg'],
        ]);
    }
}
