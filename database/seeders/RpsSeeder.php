<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rps')->insert([
            // kurikulum 2020
            // ['id_rps' => 1, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 1, 'tahun' => 2023, 'file_path' => 'rps/rps_1.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 2, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 2, 'tahun' => 2024, 'file_path' => 'rps/rps_2.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 3, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 3, 'tahun' => 2023, 'file_path' => 'rps/rps_3.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 4, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 4, 'tahun' => 2025, 'file_path' => 'rps/rps_4.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 5, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 5, 'tahun' => 2024, 'file_path' => 'rps/rps_5.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 6, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 6, 'tahun' => 2023, 'file_path' => 'rps/rps_6.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 7, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 7, 'tahun' => 2025, 'file_path' => 'rps/rps_7.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 8, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 8, 'tahun' => 2023, 'file_path' => 'rps/rps_8.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 9, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 9, 'tahun' => 2024, 'file_path' => 'rps/rps_9.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 10, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 10, 'tahun' => 2023, 'file_path' => 'rps/rps_10.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 11, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 11, 'tahun' => 2025, 'file_path' => 'rps/rps_11.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 12, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 12, 'tahun' => 2024, 'file_path' => 'rps/rps_12.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 13, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 13, 'tahun' => 2023, 'file_path' => 'rps/rps_13.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 14, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 14, 'tahun' => 2025, 'file_path' => 'rps/rps_14.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 15, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 15, 'tahun' => 2023, 'file_path' => 'rps/rps_15.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 16, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 16, 'tahun' => 2024, 'file_path' => 'rps/rps_16.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 17, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 17, 'tahun' => 2023, 'file_path' => 'rps/rps_17.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 18, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 18, 'tahun' => 2025, 'file_path' => 'rps/rps_18.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 19, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 19, 'tahun' => 2023, 'file_path' => 'rps/rps_19.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 20, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 20, 'tahun' => 2024, 'file_path' => 'rps/rps_20.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 21, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 21, 'tahun' => 2023, 'file_path' => 'rps/rps_21.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 22, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 22, 'tahun' => 2025, 'file_path' => 'rps/rps_22.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 23, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 23, 'tahun' => 2024, 'file_path' => 'rps/rps_23.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 24, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 24, 'tahun' => 2023, 'file_path' => 'rps/rps_24.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 25, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 25, 'tahun' => 2025, 'file_path' => 'rps/rps_25.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 26, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 26, 'tahun' => 2023, 'file_path' => 'rps/rps_26.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 27, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 27, 'tahun' => 2024, 'file_path' => 'rps/rps_27.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 28, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 28, 'tahun' => 2023, 'file_path' => 'rps/rps_28.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 29, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 29, 'tahun' => 2025, 'file_path' => 'rps/rps_29.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 30, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 30, 'tahun' => 2023, 'file_path' => 'rps/rps_30.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            ['id_rps' => 1, 'id_kaprodi' => 148, 'id_kurikulum' => 7, 'id_model_pembelajaran' => 14, 'id_mk' => 50, 'id_ps' => 7, 'materi_pembelajaran' => 'Desain User Experience dengan pokok bahasan: 
