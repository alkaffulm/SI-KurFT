<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPCPMKMapModel extends Model
{
    protected $table = 'tp_cpmk_map';
    protected $primaryKey = 'id_tp_cpmk';
    public $timestamps = false;
    protected $fillable = [
        'id_ra',
        'id_tp',
        'id_cpl',
        'id_cpmk',
        'id_mk',
    ];


    // belongs to relation
    public function rubrikanalitik(){
        return $this->belongsTo(RubrikAnalitikModel::class, 'id_ra', 'id_ra');
    }
    public function teknikpenilaian(){
        return $this->belongsTo(TeknikPenilaianModel::class, 'id_tp', 'id_tp');
    }
    
    public function cpl(){
        return $this->belongsTo(CPLModel::class, 'id_cpl', 'id_cpl');
    }
    public function cpmk(){
        return $this->belongsTo(CPMKModel::class, 'id_cpmk', 'id_cpmk');
    }
    public function matakuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
}
