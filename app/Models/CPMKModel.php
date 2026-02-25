<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;

class CPMKModel extends Model
{
    protected $table = 'cpmk';
    protected $primaryKey = 'id_cpmk';
    public $timestamps = false;

    protected $fillable = [
        'id_ps',
        'id_kurikulum',
        'nama_kode_cpmk',
        'desc_cpmk_id',
        'desc_cpmk_en'
    ];

    protected static function booted(): void{
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }

    public function cpls(){
        return $this->belongsToMany(CPLModel::class, 'cpmk_cpl_map', 'id_cpmk', 'id_cpl');
    }

    public function mk_cpmk(){
        return $this->hasMany(MataKuliahCPMKMapModel::class, 'id_cpmk', 'id_cpmk');
    }

     public function mk_cpmk_sub_cpmk(){
        return $this->hasMany(MKCPMKSubCPMKMapModel::class, 'id_cpmk', 'id_cpmk');
    }

    public function tpcpmkmap(){
        return $this->hasMany(TPCPMKMapModel::class, 'id_cpmk', 'id_cpmk');
    }

    public function cpmkcpl(){
        return $this->hasMany(MK_CPMK_CPL_MapModel::class, 'id_cpmk', 'id_cpmk');
    }
    public function subCpmk() {
        return $this->hasMany(SubCPMKModel::class, 'id_cpmk', 'id_cpmk');
    }

    public function programstudi(){
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    public function mataKuliahTerkait(){
        return $this->belongsToMany(MataKuliahModel::class, 'mata_kuliah_cpmk_map', 'id_cpmk', 'id_mk');
    }
}
