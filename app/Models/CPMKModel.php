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
        'nama_kode_cpmk',
        'kode_cpmk',
        'desc_cpmk_id',
        'desc_cpmk_en'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }
    /**
     * Relasi many-to-many ke CPLModel melalui tabel cpmk_cpl_map.
     */
    public function cpl()
    {
        return $this->belongsToMany(CPLModel::class, 'cpmk_cpl_map', 'id_cpmk', 'id_cpl');
    }

    // has many relation
    public function mk_cpmk()
    {
        return $this->hasMany(MataKuliahCPMKMapModel::class, 'id_cpmk', 'id_cpmk');
    }

     public function mk_cpmk_sub_cpmk()
    {
        return $this->hasMany(MKCPMKSubCPMKMapModel::class, 'id_cpmk', 'id_cpmk');
    }
    public function tpcpmkmap()
    {
        return $this->hasMany(TPCPMKMapModel::class, 'id_cpmk', 'id_cpmk');
    }
    public function cpmkcpl()
    {
        return $this->hasMany(CPMKCPLMapModel::class, 'id_cpmk', 'id_cpmk');
    }
    public function subCpmk() 
    {
        return $this->hasMany(SubCPMKModel::class, 'id_cpmk', 'id_cpmk');
    }

    // belongs to relation
    public function programstudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    /**
     * Relasi many-to-many ke MataKuliahModel melalui tabel mata_kuliah_cpmk_map.
     */
    public function mataKuliahTerkait() // Gunakan nama berbeda agar tidak konflik dengan relasi belongsTo
    {
        return $this->belongsToMany(MataKuliahModel::class, 'mata_kuliah_cpmk_map', 'id_cpmk', 'id_mk');
    }
}
