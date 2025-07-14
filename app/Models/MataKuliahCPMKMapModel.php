<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliahCPMKMapModel extends Model
{
    protected $table = 'mata_kuliah_cpmk_map';
    protected $primaryKey = 'id_mk_cpmk';
    public $timestamps = false;
    protected $fillable = [
        'id_mk',
        'id_cpmk',
    ];

    // belongs to relation
    
    public function matakuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
    public function cpmk(){
        return $this->belongsTo(CPMKModel::class, 'id_cpmk', 'id_cpmk');
    }
}
