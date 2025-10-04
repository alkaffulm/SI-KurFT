<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MataKuliahModel;

class KelasMahasiswaModel extends Model
{
    use HasFactory;

    protected $table = 'kelas_mahasiswa';
    protected $primaryKey = 'id_kelas_mahasiswa';
    public $timestamps = false;

    protected $fillable = [
        'id_kelas',
        // 'nama',
        'nim',
    ];

    // Relasi ke Mata Kuliah
    // public function mataKuliahModel()
    // {
    //     return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    // }

    // // Relasi ke User
    // public function userModel()
    // {
    //     return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    // }
    public function kelasModel()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'nim', 'nim');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }
}

