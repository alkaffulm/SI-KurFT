<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;

class ProfilLulusanModel extends Model
{
    protected $table = 'profil_lulusan';
    protected $primaryKey = 'id_pl';
    public $timestamps = false;
    protected $fillable = [
        'id_pl',
        'id_kurikulum',
        'id_ps',
        'kode_pl',
        'nama_pl_id',
        'nama_pl_en',
        'desc_pl_id',
        'desc_pl_en',
        'profesi'
    ];

    protected static function booted(): void{
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }

    public function cpl(){
        return $this->belongsToMany(CPLModel::class, 'pl_cpl_map', 'id_pl', 'id_cpl');
    }

    public function programStudi(){
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    public function plpeomap(){
        return $this->hasMany(PLPEOMapModel::class, 'id_pl', 'id_pl');
    }

    public function cplpeomap(){
        return $this->hasMany(CPLPLMapModel::class, 'id_pl', 'id_pl');
    }
}
