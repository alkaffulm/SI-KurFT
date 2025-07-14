<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PLCPLMapModel extends Model
{
    protected $table = 'pl_cpl_map';
    protected $primaryKey = 'id_pl_cpl';
    public $timestamps = false;
    protected $fillable = [
        'id_pl',
        'id_cpl',
    ];

    // belongs to relation
    public function pl(){
        return $this->belongsTo(ProfilLulusanModel::class, 'id_pl', 'id_pl');
    }
    public function cpl(){
        return $this->belongsTo(CPLModel::class, 'id_cpl', 'id_cpl');
    }
}
