<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CPLPLMapModel extends Model
{
    protected $table = 'cpl_pl_map';
    protected $primaryKey = 'id_cpl_pl';
    public $timestamps = false;
    protected $fillable = [
        'id_cpl_pl',
        'id_pl',
        'id_cpl',
    ];

    public function pl(){
        return $this->belongsTo(ProfilLulusanModel::class, 'id_pl', 'id_pl');
    }
    public function peo(){
        return $this->belongsTo(CPLModel::class, 'id_cpl', 'id_cpl');
    }
}
