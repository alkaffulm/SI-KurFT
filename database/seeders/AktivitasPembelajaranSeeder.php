<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivitasPembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aktivitas_pembelajaran')->insert([
            ['id_aktivitas_pembelajaran' => 1, 'id_topic' => 1, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 2, 'id_topic' => 1, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 3, 'id_topic' => 1, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => 'Quiz 1 : 
Kuis formatif 
berisi soal pilihan 
ganda dan uraian terkait prinsip 
dasar IMK, 
ergonomi, dan 
usability '],
            ['id_aktivitas_pembelajaran' => 4, 'id_topic' => 2, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => 'Mengidentifikasi 
faktor penyebab 
kesalahan 
pengguna pada 
sebuah contoh 
antarmuka yang 
bermasalah'],
            ['id_aktivitas_pembelajaran' => 5, 'id_topic' => 2, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => 'Membaca pustaka 
terkait konsep 
psikologi kognitif 
dalam konteks 
IMK khususnya 
topik persepsi, 
perhatian, 
memori kerja, dan 
beban kognitif '],
            ['id_aktivitas_pembelajaran' => 6, 'id_topic' => 2, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 7, 'id_topic' => 3, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => 'Menganalisis satu 
aplikasi populer 
dan memetakan: 
(1) model mental 
pengguna, (2) 
sistem aktual, (3) 
sistem konseptual 
secara 
berkelompok'],
            ['id_aktivitas_pembelajaran' => 8, 'id_topic' => 3, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 9, 'id_topic' => 3, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => 'Mempresentasika
 n dan menilai 
hasil diskusi 
kelompok '],
            ['id_aktivitas_pembelajaran' => 10, 'id_topic' => 4, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => 'Menganalisis 
kasus 
pelanggaran etika 
pengumpulan 
data pengguna 
dan menuliskan 
rekomendasi 
perlindungan 
data yang sesuai'],
            ['id_aktivitas_pembelajaran' => 11, 'id_topic' => 4, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => 'membaca pustaka 
yang membahas 
teknik 
pengumpulan 
data pengguna 
dalam konteks 
User-Centered 
Design '],
            ['id_aktivitas_pembelajaran' => 12, 'id_topic' => 4, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 13, 'id_topic' => 5, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => 'Tugas 1: 
Membuat tugas 
terstruktur yang 
mencakup proses 
dimulai dari 
pengumpulan 
data pengguna 
hingga 
pembuatan 
persona dan 
skenario 
penggunaan  
secara 
berkelompok '],
            ['id_aktivitas_pembelajaran' => 14, 'id_topic' => 5, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 15, 'id_topic' => 5, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => 'Mempresentasika
 n hasil tugas 
kelompok dan 
menilai kelompok 
lain '],
            ['id_aktivitas_pembelajaran' => 16, 'id_topic' => 6, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => 'Tugas 2: 
Membuat desain 
wireframe low fidelity dari 
sebuah 
sistem/aplikasi 
sederhana secara 
berkelompok '],
            ['id_aktivitas_pembelajaran' => 17, 'id_topic' => 6, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 18, 'id_topic' => 6, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => 'Menilai dan 
mengevaluasi 
hasil desain 
wireframe 
kelompok lain 
dengan 10 prinsip 
heuristic usability '],
            ['id_aktivitas_pembelajaran' => 19, 'id_topic' => 7, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 20, 'id_topic' => 7, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 21, 'id_topic' => 7, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 22, 'id_topic' => 8, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => 'Tugas 3: 
Membuat mockup 
high-fidelity dan 
prototype 
interaktif dari 
tugas kelompok 
sebelumnya 
menggunakan 
tools yang tepat'],
            ['id_aktivitas_pembelajaran' => 23, 'id_topic' => 8, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 24, 'id_topic' => 8, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => 'Mempresentasika
 n hasil desain dan 
mendapatkan 
umpan balik dari 
pengguna 
(kelompok lain) '],
            ['id_aktivitas_pembelajaran' => 25, 'id_topic' => 9, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => 'Tugas 4: 
Melakukan 
pengujian 
usability terhadap 
prototype 
antarmuka yang 
telah dirancang 
menggunakan 
metode: SUS, 
Think Aloud, dan 
Heuristic 
Evaluation'],
            ['id_aktivitas_pembelajaran' => 26, 'id_topic' => 9, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 27, 'id_topic' => 9, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => 'Mempresentasika
 n hasil pengujian 
usability yang 
telah dilakukan 
dan mendapatkan 
umpan balik '],
            ['id_aktivitas_pembelajaran' => 28, 'id_topic' => 10, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 29, 'id_topic' => 10, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 30, 'id_topic' => 10, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => 'Quiz 2 :Kuis formatif 
berisi soal pilihan 
ganda dan uraian 
terkait tren terkini 
dalam IMK'],
            ['id_aktivitas_pembelajaran' => 31, 'id_topic' => 11, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 32, 'id_topic' => 11, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            ['id_aktivitas_pembelajaran' => 33, 'id_topic' => 11, 'tipe' => 'PT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => ''],
        ]);
    }
}
