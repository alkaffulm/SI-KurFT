<?php

namespace App\Models;

use App\Models\BKMKMapModel;
use App\Models\ProgramStudiModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\BKCPLMapModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use App\Models\CPLModel;
use App\Models\MataKuliahModel;


class BahanKajianModel extends Model
{
    protected $table = 'bahan_kajian';
    protected $primaryKey = 'id_bk';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'id_kurikulum',
        'nama_bk_id',
        'nama_bk_en',
        'nama_kode_bk',
        'kategori',
        'desc_bk_id',
        'desc_bk_en'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }

    public function programstudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
    // has many relation
    public function bk_mk(){
        return $this->hasMany(BKMKMapModel::class, 'id_bk', 'id_bk');
    }
    public function bk_cpl(){
        return $this->hasMany(BKCPLMapModel::class, 'id_bk', 'id_bk');
    }
    public function cpls()
    {
        return $this->belongsToMany(CPLModel::class, 'bk_cpl_map', 'id_bk', 'id_cpl');
    }

    public function mataKuliah()
    {
        return $this->belongsToMany(MataKuliahModel::class, 'bk_mk_map', 'id_bk', 'id_mk');
    }

}
