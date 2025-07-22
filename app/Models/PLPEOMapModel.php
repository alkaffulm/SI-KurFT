<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PLPEOMapModel extends Model
{
    protected $table = 'pl_peo_map';
    protected $primaryKey = 'id_pl_peo';
    public $timestamps = false;
    protected $fillable = [
        'id_pl',
        'id_peo',
    ];

    public function pl(){
        return $this->belongsTo(ProfilLulusanModel::class, 'id_pl', 'id_pl');
    }
    public function peo(){
        return $this->belongsTo(PEOModel::class, 'id_peo', 'id_peo');
    }
}
