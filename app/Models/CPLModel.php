<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CPLModel extends Model
{
    protected $table = 'cpl';
    protected $primaryKey = 'id_cpl';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'id_kurikulum',
        'nama_kode_cpl',
        'desc',
        'bobot_maksimum',
    ];

    // has many relation
    public function pl_cpl(){
        return $this->hasMany(PLCPLMapModel::class, 'id_cpl', 'id_cpl');
    }
    public function bk_cpl(){
        return $this->hasMany(BKCPLMapModel::class, 'id_cpl', 'id_cpl');
    }

    public function mhs_cpl(){
        return $this->hasMany(MahasiswaCPLMapModel::class, 'id_cpl', 'id_cpl');
    }
    public function cpl_mk(){
        return $this->hasMany(MKCPLMapModel::class, 'id_cpl', 'id_cpl');
    }
    public function tpcpmkmap(){
        return $this->hasMany(TPCPMKMapModel::class, 'id_cpl', 'id_cpl');
    }

    // belongs to relation
    public function programstudi(){
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    public function kurikulum(){
        return $this->belongsTo(KurikulumModel::class, 'id_kurikulum', 'id_kurikulum');
    }
}
