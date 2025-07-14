<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CPMKModel extends Model
{
    protected $table = 'cpmk';
    protected $primaryKey = 'id_cpmk';
    public $timestamps = false;

    protected $fillable = [
        'id_mk',
        'nama_kode_cpmk',
        'kode_cpmk',
        'desc',
    ];

    // has many relation
    public function mk_cpmk(){
        return $this->hasMany(MataKuliahCPMKMapModel::class, 'id_cpmk', 'id_cpmk');
    }
    public function tpcpmkmap(){
        return $this->hasMany(TPCPMKMapModel::class, 'id_cpmk', 'id_cpmk');
    }
    public function cpmkcpl(){
        return $this->hasMany(CPMKCPLMapModel::class, 'id_cpmk', 'id_cpmk');
    }

    // belongs to relation
    public function mataKuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
}
