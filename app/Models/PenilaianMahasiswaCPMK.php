<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenilaianMahasiswaCPMK extends Model
{
    protected $table = 'penilaian_mahasiswa_cpmk';
    protected $primaryKey = 'id_penilaian_cpmk';
    protected $fillable = [
        'id_kelas', 'id_mhs', 'id_cpmk', 'nilai_rata'
    ];
}
