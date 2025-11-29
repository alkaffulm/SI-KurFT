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
        'jumlah_mhs',
        'excel_daftar_mahasiswa'
    ];

    public function mataKuliahModel()
    {
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }

    public function userModel()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
    public function kelasMahasiswaModel()
    {
        return $this->hasMany(KelasMahasiswaModel::class, 'id_kelas', 'id_kelas');
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(
            MahasiswaModel::class,
            'kelas_mahasiswa', 
            'id_kelas',       
            'nim',            
            'id_kelas',       
            'nim'             
        );
    }
}

