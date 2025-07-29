<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;

class SubCPMKModel extends Model
{
    protected $table = 'sub_cpmk';
    protected $primaryKey = 'id_sub_cpmk';
    public $timestamps = false;

    protected $fillable = [
        'id_ps',
        'id_cpmk',
        'id_kurikulum',
        'nama_kode_sub_cpmk',
        'kode_sub_cpmk',
        'desc_sub_cpmk_id',
        'desc_sub_cpmk_en',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }
    // has many relation
    public function rps_detail(){
        return $this->hasMany(RPSDetailModel::class, 'id_sub_cpmk', 'id_sub_cpmk');
    }
    public function mk_cpmk_sub_cpmk()
    {
        return $this->hasMany(MKCPMKSubCPMKMapModel::class, 'id_sub_cpmk', 'id_sub_cpmk');
    }

    // belongs to relation
    public function mataKuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }

    public function programstudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    public function cpmk() {
        return $this->belongsTo(CPMKModel::class, 'id_cpmk');
    }
}
