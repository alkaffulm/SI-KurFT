<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mhs';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'nim',
        'angkatan',
    ];

    // has many relation
    public function mhs_mk(){
        return $this->hasMany(MahasiswaMataKuliahMapModel::class, 'id_mhs', 'id_mhs');
    }
    public function mhs_cpl(){
        return $this->hasMany(MahasiswaCPLMapModel::class, 'id_mhs', 'id_mhs');
    }

    // belong to relation
    public function programstudi(){
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
}
