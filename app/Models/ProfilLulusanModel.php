<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use Illuminate\Database\Eloquent\Model;

class ProfilLulusanModel extends Model
{
    protected $table = 'profil_lulusan';
    protected $primaryKey = 'id_pl';
    public $timestamps = false;
    protected $fillable = [
        'id_pl',
        'id_ps',
        'kode_pl',
        'nama_pl_id',
        'nama_pl_en',
        'desc_pl_id',
        'desc_pl_en'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
    }

    /**
     * Relasi many-to-many ke CPLModel melalui tabel pl_cpl_map.
     */
    public function cpl()
    {
        // Parameter:
        // 1. Model tujuan (CPLModel::class)
        // 2. Nama tabel pivot ('pl_cpl_map')
        // 3. Foreign key di tabel pivot untuk model ini ('id_pl')
        // 4. Foreign key di tabel pivot untuk model tujuan ('id_cpl')
        return $this->belongsToMany(CPLModel::class, 'pl_cpl_map', 'id_pl', 'id_cpl');
    }

    // belong to relation
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    public function plpeomap()
    {
        return $this->hasMany(PLPEOMapModel::class, 'id_pl', 'id_pl');
    }

    public function cplpeomap()
    {
        return $this->hasMany(CPLPLMapModel::class, 'id_pl', 'id_pl');
    }
}
