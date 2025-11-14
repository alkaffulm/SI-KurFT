<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenilaianMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'penilaian_mahasiswa';
    protected $primaryKey = 'id_penilaian_mhs';
    protected $fillable = [
        'id_kelas', 'nim', 'id_rencana_asesmen', 'id_cpmk', 'nilai'
    ];
}
