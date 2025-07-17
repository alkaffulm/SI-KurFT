<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCPMKModel extends Model
{
    protected $table = 'sub_cpmk';
    protected $primaryKey = 'id_sub_cpmk';
    public $timestamps = false;

    protected $fillable = [
        'id_cpmk',
        'nama_kode_sub_cpmk',
        'kode_sub_cpmk',
        'desc',
    ];
    // has many relation
    public function rps_detail(){
        return $this->hasMany(RPSDetailModel::class, 'id_sub_cpmk', 'id_sub_cpmk');
    }

    // belongs to relation
    public function mataKuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }

    public function cpmk() {
        return $this->belongsTo(CPMKModel::class, 'id_cpmk');
    }
}
