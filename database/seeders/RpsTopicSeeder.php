<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RpsTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rps_topics')->insert([
            // untuk RPS IMK Kurikulum 2020
            [
                'id_rps' => 1, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 91, 
                'teknik_penilaian_kategori' => 'test', 
                'indikator' => '1. Ketepatan dalam 
                                    menganalisa 
                                    relevansi IMK dalam 
                                    pengembangan 
                                    sistem dan 
                                    perangkat lunak 
                                    2. Ketepatan dalam 
                                    menjelaskan prinsip 
                                    ergonomis 
                                    3. Ketepatan dalam 
                                    mengidentifikasi 
                                    elemen desain UI 
                                    yang efektif ', 
                'materi_pembelajaran' => '1. Konsep dasar IMK dan 
                                            ruang lingkupnya 
                                            2. Sejarah perkembangan 
                                            IMK 
                                            3. Relevansi IMK dalam 
                                            rekayasa perangkat 
                                            lunak dan teknologi 
                                            interaktif 
                                            4. Prinsip ergonomi dalam 
                                            desain antarmuka 
                                            5. Karakteristik 
                                            antarmuka pengguna 
                                            yang efektif 
                                            6. Komponen dan elemen 
                                            UI (navigasi, tipografi, 
                                            warna, ikon) 
                                            7. Contoh UI yang baik 
                                            dan buruk ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            interaktif  
                                            • Diskusi 
                                            kelompok 
                                            • Studi Kasus 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Quiz 1 : 
                                            Kuis formatif 
                                            berisi soal pilihan 
                                            ganda dan uraian
                                            terkait prinsip 
                                            dasar IMK, 
                                            ergonomi, dan 
                                            usability 
                                            [BM: 1 x (1 sks x 
                                            60”)] ', 
                'bobot_penilaian' => 5
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 92, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan konsep 
                                    dasar psikologi 
                                    kognitif yang 
                                    relevan dengan IMK 
                                    2. Ketepatan dalam 
                                    menganalisis 
                                    dampak 
                                    keterbatasan kognitif 
                                    pengguna terhadap 
                                    efektivitas dan 
                                    efisiensi penggunaan 
                                    antarmuka 
                                    3. Ketepatan dalam 
                                    mengaitkan prinsip
                                    prinsip persepsi dan 
                                    atensi dengan desain 
                                    antarmuka yang 
                                    meminimalkan 
                                    beban kognitif. ', 
                'materi_pembelajaran' => '1. Pengenalan psikologi 
                                            kognitif dalam IMK 
                                            2. Persepsi visual dan 
                                            auditory pengguna 
                                            3. Perhatian (attention), 
                                            memori kerja, dan 
                                            keterbatasan kognitif 
                                            4. Beban kognitif dan 
                                            implikasinya dalam 
                                            desain 
                                            5. Reaksi pengguna 
                                            terhadap antarmuka: 
                                            frustrasi, kebingungan, 
                                            dan kenyamanan 
                                            kognitif  ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah dan 
                                            Tanya Jawab 
                                            • Simulasi Visual 
                                            • Diskusi Kelas 
                                            • Studi Kasus 
                                            Penugasan 
                                            Mahasiswa 
                                            Mengidentifikasi 
                                            faktor penyebab 
                                            kesalahan 
                                            pengguna pada 
                                            sebuah contoh 
                                            antarmuka yang 
                                            bermasalah 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Belajar Mandiri 
                                            (BM)
                                            Metode 
                                            Pembelajaran 
                                            Simulasi 
                                            interaktif 
                                            Penugasan 
                                            Mahasiswa 
                                            Membaca pustaka 
                                            terkait konsep 
                                            psikologi kognitif 
                                            dalam konteks 
                                            IMK khususnya 
                                            topik persepsi, 
                                            perhatian, 
                                            memori kerja, dan 
                                            beban kognitif 
                                            [BM: 1 x (1 sks x 
                                            60”)] 
                                            ', 
                'bobot_penilaian' => 2.5
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 92, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan konsep 
                                    dan peran model 
                                    mental dalam 
                                    interaksi manusia 
                                    dan komputer  
                                    2. Ketepatan dalam 
                                    menganalisis 
                                    kesenjangan antara 
                                    model mental 
                                    pengguna dan 
                                    representasi sistem 
                                    yang tersedia  
                                    3. Ketepatan dalam 
                                    mengevaluasi 
                                    contoh desain 
                                    antarmuka 
                                    berdasarkan 
                                    kesesuaian dengan 
                                    model mental 
                                    pengguna ', 
                'materi_pembelajaran' => '1. Pengertian model 
                                            mental: definisi dan 
                                            karakteristik 
                                            2. Perbedaan antara 
                                            sistem konseptual, 
                                            sistem  ctual, dan 
                                            model pengguna 
                                            3. Contoh kesalahan 
                                            desain akibat 
                                            miskomunikasi model 
                                            mental 
                                            4. Peran model mental 
                                            dalam usability dan 
                                            learnability
                                            5. Strategi desain untuk 
                                            menjembatani model 
                                            mental dan sistem ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah ™ 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            Interaktif 
                                            • Simulasi dan 
                                            Demonstrasi 
                                            • Diskusi 
                                            Kelompok 
                                            • Studi Kasus 
                                            Penugasan 
                                            Mahasiswa 
                                            Menganalisis satu 
                                            aplikasi populer 
                                            dan memetakan: 
                                            (1) model mental 
                                            pengguna, (2) 
                                            sistem aktual, (3) 
                                            sistem konseptual 
                                            secara 
                                            berkelompok 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Mempresentasika
                                            n dan menilai 
                                            hasil diskusi 
                                            kelompok 
                                            [PT: 1 x (1 sks x 
                                            60”)]
                                            ', 
                'bobot_penilaian' => 2.5
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 93, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan 
                                    berbagai teknik 
                                    pengumpulan data 
                                    pengguna yang 
                                    relevan dalam 
                                    proses perancangan 
                                    antarmuka 
                                    2. Ketepatan dalam 
                                    membandingkan 
                                    efektivitas metode 
                                    observasi, 
                                    wawancara, dan 
                                    kuesioner 
                                    berdasarkan 
                                    kebutuhan studi 
                                    3. Ketepatan dalam 
                                    merancang  
                                    instrumen sederhana 
                                    untuk 
                                    mengumpulkan data 
                                    pengguna secara etis 
                                    dan tepat sasaran ', 
                'materi_pembelajaran' => '1. Teknik pengumpulan 
                                            data pengguna: 
                                            observasi, wawancara, 
                                            kuesioner 
                                            2. Teknik studi konteks 
                                            dan lingkungan 
                                            penggunaan sistem
                                            3. Validitas dan 
                                            reliabilitas data 
                                            pengguna 
                                            4. Pemilihan teknik yang 
                                            tepat berdasarkan jenis 
                                            sistem atau pengguna 
                                            5. Etika dalam 
                                            pengumpulan data dan 
                                            perlindungan privasi 
                                            pengguna ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah dan 
                                            Tanya Jawab 
                                            • Simulasi 
                                            Praktik 
                                            • Diskusi Kelas 
                                            • Studi Kasus 
                                            Penugasan 
                                            Mahasiswa 
                                            Menganalisis 
                                            kasus 
                                            pelanggaran etika 
                                            pengumpulan 
                                            data pengguna 
                                            dan menuliskan 
                                            rekomendasi 
                                            perlindungan 
                                            data yang sesuai 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Belajar Mandiri 
                                            (BM) 
                                            Metode 
                                            Pembelajaran 
                                            Simulasi 
                                            interaktif 
                                            Penugasan 
                                            Mahasiswa 
                                            membaca pustaka 
                                            yang membahas 
                                            teknik 
                                            pengumpulan 
                                            data pengguna 
                                            dalam konteks
                                            User-Centered 
                                            Design  
                                            [BM: 1 x (1 sks x 
                                            60”)] ', 
                'bobot_penilaian' => 2.5
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 93, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan peran 
                                    persona, skenario, 
                                    dan user journey 
                                    dalam proses desain 
                                    antarmuka berpusat 
                                    pengguna 
                                    2. Ketepatan dalam 
                                    menginterpretasikan 
                                    data pengguna 
                                    menjadi persona 
                                    yang 
                                    merepresentasikan 
                                    kebutuhan dan 
                                    karakteristik nyata 
                                    3. Ketepatan dalam  
                                    menyusun skenario 
                                    penggunaan dan 
                                    user journey untuk 
                                    mendukung proses 
                                    desain sistem', 
                'materi_pembelajaran' => '1. Definisi dan elemen 
                                            utama persona 
                                            2. Teknik membangun 
                                            persona dari data 
                                            pengguna 
                                            3. Konsep skenario 
                                            penggunaan dan user 
                                            journey 
                                            4. Peran persona dan 
                                            skenario dalam User
                                            Centered Design 
                                            5. Studi kasus persona 
                                            dan skenario dalam 
                                            sistem nyata ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah ™ 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            Interaktif 
                                            • Simulasi dan 
                                            Praktik 
                                            • Diskusi 
                                            Kelompok 
                                            • Presentasi dan 
                                            Umpan Balik 
                                            Penugasan 
                                            Mahasiswa 
                                            Tugas 1: 
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
                                            berkelompok 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Mempresentasika
                                            n hasil tugas 
                                            kelompok dan 
                                            menilai kelompok 
                                            lain 
                                            [PT: 1 x (1 sks x 
                                            60”)] ', 
                'bobot_penilaian' => 7.5
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 94, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan fungsi 
                                    dan komponen dasar 
                                    dalam wireframe 
                                    sebagai alat 
                                    perancangan awal 
                                    antarmuka 
                                    2. Ketepatan dalam 
                                    membuat wireframe 
                                    low-fidelity 
                                    berdasarkan 
                                    kebutuhan 
                                    pengguna dan 
                                    skenario interaksi 
                                    3. Ketepatan dalam  
                                    melakukan evaluasi
                                    awal terhadap 
                                    wireframe 
                                    menggunakan 
                                    prinsip-prinsip 
                                    usability dasar  ', 
                'materi_pembelajaran' => '1. Definisi dan 
                                            karakteristik wireframe 
                                            2. Perbedaan wireframe, 
                                            mockup, dan prototype 
                                            3. Tools untuk desain 
                                            wireframe: Balsamiq, 
                                            Figma (low-fidelity 
                                            mode) 
                                            4. Elemen utama UI 
                                            dalam wireframe: 
                                            navigasi, tombol, form, 
                                            teks 
                                            5. Prinsip-prinsip 
                                            usability dasar: 
                                            visibility, consistency, 
                                            feedback 
                                            6. Evaluasi awal desain 
                                            dengan metode 
                                            heuristic evaluation 
                                            7. Penerapan feedback 
                                            untuk perbaikan desain 
                                            awal', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            Interaktif 
                                            • Simulasi dan 
                                            Praktik 
                                            • Presentasi dan 
                                            Umpan Balik 
                                            
                                            Penugasan 
                                            Mahasiswa 
                                            Tugas 2: 
                                            Membuat desain 
                                            wireframe low
                                            fidelity dari 
                                            sebuah 
                                            sistem/aplikasi 
                                            sederhana secara 
                                            berkelompok 
                                            [TM: (1+1) x (2 
                                            sks x 50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Menilai dan 
                                            mengevaluasi 
                                            hasil desain 
                                            wireframe 
                                            kelompok lain 
                                            dengan 10 prinsip 
                                            heuristic usability 
                                            [PT: (1+1) x (1 
                                            sks x 60”)] ', 
                'bobot_penilaian' => 10
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'uts', 
                'id_sub_cpmk' => null, 
                'teknik_penilaian_kategori' => null, 
                'indikator' => null, 
                'materi_pembelajaran' => null, 
                'metode_pembelajaran' => null, 
                'bobot_penilaian' => 15
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 95, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan proses 
                                    desain antarmuka 
                                    high-fidelity dan 
                                    komponennya secara 
                                    sistematis 
                                    2. Ketepatan dalam 
                                    mengintegrasikan 
                                    prinsip usability dan 
                                    UX ke dalam elemen 
                                    visual dan struktur 
                                    antarmuka 
                                    3. Ketepatan dalam 
                                    merancang dan 
                                    mengembangkan 
                                    prototype high
                                    fidelity interaktif 
                                    dengan visualisasi 
                                    estetis  ', 
                'materi_pembelajaran' => '1. Perbedaan dan 
                                            keterkaitan: wireframe, 
                                            mockup, dan prototype 
                                            2. Elemen desain visual: 
                                            layout, tipografi, 
                                            ikonografi, warna, 
                                            kontras 
                                            3. Prinsip usability dan 
                                            UX: konsistensi, 
                                            keterbacaan, efisiensi, 
                                            kepuasan pengguna 
                                            4. Tools desain high
                                            fidelity: Figma, Adobe 
                                            XD 
                                            5. Interaktivitas dalam 
                                            prototype: linking, 
                                            transisi, tombol, efek 
                                            hover 
                                            6. Strategi 
                                            penyempurnaan desain 
                                            berdasarkan feedback 
                                            usability 
                                            7. Studi kasus antarmuka 
                                            aplikasi nyata', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            Interaktif 
                                            • Demonstrasi 
                                            tools
                                            • Simulasi dan 
                                            Praktik 
                                            • Diskusi 
                                            Kelompok 
                                            • Presentasi dan 
                                            Umpan Balik 
                                            
                                            Penugasan 
                                            Mahasiswa 
                                            Tugas 3: 
                                            Membuat mockup 
                                            high-fidelity dan 
                                            prototype 
                                            interaktif dari 
                                            tugas kelompok 
                                            sebelumnya 
                                            menggunakan 
                                            tools yang tepat 
                                            [TM: (1+1+1) x 
                                            (2 sks x 50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Mempresentasika
                                            n hasil desain dan 
                                            mendapatkan 
                                            umpan balik dari 
                                            pengguna 
                                            (kelompok lain) 
                                            [PT: (1+1) x (1 
                                            sks x 60”)]
                                            ', 
                'bobot_penilaian' => 15
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 96, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan metode 
                                    pengujian usability 
                                    dan fungsinya 
                                    dalam evaluasi 
                                    desain antarmuka 
                                    2. Ketepatan dalam 
                                    melaksanakan 
                                    pengujian usability 
                                    terhadap prototype 
                                    dan mengumpulkan 
                                    data dari pengguna 
                                    secara sistematis 
                                    3. Ketepatan dalam 
                                    menyusun 
                                    rekomendasi 
                                    perbaikan desain 
                                    berdasarkan hasil 
                                    pengujian usability 
                                    dan prinsip user
                                    centered design ', 
                'materi_pembelajaran' => '1. Prinsip dasar pengujian 
                                            usability: learnability, 
                                            efficiency, error rate, 
                                            satisfaction 
                                            2. Metode evaluasi: Think 
                                            Aloud Protocol, System 
                                            Usability Scale (SUS), 
                                            Heuristic Evaluation 
                                            3. Teknik pencatatan dan 
                                            pengumpulan data 
                                            (form observasi, task 
                                            log, kuisioner SUS) 
                                            4. Analisis hasil 
                                            pengujian: pain points, 
                                            task failure, waktu 
                                            penyelesaian, feedback 
                                            pengguna 
                                            5. Penyusunan laporan 
                                            usability testing 
                                            6. Perumusan 
                                            rekomendasi desain 
                                            berdasarkan temuan 
                                            pengujian ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah dan 
                                            Studi Kasus 
                                            • Simulasi dan 
                                            Praktik 
                                            • Diskusi 
                                            Kelompok 
                                            • Presentasi dan 
                                            Umpan Balik 
                                            
                                            Penugasan 
                                            Mahasiswa 
                                            Tugas 4: 
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
                                            Evaluation 
                                            [TM: (1+1+1) x 
                                            (2 sks x 50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Mempresentasika
                                            n hasil pengujian 
                                            usability yang 
                                            telah dilakukan 
                                            dan mendapatkan 
                                            umpan balik 
                                            [PT: (1+1) x (1 
                                            sks x 60”)] ', 
                'bobot_penilaian' => 15
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 97, 
                'teknik_penilaian_kategori' => 'test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan tren 
                                    dan teknologi 
                                    terbaru dalam IMK 
                                    dan potensinya 
                                    terhadap desain 
                                    antarmuka 
                                    2. Ketepatan dalam 
                                    menganalisis 
                                    tantangan dan 
                                    implikasi etika dari 
                                    penggunaan 
                                    teknologi interaktif 
                                    terkini dalam desain 
                                    sistem  
                                    3. Ketepatan dalam 
                                    menyusun gagasan 
                                    desain yang inovatif 
                                    dan etis berdasarkan 
                                    pemahaman
                                    terhadap tren dan 
                                    isu dalam IMK', 
                'materi_pembelajaran' => '1. Tren teknologi dalam 
                                            IMK: Gesture-based 
                                            interaction, Voice User 
                                            Interface (VUI), 
                                            Augmented Reality (AR) 
                                            dan Virtual Reality (VR), 
                                            Wearable computing, 
                                            antarmuka imersif,  
                                            2. Potensi dan penerapan 
                                            teknologi baru dalam 
                                            kehidupan sehari-hari 
                                            3. Tantangan desain baru: 
                                            kognitif, emosional, 
                                            fisik 
                                            4. Isu etika dalam desain 
                                            antarmuka:', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            interaktif  
                                            • Diskusi 
                                            kelompok 
                                            • Studi Kasus 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Quiz 2 :
                                            Kuis formatif 
                                            berisi soal pilihan 
                                            ganda dan uraian 
                                            terkait tren terkini 
                                            dalam IMK 
                                            [BM: 1 x (1 sks x 
                                            60”)] ', 
                'bobot_penilaian' => 5
            ],
            [
                'id_rps' => 1, 
                'tipe' => 'uas', 
                'id_sub_cpmk' => null, 
                'teknik_penilaian_kategori' => null, 
                'indikator' => null, 
                'materi_pembelajaran' => null, 
                'metode_pembelajaran' => null, 
                'bobot_penilaian' => 20
            ],

            // untuk RPS IMK Kurikulum 2025
            [
                'id_rps' => 2, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 226, 
                'teknik_penilaian_kategori' => 'test', 
                'indikator' => '1. Ketepatan dalam 
                                    menganalisa 
                                    relevansi IMK dalam 
                                    pengembangan 
                                    sistem dan 
                                    perangkat lunak 
                                    2. Ketepatan dalam 
                                    menjelaskan prinsip 
                                    ergonomis 
                                    3. Ketepatan dalam 
                                    mengidentifikasi 
                                    elemen desain UI 
                                    yang efektif ', 
                'materi_pembelajaran' => '1. Konsep dasar IMK dan 
                                            ruang lingkupnya 
                                            2. Sejarah perkembangan 
                                            IMK 
                                            3. Relevansi IMK dalam 
                                            rekayasa perangkat 
                                            lunak dan teknologi 
                                            interaktif 
                                            4. Prinsip ergonomi dalam 
                                            desain antarmuka 
                                            5. Karakteristik 
                                            antarmuka pengguna 
                                            yang efektif 
                                            6. Komponen dan elemen 
                                            UI (navigasi, tipografi, 
                                            warna, ikon) 
                                            7. Contoh UI yang baik 
                                            dan buruk ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            interaktif  
                                            • Diskusi 
                                            kelompok 
                                            • Studi Kasus 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Quiz 1 : 
                                            Kuis formatif 
                                            berisi soal pilihan 
                                            ganda dan uraian
                                            terkait prinsip 
                                            dasar IMK, 
                                            ergonomi, dan 
                                            usability 
                                            [BM: 1 x (1 sks x 
                                            60”)] ', 
                'bobot_penilaian' => 5
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 227, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan konsep 
                                    dasar psikologi 
                                    kognitif yang 
                                    relevan dengan IMK 
                                    2. Ketepatan dalam 
                                    menganalisis 
                                    dampak 
                                    keterbatasan kognitif 
                                    pengguna terhadap 
                                    efektivitas dan 
                                    efisiensi penggunaan 
                                    antarmuka 
                                    3. Ketepatan dalam 
                                    mengaitkan prinsip
                                    prinsip persepsi dan 
                                    atensi dengan desain 
                                    antarmuka yang 
                                    meminimalkan 
                                    beban kognitif. ', 
                'materi_pembelajaran' => '1. Pengenalan psikologi 
                                            kognitif dalam IMK 
                                            2. Persepsi visual dan 
                                            auditory pengguna 
                                            3. Perhatian (attention), 
                                            memori kerja, dan 
                                            keterbatasan kognitif 
                                            4. Beban kognitif dan 
                                            implikasinya dalam 
                                            desain 
                                            5. Reaksi pengguna 
                                            terhadap antarmuka: 
                                            frustrasi, kebingungan, 
                                            dan kenyamanan 
                                            kognitif  ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah dan 
                                            Tanya Jawab 
                                            • Simulasi Visual 
                                            • Diskusi Kelas 
                                            • Studi Kasus 
                                            Penugasan 
                                            Mahasiswa 
                                            Mengidentifikasi 
                                            faktor penyebab 
                                            kesalahan 
                                            pengguna pada 
                                            sebuah contoh 
                                            antarmuka yang 
                                            bermasalah 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Belajar Mandiri 
                                            (BM)
                                            Metode 
                                            Pembelajaran 
                                            Simulasi 
                                            interaktif 
                                            Penugasan 
                                            Mahasiswa 
                                            Membaca pustaka 
                                            terkait konsep 
                                            psikologi kognitif 
                                            dalam konteks 
                                            IMK khususnya 
                                            topik persepsi, 
                                            perhatian, 
                                            memori kerja, dan 
                                            beban kognitif 
                                            [BM: 1 x (1 sks x 
                                            60”)] 
                                            ', 
                'bobot_penilaian' => 2.5
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 227, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan konsep 
                                    dan peran model 
                                    mental dalam 
                                    interaksi manusia 
                                    dan komputer  
                                    2. Ketepatan dalam 
                                    menganalisis 
                                    kesenjangan antara 
                                    model mental 
                                    pengguna dan 
                                    representasi sistem 
                                    yang tersedia  
                                    3. Ketepatan dalam 
                                    mengevaluasi 
                                    contoh desain 
                                    antarmuka 
                                    berdasarkan 
                                    kesesuaian dengan 
                                    model mental 
                                    pengguna ', 
                'materi_pembelajaran' => '1. Pengertian model 
                                            mental: definisi dan 
                                            karakteristik 
                                            2. Perbedaan antara 
                                            sistem konseptual, 
                                            sistem  ctual, dan 
                                            model pengguna 
                                            3. Contoh kesalahan 
                                            desain akibat 
                                            miskomunikasi model 
                                            mental 
                                            4. Peran model mental 
                                            dalam usability dan 
                                            learnability
                                            5. Strategi desain untuk 
                                            menjembatani model 
                                            mental dan sistem ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah ™ 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            Interaktif 
                                            • Simulasi dan 
                                            Demonstrasi 
                                            • Diskusi 
                                            Kelompok 
                                            • Studi Kasus 
                                            Penugasan 
                                            Mahasiswa 
                                            Menganalisis satu 
                                            aplikasi populer 
                                            dan memetakan: 
                                            (1) model mental 
                                            pengguna, (2) 
                                            sistem aktual, (3) 
                                            sistem konseptual 
                                            secara 
                                            berkelompok 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Mempresentasika
                                            n dan menilai 
                                            hasil diskusi 
                                            kelompok 
                                            [PT: 1 x (1 sks x 
                                            60”)]
                                            ', 
                'bobot_penilaian' => 2.5
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 228, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan 
                                    berbagai teknik 
                                    pengumpulan data 
                                    pengguna yang 
                                    relevan dalam 
                                    proses perancangan 
                                    antarmuka 
                                    2. Ketepatan dalam 
                                    membandingkan 
                                    efektivitas metode 
                                    observasi, 
                                    wawancara, dan 
                                    kuesioner 
                                    berdasarkan 
                                    kebutuhan studi 
                                    3. Ketepatan dalam 
                                    merancang  
                                    instrumen sederhana 
                                    untuk 
                                    mengumpulkan data 
                                    pengguna secara etis 
                                    dan tepat sasaran ', 
                'materi_pembelajaran' => '1. Teknik pengumpulan 
                                            data pengguna: 
                                            observasi, wawancara, 
                                            kuesioner 
                                            2. Teknik studi konteks 
                                            dan lingkungan 
                                            penggunaan sistem
                                            3. Validitas dan 
                                            reliabilitas data 
                                            pengguna 
                                            4. Pemilihan teknik yang 
                                            tepat berdasarkan jenis 
                                            sistem atau pengguna 
                                            5. Etika dalam 
                                            pengumpulan data dan 
                                            perlindungan privasi 
                                            pengguna ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah dan 
                                            Tanya Jawab 
                                            • Simulasi 
                                            Praktik 
                                            • Diskusi Kelas 
                                            • Studi Kasus 
                                            Penugasan 
                                            Mahasiswa 
                                            Menganalisis 
                                            kasus 
                                            pelanggaran etika 
                                            pengumpulan 
                                            data pengguna 
                                            dan menuliskan 
                                            rekomendasi 
                                            perlindungan 
                                            data yang sesuai 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Belajar Mandiri 
                                            (BM) 
                                            Metode 
                                            Pembelajaran 
                                            Simulasi 
                                            interaktif 
                                            Penugasan 
                                            Mahasiswa 
                                            membaca pustaka 
                                            yang membahas 
                                            teknik 
                                            pengumpulan 
                                            data pengguna 
                                            dalam konteks
                                            User-Centered 
                                            Design  
                                            [BM: 1 x (1 sks x 
                                            60”)] ', 
                'bobot_penilaian' => 2.5
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 228, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan peran 
                                    persona, skenario, 
                                    dan user journey 
                                    dalam proses desain 
                                    antarmuka berpusat 
                                    pengguna 
                                    2. Ketepatan dalam 
                                    menginterpretasikan 
                                    data pengguna 
                                    menjadi persona 
                                    yang 
                                    merepresentasikan 
                                    kebutuhan dan 
                                    karakteristik nyata 
                                    3. Ketepatan dalam  
                                    menyusun skenario 
                                    penggunaan dan 
                                    user journey untuk 
                                    mendukung proses 
                                    desain sistem', 
                'materi_pembelajaran' => '1. Definisi dan elemen 
                                            utama persona 
                                            2. Teknik membangun 
                                            persona dari data 
                                            pengguna 
                                            3. Konsep skenario 
                                            penggunaan dan user 
                                            journey 
                                            4. Peran persona dan 
                                            skenario dalam User
                                            Centered Design 
                                            5. Studi kasus persona 
                                            dan skenario dalam 
                                            sistem nyata ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah ™ 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            Interaktif 
                                            • Simulasi dan 
                                            Praktik 
                                            • Diskusi 
                                            Kelompok 
                                            • Presentasi dan 
                                            Umpan Balik 
                                            Penugasan 
                                            Mahasiswa 
                                            Tugas 1: 
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
                                            berkelompok 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Mempresentasika
                                            n hasil tugas 
                                            kelompok dan 
                                            menilai kelompok 
                                            lain 
                                            [PT: 1 x (1 sks x 
                                            60”)] ', 
                'bobot_penilaian' => 7.5
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 229, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan fungsi 
                                    dan komponen dasar 
                                    dalam wireframe 
                                    sebagai alat 
                                    perancangan awal 
                                    antarmuka 
                                    2. Ketepatan dalam 
                                    membuat wireframe 
                                    low-fidelity 
                                    berdasarkan 
                                    kebutuhan 
                                    pengguna dan 
                                    skenario interaksi 
                                    3. Ketepatan dalam  
                                    melakukan evaluasi
                                    awal terhadap 
                                    wireframe 
                                    menggunakan 
                                    prinsip-prinsip 
                                    usability dasar  ', 
                'materi_pembelajaran' => '1. Definisi dan 
                                            karakteristik wireframe 
                                            2. Perbedaan wireframe, 
                                            mockup, dan prototype 
                                            3. Tools untuk desain 
                                            wireframe: Balsamiq, 
                                            Figma (low-fidelity 
                                            mode) 
                                            4. Elemen utama UI 
                                            dalam wireframe: 
                                            navigasi, tombol, form, 
                                            teks 
                                            5. Prinsip-prinsip 
                                            usability dasar: 
                                            visibility, consistency, 
                                            feedback 
                                            6. Evaluasi awal desain 
                                            dengan metode 
                                            heuristic evaluation 
                                            7. Penerapan feedback 
                                            untuk perbaikan desain 
                                            awal', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            Interaktif 
                                            • Simulasi dan 
                                            Praktik 
                                            • Presentasi dan 
                                            Umpan Balik 
                                            
                                            Penugasan 
                                            Mahasiswa 
                                            Tugas 2: 
                                            Membuat desain 
                                            wireframe low
                                            fidelity dari 
                                            sebuah 
                                            sistem/aplikasi 
                                            sederhana secara 
                                            berkelompok 
                                            [TM: (1+1) x (2 
                                            sks x 50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Menilai dan 
                                            mengevaluasi 
                                            hasil desain 
                                            wireframe 
                                            kelompok lain 
                                            dengan 10 prinsip 
                                            heuristic usability 
                                            [PT: (1+1) x (1 
                                            sks x 60”)] ', 
                'bobot_penilaian' => 10
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'uts', 
                'id_sub_cpmk' => null, 
                'teknik_penilaian_kategori' => null, 
                'indikator' => null, 
                'materi_pembelajaran' => null, 
                'metode_pembelajaran' => null, 
                'bobot_penilaian' => 15
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 230, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan proses 
                                    desain antarmuka 
                                    high-fidelity dan 
                                    komponennya secara 
                                    sistematis 
                                    2. Ketepatan dalam 
                                    mengintegrasikan 
                                    prinsip usability dan 
                                    UX ke dalam elemen 
                                    visual dan struktur 
                                    antarmuka 
                                    3. Ketepatan dalam 
                                    merancang dan 
                                    mengembangkan 
                                    prototype high
                                    fidelity interaktif 
                                    dengan visualisasi 
                                    estetis  ', 
                'materi_pembelajaran' => '1. Perbedaan dan 
                                            keterkaitan: wireframe, 
                                            mockup, dan prototype 
                                            2. Elemen desain visual: 
                                            layout, tipografi, 
                                            ikonografi, warna, 
                                            kontras 
                                            3. Prinsip usability dan 
                                            UX: konsistensi, 
                                            keterbacaan, efisiensi, 
                                            kepuasan pengguna 
                                            4. Tools desain high
                                            fidelity: Figma, Adobe 
                                            XD 
                                            5. Interaktivitas dalam 
                                            prototype: linking, 
                                            transisi, tombol, efek 
                                            hover 
                                            6. Strategi 
                                            penyempurnaan desain 
                                            berdasarkan feedback 
                                            usability 
                                            7. Studi kasus antarmuka 
                                            aplikasi nyata', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            Interaktif 
                                            • Demonstrasi 
                                            tools
                                            • Simulasi dan 
                                            Praktik 
                                            • Diskusi 
                                            Kelompok 
                                            • Presentasi dan 
                                            Umpan Balik 
                                            
                                            Penugasan 
                                            Mahasiswa 
                                            Tugas 3: 
                                            Membuat mockup 
                                            high-fidelity dan 
                                            prototype 
                                            interaktif dari 
                                            tugas kelompok 
                                            sebelumnya 
                                            menggunakan 
                                            tools yang tepat 
                                            [TM: (1+1+1) x 
                                            (2 sks x 50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Mempresentasika
                                            n hasil desain dan 
                                            mendapatkan 
                                            umpan balik dari 
                                            pengguna 
                                            (kelompok lain) 
                                            [PT: (1+1) x (1 
                                            sks x 60”)]
                                            ', 
                'bobot_penilaian' => 15
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 231, 
                'teknik_penilaian_kategori' => 'non-test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan metode 
                                    pengujian usability 
                                    dan fungsinya 
                                    dalam evaluasi 
                                    desain antarmuka 
                                    2. Ketepatan dalam 
                                    melaksanakan 
                                    pengujian usability 
                                    terhadap prototype 
                                    dan mengumpulkan 
                                    data dari pengguna 
                                    secara sistematis 
                                    3. Ketepatan dalam 
                                    menyusun 
                                    rekomendasi 
                                    perbaikan desain 
                                    berdasarkan hasil 
                                    pengujian usability 
                                    dan prinsip user
                                    centered design ', 
                'materi_pembelajaran' => '1. Prinsip dasar pengujian 
                                            usability: learnability, 
                                            efficiency, error rate, 
                                            satisfaction 
                                            2. Metode evaluasi: Think 
                                            Aloud Protocol, System 
                                            Usability Scale (SUS), 
                                            Heuristic Evaluation 
                                            3. Teknik pencatatan dan 
                                            pengumpulan data 
                                            (form observasi, task 
                                            log, kuisioner SUS) 
                                            4. Analisis hasil 
                                            pengujian: pain points, 
                                            task failure, waktu 
                                            penyelesaian, feedback 
                                            pengguna 
                                            5. Penyusunan laporan 
                                            usability testing 
                                            6. Perumusan 
                                            rekomendasi desain 
                                            berdasarkan temuan 
                                            pengujian ', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah dan 
                                            Studi Kasus 
                                            • Simulasi dan 
                                            Praktik 
                                            • Diskusi 
                                            Kelompok 
                                            • Presentasi dan 
                                            Umpan Balik 
                                            
                                            Penugasan 
                                            Mahasiswa 
                                            Tugas 4: 
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
                                            Evaluation 
                                            [TM: (1+1+1) x 
                                            (2 sks x 50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Mempresentasika
                                            n hasil pengujian 
                                            usability yang 
                                            telah dilakukan 
                                            dan mendapatkan 
                                            umpan balik 
                                            [PT: (1+1) x (1 
                                            sks x 60”)] ', 
                'bobot_penilaian' => 15
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'topik', 
                'id_sub_cpmk' => 232, 
                'teknik_penilaian_kategori' => 'test', 
                'indikator' => '1. Ketepatan dalam 
                                    menjelaskan tren 
                                    dan teknologi 
                                    terbaru dalam IMK 
                                    dan potensinya 
                                    terhadap desain 
                                    antarmuka 
                                    2. Ketepatan dalam 
                                    menganalisis 
                                    tantangan dan 
                                    implikasi etika dari 
                                    penggunaan 
                                    teknologi interaktif 
                                    terkini dalam desain 
                                    sistem  
                                    3. Ketepatan dalam 
                                    menyusun gagasan 
                                    desain yang inovatif 
                                    dan etis berdasarkan 
                                    pemahaman
                                    terhadap tren dan 
                                    isu dalam IMK', 
                'materi_pembelajaran' => '1. Tren teknologi dalam 
                                            IMK: Gesture-based 
                                            interaction, Voice User 
                                            Interface (VUI), 
                                            Augmented Reality (AR) 
                                            dan Virtual Reality (VR), 
                                            Wearable computing, 
                                            antarmuka imersif,  
                                            2. Potensi dan penerapan 
                                            teknologi baru dalam 
                                            kehidupan sehari-hari 
                                            3. Tantangan desain baru: 
                                            kognitif, emosional, 
                                            fisik 
                                            4. Isu etika dalam desain 
                                            antarmuka:', 
                'metode_pembelajaran' => 'Bentuk 
                                            Pembelajaran 
                                            Kuliah (TM) 
                                            Metode 
                                            Pembelajaran 
                                            • Ceramah 
                                            interaktif  
                                            • Diskusi 
                                            kelompok 
                                            • Studi Kasus 
                                            [TM: 1 x (2 sks x 
                                            50”)] 
                                            
                                            Bentuk 
                                            Pembelajaran 
                                            Penugasan 
                                            Terstruktur (PT) 
                                            Penugasan 
                                            Mahasiswa 
                                            Quiz 2 :
                                            Kuis formatif 
                                            berisi soal pilihan 
                                            ganda dan uraian 
                                            terkait tren terkini 
                                            dalam IMK 
                                            [BM: 1 x (1 sks x 
                                            60”)] ', 
                'bobot_penilaian' => 5
            ],
            [
                'id_rps' => 2, 
                'tipe' => 'uas', 
                'id_sub_cpmk' => null, 
                'teknik_penilaian_kategori' => null, 
                'indikator' => null, 
                'materi_pembelajaran' => null, 
                'metode_pembelajaran' => null, 
                'bobot_penilaian' => 20
            ],
        ]);
    }
}
