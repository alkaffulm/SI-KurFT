<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaMataKuliahMapModel extends Model
{
    protected $table = 'mahasiswa_mata_kuliah_map';
    protected $primaryKey = 'id_mhs_mk';
    public $timestamps = false;
    protected $fillable = [
        'id_mhs',
        'id_mk',
    ];

    // belongs to relation
    public function mahasiswa(){
        return $this->belongsTo(MahasiswaModel::class, 'id_mhs', 'id_mhs');
    }
    public function matakuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
}
