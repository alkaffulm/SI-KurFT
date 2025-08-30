<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MataKuliahModel;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;

    protected $fillable = [
        'id_tahun_akademik',
        'id_kurikulum',
        'id_mk',
        'id_user',
        'paralel_ke',
        'hari',
        'jam',
        'ruangan',
        'jumlah_mhs'
    ];

    // Relasi ke Mata Kuliah
    public function mataKuliahModel()
    {
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }

    // Relasi ke User
    public function userModel()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}

