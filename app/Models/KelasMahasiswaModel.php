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

