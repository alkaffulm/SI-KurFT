<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilLulusanModel extends Model
{
    protected $table = 'profil_lulusan';
    protected $primaryKey = 'id_pl';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'profil_lulusan',
        'desc',
    ];

    // has many relation
    public function pl_cpl(){
        return $this->hasMany(PLCPLMapModel::class, 'id_pl', 'id_pl');
    }

    // belong to relation
    public function programStudi(){
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
}