1. Pengantar dan Konsep Interaksi Manusia Komputer 
2. Prinsip Dasar IMK dan User Centered Design 
3. Aspek Psikologis dan Kognitif Pengguna 
4. Model Mental dalam Interaksi 
5. Teknik Pengumpulan Data 
6. Persona dan Skenario dalam UCD 
7. Wireframe dan Prototype Low-Fidelity 
8. Evaluasi Awal Desain dan Prinsip Usability 
9. Prinsip Usability dan User Experience dalam desain user interface 
10. Mockup dan High-Fidelity Prototype 
11. Pengujian usability 
12. Tren Teknologi dalam IMK 
13. Isu Etika dan Tanggung Jawab Desain Modern', 'pustaka_utama' => '[1] Dix, Alan et.al, HUMAN-COMPUTER INTERACTION, 2nd Edition, Prentice Hall, Europe, 1998. 
[2] Galitz, W. O, The Essential Guide to User Inteface Design : An Introduction to GUI Design Principles and Techniques, John Wiley & 
Sons, Canada, 1996. 
[3] Johnson, P., HUMAN-COMPUTER INTERACTION : Psychology, Task Analysis and Software Engineering, McGraw-Hill, England 
UK, 1992. 
[4] Newman, W. M and Lamming, M. G, Interactive System Design, Addison Wesley, Cambrigde, Great Britain, 1995. 
[5] P. Insap Santoso, Interaksi Manusia dan Komputer : Teori dan Praktek, Andi Offset, Yogyakarta, 2004. 
[6] Raskin, J, The Human Interface, Addison Wesley, 2000 
[7] Shneiderman, B, Designing The User Interface, 3rd Edition, Addison Wesley, 1998 
Sutcliffe, A. G., HUMAN-COMPUTER INTERFACE DESIGN, 2ND Edition, MacMillan, London, 1995.', 'pustaka_pendukung' => '[9] B Hewett, Baecker, et.al, ACM SIGCHI Curricula for Human-Computer Interaction (folder : IMK-ACM.rar) 
[10] Folder: IMK-cc-Gatech-edu.rar','jumlah_revisi' => 0, 'isRevisi' => false, 'tanggal_revisi' => null, 'tanggal_disusun' => now()],

            ['id_rps' => 2,'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 13,
    'id_mk' => 33,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Aljabar Linear dengan pokok bahasan:

1. Pengantar Aljabar Linear dan aplikasinya dalam bidang teknologi informasi
2. Sistem Persamaan Linear dan metode penyelesaiannya (substitusi, eliminasi, Gauss, Gauss-Jordan)
3. Representasi matriks dan operasi dasar matriks (penjumlahan, perkalian, transpose)
4. Determinan matriks dan sifat-sifatnya
5. Invers matriks dan penerapannya dalam penyelesaian sistem persamaan linear
6. Ruang vektor dan konsep subruang
7. Basis, dimensi, dan sistem koordinat dalam ruang vektor
8. Transformasi linear dan representasi matriksnya
9. Kernel (null space) dan range (column space)
10. Eigenvalue dan eigenvector serta interpretasinya
11. Diagonalisasi matriks
12. Norma, jarak, dan ortogonalitas dalam ruang vektor
13. Proses ortonormalisasi Gram-Schmidt
14. Proyeksi vektor dan metode least square
15. Pengantar dekomposisi matriks (LU, QR, SVD)
16. Aplikasi aljabar linear dalam grafika komputer, machine learning, dan data science',

    'pustaka_utama' => '[1] Lay, David C., Linear Algebra and Its Applications, 5th Edition, Pearson, 2016.
[2] Anton, Howard & Rorres, Chris, Elementary Linear Algebra, 11th Edition, Wiley, 2014.
[3] Strang, Gilbert, Introduction to Linear Algebra, 5th Edition, Wellesley-Cambridge Press, 2016.
[4] Kolman, Bernard & Hill, David R., Introductory Linear Algebra with Applications, 9th Edition, Pearson, 2008.
[5] Poole, David, Linear Algebra: A Modern Introduction, 4th Edition, Cengage Learning, 2015.',

    'pustaka_pendukung' => '[6] Gilbert Strang, MIT OpenCourseWare: Linear Algebra
[7] Khan Academy: Linear Algebra
[8] 3Blue1Brown: Essence of Linear Algebra
[9] Dokumentasi NumPy & SciPy untuk komputasi matriks
[10] Artikel ilmiah terkait aplikasi aljabar linear dalam AI dan data science',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 3,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 14,
    'id_mk' => 37,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Pemrograman I dengan pokok bahasan:

1. Pengantar pemrograman dan konsep dasar algoritma
2. Struktur dasar program dan alur eksekusi program
3. Variabel, tipe data, dan operasi dasar dalam pemrograman
4. Input dan output dalam program
5. Operator aritmatika, logika, dan relasional
6. Percabangan (if, if-else, switch case)
7. Perulangan (for, while, do-while)
8. Array satu dimensi dan manipulasi data dalam array
9. Array multidimensi dan implementasinya
10. Fungsi dan prosedur dalam pemrograman modular
11. Parameter dan nilai balik fungsi
12. Debugging dan penanganan error dasar
13. Pengantar struktur data sederhana
14. Studi kasus penyelesaian masalah menggunakan pemrograman
15. Praktik pengembangan program sederhana berbasis masalah nyata
16. Pengantar praktik terbaik dalam penulisan kode (clean code dan dokumentasi)',

    'pustaka_utama' => '[1] Deitel, Paul & Deitel, Harvey, C How to Program, 8th Edition, Pearson, 2015.
[2] Joyce Farrell, Programming Logic and Design, 8th Edition, Cengage Learning, 2014.
[3] Robert W. Sebesta, Concepts of Programming Languages, 11th Edition, Pearson, 2016.
[4] Kernighan, Brian W. & Ritchie, Dennis M., The C Programming Language, 2nd Edition, Prentice Hall, 1988.
[5] Zed A. Shaw, Learn C the Hard Way, Addison-Wesley, 2016.',

    'pustaka_pendukung' => '[6] GeeksforGeeks: Programming Tutorials
[7] W3Schools: Programming Fundamentals
[8] HackerRank & LeetCode (latihan coding interaktif)
[9] Dokumentasi resmi bahasa pemrograman (C/Python/Java)
[10] Video pembelajaran pemrograman dasar (YouTube, Coursera, edX)',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 4,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 13,
    'id_mk' => 42,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Sistem Operasi dengan pokok bahasan:

1. Pengantar sistem operasi dan perannya dalam sistem komputer
2. Struktur dan arsitektur sistem operasi
3. Proses dan manajemen proses
4. Thread dan concurrency
5. Penjadwalan CPU (CPU Scheduling)
6. Sinkronisasi proses dan masalah race condition
7. Deadlock dan strategi penanganannya
8. Manajemen memori (paging, segmentation, virtual memory)
9. Sistem berkas (file system) dan manajemen penyimpanan
10. Manajemen input/output dan perangkat keras
11. Sistem proteksi dan keamanan dalam sistem operasi
12. Virtualisasi dan container
13. Sistem operasi modern (Linux, Windows, Android)
14. Studi kasus implementasi sistem operasi
15. Monitoring dan analisis performa sistem
16. Tren perkembangan sistem operasi dan komputasi modern',

    'pustaka_utama' => '[1] Silberschatz, Abraham, Galvin, Peter B., & Gagne, Greg, Operating System Concepts, 10th Edition, Wiley, 2018.
[2] Tanenbaum, Andrew S. & Bos, Herbert, Modern Operating Systems, 4th Edition, Pearson, 2015.
[3] Stallings, William, Operating Systems: Internals and Design Principles, 9th Edition, Pearson, 2018.
[4] Love, Robert, Linux Kernel Development, 3rd Edition, Addison-Wesley, 2010.
[5] Bovet, Daniel P. & Cesati, Marco, Understanding the Linux Kernel, O\'Reilly, 2005.',

    'pustaka_pendukung' => '[6] Dokumentasi Linux Kernel
[7] FreeCodeCamp & GeeksforGeeks OS tutorials
[8] MIT OpenCourseWare: Operating Systems
[9] Video pembelajaran OS (YouTube, Coursera, edX)
[10] Artikel riset tentang virtualisasi dan cloud computing',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 5,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 14,
    'id_mk' => 62,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Keamanan Siber dengan pokok bahasan:

1. Pengantar keamanan siber dan pentingnya dalam sistem informasi
2. Konsep dasar keamanan: confidentiality, integrity, availability (CIA Triad)
3. Ancaman dan serangan siber (malware, phishing, social engineering)
4. Kriptografi dasar (enkripsi simetris dan asimetris)
5. Hashing dan digital signature
6. Autentikasi dan otorisasi dalam sistem
7. Keamanan jaringan (firewall, IDS/IPS, VPN)
8. Keamanan sistem operasi dan hardening sistem
9. Keamanan aplikasi web (SQL Injection, XSS, CSRF)
10. Pengujian keamanan (penetration testing dasar)
11. Manajemen risiko keamanan informasi
12. Standar dan framework keamanan (ISO 27001, NIST)
13. Keamanan cloud dan teknologi modern
14. Etika dalam keamanan siber dan cyber law
15. Studi kasus insiden keamanan siber nyata
16. Tren dan perkembangan keamanan siber di era digital',

    'pustaka_utama' => '[1] Stallings, William, Cryptography and Network Security, 7th Edition, Pearson, 2017.
[2] Whitman, Michael E. & Mattord, Herbert J., Principles of Information Security, 6th Edition, Cengage Learning, 2017.
[3] Kurose, James F. & Ross, Keith W., Computer Networking: A Top-Down Approach, 7th Edition, Pearson, 2016.
[4] Goodrich, Michael T. & Tamassia, Roberto, Introduction to Computer Security, Pearson, 2014.
[5] Bishop, Matt, Computer Security: Art and Science, Addison-Wesley, 2018.',

    'pustaka_pendukung' => '[6] OWASP Top 10 (Web Security Standard)
[7] NIST Cybersecurity Framework
[8] Dokumentasi Kali Linux & tools penetration testing
[9] Platform latihan keamanan (TryHackMe, Hack The Box)
[10] Artikel dan jurnal terkait keamanan siber dan cyber attack',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 6,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 14,
    'id_mk' => 71,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Manajemen Proyek Teknologi Informasi dengan pokok bahasan:

1. Pengantar manajemen proyek dan perannya dalam teknologi informasi
2. Karakteristik proyek TI dan siklus hidup proyek (Project Life Cycle)
3. Konsep dasar manajemen proyek (scope, time, cost, quality)
4. Perencanaan proyek (project planning) dan penentuan tujuan proyek
5. Work Breakdown Structure (WBS) dan penjadwalan proyek
6. Estimasi biaya dan sumber daya proyek
7. Manajemen risiko proyek TI
8. Manajemen kualitas dalam proyek TI
9. Manajemen komunikasi dan stakeholder
10. Metodologi manajemen proyek (Waterfall, Agile, Scrum)
11. Tools manajemen proyek (Gantt Chart, PERT, CPM)
12. Monitoring dan controlling proyek
13. Manajemen tim proyek dan kepemimpinan
14. Studi kasus implementasi proyek TI
15. Evaluasi dan penutupan proyek (project closing)
16. Tren manajemen proyek TI dan praktik terbaik industri',

    'pustaka_utama' => '[1] Project Management Institute, A Guide to the Project Management Body of Knowledge (PMBOK Guide), 7th Edition, PMI, 2021.
[2] Schwalbe, Kathy, Information Technology Project Management, 9th Edition, Cengage Learning, 2018.
[3] Kerzner, Harold, Project Management: A Systems Approach to Planning, Scheduling, and Controlling, 12th Edition, Wiley, 2017.
[4] Sommerville, Ian, Software Engineering, 10th Edition, Pearson, 2015.
[5] Pressman, Roger S., Software Engineering: A Practitioner\'s Approach, 8th Edition, McGraw-Hill, 2014.',

    'pustaka_pendukung' => '[6] Agile Manifesto Documentation
[7] Scrum Guide (scrum.org)
[8] Tools: Trello, Jira, Microsoft Project
[9] Coursera & edX: Project Management Courses
[10] Artikel dan studi kasus proyek TI di industri',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 7,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 14,
    'id_mk' => 70,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Kecerdasan Bisnis dengan pokok bahasan:

1. Pengantar kecerdasan bisnis dan perannya dalam organisasi
2. Konsep data, informasi, dan pengetahuan dalam BI
3. Data warehouse dan arsitektur penyimpanan data
4. Proses ETL (Extract, Transform, Load)
5. Data mart dan dimensional modeling
6. Online Analytical Processing (OLAP)
7. Data mining dan teknik analisis data
8. Visualisasi data dan dashboard interaktif
9. Tools Business Intelligence (Power BI, Tableau, dll.)
10. Analisis deskriptif, prediktif, dan preskriptif
11. Pengambilan keputusan berbasis data (data-driven decision making)
12. Big data dan teknologi pendukung BI
13. Integrasi BI dengan sistem organisasi
14. Studi kasus implementasi BI di industri
15. Evaluasi performa bisnis menggunakan BI
16. Tren kecerdasan bisnis dan analitik modern',

    'pustaka_utama' => '[1] Turban, Efraim et.al, Business Intelligence and Analytics: Systems for Decision Support, 10th Edition, Pearson, 2015.
[2] Kimball, Ralph & Ross, Margy, The Data Warehouse Toolkit, 3rd Edition, Wiley, 2013.
[3] Han, Jiawei, Kamber, Micheline, & Pei, Jian, Data Mining: Concepts and Techniques, 3rd Edition, Morgan Kaufmann, 2011.
[4] Sharda, Ramesh et.al, Business Intelligence and Analytics, Pearson, 2018.
[5] Provost, Foster & Fawcett, Tom, Data Science for Business, O’Reilly, 2013.',

    'pustaka_pendukung' => '[6] Dokumentasi Power BI & Tableau
[7] Kaggle: Dataset dan praktik analisis data
[8] Coursera & edX: Data Analytics & BI Courses
[9] Artikel dan jurnal terkait Business Intelligence
[10] Studi kasus implementasi BI di perusahaan global',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
], 

