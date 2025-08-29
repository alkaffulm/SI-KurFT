<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MK_CPMK_CPL_MapModel extends Model
{
    protected $table = 'mk_cpmk_cpl_map';
    protected $primaryKey = 'id_mk_cpmk_cpl';
    public $timestamps = false;
    protected $fillable = [
        'id_cpl',
        'id_mk',
        'id_cpmk'
    ];

    public function cpl(){
        return $this->belongsTo(CPLModel::class, 'id_cpl', 'id_cpl');
    }
    public function matakuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }

    public function cpmk(){
        return $this->belongsTo(CPMKModel::class, 'id_cpmk', 'id_cpmk');
    }
}
