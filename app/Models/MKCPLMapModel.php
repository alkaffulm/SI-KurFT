<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKCPLMapModel extends Model
{
    protected $table = 'mk_cpl_map';
    protected $primaryKey = 'id_mk_cpl';
    public $timestamps = false;
    protected $fillable = [
        'id_cpl',
        'id_mk',
    ];

    // belongs to relation
    public function cpl(){
        return $this->belongsTo(CPLModel::class, 'id_cpl', 'id_cpl');
    }
    public function matakuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
}