[
    'id_rps' => 8,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 14,
    'id_mk' => 45,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Pemrograman Web I dengan pokok bahasan:

1. Pengantar teknologi web dan arsitektur client-server
2. Struktur dasar HTML dan pembuatan halaman web statis
3. Penggunaan CSS untuk styling dan layout halaman web
4. Responsive design dan prinsip desain web modern
5. Pengantar JavaScript untuk interaktivitas web
6. Manipulasi DOM (Document Object Model)
7. Event handling dalam JavaScript
8. Form handling dan validasi input pengguna
9. Pengenalan HTTP dan request-response
10. Pengantar backend development (PHP atau Node.js dasar)
11. Koneksi ke database (MySQL) dan operasi CRUD
12. Pengelolaan session dan cookie
13. Keamanan dasar aplikasi web (input validation, XSS, SQL Injection)
14. Struktur proyek web dan best practice pengembangan
15. Studi kasus pengembangan aplikasi web sederhana
16. Deployment aplikasi web ke server lokal/hosting',

    'pustaka_utama' => '[1] Duckett, Jon, HTML and CSS: Design and Build Websites, Wiley, 2011.
[2] Duckett, Jon, JavaScript and JQuery: Interactive Front-End Web Development, Wiley, 2014.
[3] Welling, Luke & Thomson, Laura, PHP and MySQL Web Development, 5th Edition, Addison-Wesley, 2016.
[4] Flanagan, David, JavaScript: The Definitive Guide, 7th Edition, O’Reilly, 2020.
[5] Freeman, Eric et.al, Head First HTML and CSS, O’Reilly, 2012.',

    'pustaka_pendukung' => '[6] MDN Web Docs (Mozilla Developer Network)
[7] W3Schools Web Development Tutorials
[8] FreeCodeCamp Web Development Curriculum
[9] Dokumentasi resmi HTML, CSS, JavaScript
[10] Platform latihan coding (CodePen, GitHub, Replit)',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 9,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 13,
    'id_mk' => 47,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Algoritma dan Struktur Data dengan pokok bahasan:

1. Pengantar algoritma dan peranannya dalam pemrograman
2. Analisis kompleksitas algoritma (Big-O Notation)
3. Struktur data dasar (array, linked list)
4. Operasi dasar pada struktur data
5. Stack dan queue serta implementasinya
6. Rekursi dan aplikasinya dalam penyelesaian masalah
7. Sorting algorithms (bubble sort, selection sort, insertion sort)
8. Searching algorithms (linear search, binary search)
9. Struktur data pohon (tree) dan traversalnya
10. Binary search tree dan operasinya
11. Heap dan priority queue
12. Graph dan representasinya (adjacency matrix & list)
13. Algoritma traversal graph (DFS, BFS)
14. Algoritma greedy dan divide and conquer
15. Dynamic programming dasar
16. Studi kasus penerapan algoritma dalam pengembangan perangkat lunak',

    'pustaka_utama' => '[1] Cormen, Thomas H. et.al, Introduction to Algorithms, 3rd Edition, MIT Press, 2009.
[2] Goodrich, Michael T. et.al, Data Structures and Algorithms in Java, 6th Edition, Wiley, 2014.
[3] Weiss, Mark Allen, Data Structures and Algorithm Analysis, 4th Edition, Pearson, 2013.
[4] Sedgewick, Robert & Wayne, Kevin, Algorithms, 4th Edition, Addison-Wesley, 2011.
[5] Lafore, Robert, Data Structures and Algorithms in Java, 2nd Edition, Sams Publishing, 2002.',

    'pustaka_pendukung' => '[6] GeeksforGeeks: Data Structures and Algorithms
[7] HackerRank & LeetCode (latihan algoritma)
[8] MIT OpenCourseWare: Algorithms
[9] Visualgo (visualisasi struktur data dan algoritma)
[10] Artikel dan jurnal terkait optimasi algoritma',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 10,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 13,
    'id_mk' => 31,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Bahasa Inggris I dengan pokok bahasan:

1. Pengantar penggunaan Bahasa Inggris dalam konteks akademik dan teknologi informasi
2. Vocabulary dasar terkait kehidupan kampus dan bidang TI
3. Struktur kalimat dasar (tenses: present, past, future)
4. Reading comprehension teks sederhana
5. Listening comprehension percakapan dasar
6. Speaking: memperkenalkan diri dan presentasi sederhana
7. Grammar dasar (noun, verb, adjective, adverb)
8. Writing: kalimat dan paragraf sederhana
9. Descriptive text dan narrative text
10. Functional expressions (asking, giving opinion, agreement)
11. Membaca teks teknis sederhana terkait IT
12. Penulisan email formal dan informal
13. Presentasi sederhana dalam Bahasa Inggris
14. Diskusi kelompok menggunakan Bahasa Inggris
15. Latihan komunikasi dalam konteks profesional dasar
16. Evaluasi kemampuan reading, writing, listening, dan speaking',

    'pustaka_utama' => '[1] Azar, Betty Schrampfer, Understanding and Using English Grammar, 5th Edition, Pearson, 2017.
[2] Murphy, Raymond, English Grammar in Use, 5th Edition, Cambridge University Press, 2019.
[3] Eastwood, John, Oxford Practice Grammar, Oxford University Press, 2008.
[4] Swan, Michael, Practical English Usage, Oxford University Press, 2016.
[5] Soars, Liz & Soars, John, New Headway English Course, Oxford University Press.',

    'pustaka_pendukung' => '[6] BBC Learning English
[7] Duolingo & Grammarly (tools pembelajaran)
[8] Cambridge English Online Resources
[9] YouTube: English Learning Channels
[10] Artikel dan teks sederhana bidang teknologi informasi dalam Bahasa Inggris',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 11,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 13,
    'id_mk' => 41,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Etika Profesi Teknologi Informasi dengan pokok bahasan:

1. Pengantar etika dan moral dalam kehidupan profesional
2. Konsep dasar etika profesi di bidang teknologi informasi
3. Kode etik profesi TI (ACM, IEEE, dan organisasi profesional lainnya)
4. Tanggung jawab profesional dalam pengembangan perangkat lunak
5. Isu privasi dan perlindungan data
6. Hak kekayaan intelektual (HAKI) dalam bidang TI
7. Cyber ethics dan perilaku etis di dunia digital
8. Keamanan informasi dan tanggung jawab etis
9. Dampak sosial teknologi informasi
10. Etika dalam pengembangan sistem dan kecerdasan buatan
11. Profesionalisme dan integritas dalam pekerjaan TI
12. Studi kasus pelanggaran etika di bidang TI
13. Regulasi dan hukum terkait teknologi informasi
14. Pengambilan keputusan etis dalam proyek TI
15. Tanggung jawab sosial profesi TI
16. Tren etika dalam teknologi modern dan masa depan',

    'pustaka_utama' => '[1] Reynolds, George W., Ethics in Information Technology, 6th Edition, Cengage Learning, 2019.
[2] Spinello, Richard A., Cyberethics: Morality and Law in Cyberspace, 6th Edition, Jones & Bartlett Learning, 2016.
[3] Tavani, Herman T., Ethics and Technology, 4th Edition, Wiley, 2016.
[4] ACM Code of Ethics and Professional Conduct
[5] IEEE Code of Ethics',

    'pustaka_pendukung' => '[6] Undang-Undang ITE (Indonesia)
[7] Artikel dan jurnal terkait etika teknologi
[8] Studi kasus pelanggaran etika di industri TI
[9] Dokumentasi GDPR dan regulasi perlindungan data
[10] Video dan kursus online terkait cyber ethics',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 12,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 14,
    'id_mk' => 43,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Basis Data I dengan pokok bahasan:

1. Pengantar basis data dan sistem manajemen basis data (DBMS)
2. Konsep data, informasi, dan database dalam sistem informasi
3. Arsitektur DBMS dan komponen utama
4. Model data (hierarchical, network, relational)
5. Model relasional dan konsep tabel, atribut, tuple
6. Entity Relationship Diagram (ERD) dan perancangan basis data
7. Normalisasi (1NF, 2NF, 3NF, BCNF)
8. Bahasa SQL dasar (DDL, DML, DCL)
9. Query dasar (SELECT, WHERE, JOIN)
10. Operasi agregasi dan grouping data
11. Subquery dan nested query
12. Integritas data dan constraint (primary key, foreign key)
13. Transaksi dan konsep ACID
14. Pengantar indexing dan optimasi query
15. Keamanan basis data dan manajemen akses
16. Studi kasus perancangan dan implementasi database sederhana',

    'pustaka_utama' => '[1] Elmasri, Ramez & Navathe, Shamkant B., Fundamentals of Database Systems, 7th Edition, Pearson, 2016.
[2] Silberschatz, Abraham et.al, Database System Concepts, 7th Edition, McGraw-Hill, 2019.
[3] Connolly, Thomas & Begg, Carolyn, Database Systems: A Practical Approach to Design, Implementation, and Management, 6th Edition, Pearson, 2014.
[4] Coronel, Carlos & Morris, Steven, Database Systems: Design, Implementation, & Management, 12th Edition, Cengage Learning, 2017.
[5] Date, C.J., An Introduction to Database Systems, 8th Edition, Addison-Wesley, 2004.',

    'pustaka_pendukung' => '[6] Dokumentasi MySQL & PostgreSQL
[7] W3Schools SQL Tutorial
[8] SQLZoo & HackerRank SQL Practice
[9] Artikel dan jurnal terkait database design dan optimization
[10] Tools database (phpMyAdmin, MySQL Workbench, DBeaver)',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],

[
    'id_rps' => 13,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 13,
    'id_mk' => 53,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Jaringan Komputer dan Komunikasi Data dengan pokok bahasan:

1. Pengantar jaringan komputer dan komunikasi data
2. Model referensi jaringan (OSI dan TCP/IP)
3. Media transmisi dan perangkat jaringan
4. Topologi jaringan dan arsitektur jaringan
5. Lapisan fisik dan data link
6. Teknik pengalamatan (IP Addressing IPv4 dan IPv6)
7. Subnetting dan perencanaan jaringan
8. Routing dan switching
9. Protokol jaringan (TCP, UDP, HTTP, FTP, DNS)
10. Jaringan nirkabel (wireless network)
11. Keamanan jaringan dasar (firewall, enkripsi)
12. Quality of Service (QoS) dan manajemen bandwidth
13. Jaringan berbasis cloud dan virtual network
14. Monitoring dan troubleshooting jaringan
15. Studi kasus implementasi jaringan komputer
16. Tren teknologi jaringan (IoT, SDN, 5G)',

    'pustaka_utama' => '[1] Kurose, James F. & Ross, Keith W., Computer Networking: A Top-Down Approach, 7th Edition, Pearson, 2016.
[2] Tanenbaum, Andrew S. & Wetherall, David J., Computer Networks, 5th Edition, Pearson, 2011.
[3] Forouzan, Behrouz A., Data Communications and Networking, 5th Edition, McGraw-Hill, 2013.
[4] Odom, Wendell, CCNA Routing and Switching, Cisco Press, 2016.
[5] Stallings, William, Data and Computer Communications, 10th Edition, Pearson, 2013.',

    'pustaka_pendukung' => '[6] Cisco Networking Academy Materials
[7] Dokumentasi Wireshark dan tools analisis jaringan
[8] Packet Tracer dan simulasi jaringan
[9] Artikel dan jurnal terkait jaringan komputer dan komunikasi data
[10] Video pembelajaran jaringan (YouTube, Coursera, edX)',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],


[
    'id_rps' => 14,
    'id_kaprodi' => 148,
    'id_kurikulum' => 7,
    'id_model_pembelajaran' => 13,
    'id_mk' => 98,
    'id_ps' => 7,
    'materi_pembelajaran' => 'Sistem Tertanam dengan pokok bahasan:

1. Pengantar sistem tertanam dan karakteristiknya
2. Arsitektur sistem tertanam (hardware dan software)
3. Mikrokontroler dan mikroprosesor
4. Input/output pada sistem tertanam (sensor dan aktuator)
5. Pemrograman dasar mikrokontroler (C/Arduino)
6. Interfacing perangkat keras
7. Komunikasi antar perangkat (UART, I2C, SPI)
8. Sistem real-time dan konsep real-time operating system (RTOS)
9. Manajemen memori pada sistem tertanam
10. Desain sistem tertanam berbasis kebutuhan
11. Debugging dan pengujian sistem tertanam
12. Konsumsi daya dan optimasi energi
13. Internet of Things (IoT) dan integrasi sistem tertanam
14. Keamanan pada sistem tertanam
15. Studi kasus implementasi sistem tertanam
16. Tren perkembangan embedded system dan teknologi masa depan',

    'pustaka_utama' => '[1] Raj Kamal, Embedded Systems: Architecture, Programming and Design, 3rd Edition, McGraw-Hill, 2017.
[2] Jonathan W. Valvano, Embedded Systems: Real-Time Interfacing, 2011.
[3] Frank Vahid & Tony Givargis, Embedded System Design, Wiley, 2002.
[4] Michael J. Pont, Embedded C, Pearson, 2002.
[5] Wilmshurst, Tim, Designing Embedded Systems with PIC Microcontrollers, Newnes, 2007.',

    'pustaka_pendukung' => '[6] Dokumentasi Arduino dan Raspberry Pi
[7] Platform IoT (NodeMCU, ESP32)
[8] Tutorial embedded systems (YouTube, Coursera)
[9] Datasheet mikrokontroler
[10] Artikel dan jurnal terkait IoT dan embedded system',

    'jumlah_revisi' => 0,
    'isRevisi' => false,
    'tanggal_revisi' => null,
    'tanggal_disusun' => now()
],




            // ['id_rps' => 32, 'id_kurikulum' => 7, 'id_user' => 40, 'id_mk' => 32, 'tahun' => 2023, 'file_path' => 'rps/rps_32.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 33, 'id_kurikulum' => 7, 'id_user' => 40, 'id_mk' => 33, 'tahun' => 2025, 'file_path' => 'rps/rps_33.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 34, 'id_kurikulum' => 7, 'id_user' => 40, 'id_mk' => 34, 'tahun' => 2023, 'file_path' => 'rps/rps_34.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 35, 'id_kurikulum' => 7, 'id_user' => 40, 'id_mk' => 35, 'tahun' => 2024, 'file_path' => 'rps/rps_35.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 36, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 36, 'tahun' => 2023, 'file_path' => 'rps/rps_36.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 37, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 37, 'tahun' => 2025, 'file_path' => 'rps/rps_37.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 38, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 38, 'tahun' => 2023, 'file_path' => 'rps/rps_38.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 39, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 39, 'tahun' => 2024, 'file_path' => 'rps/rps_39.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 40, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 40, 'tahun' => 2023, 'file_path' => 'rps/rps_40.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 41, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 41, 'tahun' => 2025, 'file_path' => 'rps/rps_41.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 42, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 42, 'tahun' => 2023, 'file_path' => 'rps/rps_42.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 43, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 43, 'tahun' => 2024, 'file_path' => 'rps/rps_43.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 44, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 44, 'tahun' => 2023, 'file_path' => 'rps/rps_44.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 45, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 45, 'tahun' => 2025, 'file_path' => 'rps/rps_45.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Lanjutan untuk kurikulum 2025
            // // Teknik Sipil (id_ps = 1)
            // ['id_rps' => 46, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 46, 'tahun' => 2025, 'file_path' => 'rps/rps_46.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 47, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 47, 'tahun' => 2025, 'file_path' => 'rps/rps_47.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 48, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 48, 'tahun' => 2025, 'file_path' => 'rps/rps_48.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 49, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 49, 'tahun' => 2025, 'file_path' => 'rps/rps_49.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 50, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 50, 'tahun' => 2025, 'file_path' => 'rps/rps_50.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Pertambangan (id_ps = 2)
            // ['id_rps' => 51, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 51, 'tahun' => 2025, 'file_path' => 'rps/rps_51.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 52, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 52, 'tahun' => 2025, 'file_path' => 'rps/rps_52.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 53, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 53, 'tahun' => 2025, 'file_path' => 'rps/rps_53.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 54, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 54, 'tahun' => 2025, 'file_path' => 'rps/rps_54.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 55, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 55, 'tahun' => 2025, 'file_path' => 'rps/rps_55.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Mesin (id_ps = 3)
            // ['id_rps' => 56, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 56, 'tahun' => 2025, 'file_path' => 'rps/rps_56.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 57, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 57, 'tahun' => 2025, 'file_path' => 'rps/rps_57.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 58, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 58, 'tahun' => 2025, 'file_path' => 'rps/rps_58.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 59, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 59, 'tahun' => 2025, 'file_path' => 'rps/rps_59.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 60, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 60, 'tahun' => 2025, 'file_path' => 'rps/rps_60.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Lingkungan (id_ps = 4)
            // ['id_rps' => 61, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 61, 'tahun' => 2025, 'file_path' => 'rps/rps_61.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 62, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 62, 'tahun' => 2025, 'file_path' => 'rps/rps_62.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 63, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 63, 'tahun' => 2025, 'file_path' => 'rps/rps_63.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 64, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 64, 'tahun' => 2025, 'file_path' => 'rps/rps_64.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 65, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 65, 'tahun' => 2025, 'file_path' => 'rps/rps_65.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Arsitektur (id_ps = 5)
            // ['id_rps' => 66, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 66, 'tahun' => 2025, 'file_path' => 'rps/rps_66.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 67, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 67, 'tahun' => 2025, 'file_path' => 'rps/rps_67.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 68, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 68, 'tahun' => 2025, 'file_path' => 'rps/rps_68.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 69, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 69, 'tahun' => 2025, 'file_path' => 'rps/rps_69.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 70, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 70, 'tahun' => 2025, 'file_path' => 'rps/rps_70.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Kimia (id_ps = 6)
            // ['id_rps' => 71, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 71, 'tahun' => 2025, 'file_path' => 'rps/rps_71.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 72, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 72, 'tahun' => 2025, 'file_path' => 'rps/rps_72.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 73, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 73, 'tahun' => 2025, 'file_path' => 'rps/rps_73.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 74, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 74, 'tahun' => 2025, 'file_path' => 'rps/rps_74.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 75, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 75, 'tahun' => 2025, 'file_path' => 'rps/rps_75.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknologi Informasi (id_ps = 7)
//             ['id_rps' => 2, 'id_kaprodi' => 117, 'id_kurikulum' => 16, 'id_mk' => 80, 'id_model_pembelajaran' => 2, 'id_ps' => 7, 'materi_pembelajaran' => 'Desain User Experience dengan pokok bahasan: 
// 1. Pengantar dan Konsep Interaksi Manusia Komputer 
// 2. Prinsip Dasar IMK dan User Centered Design 
// 3. Aspek Psikologis dan Kognitif Pengguna 
// 4. Model Mental dalam Interaksi 
// 5. Teknik Pengumpulan Data 
// 6. Persona dan Skenario dalam UCD 
// 7. Wireframe dan Prototype Low-Fidelity 
// 8. Evaluasi Awal Desain dan Prinsip Usability 
// 9. Prinsip Usability dan User Experience dalam desain user interface 
// 10. Mockup dan High-Fidelity Prototype 
// 11. Pengujian usability 
// 12. Tren Teknologi dalam IMK 
// 13. Isu Etika dan Tanggung Jawab Desain Modern', 'pustaka_utama' => '[1] Dix, Alan et.al, HUMAN-COMPUTER INTERACTION, 2nd Edition, Prentice Hall, Europe, 1998. 
// [2] Galitz, W. O, The Essential Guide to User Inteface Design : An Introduction to GUI Design Principles and Techniques, John Wiley & 
// Sons, Canada, 1996. 
// [3] Johnson, P., HUMAN-COMPUTER INTERACTION : Psychology, Task Analysis and Software Engineering, McGraw-Hill, England 
// UK, 1992. 
// [4] Newman, W. M and Lamming, M. G, Interactive System Design, Addison Wesley, Cambrigde, Great Britain, 1995. 
// [5] P. Insap Santoso, Interaksi Manusia dan Komputer : Teori dan Praktek, Andi Offset, Yogyakarta, 2004. 
// [6] Raskin, J, The Human Interface, Addison Wesley, 2000 
// [7] Shneiderman, B, Designing The User Interface, 3rd Edition, Addison Wesley, 1998 
// Sutcliffe, A. G., HUMAN-COMPUTER INTERFACE DESIGN, 2ND Edition, MacMillan, London, 1995.', 'pustaka_pendukung' => '[9] B Hewett, Baecker, et.al, ACM SIGCHI Curricula for Human-Computer Interaction (folder : IMK-ACM.rar) 
// [10] Folder: IMK-cc-Gatech-edu.rar','jumlah_revisi' => 0, 'isRevisi' => false, 'tanggal_revisi' => null, 'tanggal_disusun' => now()],
            // ['id_rps' => 77, 'id_kurikulum' => 16, 'id_user' => 40, 'id_mk' => 77, 'tahun' => 2025, 'file_path' => 'rps/rps_77.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 78, 'id_kurikulum' => 16, 'id_user' => 40, 'id_mk' => 78, 'tahun' => 2025, 'file_path' => 'rps/rps_78.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 79, 'id_kurikulum' => 16, 'id_user' => 40, 'id_mk' => 79, 'tahun' => 2025, 'file_path' => 'rps/rps_79.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 80, 'id_kurikulum' => 16, 'id_user' => 40, 'id_mk' => 80, 'tahun' => 2025, 'file_path' => 'rps/rps_80.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Elektro (id_ps = 8)
            // ['id_rps' => 81, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 81, 'tahun' => 2025, 'file_path' => 'rps/rps_81.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 82, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 82, 'tahun' => 2025, 'file_path' => 'rps/rps_82.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 83, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 83, 'tahun' => 2025, 'file_path' => 'rps/rps_83.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 84, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 84, 'tahun' => 2025, 'file_path' => 'rps/rps_84.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 85, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 85, 'tahun' => 2025, 'file_path' => 'rps/rps_85.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Geologi (id_ps = 9)
            // ['id_rps' => 86, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 86, 'tahun' => 2025, 'file_path' => 'rps/rps_86.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 87, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 87, 'tahun' => 2025, 'file_path' => 'rps/rps_87.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 88, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 88, 'tahun' => 2025, 'file_path' => 'rps/rps_88.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 89, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 89, 'tahun' => 2025, 'file_path' => 'rps/rps_89.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 90, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 90, 'tahun' => 2025, 'file_path' => 'rps/rps_90.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

        ]);

    }
}
