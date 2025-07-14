<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaCPLMapModel extends Model
{
    protected $table = 'mahasiswa_cpl_map';
    protected $primaryKey = 'id_mhs_cpl';
    public $timestamps = false;
    protected $fillable = [
        'id_mhs',
        'id_cpl',
    ];

    // belongs to relation
    public function mahasiswa(){
        return $this->belongsTo(MahasiswaModel::class, 'id_mhs', 'id_mhs');
    }
    public function cpl(){
        return $this->belongsTo(CPLModel::class, 'id_cpl', 'id_cpl');
    }
}
